<?php

if (isset($_SESSION['LOGGED_IN']))
{
    header('Location: administrator/dashboard');
    exit;
}

require getAuthView('login');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $creds = isAdmin($username, $password);

    if ($creds != null)
    {
        $email = $creds['email'];
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
        
        require getAPI('mailer');
    }
}