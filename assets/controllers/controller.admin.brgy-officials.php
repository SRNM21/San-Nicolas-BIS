<?php

$header_name = 'Barangay Officials';

$q = '';
$data = queryTable('barangay_officials', null);

if (isset($_GET['details']))
{
    $id = $_GET['details'];
    $official = getRecord($id, 'barangay_officials', 'brgy_official_id');

    if ($official != null)
    {
        $lastname       = $official['last_name'];
        $firstname      = $official['first_name'];
        $middlename     = $official['middle_name'];
        $gender         = $official['gender'];
        $phone_num      = $official['phone_number'];
        $email          = $official['email'];
        $position       = $official['position'];
        $comittee       = $official['comittee_title'];
        $status         = $official['status'];
        $date_added     = $official['date_added'];  
        $profile        = $official['profile'];

        $fullname = "$lastname, $firstname $middlename";

        require getPartial('admin.official-details-modal');
    }
}

if (isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $official = getRecord($id, 'barangay_officials', 'brgy_official_id');

    if ($official != null)
    {
        $lastname       = $official['last_name'];
        $firstname      = $official['first_name'];
        $middlename     = $official['middle_name'];
        $position       = $official['position'];
        $status         = $official['status'];
        $profile        = $official['profile'];

        $fullname = "$lastname, $firstname $middlename";

        require getPartial('admin.delete-official-modal');
    }
}

if (isset($_GET['delete-confirm']))
{
    $id = $_GET['delete-confirm'];

    $delete = deletRecord($id, 'barangay_officials', 'brgy_official_id');
    
    if ($delete != 0)
    {
        if (file_exists("assets/uploads/$id.jpg")) 
        {        
            unlink("assets/uploads/$id.jpg");
        }   

        if (file_exists("assets/uploads/$id.png")) 
        {        
            unlink("assets/uploads/$id.png");
        }

        $modal_icon     = 'success';
        $modal_title    = 'Deleted Successfully';
        $modal_message  = 'Barangay official is successfully deleted!';

        logEvent('Barangay Officials', $delete, 'DELETE');
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Delete Failed!';
        $modal_message  = 'An Error occured while deleting Barangay Official!';
    }

    $modal_pos      = 'barangay-officials';
    require getPartial('admin.confirm-modal');
}

if (isset($_GET['export']))
{
    $export_type = $_GET['export'];
    $export_list  = $data;    
    logEvent('Barangay Officials', 'N/A', 'EXPORT');

    if ($export_type == 'excel')
    {
        require getLibrary('excel-officials');
    }
    else if ($export_type == 'pdf')
    {
        require getLibrary('fpdf-officials');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['refresh']))
    {
        $data = queryTable('barangay_officials', null);
    }
    else 
    {
        $q = $_POST['query'];
        $data = queryTable('barangay_officials', $q);
    }
}

require getAdminView('brgy-officials');