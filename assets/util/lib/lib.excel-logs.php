<?php 

require 'excel/PhpXlsxGenerator.php'; 
 
$fileName = "log_data_" . date('Y-m-d') . ".xlsx"; 
$fields[] = array('Privilege', 'User', 'Event', 'Involved Table', 'Involved ID', 'Time Stamp');  
 
foreach ($export_list as $row)
{ 
    $lineData = array($row['privilege'], $row['user'], $row['event'], $row['involved_table'], $row['involved_id'], $row['time_stamp']);  
    $fields[] = $lineData; 
} 
  
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $fields ); 
$xlsx->downloadAs($fileName); 