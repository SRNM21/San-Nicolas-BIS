<?php

$header_name = 'Blotter';

$q = '';
$filter = 'all';
$data = queryBlotter(null);

if (isset($_GET['filter']))
{
    $filter = $_GET['filter'];
}

if (isset($_GET['details']))
{
    $complaint = getRecord($_GET['details'], 'blotter', 'complaint_id');
    require getPartial('admin.blotter-details');
}

if (isset($_GET['delete']))
{
    $id             = $_GET['delete'];
    $blotter        = getRecord($id, 'blotter', 'complaint_id');
    $complainant    = $blotter['complainant'];
    $respondent     = $blotter['respondent'];
    $nat_of_comp    = $blotter['nature_of_complaint'];

    $modal_icon     = 'error';
    $modal_title    = 'Confirm Deletion';
    $modal_message  = "Deleting this is permanent and cannot be undone.<br><br> 
                        <b>Complainant:</b>
                        $complainant<br> 
                        <b>Respondent:</b>
                        $respondent<br> 
                        <b>Nature of Complaint:</b>
                        $nat_of_comp";
    $scn_href       = 'blotter';
    $prm_href       = "blotter?confirm-delete=$id";
    $scn_txt        = 'Cancel';
    $prm_txt        = 'Delete';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-delete']))
{
    $delete = deletRecord($_GET['confirm-delete'], 'blotter', 'complaint_id');
    
    if ($delete != 0)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Deleted Successfully';
        $modal_message  = 'Blotter has been deleted!';
        $modal_pos      = 'blotter';
        logEvent('Blotter', $delete, 'DELETE');
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Delete Failed';
        $modal_message  = 'An error occured while deleting blotter';
        $modal_pos      = "blotter";
    }

    require getPartial('admin.confirm-modal');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['refresh']))
    {
        $data = queryBlotter(null);
    }
    else 
    {
        $q = $_POST['query'];
        $data = queryBlotter($q);
    }
}

require getAdminView('blotter');