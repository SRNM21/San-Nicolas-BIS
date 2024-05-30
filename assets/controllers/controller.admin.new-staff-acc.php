<?php

$header_name = 'New Barangay Staff Account';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id             = generateID('STF');
    $hash           = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $staffDetails = [
        $id,
        $_POST['lastname'],
        $_POST['firstname'],
        $_POST['middlename'],
        $_POST['username'],
        $hash,
        $_POST['email']
    ];

    $add = addRecordWithLog($staffDetails, 'barangay_staff');

    if ($add != 0)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Added Successfully!';
        $modal_message  = 'New barangay staff is added.';
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Add Failed!';
        $modal_message  = 'An Error occured while adding new Barangay staff.';
    }

    $scn_txt        = 'Back';
    $prm_txt        = 'Ok';
    $scn_href       = 'staff-accounts';
    $prm_href       = 'staff-accounts/new-staff-acc';
    require getPartial('admin.modal');
}

require getAdminView('new-staff-acc');