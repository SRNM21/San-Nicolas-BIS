<?php

$header_name = 'Barangay Staff Accounts';

$q = '';
$data = queryTable('barangay_staff', null);

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
    $delete = deletRecord($_GET['confirm-delete-staff'], 'barangay_staff', 'staff_id');
    
    if ($delete != 0)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Deleted Successfully!';
        $modal_message  = 'One of the Barangay Staff has been deleted';
        $modal_pos      = "staff-accounts";
        logEvent('Barangay Staff', $delete, 'DELETE');
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Delete Failed!';
        $modal_message  = 'An error occured while deleting Barangay Staff';
        $modal_pos      = "staff-accounts";
    }

    require getPartial('admin.confirm-modal');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['refresh']))
    {
        $data = queryTable('barangay_staff', null);
    }
    else 
    {
        $q = $_POST['query'];
        $data = queryTable('barangay_staff', $q);
    }
}

require getAdminView('staff-acc');