<?php $origin = '/'. strtolower(getProjectFolder()) . '/administrator/'; ?>

<link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
<link rel='stylesheet' href=<?= getStyle('partial.event-details'); ?>>
<div class='f-center modal-container'>
    <main class='f-center f-col modal'>
        <div class='event-img-wrapper'>
            <img src='/sannicolasbis/assets/uploads/<?= $event['event_image'] ?>' alt="">
        </div>
        <div class='f-center f-col event-desc-wrapper'>
            <div class='f-row'>
                <div class='info-group'>
                    <p class='info-event-title'>What</p>
                    <p class='info-event-val'><?= $event['event_what'] ?></p>
                </div>
                <div class='info-group'>
                    <p class='info-event-title'>When</p>
                    <p class='info-event-val'><?= formatDate(explode(' ', $event['event_when'])[0]) ?> <?= date('h:i:sa', intval(explode(' ', $e['event_when'])[1])) ?></p>
                </div>
            </div>
            <div class='f-row'>
                <div class='info-group'>
                    <p class='info-event-title'>Where</p>
                    <p class='info-event-val'><?= $event['event_where'] ?></p>
                </div>
                <div class='info-group'>
                    <p class='info-event-title'>Who</p>
                    <p class='info-event-val'><?= $event['event_who'] ?></p>
                </div>
            </div>
            <div class='f-row'>
                <div class='info-group'>
                    <p class='info-event-title'>Details</p>
                    <p class='info-event-val'><?= $event['event_details'] ?></p>
                </div>
            </div>
            <a href='events?filter=<?= $filter ?>' class='f-center modal-btn scale-anim' draggable='false'>Close</a>
        </div>
    </main>
</div>