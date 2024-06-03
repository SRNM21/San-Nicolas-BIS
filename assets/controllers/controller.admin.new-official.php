<?php

$header_name = 'New Barangay Official';

$data = queryTable('barangay_officials', null);
$position_choices = [];
$has_brgy_cap = false;
$has_brgy_sec = false;
$has_brgy_tre = false;
$has_sk_chair = false;

foreach ($data as $d)
{
    if ($d['position'] == 'Barangay Captain')
    {
        $has_brgy_cap = true;
    } 
    else if ($d['position'] == 'Barangay Secretary')
    {
        $has_brgy_sec = true;
    } 
    else if ($d['position'] == 'Barangay Treasurer')
    {
        $has_brgy_tre = true;
    } 
    else if ($d['position'] == 'SK Chairperson')
    {
        $has_sk_chair = true;
    } 
}

if (!$has_brgy_cap) $position_choices[] = 'Barangay Captain';
if (!$has_brgy_sec) $position_choices[] = 'Barangay Secretary';
if (!$has_brgy_tre) $position_choices[] = 'Barangay Treasurer';
if (!$has_sk_chair) $position_choices[] = 'SK Chairperson';
$position_choices[] = 'Barangay Kagawad';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id             = generateID('BRG');
    $date_now       = date('Y-m-d');
    
    $up_file        = $_FILES['profile'];

    if (!isValidImage($up_file))
    {        
        $modal_icon     = 'error';
        $modal_title    = 'Invalid File Type!';
        $modal_success  = 'Please upload \'jpg\' or \'png\' image files only.';
        $modal_neg      = 'barangay-officials';
        $modal_pos      = 'barangay-officials/new-official';
        require getPartial('admin.modal');
        exit;
    }

    $filename       = $up_file['name'];
    $tempname       = $up_file['tmp_name'];
    $filetype       = $up_file['type'];
    $filename       = $id . '.' . pathinfo($filename, PATHINFO_EXTENSION);
    $folder         = './assets/uploads/' . $filename;
    
    $barangayOfficialData = [
        'id'            => $id,
        'lastname'      => $_POST['lastname'],
        'firstname'     => $_POST['firstname'],
        'middlename'    => $_POST['middlename'],
        'gender'        => $_POST['gender'],
        'phonenum'      => $_POST['phonenum'],
        'email'         => $_POST['email'],
        'position'      => $_POST['position'],
        'handle'        => $_POST['handle'],
        'status'        => $_POST['status'],
        'date_added'    => $date_now,
        'profile'       => $filename,
        'temp_prof'     => $tempname,
        'folder'        => $folder
    ];

    $add = addOfficials($barangayOfficialData);

    if ($add == 1)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Added Successfully!';
        $modal_message  = 'New barangay official is added';
        logEvent('Barangay Officilas', $id, 'CREATE');
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Add Failed!';
        $modal_message  = 'An Error occured while adding new Barangay Official.';
    }

    $scn_txt        = 'Back';
    $prm_txt        = 'Ok';
    $scn_href       = 'barangay-officials';
    $prm_href       = 'barangay-officials/new-official';
    require getPartial('admin.modal');
}

require getAdminView('new-official');
