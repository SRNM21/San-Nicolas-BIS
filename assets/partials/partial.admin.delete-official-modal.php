<link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
<link rel='stylesheet' href=<?= getStyle('partial.delete-official-modal'); ?>>
<div class='f-center modal-container'>
    <main class='f-center f-col modal'>
        <div class='f-row'>
            <header class='f-center f-col'>
                <div class='f-center image-wrapper'>
                    <img src='/sannicolasbis/assets/uploads/<?= $profile?>' alt='<?= $fullname . ' profile'?>'>
                </div>
            </header>
            <div class='f-col mess-container'>
                <h2>Confirm Deletion</h2>
                <p>Deleting <b><?= $fullname ?></b>, is permanent and cannot be undone.</p>
            </div>
        </div>
        <div class='f-row btn-wrapper'>
            <a href='barangay-officials' class='f-center modal-btn cancel-btn'>Cancel</a>
            <a href='barangay-officials?delete-confirm=<?= $id ?>' class='f-center modal-btn delete-btn'>Delete</a>
        </div>
    </main>
</div>