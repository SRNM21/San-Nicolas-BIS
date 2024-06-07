<?php 
 
require 'excel/PhpXlsxGenerator.php'; 
 
$fileName = "residence-data_" . date('Y-m-d') . ".xlsx"; 
$fields[] = array('Lastname', 'Firstname', 'Middlename', 'Purok', 'Role');  
 
foreach ($export_list as $row)
{ 
    $lineData = array($row['last_name'], $row['first_name'], $row['middle_name'], $row['purok'], $row['role']);  
    $fields[] = $lineData; 
} 
  
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $fields ); 
$xlsx->downloadAs($fileName); 