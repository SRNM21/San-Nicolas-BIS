<?php 

$header_name = 'Pendings';

if (isset($_GET['details']))
{
    $id     = $_GET['details'];
    $role   = $_GET['role'];
    
    require getPartial('admin.pending-details-modal');
}

if (isset($_GET['confirm']))
{
    $id             = $_GET['confirm'];
    $pending_rec    = getRecord($id, 'v_pending_residence', 'pending_id');
    $fullname       = $pending_rec['last_name'] . ', ' . $pending_rec['first_name'] . ' ' . $pending_rec['middle_name'];

    $modal_icon     = 'question';
    $modal_title    = 'Confirm Request';
    $modal_message  = "Are you sure to confirm request of <b>$fullname</b>?";

    $prm_txt        = 'Confirm';
    $scn_txt        = 'Cancel';
    $prm_href       = "pendings?confirm-request=$id";
    $scn_hred       = 'pendings';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-request']))
{
    $id             = $_GET['confirm-request'];
    $person         = getRecord($id, 'pending_familyhead', 'pending_id');

    if (addFamilyHead($person))
    {
        $modal_icon = 'success';
        $modal_title = 'Confirm Request Successfully!';
        $modal_message = 'New Family Head has been added.';

        deletRecord($id, 'pending_familyhead', 'pending_id');
    }
    else 
    {
        $modal_icon = 'error';
        $modal_title = 'Confirm Request Failed!';
        $modal_message = 'An error occured while confirming request';
    }

    $modal_pos = '-';
    $path = 'pendings';
    require getPartial('admin.confirm-modal');
}

if (isset($_GET['delete']))
{
    $id             = $_GET['delete'];
    $pending_rec    = getRecord($id, 'v_pending_residence', 'pending_id');
    $fullname       = $pending_rec['last_name'] . ', ' . $pending_rec['first_name'] . ' ' . $pending_rec['middle_name'];

    $modal_icon     = 'error';
    $modal_title    = 'Confirm Delete';
    $modal_message  = "Are you sure to delete request of <b>$fullname</b>? This process can not be undone.";

    $prm_txt        = 'Delete';
    $scn_txt        = 'Cancel';
    $prm_href       = "pendings?confirm-delete=$id";
    $scn_hred       = 'pendings';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-delete']))
{
    $id             = $_GET['confirm-delete'];

    if (deletRecord($id, 'pending_familyhead', 'pending_id'))
    {
        $modal_icon = 'success';
        $modal_title = 'Request Deleted Successfully!';
        $modal_message = 'Request has been deleted.';
    }
    else 
    {
        $modal_icon = 'error';
        $modal_title = 'Delete Request Failed!';
        $modal_message = 'An error occured while deleting request.';
    }

    $modal_pos = '-';
    $path = 'pendings';
    require getPartial('admin.confirm-modal');
}

require getAdminView('pendings');
