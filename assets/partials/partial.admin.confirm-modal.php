<?php $origin = '/'. strtolower(getProjectFolder()) . '/administrator/'; ?>

<link rel='stylesheet' href=<?= getStyle('partial.modal'); ?>>
<div class='f-center modal-container'>
    <main class='f-center f-col modal'>
        <header class='f-center f-col'>
            <div class='f-center icon-wrapper-<?= $modal_icon ?>'><?= getSVG($modal_icon); ?></div>
            <h3><?= $modal_title ?></h3>
        </header>
        <div class='f-center message-holder'>
            <p><?= $modal_message ?></p>
        </div>
        <div class='f-col btn-wrapper'>
            <?php if ($modal_pos == '-') { ?>
                <a href='<?= $path ?>' class='f-center modal-btn modal-prm-btn'>OK</a>
            <?php } else {  ?>
                <a href='<?= $origin ?><?= $modal_pos?>' class='f-center modal-btn modal-prm-btn'>OK</a>
            <?php } ?>
        </div>
    </main>
</div>