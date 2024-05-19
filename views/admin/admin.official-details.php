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
                <h2><?= $fullname ?></h2>
            </header>
            <div class='f-col'>
                
            </div>
        </main>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin.brgy-officials'); ?>></script>
</body>
</html>