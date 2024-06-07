<div class='f-row util-btn-wrapper export-wrapper'>
    <button class='f-center f-row export-hover-dd data-util-btn scale-anim'><?= getSVG('export')?>Export <?= $export_title ?> <?= getSVG('dropdown')?></button>
    <div class='f-col export-dd'>
        <a href='?<?= $add_href == null ? '' : $add_href . '&' ?>export=excel' draggable='false' class='scale-anim'>Export as Excel</a>
        <a href='?<?= $add_href == null ? '' : $add_href . '&' ?>export=pdf' draggable='false' class='scale-anim'>Export as PDF</a>
    </div>
</div>