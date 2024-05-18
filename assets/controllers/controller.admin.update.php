<?php
 
require getLayout('demo.update');

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $id                 = $_GET['id'];
    $date_of_interview  = $_POST['date_of_interview'];
    $purok              = $_POST['purok'];
    $last_name          = $_POST['last_name'];
    $first_name         = $_POST['first_name'];
    $middle_name        = $_POST['middle_name'];
    $address            = $_POST['address'];
    $occupation         = $_POST['occupation'];
    $educational        = $_POST['educational'];
    $contact_number     = $_POST['contact_number'];
    $email              = $_POST['email'];
    $birthdate          = $_POST['birthdate'];
    $age                = $_POST['age'];
    $civil_status       = $_POST['civil_status'];

    $sql = "UPDATE familyhead SET
    date_of_interview = ?, 
    purok = ?,
    last_name = ?,
    first_name = ?,
    middle_name = ?,
    address = ?,
    occupation = ?,
    educational = ?,
    contact_number = ?,
    email = ?,
    birthdate = ?,
    age = ?,
    civil_status = ?
    WHERE family_head_id = ?";

    $stmt = $cursor->prepare($sql);

    $stmt->bind_param(
        "sssssssssssiss", 
        $date_of_interview,
        $purok,             
        $last_name,         
        $first_name,        
        $middle_name,       
        $address,           
        $occupation,        
        $educational,       
        $contact_number,   
        $email,             
        $birthdate,         
        $age,               
        $civil_status,
        $id,
    );

    $stmt->execute();

    if ($stmt->execute()) 
    {
        echo "<script>alert('updated successfully')</script>";
        exit();
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $cursor->error;
    }
}