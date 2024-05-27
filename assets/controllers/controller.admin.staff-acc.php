<?php

$header_name = 'Barangay Staff Accounts';

if (isset($_GET['delete_staff_id']))
{
    $id             = $_GET['delete_staff_id'];
    $username       = $_GET['delete_staff_username'];
    $modal_icon     = 'error';
    $modal_title    = 'Confirm Delete';
    $modal_message  = "Are you sure to delete <b>$username</b>. This proccess cannot be undone";
    $scn_hred       = 'staff-accounts';
    $prm_href       = "staff-accounts?confirm_delete_staff=$id";
    $scn_txt        = 'Cancel';
    $prm_txt        = 'Delete';
    require getPartial('admin.modal');
}

if (isset($_GET['confirm_delete_staff']))
{
    if (deletRecord($_GET['confirm_delete_staff'], 'barangay_staff', 'staff_id'))
    {
        $modal_icon     = 'success';
        $modal_title    = 'Deleted Successfully!';
        $modal_message  = 'One of the Barangay Staff has been deleted';
        $modal_pos      = "staff-accounts";
        require getPartial('admin.confirm-modal');
    }
}

require getAdminView('staff-acc');