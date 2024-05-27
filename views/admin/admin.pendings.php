<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendings</title>
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
                            <input class='f-center search-bar' type='text' name='pendings-name' id='pendings-name' placeholder='Search'>
                            <span class='f-center search-icon-wrapper'>
                                <?= getSVG('search'); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class='f-col table-limiter'>
                    <div class='table-wrapper'>
                        <table class='pendings-tbl'>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('partial.side-menu'); ?>></script>
    <script type='module' src=<?=  getScript('admin.pendings'); ?>></script>
</body>
</html>