<?php

$header_name = 'Barangay Staff Accounts';

if (isset($_GET['delete_staff_id']))
{
    $id             = $_GET['delete_staff_id'];
    $username       = $_GET['delete_staff_username'];
    $modal_icon     = 'error';
    $modal_title    = 'Confirm Delete';
    $modal_success  = "Are you sure to delete <b>$username</b>. This proccess cannot be undone";
    $modal_neg      = 'staff-accounts';
    $modal_pos      = "staff-accounts?confirm_delete_staff=$id";
    require getPartial('admin.modal');
}

if (isset($_GET['confirm_delete_staff']))
{
    if (deleteStaff($_GET['confirm_delete_staff']))
    {
        $modal_icon     = 'success';
        $modal_title    = 'Deleted Successfully!';
        $modal_success  = 'One of the Barangay Staff has been deleted';
        $modal_pos      = "staff-accounts";
        require getPartial('admin.confirm-modal');
    }
}

require getAdminView('staff-acc');