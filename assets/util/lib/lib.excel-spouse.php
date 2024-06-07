<?php 

require 'excel/PhpXlsxGenerator.php'; 
 
$fileName = "spouse-data_" . date('Y-m-d') . ".xlsx"; 
$fields[] = array('Lastname', 'Firstname', 'Middlename', 'Address', 'Purok' ,'Email', 'Occupation', 'Education', 'Birthdate', 'Civil Status');  
 
foreach ($export_list as $row)
{ 
    $lineData = array($row['last_name'], $row['first_name'], $row['middle_name'], $row['address'], $row['purok'], $row['email'], $row['occupation'], $row['educational'], $row['birthdate'], $row['civil_status'],$status);  
    $fields[] = $lineData; 
} 
  
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $fields ); 
$xlsx->downloadAs($fileName); 
