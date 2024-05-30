<?php

$header_name = 'Barangay Staff Accounts';

if (isset($_GET['delete-staff-id']))
{
    $id             = $_GET['delete-staff-id'];
    $username       = $_GET['delete-staff-username'];
    $modal_icon     = 'error';
    $modal_title    = 'Confirm Delete';
    $modal_message  = "Are you sure to delete <b>$username</b>. This proccess cannot be undone";
    $scn_href       = 'staff-accounts';
    $prm_href       = "staff-accounts?confirm-delete-staff=$id";
    $scn_txt        = 'Cancel';
    $prm_txt        = 'Delete';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-delete-staff']))
{
    if (deleteRecordWithLog($_GET['confirm-delete-staff'], 'barangay_staff', 'staff_id'))
    {
        $modal_icon     = 'success';
        $modal_title    = 'Deleted Successfully!';
        $modal_message  = 'One of the Barangay Staff has been deleted';
        $modal_pos      = "staff-accounts";
        require getPartial('admin.confirm-modal');
    }
}

require getAdminView('staff-acc');