<?php $origin = '/'. strtolower(getProjectFolder()) . '/administrator/'; ?>

<title>Request Details | <?= $complaint['request_date_time'] ?></title>
<link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
<link rel='stylesheet' href=<?= getStyle('partial.request-document-details'); ?>>
<div class='f-center modal-container'>
    <main class='f-col modal'>
        <header class='f-row modal-header'>
            <h2>Request Detail</h2>
            <p><?= $complaint['request_date_time'] ?></p>
        </header>
        <div class='f-col modal-content-wrapper'>
            <div class='f-row g-row'>
                <div class='f-col modal-group'>
                    <p class='modal-subtitle'>Lastname</p>
                    <p><?= $complaint['last_name'] ?></p>
                </div>
                <div class='f-col modal-group'>
                    <p class='modal-subtitle'>Firstname</p>
                    <p><?= $complaint['first_name'] ?></p>
                </div>
                <div class='f-col modal-group'>
                    <p class='modal-subtitle'>Middlename</p>
                    <p><?= $complaint['middle_name'] ?></p>
                </div>
                <div class='f-col modal-group'>
                    <p class='modal-subtitle'>Suffix</p>
                    <p><?= $complaint['suffix'] ?></p>
                </div>
            </div>
            <div class='f-row'>
                <div class='f-col nat-of-comp-wrapper modal-group'>
                    <p class='modal-subtitle'>Birthdate</p>
                    <p><?= $complaint['birthdate'] ?></p>
                </div>
                <div class='f-col nat-of-comp-wrapper modal-group'>
                    <p class='modal-subtitle'>Address</p>
                    <p><?= $complaint['address'] ?></p>
                </div>
            </div>
            <div class='f-row g-row add-details-wrapper'>
                <div class='f-col modal-group'>
                    <p class='modal-subtitle'>Years of Residency</p>
                    <p><?= $complaint['years_of_residence'] ?></p>
                </div>
            </div>
            <div class='f-row g-row'>
                <div class='f-col nat-of-comp-wrapper modal-group'>
                    <p class='modal-subtitle'>Contact Number</p>
                    <p><?= $complaint['contact_number'] ?></p>
                </div>
                <div class='f-col nat-of-comp-wrapper modal-group'>
                    <p class='modal-subtitle'>Email</p>
                    <p><?= $complaint['email'] ?></p>
                </div>
            </div>
            <div class='f-row'>
                <div class='f-col nat-of-comp-wrapper modal-group'>
                    <p class='modal-subtitle'>Document Type</p>
                    <p><?= $complaint['document_type'] ?></p>
                </div>
                <div class='f-col nat-of-comp-wrapper modal-group'>
                    <p class='modal-subtitle'>Purpose</p>
                    <p><?= $complaint['purpose'] ?></p>
                </div>
            </div>
            <div class='f-row'>
                <div class='f-col nat-of-comp-wrapper modal-group'>
                    <p class='modal-subtitle'>Request Date</p>
                    <p><?= $complaint['request_date_time'] ?></p>
                </div>
                <div class='f-col nat-of-comp-wrapper modal-group'>
                    <p class='modal-subtitle'>Status</p>
                    <p><?= $complaint['status'] ?></p>
                </div>
            </div>
            <div class='f-row modal-btn-wrapper'>
                <a href='requested-documents' class='modal-close-btn'>Close</a>
            </div>
        </div>
    </main>
</div>