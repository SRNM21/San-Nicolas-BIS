<?php

$header_name = 'Update Official';

$comittee_title = [
    'None',
    'Comittee on Health',
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

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $official = getRecord($id, 'barangay_officials', 'brgy_official_id');
    
    $data = queryTable('barangay_officials', null);
    $has_brgy_cap = 0;
    $has_brgy_sec = 0;
    $has_brgy_tre = 0;
    $has_sk_chair = 0;

    foreach ($data as $d)
    {
        if ($d['brgy_official_id'] != $id)
        {
            $has_brgy_cap += $d['position'] == 'Barangay Captain'   ? 1 : 0;
            $has_brgy_sec += $d['position'] == 'Barangay Secretary' ? 1 : 0;
            $has_brgy_tre += $d['position'] == 'Barangay Treasurer' ? 1 : 0;
            $has_sk_chair += $d['position'] == 'SK Chairperson'     ? 1 : 0;
        }
    }

    $position_choices = [];
    if ($has_brgy_cap < 1) $position_choices[] = 'Barangay Captain';
    if ($has_brgy_sec < 1) $position_choices[] = 'Barangay Secretary';
    if ($has_brgy_tre < 1) $position_choices[] = 'Barangay Treasurer';
    if ($has_sk_chair < 1) $position_choices[] = 'SK Chairperson';
    $position_choices[] = 'Barangay Kagawad';

    $firstname      = handleEmptyValue('', $official['first_name']);
    $middlename     = handleEmptyValue('', $official['middle_name']);
    $lastname       = handleEmptyValue('', $official['last_name']);
    $gender         = handleEmptyValue('', $official['gender']);
    $phone_num      = handleEmptyValue('', $official['phone_number']);
    $email          = handleEmptyValue('', $official['email']);
    $position       = handleEmptyValue('', $official['position']);
    $comittee       = handleEmptyValue('', $official['comittee_title']);
    $status         = handleEmptyValue('', $official['status']);
    $date_added     = handleEmptyValue('', $official['date_added']);  
    $profile        = handleEmptyValue('', $official['profile']);
    
    $fullname = "$lastname, $firstname $middlename";
}

require getAdminView('update-official');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = $_GET['id'];
    /* HANDLE FILE UPLOAD */
    $up_file        = $_FILES['profile'];
    $date_now = null;
    $filename = null;
    $tempname = null;
    $folder = null;

    if (!($up_file['error'] == 4 || ($up_file['size'] == 0 && $up_file['error'] == 0)))
    {
        if (!isValidImage($up_file))
        {        
            $modal_icon     = 'error';
            $modal_title    = 'Invalid File Type!';
            $modal_message  = 'Please upload \'jpg\' or \'png\' image files only.';
            $scn_txt        = 'Back';
            $prm_txt        = 'Ok';
            $scn_href       = 'barangay-officials';
            $prm_href       = "barangay-officials/update-official?id=$id";
            require getPartial('admin.modal');
            exit;
        }

        if (file_exists("assets/uploads/$id.jpg")) 
        {        
            unlink("assets/uploads/$id.jpg");
        }   

        if (file_exists("assets/uploads/$id.png")) 
        {        
            unlink("assets/uploads/$id.png");
        }

        $filename       = $up_file['name'];
        $tempname       = $up_file['tmp_name'];
        $filetype       = $up_file['type'];
        $filename       = $_GET['id'] . '.' . pathinfo($filename, PATHINFO_EXTENSION);
        $folder         = './assets/uploads/' . $filename;
    }
 
    $barangayOfficialData = [
        'id'            => $id,
        'lastname'      => $_POST['lastname'],
        'firstname'     => $_POST['firstname'],
        'middlename'    => $_POST['middlename'],
        'gender'        => $_POST['gender'],
        'phonenum'      => $_POST['phonenum'],
        'email'         => $_POST['email'],
        'position'      => $_POST['position'],
        'comittee'      => $_POST['comittee'],
        'status'        => $_POST['status'],
        'date_added'    => $date_now,
        'profile'       => $filename,
        'temp_prof'     => $tempname,
        'folder'        => $folder
    ];

    $update = updateOfficials($barangayOfficialData);

    if ($update == 1)
    {    
        $firstname      = handleEmptyValue('',  $_POST['firstname']);
        $middlename     = handleEmptyValue('',  $_POST['middlename']);
        $lastname       = handleEmptyValue('',  $_POST['lastname']);
        $fullname       = "$lastname, $firstname $middlename";

        $modal_icon     = 'success';
        $modal_title    = 'Updated Successfully!';
        $modal_message  = "<b>$fullname</b> has been updated successfully.";
        $modal_pos      = "barangay-officials";
        logEvent('Barangay Official', $id, 'UPDATE');
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Updated Failed!';
        $modal_message  = "An error occured while updating <b>$fullname</b>.";
        $modal_pos      = "barangay-officials/update-official?id=$id";
    }

    require getPartial('admin.confirm-modal');
}