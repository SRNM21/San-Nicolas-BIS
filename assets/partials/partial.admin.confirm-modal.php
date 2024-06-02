<?php $origin = '/'. strtolower(getProjectFolder()) . '/administrator/'; ?>

<link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
<link rel='stylesheet' href=<?= getStyle('partial.modal'); ?>>
<div class='f-center modal-container'>
    <main class='f-row modal'>
        <div>
            <div class='f-center icon-wrapper-<?= $modal_icon ?>'><?= getSVG($modal_icon); ?></div>
        </div>
        <div class='f-col'>
            <div class='f-col message-holder'>
                <h3><?= $modal_title ?></h3>
                <p><?= $modal_message ?></p>
            </div>
            <div class='f-row modal-btn-wrapper'>
            <?php if ($modal_pos == '-') { ?>
                <a href='<?= $path ?>' class='f-center modal-btn modal-prm-btn'>OK</a>
            <?php } else {  ?>
                <a href='<?= $origin ?><?= $modal_pos?>' class='f-center modal-btn modal-prm-btn'>OK</a>
            <?php } ?>
            </div>
        </div>
    </main>
</div>