<link rel='stylesheet' href=<?= getStyle('partial.details-official'); ?>>
<div class='f-center modal-container'>
    <main class='f-center f-col modal'>
        <span class='chip chip-<?= strtolower($status); ?>'>
            <?= $status ?>
        </span>
        <a href='/sannicolasbis/administrator/barangay-officials' class='close-btn-wrapper'>
            <?= getSVG('close'); ?>
        </a>
        <div class='f-center image-wrapper'>
            <img src='/sannicolasbis/assets/uploads/<?= $profile?>' alt='<?= $fullname . ' profile'?>'>
        </div>
        <div class='f-center f-col info-wrapper'>
            <div class='f-col info-container'>
                <span class='f-center f-col'>
                    <h2 class='name-val'><?= $fullname ?></h2>
                    <p class='card-hint'><?= $position ?></p>
                </span>
                <div class='f-col contact-container'>
                    <a href='tel:<?= $phone_num ?>' class='f-row contact-wrapper'>
                        <span class='svg-wrapper'>
                            <?= getSVG('phone') ?>
                        </span>
                        <p class='card-value'><?= $phone_num ?></p>
                    </a>
                    <a href='mailto:<?= $email ?>' class='f-row contact-wrapper'>
                        <span class='svg-wrapper'>
                            <?= getSVG('mail') ?>
                        </span>
                        <p class='card-value'><?= $email ?></p>
                    </a>
                </div>
                <div class='f-row handle-container'>
                    <span>
                        <p class='card-hint'>Handle</p>
                        <p class='card-value'><?= $handle ?></p>
                    </span>
                    <span>
                        <p class='card-hint'>Date Addded</p>
                        <p class='card-value'><?= $date_added ?></p>
                    </span>
                </div>
            </div>
        </div>
    </main>
</div>