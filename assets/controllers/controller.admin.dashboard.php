<?php

if ($_SESSION['LOGGED_IN'] == 0)
{
    echo $_SESSION['LOGGED_IN'];
    // require getController('admin.redirect');
    return;
}

require getLayout('dashboard');