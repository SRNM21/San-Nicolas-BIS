<?php

$header_name    = 'Update Resident';
$id             = $_GET['id'];
$role_ini       = substr($id, 0, 3);
$role;
$resident;

if ($role_ini == 'FMH')
{
    $role       = 'Family Head';
    $resident   = getRecord($id, 'familyhead', 'family_head_id');
}
else if ($role_ini == 'FMM')
{
    $role       = 'Family Member';
    $resident   = getRecord($id, 'familymember', 'family_member_id');
}
else if ($role_ini == 'SPS')
{
    $role       = 'Spouse';
    $resident   = getRecord($id, 'spouse', 'spouse_ID');
}

$fullname = $resident['last_name'] . ', ' . $resident['first_name'] . ' ' . $resident['middle_name'];

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($role_ini == 'FMH')
    {
        $residentDetails = [
            $_POST['fam-head-purok'],
            $_POST['fam-head-lastname'],
            $_POST['fam-head-firstname'],
            $_POST['fam-head-middlename'],
            $_POST['fam-head-address'],
            $_POST['fam-head-occupation'],
            $_POST['fam-head-educ-stat'],
            $_POST['fam-head-contact-num'],
            $_POST['fam-head-email'],
            $_POST['fam-head-birthdate'],
            $_POST['fam-head-civil-status'],
            $_POST['fam-head-fam-plan-method'],
            $id
        ];

        $update = updateFamilyHead($residentDetails);
    }
    else if ($role_ini == 'FMM')
    {
        $residentDetails = [
            $_POST['fam-member-fam-head'],
            $_POST['fam-member-lastname'],
            $_POST['fam-member-firstname'],
            $_POST['fam-member-middlename'],
            $_POST['fam-member-sex'],
            $_POST['fam-member-relationship'],
            $_POST['fam-member-birthdate'],
            $_POST['fam-member-purok'],
            $_POST['fam-member-address'],
            $_POST['fam-member-email'],
            $_POST['fam-member-pob'],
            $_POST['fam-member-inschool'],
            $_POST['fam-member-occupation'],
            $_POST['fam-member-med-hist'],
            $id
        ];
        
        $update = updateFamilyMember($residentDetails);
    }
    else if ($role_ini == 'SPS')
    {
        $residentDetails = [
            $_POST['spouse-fam-head'],
            $_POST['spouse-lastname'],
            $_POST['spouse-firstname'],
            $_POST['spouse-middlename'],
            $_POST['spouse-address'],
            $_POST['spouse-purok'],
            $_POST['spouse-email'],
            $_POST['spouse-occupation'],
            $_POST['spouse-educ-stat'],
            $_POST['spouse-birthdate'],
            $_POST['spouse-civil-status'],
            $id
        ];
        
        $update = updateSpouse($residentDetails);
    }

    if ($update == 1)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Updated Successfully!';
        $modal_message  = "Your changes to <b>$fullname</b> have been applied.";
        $modal_pos      = "residence";
        logEvent('Residence', $update, 'UPDATE');
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Updated Failed!';
        $modal_message  = "An unexpected problem occurred during the update of <b>$fullname</b>.";
        $modal_pos      = "residence/update-resident?id=$id";
    }

    require getPartial('admin.confirm-modal');
}

require getAdminView('update-residence');
