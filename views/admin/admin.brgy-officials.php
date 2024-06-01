<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Barangay Officials</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.brgy-officials'); ?>>
</head>

<body>
    <div class='f-col brgy-off-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row brgy-off-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-col brgy-off-content'>
                <div class='f-col'>
                    <div class='f-center f-row utility'>   
                        <?php require getPartial('search-bar'); ?>
                        <?php if ($_SESSION['PRIVILEGE'] == 'ADMIN') {?>
                            <div class='util-btn-wrapper'>
                                <a href='barangay-officials/new-official' class='f-center f-row new-official-btn'><?= getSVG('add-person'); ?><p>New official</p></a>
                            </div>
                        <?php } ?>
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
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($data as $row) { ?>

                                <tr>
                                    <td><?= $row['last_name'] ?></td>
                                    <td><?= $row['first_name'] ?></td>
                                    <td><?= $row['middle_name'] ?></td>
                                    <td><?= $row['position'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                    <td><?= $row['date_added'] ?></td>
                                    <td class='action-cell'>
                                        <a href="barangay-officials?details=<?= $row['brgy_official_id'] ?>" class="data-util-btn black-details-btn">Details</a>

                                        <?php if ($_SESSION['PRIVILEGE'] == 'ADMIN') { ?>
                                            
                                            <a href="barangay-officials/update-official?id=<?= $row['brgy_official_id'] ?>" class="data-util-btn blue-details-btn">Edit</a>
                                            <a href="barangay-officials?delete=<?= $row['brgy_official_id'] ?>" class="data-util-btn red-details-btn">Delete</a>

                                        <?php } ?>
                                    
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
    <script type='module' src=<?=  getScript('admin.brgy-officials'); ?>></script>

</body>
</html>