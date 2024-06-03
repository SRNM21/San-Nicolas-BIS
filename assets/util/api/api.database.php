<?php

$env = parse_ini_file('../SanNicolasBIS/.env');

$cursor = mysqli_connect(
    $env['DB_HOSTNAME'], 
    $env['DB_USERNAME'], 
    $env['DB_PASSWORD'], 
    $env['DB_DATABASE']
);

function logEvent($table, $id, $event)
{
    global $cursor;

    $data_set = [
        generateID('LOG'), 
        $_SESSION['PRIVILEGE'], 
        $_SESSION['USERNAME'], 
        $event, 
        $table, 
        $id, 
        date('Y-m-d h:i:s')
    ];

    $count  = count($data_set);
    $inp    = str_repeat('s', $count);

    $sql    = "INSERT INTO log VALUES (" . generatePlaceholders($count) .")";
    
    try 
    {
        $stmt = $cursor->prepare($sql);
        $stmt->bind_param($inp, ...$data_set);

        return $stmt->execute() ? 1 : 0;
    } 
    catch(Error $e) 
    {
        return 0;
    }
}

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

function hasDuplicateResident($last_name, $first_name, $middle_name)
{
    global $cursor;

    $sql = "SELECT * FROM v_residence";

        $sql .= " 
        WHERE last_name LIKE '$last_name'
        OR first_name LIKE '$first_name'
        OR middle_name LIKE '$middle_name'";

    $stmt = $cursor->prepare($sql);
    $stmt->execute();

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_num_rows($result); 
    
    $stmt->close();
    mysqli_free_result($result);

    return $row > 0;
}

