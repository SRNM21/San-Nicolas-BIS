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
const LIB_PATH              = '/assets/util/lib/';
const CONTROLLER_PATH       = '/assets/controllers/';
const PARTIALS_PATH         = '/assets/partials/';
const VIEW_ADMIN_PATH       = '/views/admin/';
const VIEW_ADMIN_LAYOUTS    = '/views/admin/layouts/';
const VIEW_AUTH_PATH        = '/views/auth/';
const VIEW_PUBLIC_PATH      = '/views/public/';
const ICONS_PATH            = '/assets/src/icons/';
const FAVICONS_PATH         = '/assets/src/favicon/';
const IMAGES_PATH           = '/assets/src/images/';
const VECTOR_PATH           = '/assets/src/svg/';

/*
 * TABLE CONST
 */

const T_BARANGAY_ADMIN          = 'barangay_admin';
const T_BARANGAY_OFFICIALS      = 'barangay_officials';
const T_BARANGAY_STAFF          = 'barangay_staff';
const T_BLOTTER                 = 'blotter';
const T_EVENTS                  = 'events';
const T_FAMILY_HEAD             = 'familyhead';
const T_FAMILY_MEMBER           = 'familymember';
const T_FEEDBACK                = 'feedback';
const T_LOG                     = 'log';
const T_PENDING_FAMILYHEAD      = 'pending_familyhead';
const T_PENDING_FAMILYMEMBER    = 'pending_familymember';
const T_PENDING_SPOUSE          = 'pending_spouse';
const T_REQUEST_DOCUMENT        = 'request_document';
const T_SPOUSE                  = 'spouse';
const V_PENDING_RESIDENCE       = 'v_pending_residence';
const V_RESIDENCE               = 'v_residence';

/*
 * DIALOG ICONS 
 */

const DIALOG_ICON_SUCCESS   = 'success';
const DIALOG_ICON_ERROR     = 'error';
const DIALOG_ICON_QUESTION  = 'question';

/*
 *  ERROR STATUS CODES
 */

const STATUS_SUCCESS        = 1;
const STATUS_FAILED         = 0;
const STATUS_DB_ERROR       = -1;
const STATUS_NOT_FOUND      = -2;
const STATUS_SYS_ERROR      = -3;

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
            return STATUS_SYS_ERROR; 
        }
    }

    $routes = [
        "/$folder/" =>
        getController('redirect'),
        
        "/$folder/community" => 
        getController('redirect'),

        "/$folder/community/home" => 
        getController('home-page'),
        
        "/$folder/community/join-community" => 
        getController('join-community'),

        "/$folder/community/join-community/join-as-family-head" => 
        getController('join-community-fam-head'),

        "/$folder/community/services" => 
        getController('services'),

        "/$folder/community/services/barangay-clearance" => 
        getController('services-document'),

        "/$folder/community/services/barangay-indigency" => 
        getController('services-document'),

        "/$folder/community/services/barangay-residency" => 
        getController('services-document'),

        "/$folder/community/events" => 
        getController('events'),
        
        "/$folder/community/landmarks" => 
        getController('landmarks'),
        
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
        
        "/$folder/administrator/residence/update-resident" => 
        getController('admin.update-residence'),

        "/$folder/administrator/pendings" => 
        getController('admin.pendings'),

        "/$folder/administrator/blotter" => 
        getController('admin.blotter'),

        "/$folder/administrator/blotter/new-blotter" => 
        getController('admin.new-blotter'),

        "/$folder/administrator/blotter/update-blotter" => 
        getController('admin.update-blotter'),

        "/$folder/administrator/requested-documents" => 
        getController('admin.requested-documents'),

        "/$folder/administrator/audit-trail" => 
        getController('admin.audit-trail'),

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
    : STATUS_NOT_FOUND;
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
 * System helper that returns directory of the the library file.
 * 
 * @param String $library The library file name.
 */
function getLibrary($library)
{
    return '../' . getProjectFolder() . LIB_PATH . "lib.$library.php";
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
function getPublicView($view)
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
    require '.' . ICONS_PATH . "$svg.svg";
}

/** 
 * View helper that returns image path of the passed image name.
 * 
 * @param String $image The Image's name.
 */
function getImage($image)
{
    return '/' . getProjectFolder() . IMAGES_PATH . "$image";
}

/** 
 * View helper that returns logo path of the passed image name.
 */
function getLogo()
{
    return '/' . getProjectFolder() . IMAGES_PATH . 'SYS_LOGO' . (file_exists('assets/src/images/SYS_LOGO.jpg') ? '.jpg' : '.png');
}

/** 
 * View helper that returns favicon path of the passed favicon name.
 * 
 * @param String $ico The Favicon's name.
 */
function getFavicon($ico)
{
    return '/' . getProjectFolder() . FAVICONS_PATH . "$ico.ico";
}

/** 
 * View helper that returns illustration path of the passed illustration name.
 * 
 * @param String $svg The Illustration's name.
 */
function getIllustration($svg)
{
    require '.' . VECTOR_PATH . "$svg.svg";
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
    return ($value_to_check == null || empty(trim($value_to_check)) || $value_to_check == 'N/A') 
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

function ordinal($number) 
{
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');

    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return intval($number). $ends[$number % 10];
}

function formatDate($date)
{
    $temp   = explode('-', $date);
    $year   = $temp[0];
    $day    = $temp[2];

    return date('l', strtotime($date)) . ', ' . date('F', strtotime($date)) . ' ' . $day . ', ' . $year;
}