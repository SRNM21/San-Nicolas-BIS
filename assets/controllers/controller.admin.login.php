<?php

if (isset($_SESSION['LOGGED_IN']))
{
    header('Location: administrator/dashboard');
    return;
}

require getView('admin', 'admin.login');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $creds = isAdmin($username, $password);

    if ($creds != null)
    {
        $email = $creds['email'];
        $censored_email = $email[0] . str_repeat('*', strlen($email) - 11) . '@gmail.com';

        $otp = rand(100000,999999); 
        $otp_message = strval($otp); 

        $_SESSION['OTP'] = $otp;
        $_SESSION['EMAIL'] = $email;
        $_SESSION['USERNAME'] = $username;
        $_SESSION['PASSWORD'] = $password;
        
        require getAPI('mailer');
    }
}