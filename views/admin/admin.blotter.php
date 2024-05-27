<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blotter</title>
    <link rel='stylesheet' href=<?= getStyle('admin.blotter'); ?>>
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