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

    if ($role == 'family-head') 
    {
        $pendingFamHead = [
            'last_name'                  => $_POST['fam-head-lastname'],
            'first_name'                 => $_POST['fam-head-firstname'],
            'middle_name'                => $_POST['fam-head-middlename'],
            'birthdate'                  => $_POST['fam-head-birthdate'],
            'civil_status'               => $_POST['fam-head-civil-status'],
            'educational'                => $_POST['fam-head-educ-stat'],
            'occupation'                 => $_POST['fam-head-occupation'],
            'contact_number'             => $_POST['fam-head-contact-num'],
            'email'                      => $_POST['fam-head-email'],
            'purok'                      => $_POST['fam-head-purok'],
            'address'                    => $_POST['fam-head-address'],
            'family_planning_method'     => $_POST['fam-head-fam-plan-method']
        ];

        $add = addPendingFamilyhead($pendingFamHead);

        if ($add == 1)
        {
            $modal_icon     = 'success';
            $modal_title    = 'Registration Sent!';
            $modal_message  = 'Your registration form has been sent';
            $modal_pos      = '-';
            $path           = '/sannicolasbis/community';
            require getPartial('admin.confirm-modal');
        }
        else 
        {
            echo $add;
        }

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

require getPublic('join-community');

