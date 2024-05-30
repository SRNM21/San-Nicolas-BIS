<?php 

$form = 0;

if (isset($_GET['role']))
{
    $role = $_GET['role'];

    if ($role == 'family-head') 
    {
        $form = 1;
    }
    else if ($role == 'family-member')
    {
        $form = 2;
    }
    else if ($role == 'spouse')
    {
        $form = 3;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $role   = $_GET['role'];
    $id     = generateID('PEN');
    $date   = date('Y-m-d h:i:s A');
    $add    = 0;

    if ($role == 'family-head') 
    {
        $pendingFamHead = [
            $id,
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
            $date
        ];

        $add = addRecord($pendingFamHead, 'pending_familyhead');
    }
    else if ($role == 'family-member')
    {
        $pendingFamMember  = [
            $id,
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
            $date
        ];

        $add = addRecord($pendingFamMember, 'pending_familymember');
    }
    else if ($role == 'spouse')
    {
        $pendingSpouse = [
            $id,
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
            $date
        ];

        $add = addRecord($pendingSpouse, 'pending_spouse');
    }

    if ($add != 0)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Registration Sent!';
        $modal_message  = 'Your registration form has been sent.';
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Registration Failed!';
        $modal_message  = 'An error occured while submitting your form.';
    }

    $modal_pos = '-';
    $path      = '/sannicolasbis/community';
    require getPartial('admin.confirm-modal');
}

require getPublicView('join-community');

