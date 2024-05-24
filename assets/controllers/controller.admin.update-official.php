<?php

$header_name = 'Update Official';

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $official = getOfficial($id);

    $firstname      = handleEmptyValue('', $official['first_name']);
    $middlename     = handleEmptyValue('', $official['middle_name']);
    $lastname       = handleEmptyValue('', $official['last_name']);
    $gender         = handleEmptyValue('', $official['gender']);
    $phone_num      = handleEmptyValue('', $official['phone_number']);
    $email          = handleEmptyValue('', $official['email']);
    $position       = handleEmptyValue('', $official['position']);
    $handle         = handleEmptyValue('', $official['handle']);
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
            $modal_success  = 'Please upload \'jpg\' or \'png\' image files only.';
            $modal_neg      = 'barangay-officials';
            $modal_pos      = "barangay-officials/update-official?id=$id";
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
        'handle'        => $_POST['handle'],
        'status'        => $_POST['status'],
        'date_added'    => $date_now,
        'profile'       => $filename,
        'temp_prof'     => $tempname,
        'folder'        => $folder
    ];

    $firstname      = handleEmptyValue('',  $_POST['firstname']);
    $middlename     = handleEmptyValue('',  $_POST['middlename']);
    $lastname       = handleEmptyValue('',  $_POST['lastname']);
    $fullname = "$lastname, $firstname $middlename";

    $add = updateOfficials($barangayOfficialData);

    if ($add == 1)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Updated Successfully!';
        $modal_success  = "$fullname is updated";
        $modal_neg      = 'barangay-officials';
        $modal_pos      = "barangay-officials/update-official?id=$id";
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'An error occured';
        $modal_success  = 'Update failed';
        $modal_neg      = 'barangay-officials';
        $modal_pos      = "barangay-officials/update-official?id=$id";
    }
    
    require getPartial('admin.modal');

}
