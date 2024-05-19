<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Family Head</title>
    <link rel='stylesheet' href=<?= getStyle('admin.family-head'); ?>>
</head>

<body>
    <div class='f-row fam-head-wrapper'>
        <?php include getPartial('admin.side-menu'); ?>
        <main class='f-col fam-head-content'>
            <header class='f-row'>
                <h2>Family Head</h2>
            </header>
            <div class='f-col'>
                <div class='f-center f-row utility'>   
                    <div class='f-center f-row query-wrapper'>
                        <input class='f-center search-bar' type='text' name='fam-head-name' id='fam-head-name' placeholder='Search'>
                        <span class='f-center search-icon-wrapper'>
                            <?= getSVG('search'); ?>
                        </span>
                    </div>
                    <div class='util-btn-wrapper'>
                        <a href='barangay-officials/new-family-head' class='f-center f-row new-family-head-btn'><?= getSVG('add-person'); ?><p>New Family Head</p></a>
                    </div>
                </div>
                <table class='family-head-tbl'>
                    <thead>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Purok</th>
                        <th>Age</th>
                        <th>Civil Status</th>
                        <th>Date of Interview</th>
                        <th>Action</th>
                    </thead>
                    <tbody class='fam-head-tbl-body'>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin.family-head'); ?>></script>
</body>
</html>