<?php

function getOfficials($query)
{
    global $cursor;
    
    $sql = "SELECT * FROM pharmacist_account";

    $stmt = $cursor->prepare($sql);
    $stmt->execute();

    $result = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($result);
    $stmt->close();
    mysqli_free_result($result);

    return $row;
}

require getAdminView('brgy-officials');