function queryTable($table, $q)
{
    global $cursor;

    $sql = "SELECT * FROM $table";

    if (!empty($q) || $q != null)
    {
        $sql .= " 
        WHERE last_name LIKE '%$q%'
        OR first_name LIKE '%$q%'
        OR middle_name LIKE '%$q%'";
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

function queryBlotter($q)
{
    global $cursor;

    $sql = 'SELECT * FROM blotter';

    if (!empty($q) || $q != null)
    {
        $sql .= " 
        WHERE complainant LIKE '%$q%'
        OR respondent LIKE '%$q%'";
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

function queryLogs()
{
    global $cursor;

    $sql = "SELECT * FROM log order by time_stamp desc";

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

function queryEvents()
{
    global $cursor;

    $sql = "SELECT * FROM events order by date desc";

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


function queryFeedback()
{
    global $cursor;

    $sql = "SELECT * FROM feedback order by date_and_time desc";

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

function addRecord($data, $table)
{
    global $cursor;
    $count  = count($data);
    $inp    = str_repeat('s', $count);

    $sql    = "INSERT INTO $table VALUES (" . generatePlaceholders($count) .")";
    
    try 
    {
        $stmt = $cursor->prepare($sql);
        $stmt->bind_param($inp, ...$data);

        return $stmt->execute() ? $data[0] : 0;
    } 
    catch(Error $e) 
    {
        return 0;
    }
}

function deletRecord($id, $table, $column)
{
    global $cursor;

    $sql = "DELETE FROM $table WHERE $column=?";

    $stmt = $cursor->prepare($sql);
    $stmt->bind_param('s', $id);
    
    return $stmt->execute() ? $id : 0;
}

function addOfficials($data)
{
    global $cursor;
    $count = count($data) - 2;
    $inp = str_repeat('s', $count);

    $sql = 'INSERT INTO barangay_officials VALUES (' . generatePlaceholders($count) .')';
                        
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

        return 0;
    } 
    catch(Error $e) 
    {
        echo $e;
        return 0;
    }
}

function addDocumentRequest($data)
{
    global $cursor;
    $count = count($data);

    $sql = 'INSERT INTO request_document VALUES (' . generatePlaceholders($count) .')';
              
    try 
    {
        $stmt = $cursor->prepare($sql);
        $stmt->bind_param('sssssssisssssss', ...$data);

        return $stmt->execute() ? $data[0] : 0;
    } 
    catch(Error $e) 
    {
        return 0;
    }
}

function updateOfficials($data)
{
    global $cursor;
    $count = count($data) - 4;
    $inp = str_repeat('s', $count);
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
            WHERE brgy_official_id = ?';
                       
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
        return -1;
    }
}

function updateAdmin($data)
{
    global $cursor;
    $inp = str_repeat('s', count($data));

    $admin = getRecord($data[0], 'barangay_admin', 'username');
    $inject = count($data) > 3 ? ', password = ?' : '';

    $sql = "UPDATE barangay_admin SET 
                username = ?,
                email = ?
                $inject
            WHERE admin_id = ?";
                    
    try 
    {
        $stmt = $cursor->prepare($sql);

        if (count($data) > 3)
        {
            $stmt->bind_param(
                $inp, 
                $data[1],
                $data[2],
                $data[3],
                $admin['admin_id'],
            );
        }
        else 
        {
            $stmt->bind_param(
                $inp, 
                $data[1],
                $data[2],
                $admin['admin_id'],
            );
        }
        
        if ($stmt->execute())
        {
            logEvent('barangay_admin', $admin['admin_id'], 'UPDATE');
            $_SESSION['USERNAME'] = $data[1];
            $_SESSION['EMAIL'] = $data[2];
            return 1;
        }

        return 0;
    } 
    catch(Error $e) 
    {
        return 0;
    }
}

function updateFamilyHead($data)
{
    global $cursor;
    $inp = str_repeat('s', count($data));

    $sql = 'UPDATE familyhead SET 
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
                civil_status = ?,
                family_planning_method = ?
            WHERE family_head_id = ?';
                        
    try 
    {
        $stmt = $cursor->prepare($sql);
        $stmt->bind_param($inp, ...$data);

        if ($stmt->execute())
        {
            logEvent('familyhead', end($data), 'UPDATE');
            return 1;
        }

        return 0;
    } 
    catch(Error $e) 
    {
        return -1;
    }
}

function updateFamilyMember($data)
{
    global $cursor;
    $inp = str_repeat('s', count($data));

    $sql = 'UPDATE familymember SET 
                family_head_id = ?,
                last_name = ?,
                first_name = ?,
                middle_name = ?,
                sex = ?,
                relationship = ?,
                birthdate = ?,
                purok = ?,
                address = ?,
                email = ?,
                place_of_birth = ?,
                in_school = ?,
                occupation = ?,
                medical_history = ?
            WHERE family_member_id = ?';
                        
    try 
    {
        $stmt = $cursor->prepare($sql);
        $stmt->bind_param($inp, ...$data);

        if ($stmt->execute())
        {
            logEvent('familymember', end($data), 'UPDATE');
            return 1;
        }

        return 0;
    } 
    catch(Error $e) 
    {
        return -1;
    }
}

function updateSpouse($data)
{
    global $cursor;
    $inp = str_repeat('s', count($data));

    $sql = 'UPDATE spouse SET 
                family_head_id = ?,
                last_name = ?,
                first_name = ?,
                middle_name = ?,
                address = ?,
                purok = ?,
                email = ?,
                occupation = ?,
                educational = ?,
                birthdate = ?,
                civil_status = ?
            WHERE spouse_id = ?';
                        
    try 
    {
        $stmt = $cursor->prepare($sql);
        $stmt->bind_param($inp, ...$data);

        if ($stmt->execute())
        {
            logEvent('spouse', end($data), 'UPDATE');
            return 1;
        }

        return 0;
    } 
    catch(Error $e) 
    {
        return -1;
    }
}

function updateStaff($data)
{
    global $cursor;

    $count      = count($data);
    $reset_pass = $count > 6;
    $inp        = str_repeat('s', $count);
    $inject     = $reset_pass ? 'password = ?,' : '';

    $sql = "UPDATE barangay_staff SET 
                last_name = ?,
                first_name = ?,
                middle_name = ?,
                username = ?,
                $inject
                email = ?
            WHERE staff_id = ?";
                    
    try 
    {
        $stmt = $cursor->prepare($sql);
        $stmt->bind_param($inp, ...$data);

        if ($stmt->execute())
        {
            logEvent('barangay_staff', end($data), 'UPDATE');
            return 1;
        }

        return 0;
    } 
    catch(Error $e) 
    {
        return -1;
    }
}

function updateRequestDocumentStatus($id, $status)
{
    global $cursor;

    $sql = "UPDATE request_document SET 
                status = ?
            WHERE docs_id = ?";
                    
    try 
    {
        $stmt = $cursor->prepare($sql);
        $stmt->bind_param('ss', $status, $id);

        if ($stmt->execute())
        {
            return 1;
        }

        return 0;
    } 
    catch(Error $e) 
    {
        return -1;
    }
}

function claimRequestDocument($id)
{
    global $cursor;
    $time_stamp = date('Y-m-d h:i:s A');

    $sql = "UPDATE request_document SET 
                date_claimed = ?
            WHERE docs_id = ?";
                    
    try 
    {
        $stmt = $cursor->prepare($sql);
        $stmt->bind_param('ss', $time_stamp, $id);

        if ($stmt->execute())
        {
            return 1;
        }

        return 0;
    } 
    catch(Error $e) 
    {
        return -1;
    }
}

function updateBlotter($data)
{
    global $cursor;
    $inp        = str_repeat('s', count($data));

    $sql = "UPDATE blotter SET 
                complainant = ?,
                complainant_address = ?, 
                respondent = ?, 
                respondent_address = ?, 
                nature_of_complaint = ?,
                date_and_time = ?,
                status = ?
            WHERE complaint_id = ?";
                    
    try 
    {
        $stmt = $cursor->prepare($sql);
        $stmt->bind_param($inp, ...$data);

        if ($stmt->execute())
        {
            return 1;
        }

        return 0;
    } 
    catch(Error $e) 
    {
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
        $date_time = date('Y-m-d h:i:s A');
        
        $stmt->bind_param(
            $inp, 
            $data['id'],
            $data['name'],
            $data['feedback'],
            $date_time 
        );


        return $stmt->execute() ? 1 : 0;
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
    
    if($_POST['func'] == 'GET_STATISTIC_GENDER')
    {
        $result = json_encode(getGenderStatistic());
    }
    else if($_POST['func'] == 'GET_STATISTIC_PUROK_POPULATION')
    {
        $result = json_encode(getPurokPopulationStatistic());
    }
    
    header('Content-Type: application/json');
    echo $result;
}

function generatePlaceholders($num) 
{
    if ($num < 1) return '';

    return str_repeat('?,', $num - 1) . '?';
}