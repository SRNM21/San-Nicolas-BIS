<?php

$header_name = 'New Blotter';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = generateID('BLT');

    $date = $_POST['dat-date'];
    $time = $_POST['dat-time'];

    $date_and_time = $date . ' ' . $time;
    
    $blotter_details = [
        $id,
        $_POST['complainant'],
        $_POST['complainant-add'],
        $_POST['respondent'],
        $_POST['respondent-add'],
        $_POST['nature-of-complaint'],
        date('Y-m-d H:i:s ', strtotime($date_and_time)),
        $_POST['status'],
        date('Y-m-d H:i:s')
    ];

    $add = addRecord($blotter_details, 'blotter');

    if ($add != 0)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Blotter Created!';
        $modal_message  = 'A new record has been added.';
        logEvent('Blotter', $add, 'CREATE');
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Create Blotter Failed';
        $modal_message  = 'An Error occured while creating a blotter!';
    }

    $modal_pos = 'blotter';
    require getPartial('admin.confirm-modal');
}

require getAdminView('new-blotter');