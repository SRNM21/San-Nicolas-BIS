<?php $origin = '/'. strtolower(getProjectFolder()) . '/administrator/'; ?>

<title>Blotter Details | <?= $complaint['blotter_date'] ?></title>
<link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
<link rel='stylesheet' href=<?= getStyle('partial.blotter-details'); ?>>
<div class='f-center modal-container'>
    <main class='f-col modal'>
        <header class='f-row modal-header'>
            <h2>Blotter Detail</h2>
            <p><?= $complaint['blotter_date'] ?></p>
        </header>
        <div class='f-col modal-content-wrapper'>
            <div class='f-row g-row'>
                <div class='f-col complainant-details'>
                    <div class='f-col modal-group'>
                        <p class='modal-subtitle'>Complainant</p>
                        <p><?= $complaint['complainant'] ?></p>
                    </div>
                    <div class='f-col modal-group'>
                        <p class='modal-subtitle'>Complainant Address</p>
                        <p><?= $complaint['complainant_address'] ?></p>
                    </div>
                </div>
                <div class='f-col respondent-details'>
                    <div class='f-col modal-group'>
                        <p class='modal-subtitle'>Respondent</p>
                        <p><?= $complaint['respondent'] ?></p>

                    </div>
                    <div class='f-col modal-group'>
                        <p class='modal-subtitle'>Respondent Address</p>
                        <p><?= $complaint['respondent_address'] ?></p>

                    </div>
                </div>
            </div>
            <div class='f-col'>
                <div class='f-col nat-of-comp-wrapper modal-group'>
                    <p class='modal-subtitle'>Nature of Complaint</p>
                    <p><?= $complaint['nature_of_complaint'] ?></p>
                </div>
            </div>
            <div class='f-row g-row add-details-wrapper'>
                <div class='f-col modal-group'>
                    <p class='modal-subtitle'>Status</p>
                    <p><?= $complaint['status'] ?></p>
                </div>
                <div class='f-col modal-group'>
                    <p class='modal-subtitle'>Date and Time</p>
                    <p><?= $complaint['date_and_time'] ?></p>
                </div>
            </div>
            <div class='f-row modal-btn-wrapper'>
                <a href='blotter' class='modal-close-btn'>Close</a>
            </div>
        </div>
    </main>
</div>