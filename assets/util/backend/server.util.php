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
    $origin = '/'. $folder;
    $admin_uri = substr($uri, strlen($origin) + 1); 
    $onAdmin = str_starts_with($admin_uri, 'administrator');
    $exception = ['administrator', 'administrator/verification'];
    $exempted = in_array($admin_uri, $exception);

    if ($onAdmin && !isset($_SESSION['LOGGED_IN']))
    {
        if (!$exempted)
        {
            var_dump('hello');
            return 'NOT LOGGED IN'; 
        }
    }

    $routes = [
        "/$folder/" =>
        getController('redirect'),
        
        "/$folder/community" => 
        getController('home-page'),
        
        "/$folder/community/join-community" => 
        getController('join-community'),

        "/$folder/administrator" => 
        getController('admin.login'),
        
        "/$folder/administrator/logout" => 
        getController('admin.logout'),

        "/$folder/administrator/verification" => 
        getController('admin.verify-otp'),

        "/$folder/administrator/dashboard" => 
        getController('admin.dashboard'),
        
        "/$folder/administrator/barangay-officials" => 
        getController('admin.brgy-officials'),

        "/$folder/administrator/barangay-officials/new-official" => 
        getController('admin.new-official'),
        
        "/$folder/administrator/barangay-officials/update-official" => 
        getController('admin.update-official'),
        
        "/$folder/administrator/residence" => 
        getController('admin.residence'),
        
        "/$folder/administrator/residence/info" => 
        getController('admin.residence-details'),

        "/$folder/administrator/blotter" => 
        getController('admin.blotter'),

        "/$folder/administrator/staff-accounts" => 
        getController('admin.staff-acc'),

        "/$folder/administrator/staff-accounts/new-staff-account" => 
        getController('admin.new-staff-acc'),

        "/$folder/administrator/staff-accounts/update-staff-account" => 
        getController('admin.update-staff-acc'),
        
        "/$folder/administrator/settings" => 
        getController('admin.settings'),
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

/** 
 * View helper that returns illustration path of the passed illustration name.
 * 
 * @param String $svg The Illustration's name.
 */
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

function handleEmptyValue($null_val, $value_to_check)
{
    return ($value_to_check == null || empty($value_to_check)) 
        ? $null_val
        : $value_to_check;
}

function isValidImage($file)
{
    $allowed_mimes          = ['image/jpeg', 'image/png'];
    $allowed_extensions     = ['jpg', 'png'];
    $ext                    = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    return in_array($file['type'], $allowed_mimes) && in_array($ext, $allowed_extensions);
}