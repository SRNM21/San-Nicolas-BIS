<?php 

$header_name = 'Pendings';

$q = '';
$data = queryTable('v_pending_residence', null);

if (isset($_GET['details']))
{
    $id     = $_GET['details'];
    $role   = $_GET['role'];
    
    require getPartial('admin.pending-details-modal');
}

if (isset($_GET['confirm']))
{
    $id             = $_GET['confirm'];
    $role           = $_GET['role'];
    $pending_rec    = getRecord($id, 'v_pending_residence', 'pending_id');
    $fullname       = $pending_rec['last_name'] . ', ' . $pending_rec['first_name'] . ' ' . $pending_rec['middle_name'];

    $modal_icon     = 'question';
    $modal_title    = 'Confirm Request';
    $modal_message  = "Are you sure to confirm request of <b>$fullname</b>?";

    $prm_txt        = 'Confirm';
    $scn_txt        = 'Cancel';
    $prm_href       = "pendings?confirm-request=$id&role=$role";
    $scn_href       = 'pendings';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-request']))
{
    $id             = $_GET['confirm-request'];
    $role           = $_GET['role'];

    if ($role == 'family-head')
    {
        $person                 = getRecord($id, 'pending_familyhead', 'pending_id');
        $person['pending_id']   = generateID('FMH');
        unset($person['date_of_registration']);

        $add = addRecord(array_values($person), 'familyhead');

        if ($add != 0)
        {
            $modal_icon = 'success';
            $modal_title = 'Confirm Request Successfully!';
            $modal_message = 'New Family Head has been added.';

            deletRecord($id, 'pending_familyhead', 'pending_id');

            $email      = $person['email'];
            $subject    = 'Welcome to Barangay San Nicolas';
            $body       = "Congratulations! you are now part of our community, please save your <b>Family Head Code</b> below: <br><br>
                            Family Head Code: <h3>$add</h3><br>
                            You can now use this to link your family member.";
            $alt_body   = 'Congratulations! you are now part of our community, please save your Family Head Code below:';
            
            logEvent('Pendings', $add, 'CONFIRM');
            require getLibrary('mailer');
        }
        else 
        {
            $modal_icon = 'error';
            $modal_title = 'Confirm Request Failed!';
            $modal_message = 'An error occured while confirming request';
        }
    }
    else if ($role == 'family-member')
    {
        $person                 = getRecord($id, 'pending_familymember', 'pending_id');
        $person['pending_id']   = generateID('FMM');
        unset($person['date_of_registration']);

        $add = addRecord(array_values($person), 'familymember');

        if ($add != 0)
        {
            $modal_icon = 'success';
            $modal_title = 'Confirm Request Successfully!';
            $modal_message = 'New Family Member has been added.';

            deletRecord($id, 'pending_familymember', 'pending_id');

            $email      = $person['email'];
            $subject    = 'Welcome to Barangay San Nicolas';
            $body       = 'Congratulations! you are now part of our community!';
            $alt_body   = 'Congratulations! you are now part of our community!';
            
            logEvent('Pendings', $add, 'CONFIRM');
            require getLibrary('mailer');
        }
        else 
        {
            $modal_icon = 'error';
            $modal_title = 'Confirm Request Failed!';
            $modal_message = 'An error occured while confirming request';
        }
    }
    else if ($role == 'spouse')
    {
        $person                 = getRecord($id, 'pending_spouse', 'pending_id');
        $person['pending_id']   = generateID('SPS');

        unset($person['date_of_registration']);

        $add = addRecord(array_values($person), 'spouse');

        if ($add != 0)
        {
            $modal_icon = 'success';
            $modal_title = 'Confirm Request Successfully!';
            $modal_message = 'New Spouse has been added.';

            deletRecord($id, 'pending_spouse', 'pending_id');

            $email      = $person['email'];
            $subject    = 'Welcome to Barangay San Nicolas';
            $body       = 'Congratulations! you are now part of our community!';
            $alt_body   = 'Congratulations! you are now part of our community!';
            
            logEvent('Pendings', $add, 'CONFIRM');
            require getLibrary('mailer');
        }
        else 
        {
            $modal_icon = 'error';
            $modal_title = 'Confirm Request Failed!';
            $modal_message = 'An error occured while confirming request';
        }
    }

    $modal_pos = '-';
    $path = 'pendings';
    require getPartial('admin.confirm-modal');
}

if (isset($_GET['delete']))
{
    $id             = $_GET['delete'];
    $role           = $_GET['role'];
    $pending_rec    = getRecord($id, 'v_pending_residence', 'pending_id');
    $fullname       = $pending_rec['last_name'] . ', ' . $pending_rec['first_name'] . ' ' . $pending_rec['middle_name'];

    $modal_icon     = 'error';
    $modal_title    = 'Confirm Delete';
    $modal_message  = "Are you sure to delete request of <b>$fullname</b>? This process can not be undone.";

    $prm_txt        = 'Delete';
    $scn_txt        = 'Cancel';
    $prm_href       = "pendings?confirm-delete=$id&role=$role";
    $scn_href       = 'pendings';

    require getPartial('admin.modal');
}

if (isset($_GET['confirm-delete']))
{
    $id   = $_GET['confirm-delete'];
    $role = $_GET['role'];
    $table;

    switch ($role) 
    {
        case 'family-head':     $table = 'pending_familyhead';      break;
        case 'family-member':   $table = 'pending_familymember';    break;
        case 'spouse':          $table = 'pending_spouse';          break;
        default: break;
    }

    $delete = deletRecord($id,  $table, 'pending_id');

    if ($delete != 0)
    {
        $modal_icon = 'success';
        $modal_title = 'Request Deleted Successfully!';
        $modal_message = 'Request has been deleted.';
        logEvent('Pendings', $delete, 'CREATE');
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

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['refresh']))
    {
        $data = queryTable('v_pending_residence', null);
    }
    else 
    {
        $q = $_POST['query'];
        $data = queryTable('v_pending_residence', $q);
    }
}

require getAdminView('pendings');