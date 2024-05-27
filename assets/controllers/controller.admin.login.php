<?php

if (isset($_SESSION['LOGGED_IN']))
{
    header('Location: administrator/dashboard');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['otp']))
    {
        if ($_POST['otp'] == $_SESSION['OTP'])
        {
            $_SESSION['LOGGED_IN'] = 1;
            header('Location: administrator/dashboard');
            exit;
        }
        else 
        {
            $modal_icon     = 'error';
            $modal_title    = 'Invalid OTP';
            $modal_success  = 'Your provided OTP does not match';
            $modal_pos      = '';

            require getPartial('admin.confirm-modal');
        }
    }
    else
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admin = getAccount($username, $password, 'barangay_admin');
        $staff = getAccount($username, $password, 'barangay_staff');

        if ($admin != null)
        {
            $email = $admin['email'];
            $atPos = strpos($email, '@');
            $censored_email = substr($email, 0, 3);
            $censored_email .= str_repeat('*', ($atPos - 3)); 
            $censored_email .= preg_replace('/[^@]+@([^\s]+)/', '@$1', $email);

            $otp = rand(100000, 999999); 
            $otp_message = strval($otp); 

            $_SESSION['OTP'] = $otp;
            $_SESSION['EMAIL'] = $email;
            $_SESSION['USERNAME'] = $username;
            $_SESSION['PASSWORD'] = $password;
            $_SESSION['PRIVILEGE'] = 'ADMIN';
            
            require getAPI('mailer');
            require getPartial('admin.otp-modal');
        }
        else if ($staff != null)
        {
            $email = $staff['email'];
            $atPos = strpos($email, '@');
            $censored_email = substr($email, 0, 3);
            $censored_email .= str_repeat('*', ($atPos - 3)); 
            $censored_email .= preg_replace('/[^@]+@([^\s]+)/', '@$1', $email);

            $otp = rand(100000, 999999); 
            $otp_message = strval($otp); 

            $_SESSION['OTP'] = $otp;
            $_SESSION['EMAIL'] = $email;
            $_SESSION['USERNAME'] = $username;
            $_SESSION['PASSWORD'] = $password;
            $_SESSION['PRIVILEGE'] = 'STAFF';
            
            require getAPI('mailer');
            require getPartial('admin.otp-modal');
        }
        else 
        {
            $modal_icon     = 'error';
            $modal_title    = 'Invalid Account';
            $modal_success  = 'Your provided account has not been registered for this application';
            $modal_pos      = '';

            require getPartial('admin.confirm-modal');
        }
    }
}

require getAuthView('login');