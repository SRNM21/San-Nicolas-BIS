<?php

$header_name = 'New Barangay Staff Account';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id             = generateID('STF');
    $hash           = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $staffDetails = [
        'id'            => $id,
        'lastname'      => $_POST['lastname'],
        'firstname'     => $_POST['firstname'],
        'middlename'    => $_POST['middlename'],
        'email'         => $_POST['email'],
        'username'      => $_POST['username'],
        'password'      => $hash
    ];

    $add = addStaff($staffDetails);

    if ($add == 1)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Added Successfully!';
        $modal_success  = 'New barangay staff is added';
        $modal_neg      = 'staff-accounts';
        $modal_pos      = 'staff-accounts/new-staff-acc';
        require getPartial('admin.modal');
    }
    else 
    {
        echo $add;
    }
}

require getAdminView('new-staff-acc');