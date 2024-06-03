<?php

$header_name = 'Update Barangay Staff Account';
$id             = $_GET['id'];
$staff          = getRecord($id, 'barangay_staff', 'staff_id');
$lastname       = $staff['last_name'];
$firstname      = $staff['first_name'];
$middlename     = $staff['middle_name'];
$username       = $staff['username'];
$email          = $staff['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $staffDetails = [
        $_POST['lastname'],
        $_POST['firstname'],
        $_POST['middlename'],
        $_POST['username'],
    ];

    if (!empty($_POST['password']))
    {
        $hased = password_hash($data['password'], PASSWORD_DEFAULT);
        $staffDetails[] = $hased;
    }

    $staffDetails[] = $_POST['email'];
    $staffDetails[] = $id;

    $add = updateStaff($staffDetails);

    if ($add == 1)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Updated Successfully!';
        $modal_message  = '<b>' . $_POST['username'] . '</b> has been updated.';
        $modal_pos      = 'staff-accounts';
        logEvent('Barangay Staff', $update, 'UPDATE');
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Updated Failed!';
        $modal_message  = 'An error occured while updating <b>' . $_POST['username'] . '</b>.';
        $modal_pos      = "staff-accounts/update-staff-account?id=$id";
    }
    
    require getPartial('admin.confirm-modal');
}

require getAdminView('update-staff-acc');