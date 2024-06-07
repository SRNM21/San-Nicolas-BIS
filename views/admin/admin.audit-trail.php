<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Audit Trail</title>    
    <link rel='icon' type='image/x-icon' href=<?= getLogo(); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.audit-trail'); ?>>
</head>

<body>
    <div class='f-col audit-trail-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row audit-trail-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-col audit-trail-content'>
                <div class='f-col'>
                    <div class='f-center f-row utility'>   
                        <div></div>
                        <?php 
                            $export_title = 'Logs';
                            $add_href = null;
                            require getPartial('admin.dropdown-export'); 
                        ?>
                    </div>
                </div>
                <div class='f-col table-limiter'>
                    <div class='table-wrapper'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Privilege</th>
                                    <th>User</th>
                                    <th>Event</th>
                                    <th>Involved Table</th>
                                    <th>Involved ID</th>
                                    <th>Time Stamp</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($logs as $row) { ?>

                                <tr>
                                    <td><?= $row['privilege'] ?></td>
                                    <td><?= $row['user'] ?></td>
                                    <td><?= $row['event'] ?></td>
                                    <td><?= $row['involved_table'] ?></td>
                                    <td><?= $row['involved_id'] ?></td>
                                    <td><?= $row['time_stamp'] ?></td>
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