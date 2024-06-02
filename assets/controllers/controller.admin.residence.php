<?php

$header_name = 'Residence';

$filter = 'all';
$q = '';
$data = queryTable('v_residence', null);

if (isset($_GET['filter']))
{
    $filter = $_GET['filter'];
}

if (isset($_GET['details']))
{
    $id     = $_GET['details'];
    $role   = substr($id, 0, 3);

    require getPartial('admin.residence-details-modal');
}

if (isset($_GET['delete']))
{
    $id     = $_GET['delete'];
    $role   = substr($id, 0, 3);

    if ($role == 'FMH')
    {
        $pending_rec    = getRecord($id, 'familyhead', 'family_head_id');
    }
    else if ($role == 'FMM')
    {
        $pending_rec    = getRecord($id, 'familymember', 'family_member_id');
    }
    else if ($role == 'SPS')
    {
        $pending_rec    = getRecord($id, 'spouse', 'spouse_ID');
    }

    $fullname       = $pending_rec['last_name'] . ', ' . $pending_rec['first_name'] . ' ' . $pending_rec['middle_name'];

    $modal_icon     = 'error';
    $modal_title    = 'Confirm Delete';
    $modal_message  = "Are you sure to delete request of <b>$fullname</b>? This process can not be undone.";

    $prm_txt        = 'Delete';
    $scn_txt        = 'Cancel';
    $prm_href       = "residence?confirm-delete=$id";
    $scn_href       = 'residence?filter=' . $filter;

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-delete']))
{
    $id             = $_GET['confirm-delete'];
    $role           = substr($id, 0, 3);
    $delete;

    if ($role == 'FMH')
    {
        $delete    = deletRecord($id, 'familyhead', 'family_head_id');
    }
    else if ($role == 'FMM')
    {
        $delete    = deletRecord($id, 'familymember', 'family_member_id');
    }
    else if ($role == 'SPS')
    {
        $delete    = deletRecord($id, 'spouse', 'spouse_ID');
    }

    if ($delete)
    {
        $modal_icon = 'success';
        $modal_title = 'Resident Deleted Successfully!';
        $modal_message = 'Resident has been deleted.';
    }
    else 
    {
        $modal_icon = 'error';
        $modal_title = 'Delete Resident Failed!';
        $modal_message = 'An error occured while deleting resident.';
    }

    $modal_pos = '-';
    $path = 'residence?filter=' . $filter;
    require getPartial('admin.confirm-modal');
}

if (isset($_GET['export-all']))
{
    $export_list = queryTable('v_residence', null);
    require getLibrary('fpdf-residence');
}

if (isset($_GET['export-family-head']))
{
    $export_list = queryTable('familyhead', null);
    require getLibrary('fpdf-fam-head');
}

if (isset($_GET['export-family-member']))
{
    $export_list = queryTable('familymember', null);
    require getLibrary('fpdf-fam-member');
}

if (isset($_GET['export-spouse']))
{
    $export_list = queryTable('spouse', null);
    require getLibrary('fpdf-spouse');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['refresh']))
    {
        $data = queryTable('v_residence', null);
    }
    else 
    {
        $q = $_POST['query'];
        $data = queryTable('v_residence', $q);
    }
}

require getAdminView('residence');