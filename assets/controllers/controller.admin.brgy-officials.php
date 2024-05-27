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

    if (deletRecord($id, 'barangay_officials', 'brgy_official_id'))
    {
        $modal_icon     = 'success';
        $modal_title    = 'Deleted Successfully!';
        $modal_success  = 'One of the barangay official is deleted';
        $modal_neg      = 'barangay-officials';
        $modal_pos      = 'barangay-officials/new-official';
    }
    else 
    {        
        $modal_icon     = 'error';
        $modal_title    = 'An error occured';
        $modal_success  = 'Update failed';
        $modal_neg      = 'barangay-officials';
        $modal_pos      = 'barangay-officials';
    }

    require getPartial('admin.modal');
}

require getAdminView('brgy-officials');