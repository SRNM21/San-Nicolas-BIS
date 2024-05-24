<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Barangay Officials</title>
    <link rel='stylesheet' href=<?= getStyle('admin.brgy-officials'); ?>>
</head>

<body>
    <div class='f-row brgy-off-wrapper'>
        <?php include getPartial('admin.side-menu'); ?>
        <main class='f-col brgy-off-container'>
            <?php include getPartial('admin.header'); ?>
            <div class='f-col'>
                <div class='f-center f-row utility'>   
                    <div class='f-center f-row query-wrapper'>
                        <input class='f-center search-bar' type='text' name='brgy-name' id='brgy-name' placeholder='Search'>
                        <span class='f-center search-icon-wrapper'>
                            <?= getSVG('search'); ?>
                        </span>
                    </div>
                    <div class='util-btn-wrapper'>
                        <a href='barangay-officials/new-official' class='f-center f-row new-official-btn'><?= getSVG('add-person'); ?><p>New official</p></a>
                    </div>
                </div>
            </div>
            <div class='f-col table-limiter'>
                <div class='table-wrapper'>
                    <table class='brgy-officials-tbl'>
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
                        <tbody class='brgy-officials-tbl-body'>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('partial.side-menu'); ?>></script>
    <script type='module' src=<?=  getScript('admin.brgy-officials'); ?>></script>

</body>
</html>