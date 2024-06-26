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
    $prm_href       = "residence?filter=$filter&confirm-delete=$id";
    $scn_href       = "residence?filter=$filter";

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
        logEvent('Residents', $delete, 'DELETE');
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

if (isset($_GET['export']))
{
    $filter         = $_GET['filter'];
    $export_type    = $_GET['export'];
    logEvent('Residence', 'N/A', 'EXPORT');

    $file;
    $export_list;

    switch ($filter) 
    {
        case 'all':             
            $file = 'residence';    
            $export_list = queryTable('v_residence', null);
            break;
        case 'family-head':     
            $file = 'fam-head';     
            $export_list = queryTable('familyhead', null);
            break;
        case 'family-member':   
            $file = 'fam-member';   
            $export_list = queryTable('familymember', null);
            break;
        case 'spouse':          
            $file = 'spouse';     
            $export_list = queryTable('spouse', null);  
            break;
        default: break;
    }

    if ($export_type == 'excel')
    {
        require getLibrary("excel-$file");
    }
    else if ($export_type == 'pdf')
    {
        require getLibrary("fpdf-$file");
    }
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