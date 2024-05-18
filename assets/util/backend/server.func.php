<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($_POST['func'] == 'SEND_OTP')
    {
        require getAPI('mailer');
    }
}