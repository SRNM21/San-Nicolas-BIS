<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Dashboard</title>
    <link rel='stylesheet' href=<?= getStyle('admin.dashboard'); ?>>
</head>
<body>
    <div class='f-col dashboard-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row dashboard-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-col dashboard-content'>
                <div class='f-row dashboard-cards-wrapper'>
                    <a href='residence' class='f-row card population-card'>
                        <div class='card-svg-wrapper'>
                            <?= getSVG('residence'); ?>
                        </div>
                        <div class='f-col info-holder'>
                            <h1>Population</h1>
                            <h2 class=''><?= $total_population ?></h2>
                        </div>
                    </a>
                    <a href='barangay-officials' class='f-row card officials-card'>
                        <div class='card-svg-wrapper'>
                            <?= getSVG('brgy_officials'); ?>
                        </div>
                        <div class='f-col info-holder'>
                            <h1>Barangay Officials</h1>
                            <h2 class=''><?= $total_barangay_officials ?></h2>
                        </div>
                    </a>
                    <a href='complaints' class='f-row card blotter-card'>
                        <div class='card-svg-wrapper'>
                            <div class='card-svg-wrapper'>
                                <?= getSVG('blotter1'); ?>
                            </div>
                        </div>
                        <div class='f-col info-holder'>
                            <h1>Complaints</h1>
                            <h2 class=''>123123</h2>
                        </div>
                    </a>
                </div>
                <div class='f-row dashboard-statistics-wrapper'>
                    <div class='f-center f-col stat gender-chart-holder'>
                        <h2>Gender Statistics</h2>
                        <div class='gender-chart-wrapper'>
                            <canvas id='gender-chart'></canvas>
                        </div>
                    </div>

                    <div class='f-center f-col stat purok-pop-chart-holder'>
                        <h2>Purok Population</h2>
                        <div class='purok-pop-chart-wrapper'>
                            <canvas id='purok-pop-chart'></canvas>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin.dashboard'); ?>></script>

</body>
</html>