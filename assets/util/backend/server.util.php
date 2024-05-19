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
function getRoute(String $uri) 
{
    $folder = strtolower(getProjectFolder());
    
    $routes = [
        "/$folder/" =>
        getController('redirect'),
        
        "/$folder/community" => 
        getController('home-page'),

        "/$folder/administrator" => 
        getController('admin.login'),

        "/$folder/administrator/logout" => 
        adminController('admin.logout'),

        "/$folder/administrator/verification" => 
        adminController('admin.verify-otp'),

        "/$folder/administrator/dashboard" => 
        adminController('admin.dashboard'),
        
        "/$folder/administrator/barangay-officials" => 
        adminController('admin.brgy-officials'),

        "/$folder/administrator/barangay-officials/profile" => 
        adminController('admin.official-details'),
        
        "/$folder/administrator/barangay-officials/new-official" => 
        adminController('admin.new-official'),
        
        "/$folder/administrator/family-head" => 
        adminController('admin.family-head'),
        
        "/$folder/administrator/family-head/info" => 
        adminController('admin.fam-head-details'),

        "/$folder/administrator/family-member" => 
        adminController('admin.family-member'),

        "/$folder/administrator/spouse" => 
        adminController('admin.spouse'),

        "/$folder/administrator/blotter" => 
        adminController('admin.blotter'),
        
        "/$folder/administrator/settings" => 
        adminController('admin.settings'),
        
        "/$folder/null" => 
        getController('home-page'),
    ];
    
    return array_key_exists($uri, $routes) 
        ? $routes[$uri] 
        : "404";
}

/** 
 * System helper that checks if the admin/user is logged in. 
 * Redirect to login view if not logged in
 * 
 * @param String $api The api file name.
 */
function adminController($controller)
{
    if (!isset($_SESSION['LOGGED_IN']) || empty($_SESSION['LOGGED_IN']))
    {
        require getController('admin.redirect');
        exit;
    }

    return getController($controller);
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
 * View helper that returns directory of the the php view directory.
 * 
 * @param String $type The type of php view.
 */
function getView($type)
{
    return '../' . getProjectFolder() . [
        'admin'     => VIEW_ADMIN_PATH,
        'auth'      => VIEW_AUTH_PATH,
        'public'    => VIEW_PUBLIC_PATH
    ][$type];
}

/** 
 * View helper that returns directory of the the admin php view directory.
 * 
 * @param String $view The admin view.
 */
function getAdminView($view)
{
    return getView('admin') . "admin.$view.php";
}

/** 
 * View helper that returns directory of the the authentication php view directory.
 * 
 * @param String $view The authentication view.
 */
function getAuthView($view)
{
    return getView('auth') . "auth.$view.php";
}

/** 
 * View helper that returns directory of the the public php view directory.
 * 
 * @param String $view The public view.
 */
function getPublic($view)
{
    return getView('public') . "public.$view.php";
}

/** 
 * View helper that returns directory of the the php view file.
 * 
 * @param String $type The type of php view.
 * @param String $view The php view file name.
 */
function getPartial($partial)
{
    return '.'.PARTIALS_PATH."partial.$partial.php";
}

/** 
 * System helper that returns project's folder.
 * 
 */
function getProjectFolder() 
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
function getStyle(String $css) 
{
    return '/' . getProjectFolder() . STYLE_PATH . "style.$css.css";
}

/** 
 * View helper that returns directory of the the javascript file.
 * 
 * @param String $js The javascript file name.
 */
function getScript(String $js) 
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


/* SERVER FUNCTIONS */
function generateID($start)
{
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    $id = $start . '-';

    for ($i = 0; $i < 5; $i++) 
    {
        $id .= $chars[rand(0, strlen($chars) - 1)];
    }

    return $id;
}