<?php

$env = parse_ini_file('../SanNicolasBIS/.env');

$cursor = mysqli_connect(
    $env['DB_HOSTNAME'], 
    $env['DB_USERNAME'], 
    $env['DB_PASSWORD'], 
    $env['DB_DATABASE']
);

function isAdmin($username, $password)
{
    global $cursor;

    $sql = "SELECT * FROM barangay_admin";
                        
    $stmt = $cursor->prepare($sql);
    $stmt->execute();

    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) 
    {
        if ($row['username'] == $username &&  password_verify($password, $row['password']))
        {
            return $row;
        }
    }
    
    mysqli_free_result($result);
}