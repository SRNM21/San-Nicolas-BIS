<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Family Head</title>
    <link rel='stylesheet' href=<?= getStyle('admin.residence'); ?>>
</head>

<body>
    <div class='f-row residence-wrapper'>
        <?php include getPartial('admin.side-menu'); ?>
        <main class='f-col residence-container'>
            <?php include getPartial('admin.header'); ?>
            <div class='f-col'>
                <div class='f-center f-row utility'>   
                    <div class='f-center f-row query-wrapper'>
                        <input class='f-center search-bar' type='text' name='residence-name' id='residence-name' placeholder='Search'>
                        <span class='f-center search-icon-wrapper'>
                            <?= getSVG('search'); ?>
                        </span>
                    </div>
                    <div class='util-btn-wrapper'>
                        <a href='residence/new-residence' class='f-center f-row new-residence-btn'><?= getSVG('add-person'); ?><p>New Resident</p></a>
                    </div>
                </div>
            </div>
            <div class='f-col table-limiter'>
                <div class='table-wrapper'>
                    <table class='residence-tbl'>
                        <thead>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Purok</th>
                            <th>Role</th>
                            <th>Action</th>
                        </thead>
                        <tbody class='residence-tbl-body'>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin.residence'); ?>></script>
</body>
</html>