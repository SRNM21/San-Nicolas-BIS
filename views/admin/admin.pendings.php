<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendings</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.pendings'); ?>>
</head>
<body>
    <div class='f-col pendings-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row pendings-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-col pendings-content'>
                <div class='f-col'>
                    <div class='f-center f-row utility'>   
                        <div class='f-center f-row query-wrapper'>
                            <?php require getPartial('search-bar'); ?>
                        </div>
                    </div>
                </div>
                <div class='f-col table-limiter'>
                    <div class='table-wrapper'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Middlename</th>
                                    <th>Role</th>
                                    <th>Date of Registration</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class='pendings-tbl-body'>

                            <?php 
                                foreach ($data as $row) { 
                                    $role = strtolower(str_replace(' ', '-', $row['role']));
                            ?>

                                <tr>
                                    <td><?= $row['last_name'] ?></td>
                                    <td><?= $row['first_name'] ?></td>
                                    <td><?= $row['middle_name'] ?></td>
                                    <td><?= $row['role'] ?></td>
                                    <td><?= $row['date_of_registration'] ?></td>
                                    <td class='action-cell'>
                                        <a href="pendings?details=<?= $row['pending_id'] ?>&role=<?= $role ?>" class='data-util-btn black-details-btn'>Details</a>
                                        <a href="pendings?confirm=<?= $row['pending_id'] ?>&role=<?= $role ?>" class='data-util-btn green-details-btn'>Confirm</a>
                                        <a href="pendings?delete=<?= $row['pending_id'] ?>&role=<?= $role ?>" class='data-util-btn red-details-btn'>Delete</a>
                                    </td>
                                </tr>

                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
</body>
</html>