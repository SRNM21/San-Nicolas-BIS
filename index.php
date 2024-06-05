<?php

session_start();
date_default_timezone_set('Asia/Manila');

//! IMPORTANT SERVER UTILITY
require '../SanNicolasBIS/assets/util/backend/server.util.php';
require getAPI('database');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$route = getRoute($uri);

if ($route == STATUS_NOT_FOUND)
{
    exit;
}
else if ($route == STATUS_SYS_ERROR)
{
    header('Location: /sannicolasbis/administrator');
}
else
{
    require $route;
}