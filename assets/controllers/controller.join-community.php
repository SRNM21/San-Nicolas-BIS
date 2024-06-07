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
    $role           = $_GET['role'];
    $id             = generateID('PEN');
    $date           = date('Y-m-d h:i:s A');
    $add            = 0;
    $table          = '';
    $last_name      = '';
    $first_name     = '';
    $middle_name    = '';
    $fam_head       = null;

    if ($role == 'family-head') 
    {
        $last_name = $_POST['fam-head-lastname'];
        $first_name = $_POST['fam-head-firstname'];
        $middle_name = $_POST['fam-head-middlename'];

        $data = [
            $id,
            $_POST['fam-head-purok'],
            $last_name,
            $first_name,
            $middle_name,
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

        $table = 'pending_familyhead';
    }
    else if ($role == 'family-member')
    {
        $last_name      = $_POST['fam-member-lastname'];
        $first_name     = $_POST['fam-member-firstname'];
        $middle_name    = $_POST['fam-member-middlename'];
        $fam_head       = $_POST['fam-member-fam-head'];

        $data  = [
            $id,
            $fam_head,
            $last_name,
            $first_name,
            $middle_name,
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

        $table = 'pending_familymember';
    }
    else if ($role == 'spouse')
    {
        $last_name      = $_POST['spouse-lastname'];
        $first_name     = $_POST['spouse-firstname'];
        $middle_name    = $_POST['spouse-middlename'];
        $fam_head       = $_POST['spouse-fam-head'];

        $data = [
            $id,
            $fam_head,
            $last_name,
            $first_name,
            $middle_name,
            $_POST['spouse-address'],
            $_POST['spouse-purok'],
            $_POST['spouse-email'],
            $_POST['spouse-occupation'],
            $_POST['spouse-educ-stat'],
            $_POST['spouse-birthdate'],
            $_POST['spouse-civil-status'],
            $date
        ];

        $table = 'pending_spouse';
    }

    if ((!empty($fam_head) || $fam_head != null) && getRecord($fam_head, 'familyhead', 'family_head_id') == null)
    {
        $modal_icon     = 'error';
        $modal_title    = 'Not Found!';
        $modal_message  = 'Invalid Family Head code. Family Head not found.';
    } 
    else if (hasDuplicateResident($last_name, $first_name, $middle_name))
    {
        $modal_icon     = 'error';
        $modal_title    = 'Registration Failed!';
        $modal_message  = 'This person is already registered.';
    }
    else 
    {
        foreach ($data as &$d) $d = !$d ? NULL : $d;

        $add = addRecord($data, $table);

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
    }

    $modal_pos = '-';
    $path      = '/sannicolasbis/community';
    require getPartial('admin.confirm-modal');
}

require getPublicView('join-community');