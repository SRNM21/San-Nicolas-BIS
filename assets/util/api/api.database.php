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

function queryOfficials($q)
{
    global $cursor;

    $sql = 'SELECT * FROM barangay_officials';

    if (!empty($q) || $q != null)
    {
        $sql .= " 
        WHERE prefix LIKE '$q%'
        OR lastname LIKE '$q%'
        OR firstname LIKE '$q%'
        OR middlename LIKE '$q%'";
    }

    $stmt = $cursor->prepare($sql);
    $stmt->execute();

    $result = mysqli_stmt_get_result($stmt);
    $arr = [];

    while ($row = mysqli_fetch_assoc($result)) 
    {
        $arr[] = $row;
    }
    
    $stmt->close();
    mysqli_free_result($result);

    return $arr;
}

function getOfficial($id)
{
    global $cursor;

    $sql = 'SELECT * FROM barangay_officials WHERE brgy_official_id=?';

    $stmt = $cursor->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();

    $result = mysqli_stmt_get_result($stmt);
    $official = null;

    if ($row = mysqli_fetch_assoc($result)) 
    {
        $official = $row;
    }
    
    $stmt->close();
    mysqli_free_result($result);

    return $official;
}

function addOfficials($data)
{
    global $cursor;
    $inp = str_repeat('s', 13);

    $sql = 'INSERT INTO barangay_officials VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
                        
    try 
    {
        $stmt = $cursor->prepare($sql);
    
        $stmt->bind_param(
            $inp, 
            $data['id'],
            $data['prefix'],     
            $data['lastname'],   
            $data['firstname'],  
            $data['middlename'], 
            $data['birthdate'],  
            $data['gender'],     
            $data['address'],    
            $data['phonenum'],   
            $data['email'],      
            $data['position'],   
            $data['description'],
            $data['date_added']
        );

        echo $cursor->error;

        return $stmt->execute() ? 1 : 0;
    } 
    catch(Error $e) 
    {
        return -1;

        echo $e;
    }
}

function queryFamilyHead($q)
{
    global $cursor;

    $sql = 'SELECT * FROM familyhead';

    if (!empty($q) || $q != null)
    {
        $sql .= " 
        WHERE last_name LIKE '$q%'
        OR first_name LIKE '$q%'
        OR middle_name LIKE '$q%'";
    }

    $stmt = $cursor->prepare($sql);
    $stmt->execute();

    $result = mysqli_stmt_get_result($stmt);
    $arr = [];

    while ($row = mysqli_fetch_assoc($result)) 
    {
        $arr[] = $row;
    }
    
    $stmt->close();
    mysqli_free_result($result);

    return $arr;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if($_POST['func'] == 'POPULATE_TABLE_BRGY_OFFICIALS')
    {
        $query = $_POST['q'];

        $officials = json_encode(queryOfficials($query));
        header('Content-Type: application/json');
        echo $officials;
    }
    else if($_POST['func'] == 'POPULATE_TABLE_FAMILY_HEAD')
    {
        $query = $_POST['q'];

        $fam_head = json_encode(queryFamilyHead($query));
        header('Content-Type: application/json');
        echo $fam_head;
    }
}