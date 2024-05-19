<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <link rel='stylesheet' href=<?= getStyle('admin.residence'); ?>>
</head>

<body>
    <main class='f-row'>
        <?php include getPartial('admin.side-menu'); ?>
            
        <div class='f-col content-wrapper'>
            <h3>RESIDENCE</h3>
            <div class='table-wrapper'>
                <table class='family-head-table'>
                    <thead>
                        <th>family_head_id    </th>
                        <th>date_of_interview </th>
                        <th>purok             </th>
                        <th>last_name         </th>
                        <th>first_name        </th>
                        <th>middle_name       </th>
                        <th>address           </th>
                        <th>occupation        </th>
                        <th>educational       </th>
                        <th>contact_number    </th>
                        <th>email             </th>
                        <th>birthdate         </th>
                        <th>age               </th>
                        <th>civil_status      </th>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = 'SELECT * FROM familyhead';
                                        
                            $stmt = $cursor->prepare($sql);
                            $stmt->execute();
                        
                            $result = mysqli_stmt_get_result($stmt);
                        
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                $id     = $row['family_head_id'];
                                $doi    = $row['date_of_interview'];
                                $p      = $row['purok'];
                                $ln     = $row['last_name'];
                                $fn     = $row['first_name'];
                                $mn     = $row['middle_name'];
                                $a      = $row['address'];
                                $o      = $row['occupation'];
                                $e      = $row['educational'];
                                $c      = $row['contact_number'];
                                $e      = $row['email'];
                                $b      = $row['birthdate'];
                                $age    = $row['age'];
                                $cs     = $row['civil_status'];

                                echo "<tr data-val='$id'>";
                                echo ' <td>' . $id . '</td>'; 
                                echo ' <td>' . $doi . '</td>'; 
                                echo ' <td>' . $row['purok'] . '</td>'; 
                                echo ' <td>' . $row['last_name'] . '</td>'; 
                                echo ' <td>' . $row['first_name'] . '</td>'; 
                                echo ' <td>' . $row['middle_name'] . '</td>'; 
                                echo ' <td>' . $row['address'] . '</td>'; 
                                echo ' <td>' . $row['occupation'] . '</td>'; 
                                echo ' <td>' . $row['educational'] . '</td>'; 
                                echo ' <td>' . $row['contact_number'] . '</td>'; 
                                echo ' <td>' . $row['email'] . '</td>'; 
                                echo ' <td>' . $row['birthdate'] . '</td>'; 
                                echo ' <td>' . $row['age'] . '</td>'; 
                                echo ' <td>' . $row['civil_status'] . '</td>'; 
                                echo ' <td>';
                                echo " <a href='/sannicolasbis/administrator/update?id=$id'> update </a>";
                                echo " <a href='/sannicolasbis/administrator/delete?id=$id&doi=$'> delete </a>";
                                echo ' </td>';
                                echo '</tr>';
                            }
                        
                            $stmt->close();
                        
                            mysqli_free_result($result);
                        ?>
                    </tbody>
                </table>
            </div>
            <a href='/sannicolasbis/administrator/add'>add</a>
        </div>

    </main>
</body>
</html>