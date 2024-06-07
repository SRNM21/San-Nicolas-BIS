<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landmarks | Barangay San Nicolas</title>
    <link rel='icon' type='image/x-icon' href=<?= getLogo(); ?>>
    <link rel='stylesheet' href=<?= getStyle('landmarks'); ?>>
</head>
<body>
    <?php require getPartial('header') ?>
    <section class='f-center f-col landmarks-section'>
        <div class='f-col landmarks-content-wrapper'>
            <div class='f-center f-col landmarks-sec-header'>
                <h2>BARANGAY SAN NICOLAS' LANDMARKS</h2>
            </div>
            <div class='f-center f-row landmarks-wrapper'>
                
                <?php for ($i = 0; $i < count($name); $i++) { ?>

                <div class='landmark-card'>
                    <div class='landmark-img'>
                        <img src="<?= getImage($images[$i]) ?>" alt="">
                    </div>
                    <div class='f-center f-row landmark-details'>
                        <h2><?= $name[$i] ?></h2>
                        <a href=<?= $map[$i] ?> target='_blank' class='f-center'><?= getSVG('map') ?> Maps</a>
                    </div>
                    <div class='landmark-description'>
                        <p><?= $desc[$i] ?></p>
                    </div>
                </div>

                <?php } ?>

            </div>
        </div>
        <footer class='f-row landmarks-footer'>
            <p>&copy 2024 Pamantasan ng Lungsod ng Pasig, BSIT 2A - Group 3. All rights reserved.</p>
        </footer>
    </section>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
</body>
</html>