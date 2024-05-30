<?php

$header_name = 'Document Request';
$filter = 'request';
$req_id;

$q = '';
$data = queryTable('request_document', null);

if (isset($_GET['filter']))
{
    $filter = $_GET['filter'];
}

if (isset($_GET['approve']))
{
    $req_id = $_GET['approve'];
    $approved = updateRequestDocumentStatus($req_id, 'pending');

    if ($approved != 0)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Request Approval';
        $modal_message  = 'The document request was approved.';
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Request Approval';
        $modal_message  = 'An error occured while approving request.';
    }

    $modal_pos = 'requested-documents';
    require getPartial('admin.confirm-modal');
}

if (isset($_GET['decline']))
{
    $req_id         = $_GET['decline'];
    $person         = getRecord($req_id, 'request_document', 'docs_id');
    $fullname       = $person['last_name'] . ', ' . (handleEmptyValue('', $person['suffix']) == '' ? '' : $person['suffix'] . ', ') . $person['first_name'] . ' ' . $person['middle_name'];

    $modal_icon     = 'error';
    $modal_title    = 'Confirm Decline';
    $modal_message  = "Are you sure to decline <b>$fullname's</b> Request?";
    $scn_href       = 'requested-documents';
    $prm_href       = "requested-documents?filter=request&confirm-decline=$req_id";
    $scn_txt        = 'Cancel';
    $prm_txt        = 'Decline';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-decline']))
{
    $id             = $_GET['confirm-decline'];
    $person         = getRecord($id, 'request_document', 'docs_id');
    $fullname       = $person['last_name'] . ', ' . (handleEmptyValue('', $person['suffix']) == '' ? '' : $person['suffix'] . ', ') . $person['first_name'] . ' ' . $person['middle_name'];

    $declined       = updateRequestDocumentStatus($id, 'declined');

    if ($declined == 1)
    {
        $modal_icon = 'success';
        $modal_title = 'Request Declined Successfully!';
        $modal_message = 'Request has been declined.';
    }
    else 
    {
        $modal_icon = 'error';
        $modal_title = 'Decline Request Failed!';
        $modal_message = 'An error occured while declining request.';
    }

    $modal_pos = '-';
    $path = 'requested-documents?filter=request';
    require getPartial('admin.confirm-modal');
}

if (isset($_GET['remove']))
{
    $req_id         = $_GET['remove'];
    $person         = getRecord($req_id, 'request_document', 'docs_id');
    $fullname       = $person['last_name'] . ', ' . (handleEmptyValue('', $person['suffix']) == '' ? '' : $person['suffix'] . ', ') . $person['first_name'] . ' ' . $person['middle_name'];

    $modal_icon     = 'error';
    $modal_title    = 'Confirm Remove';
    $modal_message  = "Are you sure to remove <b>$fullname's</b> document?";
    $scn_href       = 'requested-documents';
    $prm_href       = "requested-documents?filter=pending&confirm-remove=$req_id";
    $scn_txt        = 'Cancel';
    $prm_txt        = 'Decline';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-remove']))
{
    $id             = $_GET['confirm-remove'];
    $person         = getRecord($id, 'request_document', 'docs_id');
    $fullname       = $person['last_name'] . ', ' . (handleEmptyValue('', $person['suffix']) == '' ? '' : $person['suffix'] . ', ') . $person['first_name'] . ' ' . $person['middle_name'];

    $declined       = updateRequestDocumentStatus($id, 'removed');

    if ($declined == 1)
    {
        $modal_icon = 'success';
        $modal_title = 'Document Removed Successfully!';
        $modal_message = 'Documnet has been removed.';
    }
    else 
    {
        $modal_icon = 'error';
        $modal_title = 'Remove Document Failed!';
        $modal_message = 'An error occured while removing document.';
    }

    $modal_pos = '-';
    $path = 'requested-documents?filter=pending';
    require getPartial('admin.confirm-modal');
}

if (isset($_GET['restore']))
{
    $req_id         = $_GET['restore'];

    $modal_icon     = 'question';
    $modal_title    = 'Confirm Restore';
    $modal_message  = 'Are you certain you want to restore this?';
    $scn_href       = 'requested-documents';
    $prm_href       = "requested-documents?filter=archive&confirm-restore=$req_id";
    $scn_txt        = 'Cancel';
    $prm_txt        = 'Restore';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-restore']))
{
    $id             = $_GET['confirm-restore'];
    $person         = getRecord($id, 'request_document', 'docs_id');

    $restore       = updateRequestDocumentStatus($id,  $person['status'] == 'declined' ? 'request' : 'pending');

    if ($restore == 1)
    {
        $modal_icon = 'success';
        $modal_title = 'Request Restored Successfully!';
        $modal_message = 'Request has been restored.';
    }
    else 
    {
        $modal_icon = 'error';
        $modal_title = 'Restore Request Failed!';
        $modal_message = 'An error occured while restoring request.';
    }

    $modal_pos = '-';
    $path = 'requested-documents?filter=archive';
    require getPartial('admin.confirm-modal');
}

if (isset($_GET['print']))
{
    $data = getRecord($_GET['print'], 'request_document', 'docs_id');
    require getAPI('pdf-maker');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['refresh']))
    {
        $data = queryTable('request_document', null);
    }
    else 
    {
        $q = $_POST['query'];
        $data = queryTable('request_document', $q);
    }
}

require getAdminView('requested-documents');