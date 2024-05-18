<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($_POST['otp'] == $_SESSION['OTP'])
    {
        $_SESSION['LOGGED_IN'] = 1;
        // require getController('admin.dashboard');
        header('Location: dashboard');
    }
}