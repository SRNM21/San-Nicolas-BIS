<?php

require getAdminView('new-official');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $barangayOfficialData = [
        'id'             => generateID('BRG'),
        'prefix'         => $_POST['prefix'],
        'lastname'       => $_POST['lastname'],
        'firstname'      => $_POST['firstname'],
        'middlename'     => $_POST['middlename'],
        'birthdate'      => $_POST['birthdate'],
        'gender'         => $_POST['gender'],
        'address'        => $_POST['address'],
        'phonenum'       => $_POST['phonenum'],
        'email'          => $_POST['email'],
        'position'       => $_POST['position'],
        'description'    => $_POST['description'],
        'date_added'     => date('Y-m-d')
    ];

    $add = addOfficials($barangayOfficialData);

    if ($add == 1)
    {
        $modal_icon = 'success';
        $modal_title = 'Added Successfully!';
        $modal_success = 'New barangay official is added';
        require getPartial('admin.success-modal');
    }
    else 
    {
        echo $add;
    }
}