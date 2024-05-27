<?php

$env = parse_ini_file('../SanNicolasBIS/.env');

$cursor = mysqli_connect(
    $env['DB_HOSTNAME'], 
    $env['DB_USERNAME'], 
    $env['DB_PASSWORD'], 
    $env['DB_DATABASE']
);

function getAccount($username, $password, $table)
{
    global $cursor;

    $sql = "SELECT * FROM $table";
                        
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

function queryTable($table, $q)
{
    global $cursor;

    $sql = "SELECT * FROM $table";

    if (!empty($q) || $q != null)
    {
        $sql .= " 
        WHERE last_name LIKE '$q%'
        OR first_name LIKE '$q%'
        OR middle_name LIKE '$q%'";
    }

    $sql .= " ORDER BY last_name ASC";

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

function getRecord($id, $table, $column)
{
    global $cursor;

    $sql = "SELECT * FROM $table WHERE $column=?";

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

function deletRecord($id, $table, $column)
{
    global $cursor;

    $sql = "DELETE FROM $table WHERE $column=?";

    $stmt = $cursor->prepare($sql);
    $stmt->bind_param('s', $id);
    
    return $stmt->execute();
}

function addPendingFamilyhead($data)
{
    global $cursor;
    $inp = str_repeat('s', 14);

    $sql = "INSERT INTO pending_familyhead 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        
    try 
    {
        date_default_timezone_set('Asia/Manila');
        $stmt   = $cursor->prepare($sql);
        $id     = generateID('PEN');
        $date   = date('Y-m-d h:i:s A');

        $stmt->bind_param(
            $inp, 
            $id,                   
            $data['purok'],       
            $data['last_name'],              
            $data['first_name'],             
            $data['middle_name'],                 
            $data['address'],               
            $data['occupation'],          
            $data['educational'],           
            $data['contact_number'],         
            $data['email'],               
            $data['birthdate'],              
            $data['civil_status'],               
            $data['family_planning_method'],
            $date
        );

        if ($stmt->execute())
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
        echo $e;
        return -1;
    }
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

function addFamilyHead($data)
{
    global $cursor;
    $inp = str_repeat('s', 13);
    $id = generateID('FMH');

    $sql = 'INSERT INTO familyhead VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
                        
    try 
    {
        $stmt = $cursor->prepare($sql);
        
        $stmt->bind_param(
            $inp, 
            $id,
            $data['purok'],    
            $data['last_name'],   
            $data['first_name'],    
            $data['middle_name'],  
            $data['address'],   
            $data['occupation'],      
            $data['educational'],   
            $data['contact_number'],
            $data['email'],
            $data['birthdate'],
            $data['civil_status'],
            $data['family_planning_method']
        );

        return $stmt->execute() ? 1 : 0;
    } 
    catch(Error $e) 
    {
        return -1;
    }
}

function addStaff($data)
{
    global $cursor;
    $inp = str_repeat('s', 7);

    $sql = 'INSERT INTO barangay_staff VALUES (?,?,?,?,?,?,?)';
                        
    try 
    {
        $stmt = $cursor->prepare($sql);
        
        $stmt->bind_param(
            $inp, 
            $data['id'],
            $data['lastname'],    
            $data['firstname'],   
            $data['middlename'],   
            $data['username'],   
            $data['password'],   
            $data['email'],      
        );

        if ($stmt->execute())
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

function updateStaff($data)
{
    global $cursor;
    $id = $data['id'];
    $reset_pass = !empty($data['password']);

    if ($reset_pass)
    {
        $sql = 'UPDATE barangay_staff SET 
                last_name = ?,
                first_name = ?,
                middle_name = ?,
                username = ?,
                password = ?,
                email = ?
            WHERE staff_id = ?
            ';
    }
    else 
    {
        $sql = 'UPDATE barangay_staff SET 
                last_name = ?,
                first_name = ?,
                middle_name = ?,
                username = ?,
                email = ?
            WHERE staff_id = ?
            ';
    }
                        
    try 
    {
        $stmt = $cursor->prepare($sql);
        
        if ($reset_pass)
        {
            $inp = str_repeat('s', 7);
            $hash = password_hash($data['password'], PASSWORD_DEFAULT);

            $stmt->bind_param(
                $inp, 
                $data['lastname'],    
                $data['firstname'],   
                $data['middlename'],    
                $data['username'],      
                $hash,
                $data['email'],
                $id,
            );
        }
        else 
        {
            $inp = str_repeat('s', 6);

            $stmt->bind_param(
                $inp, 
                $data['lastname'],    
                $data['firstname'],   
                $data['middlename'],    
                $data['username'],      
                $data['email'],
                $id,
            );
        }

        return $stmt->execute() ? 1 : 0;
    } 
    catch(Error $e) 
    {
        echo $e;
        return -1;
    }
}

function queryGender($table, $col_name)
{
    global $cursor;

    $sql = "SELECT 
                SUM(CASE WHEN $col_name = 'Male' THEN 1 ELSE 0 END) AS male,
                SUM(CASE WHEN $col_name = 'Female' THEN 1 ELSE 0 END) AS female
            FROM 
                $table;
            ";

    $stmt = $cursor->prepare($sql);
    $stmt->execute();

    $result = mysqli_stmt_get_result($stmt);
    $gender = [
        'male'      => 0,
        'female'    => 0
    ];

    if ($row = mysqli_fetch_assoc($result)) 
    {
        $gender['male'] += $row['male'];
        $gender['female'] += $row['female'];
    }

    $stmt->close();
    mysqli_free_result($result);
    return $gender;
}

function getGenderStatistic()
{
    $fam_heads = count(queryTable('familyhead', null));
    $spouse = count(queryTable('spouse', null));

    $fam_member = queryGender('familymember', 'sex');
    $barangay_off = queryGender('barangay_officials', 'gender');

    $gender = [
        'female'    => ($spouse + $fam_member['female'] + $barangay_off['female']),
        'male'      => ($fam_heads + $fam_member['male'] + $barangay_off['male'])
    ];

    return $gender;
}

function getPurokPopulationStatistic()
{
    global $cursor;

    $sql = "SELECT
                SUM(CASE WHEN purok = 'Purok 1' THEN 1 ELSE 0 END) AS 'purok 1',
                SUM(CASE WHEN purok = 'Purok 2' THEN 1 ELSE 0 END) AS 'purok 2',
                SUM(CASE WHEN purok = 'Purok 3' THEN 1 ELSE 0 END) AS 'purok 3',
                SUM(CASE WHEN purok = 'Purok 4' THEN 1 ELSE 0 END) AS 'purok 4',
                SUM(CASE WHEN purok = 'Purok 5' THEN 1 ELSE 0 END) AS 'purok 5',
                SUM(CASE WHEN purok = 'Purok 6' THEN 1 ELSE 0 END) AS 'purok 6',
                SUM(CASE WHEN purok = 'Purok 7' THEN 1 ELSE 0 END) AS 'purok 7'
            FROM v_residence;
            ";

    $stmt = $cursor->prepare($sql);
    $stmt->execute();

    $result = mysqli_stmt_get_result($stmt);
    $purok_pop_arr = [
        'purok1'    => 0,
        'purok2'    => 0,
        'purok3'    => 0,
        'purok4'    => 0,
        'purok5'    => 0,
        'purok6'    => 0,
        'purok7'    => 0
    ];

    if ($row = mysqli_fetch_assoc($result)) 
    {
        $purok_pop_arr['purok1'] += $row['purok 1'];
        $purok_pop_arr['purok2'] += $row['purok 2'];
        $purok_pop_arr['purok3'] += $row['purok 3'];
        $purok_pop_arr['purok4'] += $row['purok 4'];
        $purok_pop_arr['purok5'] += $row['purok 5'];
        $purok_pop_arr['purok6'] += $row['purok 6'];
        $purok_pop_arr['purok7'] += $row['purok 7'];
    }
    
    $stmt->close();
    mysqli_free_result($result);

    return $purok_pop_arr;
}

function addFeedback($data)
{
    global $cursor;
    $inp = str_repeat('s', 4);

    $sql = 'INSERT INTO feedback VALUES (?,?,?,?)';
                        
    try 
    {
        $stmt = $cursor->prepare($sql);
        date_default_timezone_set('Asia/Manila');
        $date_time = date('Y-m-d h:i:s A');
        
        $stmt->bind_param(
            $inp, 
            $data['id'],
            $data['name'],
            $data['feedback'],
            $date_time 
        );

        echo $cursor->error;

        if ($stmt->execute())
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

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!isset($_POST['func']))
    {
        return;
    }

    $result;
    
    if($_POST['func'] == 'POPULATE_TABLE_BRGY_OFFICIALS')
    {
        $query = $_POST['q'];

        $result = json_encode(queryTable('barangay_officials', $query));
    }
    else if($_POST['func'] == 'POPULATE_TABLE_RESIDENCE')
    {
        $query = $_POST['q'];

        $result = json_encode(queryTable('v_residence', $query));
    }
    else if($_POST['func'] == 'POPULATE_TABLE_BRGY_STAFFS')
    {
        $query = $_POST['q'];

        $result = json_encode(queryTable('barangay_staff', $query));
    }
    else if($_POST['func'] == 'POPULATE_TABLE_PENDINGS')
    {
        $query = $_POST['q'];

        $result = json_encode(queryTable('v_pending_residence', $query));
    }
    else if($_POST['func'] == 'GET_STATISTIC_GENDER')
    {
        $result = json_encode(getGenderStatistic());
    }
    else if($_POST['func'] == 'GET_STATISTIC_PUROK_POPULATION')
    {
        $result = json_encode(getPurokPopulationStatistic());
    }
    else if($_POST['func'] == 'GET_PRIVILEGE')
    {
        $priv = isset($_SESSION['PRIVILEGE'])
            ? $_SESSION['PRIVILEGE']
            : 'NOT FOUND';

        echo $priv;
        exit;
    }
    
    header('Content-Type: application/json');
    echo $result;
}