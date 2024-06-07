<?php 
 
require 'excel/PhpXlsxGenerator.php'; 
 
$fileName = "barangay-staff-data_" . date('Y-m-d') . ".xlsx"; 
$fields[] = array('Lastname', 'Firstname', 'Middlename', 'Username', 'Password', 'Email');  
 
foreach ($export_list as $row)
{ 
    $lineData = array($row['last_name'], $row['first_name'], $row['middle_name'], $row['username'], $row['password'], $row['email']);  
    $fields[] = $lineData; 
} 
  
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $fields ); 
$xlsx->downloadAs($fileName); 