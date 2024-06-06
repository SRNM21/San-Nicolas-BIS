<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Audit Trail</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
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
                        <div class='f-row util-btn-wrapper export-wrapper'>
                            <button class='f-center f-row export-log-hover-dd data-util-btn'><?= getSVG('export')?>Export Logs <?= getSVG('dropdown')?></button>
                            <div class='f-col export-log-dd'>
                                <a href='?export=excel'>Export as Excel</a>
                                <a href='?export=pdf'>Export as PDF</a>
                            </div>
                        </div>
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
    <script type='module' src=<?=  getScript('admin.audit-trail'); ?>></script>
</body>
</html>