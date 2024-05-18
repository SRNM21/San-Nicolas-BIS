<?php

 /**
 * The environment file of the system
 */
$env = parse_ini_file('.env');


/*
* For Path Configurations.
*/

const STYLE_PATH            = '/assets/styles/';
const SCRIPT_PATH           = '/assets/js/';
const API_PATH              = '/assets/util/api/';
const CONTROLLER_PATH       = '/assets/controllers/';
const PARTIALS_PATH         = '/assets/partials/';
const VIEW_ADMIN_PATH       = '/views/admin/';
const VIEW_ADMIN_LAYOUTS    = '/views/admin/layouts/';
const VIEW_AUTH_PATH        = '/views/auth/';
const VIEW_PUBLIC_PATH      = '/views/public/';
const ICONS_PATH            = '/assets/src/icons/';
const IMAGES_PATH           = '/assets/src/images/';
const VECTOR_PATH           = '/assets/src/svg/';

/** 
 * System helper that returns the route and view of the given URI. '404' view if not found.
 * 
 * @param String $uri The uri of link.
 */
function getRoute(String $uri) : String
{
    $folder = strtolower(getProjectFolder());
    
    $routes = [
        "/$folder/"                                     => getController('redirect'),
        "/$folder/community"                            => getController('home-page'),
        "/$folder/administrator"                        => getController('admin.login'),
        "/$folder/administrator/verification"           => getController('admin.verify-otp'),
        "/$folder/administrator/dashboard"              => getController('admin.dashboard'),
        "/$folder/administrator/barangay-officials"     => getController('admin.brgy-officials'),
        "/$folder/administrator/residence"              => getController('admin.residence'),
        "/$folder/administrator/blotter"                => getController('admin.blotter'),
        "/$folder/administrator/settings"               => getController('admin.settings'),
        "/$folder/administrator/add"                    => getController('admin.add-residence'),
        "/$folder/administrator/update"                 => getController('admin.update'),
        "/$folder/administrator/delete"                 => getController('admin.delete'),
        "/$folder/null"                                 => getController('home-page'),
    ];
    
    return array_key_exists($uri, $routes) 
        ? $routes[$uri] 
        : "404";
}

/** 
 * System helper that returns directory of the the api file.
 * 
 * @param String $api The api file name.
 */
function getAPI($api)
{
    return '../' . getProjectFolder() . API_PATH . "api.$api.php";
}

/** 
 * View helper that returns directory of the the php view file.
 * 
 * @param String $type The type of php view.
 * @param String $view The php view file name.
 */
function getView($type, $view)
{
    return '../' . getProjectFolder() . [
        'admin'     => VIEW_ADMIN_PATH,
        'auth'      => VIEW_AUTH_PATH,
        'public'    => VIEW_PUBLIC_PATH
    ][$type] . "view.$view.php";
}

/** 
 * View helper that returns directory of the the php view file.
 * 
 * @param String $type The type of php view.
 * @param String $view The php view file name.
 */
function getPartial($partial)
{
    return '.'.PARTIALS_PATH."$partial.php";
}

/** 
 * View helper that returns directory of the the php admin view file.
 * 
 * @param String $view The php view file name.
 */
function getLayout($view)
{
    return '../' . getProjectFolder() . VIEW_ADMIN_LAYOUTS . "admin.layout.$view.php";
}

/** 
 * System helper that returns project's folder.
 * 
 */
function getProjectFolder() : String
{
    global $env;
    return $env['PROJECT_FOLDER'];
}

/** 
 * System helper that returns directory of the the controller file.
 * 
 * @param String $controller The controller file name.
 */
function getController($controller)
{
    return '../' . getProjectFolder() . CONTROLLER_PATH . "controller.$controller.php";
}

/** 
 * View helper that returns directory of the the css file.
 * 
 * @param String $css The css file name.
 */
function getStyle(String $css) : String
{
    return '/' . getProjectFolder() . STYLE_PATH . "style.$css.css";
}

/** 
 * View helper that returns directory of the the javascript file.
 * 
 * @param String $js The javascript file name.
 */
function getScript(String $js) : String
{
    return '/' . getProjectFolder() . SCRIPT_PATH . "script.$js.js";
}

/** 
 * View helper that returns svg path of the passed svg name.
 * 
 * @param String $svg The SVG's name.
 */
function getSVG($svg)
{
    require '.'.ICONS_PATH."$svg.svg";
}

/** 
 * View helper that returns image path of the passed image name.
 * 
 * @param String $image The Image's name.
 */
function getImage($image)
{
    require '.'.IMAGES_PATH."$image";
}

/** 
 * View helper that returns illustration path of the passed illustration name.
 * 
 * @param String $svg The Illustration's name.
 */
function getIllustration($svg)
{
    require '.'.VECTOR_PATH."$svg.svg";
}
