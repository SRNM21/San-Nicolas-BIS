<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Accounts</title>
    <link rel='icon' type='image/x-icon' href=<?= getLogo(); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.staff-acc'); ?>>
</head>
<body>
    <div class='f-col staff-acc-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row staff-acc-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-col staff-acc-content'>
                <div class='f-col'>
                    <div class='f-center f-row utility'>   
                        <?php require getPartial('search-bar'); ?>
                        <div class='f-row util-btn-wrapper'>
                            <?php 
                                $export_title = 'Staff Accounts';
                                $add_href = null;
                                require getPartial('admin.dropdown-export'); 
                            ?>
                            <a href='staff-accounts/new-staff-account' draggable='false' class='f-center f-row new-staff-acc-btn scale-anim'><?= getSVG('add-person'); ?><p>New Staff Account</p></a>
                        </div>
                    </div>
                </div>
                <div class='f-col table-limiter'>
                    <div class='table-wrapper'>
                        <table class='table'>
                            <thead>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Middlename</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Action</th>
                            </thead>
                            <tbody class='staff-acc-tbl-body'>

                            <?php foreach ($data as $row) { ?>

                                <tr>
                                    <td><?= $row['last_name'] ?></td>
                                    <td><?= $row['first_name'] ?></td>
                                    <td><?= $row['middle_name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td class='action-cell'>
                                        <a href="staff-accounts/update-staff-account?id=<?= $row['staff_id'] ?>" class="data-util-btn blue-details-btn">Update</a>
                                        <a href="staff-accounts?delete-staff-id=<?= $row['staff_id'] ?>&delete-staff-username=<?= $row['username'] ?>" class="data-util-btn red-details-btn">Delete</a>
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
    <script type='module' src=<?=  getScript('admin.dropdown'); ?>></script>
</body>
</html>