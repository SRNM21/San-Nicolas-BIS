<?php

// Parse environment file

//! IMPORTANT SERVER UTILITY
require '../SanNicolasBIS/assets/util/backend/server.util.php';
require getAPI('database');

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$route = getRoute($uri);

if ($route == '404')
{
    exit;
}
else if ($route == 'NOT LOGGED IN')
{
    header('Location: /sannicolasbis/administrator');
}
else
{
    require $route;
}

