<?php 
 
require 'excel/PhpXlsxGenerator.php'; 
 
$fileName = "family-head-data_" . date('Y-m-d') . ".xlsx"; 
$fields[] = array('Lastname', 'Firstname', 'Middlename', 'Purok', 'Address', 'Occupation', 'Education', 'Contact Number', 'Email', 'Birthdate', 'Civil Status', 'Family Planning Method');  
 
foreach ($export_list as $row)
{ 
    $lineData = array(
        $row['last_name'], $row['first_name'], $row['middle_name'], $row['purok'], $row['address'], $row['occupation'], 
        $row['educational'], $row['contact_number'], $row['email'], $row['birthdate'], $row['civil_status'], $row['family_planning_method']
    );  

    $fields[] = $lineData; 
} 
  
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $fields ); 
$xlsx->downloadAs($fileName); 
