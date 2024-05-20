<?php

if (!isset($_SESSION['LOGGED_IN']))
{
    return getController('admin.redirect');
    exit;
}

require getAuthView('logout');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['logout']))
    {
        session_destroy();
        header('Location: /sannicolasbis/administrator');
    } 
    else if (isset($_POST['cancel']))
    {
        header('Location: dashboard');
    }
}