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
        <main class='brgy-off-content'>
            <header class='f-row'>
                <h3>Barangay officials</h3>
            </header>
            <div class='f-col'>
                <div class='f-row utility'>   
                    <div class='f-row query-wrapper'>
                        <p>Search</p>
                        <input type='text' name='brgy-name' id='brgy-name'>
                    </div>
                    <div class='util-btn-wrapper'>
                        <a href='barangay-officials/new-official'>New official</a>
                    </div>
                </div>
                <table>
                    <thead>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Date Added</th>
                    </thead>
                </table>
            </div>
        </main>
    </div>
</body>
</html>