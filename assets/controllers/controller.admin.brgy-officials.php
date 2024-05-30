<?php

$header_name = 'Barangay Officials';

$fullname       = 'NOT FOUND';
$birthdate      = 'NOT FOUND';
$gender         = 'NOT FOUND';
$address        = 'NOT FOUND';
$phone_num      = 'NOT FOUND';
$email          = 'NOT FOUND';
$position       = 'NOT FOUND';
$handle         = 'NOT FOUND';
$status         = 'NOT FOUND';
$description    = 'NOT FOUND';
$date_added     = 'NOT FOUND';

if (isset($_GET['details']))
{
    $id = $_GET['details'];
    $official = getRecord($id, 'barangay_officials', 'brgy_official_id');

    if ($official != null)
    {
        $lastname       = $official['last_name'];
        $firstname      = $official['first_name'];
        $middlename     = $official['middle_name'];
        $gender         = $official['gender'];
        $phone_num      = $official['phone_number'];
        $email          = $official['email'];
        $position       = $official['position'];
        $handle         = $official['handle'];
        $status         = $official['status'];
        $date_added     = $official['date_added'];  
        $profile        = $official['profile'];

        $fullname = "$lastname, $firstname $middlename";

        require getPartial('admin.official-details-modal');
    }
}

if (isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $official = getRecord($id, 'barangay_officials', 'brgy_official_id');

    if ($official != null)
    {
        $lastname       = $official['last_name'];
        $firstname      = $official['first_name'];
        $middlename     = $official['middle_name'];
        $position       = $official['position'];
        $status         = $official['status'];
        $profile        = $official['profile'];

        $fullname = "$lastname, $firstname $middlename";

        require getPartial('admin.delete-official-modal');
    }
}

if (isset($_GET['delete-confirm']))
{
    $id = $_GET['delete-confirm'];

    $delete = deleteRecordWithLog($id, 'barangay_officials', 'brgy_official_id');
    
    if ($delete != 0)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Added Successfully!';
        $modal_message  = 'Barangay official is successfully added.';
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Add Failed!';
        $modal_message  = 'An Error occured while deleting Barangay Official.';
    }

    $modal_pos      = 'barangay-officials';
    require getPartial('admin.confirm_modal');
}

require getAdminView('brgy-officials');