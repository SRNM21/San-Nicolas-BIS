<link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
<link rel='stylesheet' href=<?= getStyle('partial.details-official'); ?>>
<div class='f-center modal-container'>
    <main class='f-center f-col modal'>
        <a href='/sannicolasbis/administrator/barangay-officials' draggable='false' class='close-btn-wrapper'>
            <?= getSVG('close'); ?>
        </a>
        <div class='f-center image-wrapper'>
            <img src='/sannicolasbis/assets/uploads/<?= $profile?>' alt='<?= $fullname . ' profile'?>'>
            <span class='chip chip-<?= strtolower($status); ?>'><?= $status ?> </span>
        </div>
        <div class='f-center f-col info-wrapper'>
            <div class='f-col info-container'>
                <span class='f-center f-col'>
                    <h2 class='name-val'><?= $fullname ?></h2>
                    <p class='card-hint'><?= $position ?></p>
                </span>
                <div class='f-row handle-container'>
                    <span>
                        <b class='card-hint'>Comittee Title</b>
                        <p class='card-value'><?= handleEmptyValue('N/A', $comittee) ?></p>
                    </span>
                    <span>
                        <b class='card-hint'>Date Addded</b>
                        <p class='card-value'><?= formatDate($date_added) ?></p>
                    </span>
                </div>
                <div class='f-col contact-container'>
                    <b class='card-hint'>Contacts</b>
                    <a href='tel:<?= $phone_num ?>' class='f-row contact-wrapper'>
                        <span class='svg-wrapper'>
                            <?= getSVG('phone') ?>
                        </span>
                        <p class='card-value'><?= handleEmptyValue('None', $phone_num) ?></p>
                    </a>
                    <a href='mailto:<?= $email ?>' class='f-row contact-wrapper'>
                        <span class='svg-wrapper'>
                            <?= getSVG('mail') ?>
                        </span>
                        <p class='card-value'><?= handleEmptyValue('None', $email) ?></p>
                    </a>
                </div>
            </div>
        </div>
    </main>
</div>