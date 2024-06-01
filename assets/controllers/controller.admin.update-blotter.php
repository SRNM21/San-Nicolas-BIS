<?php

$header_name = 'Update Blotter';

$id         = $_GET['id'];
$blotter    = getRecord($id, 'blotter', 'complaint_id');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $date = $_POST['dat-date'];
    $time = $_POST['dat-time'];

    $date_and_time = $date . ' ' . $time;

    $blotter_details = [
        $_POST['complainant'],
        $_POST['complainant-add'],
        $_POST['respondent'],
        $_POST['respondent-add'],
        $_POST['nature-of-complaint'],
        date('Y-m-d h:i:s A ', strtotime($date_and_time)),
        $_POST['status'],
        $id
    ];

    $add = updateBlotter($blotter_details);

    if ($add == 1)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Updated Successfully';
        $modal_message  = 'Blotter has been updated!';
        $modal_pos      = 'blotter';
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Updated Failed';
        $modal_message  = 'An error occured while updating blotter';
        $modal_pos      = "blotter/update-blotter?id=$id";
    }
    
    require getPartial('admin.confirm-modal');
}

require getAdminView('update-blotter');