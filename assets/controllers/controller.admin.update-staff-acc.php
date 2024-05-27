<?php

$header_name = 'Update Barangay Staff Account';
$id             = $_GET['id'];
$staff          = getStaff($id);
$lastname       = $staff['last_name'];
$firstname      = $staff['first_name'];
$middlename     = $staff['middle_name'];
$username       = $staff['username'];
$email          = $staff['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $staffDetails = [
        'id'            => $id,
        'lastname'      => $_POST['lastname'],
        'firstname'     => $_POST['firstname'],
        'middlename'    => $_POST['middlename'],
        'email'         => $_POST['email'],
        'username'      => $_POST['username'],
        'password'      => $_POST['password']
    ];

    $add = updateStaff($staffDetails);

    if ($add == 1)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Updated Successfully!';
        $modal_success  = $_POST['username'] . ' has been updated';
        $modal_neg      = 'staff-accounts';
        $modal_pos      = 'staff-accounts/new-staff-acc';
        require getPartial('admin.modal');
    }
    else 
    {
        echo $add;
    }
}

require getAdminView('update-staff-acc');