<?php

$header_name = 'Residence';

if (isset($_GET['details']))
{
    $id     = $_GET['details'];
    $role   = substr($id, 0, 3);

    require getPartial('admin.residence-details-modal');
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
    $scn_hred       = 'residence';

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
    $path = 'residence';
    require getPartial('admin.confirm-modal');
}

require getAdminView('residence');