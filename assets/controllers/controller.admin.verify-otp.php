<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($_POST['otp'] == $_SESSION['OTP'])
    {
        $_SESSION['LOGGED_IN'] = 1;
        header('Location: dashboard');
    }
}