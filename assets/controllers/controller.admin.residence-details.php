<?php

$id = $_GET['id'];
$fam_head = getFamilyHead($id);
$header_name = 'Resident Details';

if ($fam_head == null)
{
    $lastname       = 'NULL';
    $firstname      = 'NULL';
    $middlename     = 'NULL';
    $fullname       = 'NULL';
    $doi            = 'NULL';
    $purok          = 'NULL';
    $add            = 'NULL';
    $occ            = 'NULL';
    $educ           = 'NULL';
    $phil_num       = 'NULL';
    $fam_dep        = 'NULL';
    $con_num        = 'NULL';
    $email          = 'NULL';
    $birthdate      = 'NULL';
    $age            = 'NULL';
    $civil_stat     = 'NULL';
    $f_v            = 'NULL';
    $s_v            = 'NULL';
    $o_v            = 'NULL';
    $date_given     = 'NULL';
    $fpm            = 'NULL';
    $rem            = 'NULL';
    $inter          = 'NULL';
}
else
{
    $lastname       = handleEmptyValue('none', $fam_head['last_name']); // 1
    $firstname      = handleEmptyValue('none', $fam_head['first_name']); // 1
    $middlename     = handleEmptyValue('none', $fam_head['middle_name']); // 1
    $purok          = handleEmptyValue('none', $fam_head['purok']); // 2
    $add            = handleEmptyValue('none', $fam_head['address']);// 2
    $occ            = handleEmptyValue('none', $fam_head['occupation']); // 1
    $educ           = handleEmptyValue('none', $fam_head['educational']); // 1
    $fam_dep        = handleEmptyValue('none', $fam_head['family_dependencies']); // 5
    $con_num        = handleEmptyValue('none', $fam_head['contact_number']); //3
    $email          = handleEmptyValue('none', $fam_head['email']); // 3
    $birthdate      = handleEmptyValue('none', $fam_head['birthdate']); // 1
    $age            = handleEmptyValue('none', $fam_head['age']); // 1
    $civil_stat     = handleEmptyValue('none', $fam_head['civil_status']); // 1
    $fpm            = handleEmptyValue('none', $fam_head['family_planning_method']); // 5
}

require getAdminView('residence-details');