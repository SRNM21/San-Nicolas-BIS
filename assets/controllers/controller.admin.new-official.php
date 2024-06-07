<?php

$header_name = 'New Barangay Official';

$data = queryTable('barangay_officials', null);

$comittee_title = [
    'None',
    'Committe on Health',
    'Committe on Sport',
    'Comittee on Peace and Order',
    'Comittee on Solo Parents',
    'Comittee on Appropriation',
    'Comittee on Education',
    'Comittee on Infra',
    'Comittee on Solid Waste',
    'Comittee in Rules',
    'Comittee on Development'
];

$has_brgy_cap = 0;
$has_brgy_sec = 0;
$has_brgy_tre = 0;
$has_sk_chair = 0;

foreach ($data as $d)
{
    $has_brgy_cap += $d['position'] == 'Barangay Captain'   ? 1 : 0;
    $has_brgy_sec += $d['position'] == 'Barangay Secretary' ? 1 : 0;
    $has_brgy_tre += $d['position'] == 'Barangay Treasurer' ? 1 : 0;
    $has_sk_chair += $d['position'] == 'SK Chairperson'     ? 1 : 0;
}

$position_choices = [];
if ($has_brgy_cap < 1) $position_choices[] = 'Barangay Captain';
if ($has_brgy_sec < 1) $position_choices[] = 'Barangay Secretary';
if ($has_brgy_tre < 1) $position_choices[] = 'Barangay Treasurer';
if ($has_sk_chair < 1) $position_choices[] = 'SK Chairperson';
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
        $modal_message  = 'Please upload \'jpg\' or \'png\' image files only.';
    }
    else 
    {
        $filename       = $up_file['name'];
        $tempname       = $up_file['tmp_name'];
        $filetype       = $up_file['type'];
        $filename       = $id . '.' . pathinfo($filename, PATHINFO_EXTENSION);
        $folder         = './assets/uploads/' . $filename;
        
        $barangayOfficialData = [
            $id,
            $_POST['lastname'],
            $_POST['firstname'],
            $_POST['middlename'],
            $_POST['gender'],
            $_POST['phonenum'],
            $_POST['email'],
            $_POST['position'],
            $_POST['comittee'],
            'Active',
            $date_now,
            $filename,
        ];

        $add_result = addRecord($barangayOfficialData, T_BARANGAY_OFFICIALS);

        if ($add_result == $id)
        {
            $modal_icon     = DIALOG_ICON_SUCCESS;
            $modal_title    = 'Added Successfully!';
            $modal_message  = 'New barangay official is added';
            move_uploaded_file($tempname, $folder);
            logEvent('Barangay Officilas', $id, 'CREATE');
        }
        else 
        {
            $modal_icon     = DIALOG_ICON_ERROR;
            $modal_title    = 'Add Failed!';
            $modal_message  = "An Error occured while adding new Barangay Official. ($add_result)";
        }
    }

    $scn_txt        = 'Back';
    $prm_txt        = 'Ok';
    $scn_href       = 'barangay-officials';
    $prm_href       = 'barangay-officials/new-official';
    require getPartial('admin.modal');
}

require getAdminView('new-official');
