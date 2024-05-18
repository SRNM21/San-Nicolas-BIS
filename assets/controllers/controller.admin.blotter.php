<?php

if ($_SESSION['LOGGED_IN'] == 0)
{
    require getController('admin.redirect');
    exit;
}

require getLayout('blotter');