<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Accounts</title>
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
                        <div class='f-center f-row query-wrapper'>
                            <input class='f-center search-bar' type='text' name='staff-acc-name' id='staff-acc-name' placeholder='Search'>
                            <span class='f-center search-icon-wrapper'>
                                <?= getSVG('search'); ?>
                            </span>
                        </div>
                        <div class='util-btn-wrapper'>
                            <a href='staff-accounts/new-staff-account' class='f-center f-row new-staff-acc-btn'><?= getSVG('add-person'); ?><p>New Staff Account</p></a>
                        </div>
                    </div>
                </div>
                <div class='f-col table-limiter'>
                    <div class='table-wrapper'>
                        <table class='staff-acc-tbl'>
                            <thead>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Middlename</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Action</th>
                            </thead>
                            <tbody class='staff-acc-tbl-body'>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('partial.side-menu'); ?>></script>
    <script type='module' src=<?=  getScript('admin.staff-acc'); ?>></script>
</body>
</html>