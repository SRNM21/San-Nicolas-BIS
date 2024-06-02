<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['logout']))
    {
        logEvent('N/A', 'N/A', 'LOG OUT');
        session_destroy();
        header('Location: /sannicolasbis/administrator');
    } 
    else if (isset($_POST['cancel']))
    {
        header('Location: dashboard');
    }
}

require getAuthView('logout');