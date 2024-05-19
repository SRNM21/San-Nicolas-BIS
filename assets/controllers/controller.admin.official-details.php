<?php

$id = $_GET['id'];
$official = getOfficial($id);

if ($official == null)
{
    exit;
}

$prefix         = $official['prefix'];
$lastname       = $official['lastname'];
$firstname      = $official['firstname'];
$middlename     = $official['middlename'];
$birthdate      = $official['birthdate'];
$gender         = $official['gender'];
$address        = $official['address'];
$phone_num      = $official['phone_number'];
$email          = $official['email'];
$position       = $official['position'];
$description    = $official['description'];
$date_added     = $official['date_added'];
$fullname       = "$firstname $middlename $firstname $prefix.";

require getAdminView('official-details');