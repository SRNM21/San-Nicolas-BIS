<?php

if(isset($_GET['id'])) 
{
    $id = $_GET['id'];
    $sql = "DELETE FROM familyhead WHERE family_head_id = ?";
    $stmt = $cursor->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();

    if ($stmt->execute()) 
    {
        header("Location: residence");
        exit();
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $cursor->error;
    }
}