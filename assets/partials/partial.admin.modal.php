<?php $origin = '/'. strtolower(getProjectFolder()) . '/administrator/'; ?>

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
            <div class='f-row btn-wrapper'>
                <a href='<?= $origin?><?= $scn_hred?>' class='f-center modal-btn modal-scn-btn'><?= $scn_txt ?></a>
                <a href='<?= $origin?><?= $prm_href?>' class='f-center modal-btn modal-prm-btn'><?= $prm_txt ?></a>
            </div>
        </div>
    </main>
</div>