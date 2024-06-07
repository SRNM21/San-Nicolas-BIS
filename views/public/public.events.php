<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | Barangay San Nicolas</title>
    <link rel='icon' type='image/x-icon' href=<?= getLogo(); ?>>
    <link rel='stylesheet' href=<?= getStyle('events'); ?>>
</head>
<body>
    <?php require getPartial('header') ?>
    <section class='f-center f-col event-section'>
        <div class='f-col event-content-wrapper'>
            <div class='f-center f-col event-sec-header'>
                <h2>BARANGAY SAN NICOLAS' EVENTS</h2>
            </div>
            <div class='f-center f-col events-wrapper'>
                <div class='f-center f-row filter-wrapper'>  
                    <a href='?filter=current' class='event-filter <?= $filter == 'current' ? 'active' : '' ?>'>Current</a>
                    <span class='seperator'></span>
                    <a href='?filter=upcoming' class='event-filter <?= $filter == 'upcoming' ? 'active' : '' ?>'>Upcoming</a>
                </div>
                <div class='events'>
                    <hr>
                <?php 
                
                foreach($events as $e) { 
                    $date = explode(' ', $e['event_when'])[0];
                    if ($filter == 'current' && $date == date('Y-m-d') ||
                        $filter == 'upcoming' && $date > date('Y-m-d')) {
                ?>

                    <div class='f-row event-card'>
                        <div class='f-center date-holder'>
                            <h3 class='event-date'><?= $date == date('Y-m-d') ? 'Now' : formatDate($date) ?></h3>
                        </div>
                        <div class='f-center f-col details-wrapper '>
                            <div class='f-row title-wrapper'>
                                <h3 class='event-title'><?= $e['event_what'] ?></h3>
                            </div>
                            <div class='desc-wrapper'>
                                <p class='event-details'><?= $e['event_details'] ?></p>
                            </div>
                        </div>
                        <div class='action-wrapper'>
                            <a href='?filter=<?= $filter ?>&details=<?= $e['event_id'] ?>' draggable='false' class='details-btn scale-anim'>Details</a>
                        </div>
                    </div>

                    <hr>

                <?php }} ?>
                </div>
            </div>
        </div>
        <footer class='f-row events-footer'>
            <p>&copy 2024 Pamantasan ng Lungsod ng Pasig, BSIT 2A - Group 3. All rights reserved.</p>
        </footer>
    </section>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
</body>
</html>