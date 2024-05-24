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
    $inp = str_repeat('s', 12);

    $sql = 'INSERT INTO barangay_officials VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
                        
    try 
    {
        $stmt = $cursor->prepare($sql);
        
        $stmt->bind_param(
            $inp, 
            $data['id'],
            $data['lastname'],    
            $data['firstname'],   
            $data['middlename'],    
            $data['gender'],  
            $data['phonenum'],   
            $data['email'],      
            $data['position'],   
            $data['handle'],
            $data['status'],
            $data['date_added'],
            $data['profile']
        );

        if ($stmt->execute() && move_uploaded_file($data['temp_prof'], $data['folder']))
        {
            return 1;
        }
        else 
        {
            return 0;
        }
    } 
    catch(Error $e) 
    {
        return -1;
    }
}

function updateOfficials($data)
{
    global $cursor;
    $inp = str_repeat('s', 10);
    $id = $data['id'];

    $sql = 'UPDATE barangay_officials SET 
            last_name = ?,
            first_name = ?,
            middle_name = ?,
            gender = ?,
            phone_number = ?,
            email = ?,
            position = ?,
            handle = ?,
            status = ?
        WHERE brgy_official_id = ?
    ';
                        
    try 
    {
        $stmt = $cursor->prepare($sql);
        
        $stmt->bind_param(
            $inp, 
            $data['lastname'],    
            $data['firstname'],   
            $data['middlename'],    
            $data['gender'],  
            $data['phonenum'],   
            $data['email'],      
            $data['position'],   
            $data['handle'],
            $data['status'],
            $id,
        );

        echo $cursor->error;

        if ($stmt->execute())
        {   
            if ($data['temp_prof'] != null && $data['folder'] != null)
            {
                if (!move_uploaded_file($data['temp_prof'], $data['folder'])) return 0;
            }

            return 1;
        }
        else 
        {
            return 0;
        }
    } 
    catch(Error $e) 
    {
        echo $e;
        return -1;
    }
}

function deleteOfficials($id)
{
    global $cursor;

    $sql = 'DELETE FROM barangay_officials WHERE brgy_official_id=?';

    $stmt = $cursor->prepare($sql);
    $stmt->bind_param('s', $id);
    
    return $stmt->execute();
}

function queryResidence($q)
{
    global $cursor;

    $sql = 'SELECT * FROM residence';

    if (!empty($q) || $q != null)
    {
        $sql .= " 
        WHERE last_name LIKE '$ q%'
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

function getFamilyHead($id)
{
    global $cursor;

    $sql = 'SELECT * FROM familyhead WHERE family_head_id=?';

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

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!isset($_POST['func']))
    {
        return;
    }
    
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

        $fam_head = json_encode(queryResidence($query));
        header('Content-Type: application/json');
        echo $fam_head;
    }
}