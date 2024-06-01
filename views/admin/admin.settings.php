<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.settings'); ?>>
</head>
<body>
    <main class='f-col'>
        <?php include getPartial('admin.header'); ?>
        <main class='f-row blotter-container'>
            <?php include getPartial('admin.side-menu'); ?>
        </main>
    </main>
</body>
</html>