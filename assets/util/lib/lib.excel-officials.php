<?php 

require 'excel/PhpXlsxGenerator.php'; 
 
$fileName = "barangay-officials-data_" . date('Y-m-d') . ".xlsx"; 
$fields[] = array('Lastname', 'Firstname', 'Middlename', 'Gender', 'Contact Number', 'Email', 'Position', 'Handle', 'Status', 'Date Added');  
 
foreach ($export_list as $row)
{ 
    $lineData = array($row['last_name'], $row['first_name'], $row['middle_name'], $row['gender'], $row['phone_number'], $row['email'], $row['position'], $row['handle'], $row['status'], $row['date_added']);  
    $fields[] = $lineData; 
}

$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $fields ); 
$xlsx->downloadAs($fileName); 
