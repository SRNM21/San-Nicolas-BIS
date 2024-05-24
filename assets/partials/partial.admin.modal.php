<?php $origin = '/'. strtolower(getProjectFolder()) . '/administrator/'; ?>

<link rel='stylesheet' href=<?= getStyle('partial.modal'); ?>>
<div class='f-center modal-container'>
    <main class='f-center f-col modal'>
        <header class='f-center f-col'>
            <div class='f-center icon-wrapper-<?= $modal_icon ?>'><?= getSVG($modal_icon); ?></div>
            <h3><?= $modal_title ?></h3>
        </header>
        <div>
            <p><?= $modal_success ?></p>
        </div>
        <div class='f-col btn-wrapper'>
            <a href='<?= $origin?><?= $modal_pos?>' class='f-center modal-btn continue-btn'>Continue</a>
            <a href='<?= $origin?><?= $modal_neg?>' class='f-center modal-btn back-btn'>Back</a>
        </div>
    </main>
</div>