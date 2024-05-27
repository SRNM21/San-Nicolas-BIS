<?php

$header_name = 'New Barangay Official';

require getAdminView('new-official');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id             = generateID('BRG');
    $date_now       = date('Y-m-d');
    
    /* HANDLE FILE UPLOAD */
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
        $modal_success  = 'New barangay official is added';
        $modal_neg      = 'barangay-officials';
        $modal_pos      = 'barangay-officials/new-official';
        require getPartial('admin.modal');
    }
    else 
    {
        echo $add;
    }
}