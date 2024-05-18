<?php 

require getLayout('demo.add');

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $family_head_id    = $_POST['family_head_id'];
    $date_of_interview = $_POST['date_of_interview'];
    $purok             = $_POST['purok'];
    $last_name         = $_POST['last_name'];
    $first_name        = $_POST['first_name'];
    $middle_name       = $_POST['middle_name'];
    $address           = $_POST['address'];
    $occupation        = $_POST['occupation'];
    $educational       = $_POST['educational'];
    $contact_number    = $_POST['contact_number'];
    $email             = $_POST['email'];
    $birthdate         = $_POST['birthdate'];
    $age               = $_POST['age'];
    $civil_status      = $_POST['civil_status'];

    $sql = "INSERT INTO familyhead
    VALUES (
        '$family_head_id',
        '$date_of_interview',
        '$purok',
        '$last_name',
        '$first_name',
        '$middle_name',
        '$address',
        '$occupation',
        '$educational',
        '$contact_number',
        '$email',
        '$birthdate',
        '$age',
        '$civil_status'
    )";

    if ($cursor->query($sql) === TRUE) {
        echo "<script>alert('added successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $cursor->error;
    }
}