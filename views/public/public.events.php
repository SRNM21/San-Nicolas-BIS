<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | Barangay San Nicolas</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('events'); ?>>
</head>
<body>
    <?php require getPartial('header') ?>
    <main>
        <section class=''>

        </section>
        <div class='event-content-wrapper'>
            <div class='f-center f-col event-sec-header'>
                <h2>BARANGAY SAN NICOLAS' EVENTS</h2>
            </div>
            <div class='f-center f-col events-wrapper'>

            <?php foreach($events as $row) { ?>

            <div class='event-card'>
                <header class='f-row event-header'>
                    <p><?= formatDate($row['date']) ?></p>
                </header>
                <div class='event-info'>
                    <div class='event-img-wrapper'>
                        <img src='/sannicolasbis/assets/uploads/<?= $row['image'] ?>' alt="">
                    </div>
                    <div>
                        <h3 class='event-title'><?= $row['title'] ?></h3>
                        <p class='event-details'><?= $row['details'] ?></p>
                    </div>
                </div>
            </div>

        <?php } ?>

        </div>
        </div>
        <footer class='f-row events-footer'>
            <p>&copy 2024 Pamantasan ng Lungsod ng Pasig, BSIT 2A - Group 3. All rights reserved.</p>
        </footer>
    </main>
</body>
</html>