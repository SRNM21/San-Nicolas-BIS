<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href=<?= getStyle('admin.brgy-officials'); ?>>
</head>
<body>
    <div class='f-row brgy-off-wrapper'>
        <?php include getPartial('admin.side-menu'); ?>
        <main class='f-col brgy-off-content'>
            <header class='f-row'>
                <h2>Barangay Officials</h2>
            </header>
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
                <table class='brgy-officials-tbl'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Birthdate</th>
                            <th>Gender</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class='brgy-officials-tbl-body'>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin.brgy-officials'); ?>></script>
</body>
</html>