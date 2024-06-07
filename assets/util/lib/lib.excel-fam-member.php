<?php 
 
require 'excel/PhpXlsxGenerator.php'; 

$fileName = "family-member-data_" . date('Y-m-d') . ".xlsx"; 
$fields[] = array('Lastname', 'Firstname', 'Middlename', 'Sex', 'Relationship', 'Birthdate', 'Purok', 'Address', 'Email', 'Place of Birth','In School','Occupation', 'Medical History');  
 
foreach ($export_list as $row)
{ 
    $lineData = array($row['last_name'], $row['first_name'], $row['middle_name'], $row['sex'], $row['relationship'], $row['birthdate'], $row['purok'], $row['address'], $row['email'], $row['place_of_birth'], $row['in_school'], $row['occupation'], $row['medical_history'], $status);  
    $fields[] = $lineData; 
} 
  
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $fields ); 
$xlsx->downloadAs($fileName); 