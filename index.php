<?php

// Parse environment file

//! IMPORTANT SERVER UTILITY
require '../SanNicolasBIS/assets/util/backend/server.util.php';
require getAPI('database');

session_start();
$_SESSION['LOGGED_IN'] = 0;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$route = getRoute($uri);

if ($route == '404')
{
    echo 'NOT FOUND';
    exit;
}

require $route;