<?php $origin = '/'. strtolower(getProjectFolder()) . '/administrator/'; ?>

<link rel='stylesheet' href=<?= getStyle('partial.admin.pending-details-modal'); ?>>
<div class='f-center modal-container'>
    <main class='f-col modal'>
    <?php
    if ($role == 'FMH')
    {
        $person = getRecord($id, 'familyhead', 'family_head_id');
    ?>
        <div class='f-row info-row'>
            <div class='f-col info-col'>
                <h3>Personal Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Lastname</p>
                        <p class='info-val'><?= $person['last_name'] ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Firstname</p>
                        <p class='info-val'><?= $person['first_name'] ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Middlename</p>
                        <p class='info-val'><?= $person['middle_name'] ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Birthdate</p>
                        <p class='info-val'><?= $person['birthdate'] ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Civil Status</p>
                        <p class='info-val'><?= $person['civil_status'] ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Educational Status</p>
                        <p class='info-val'><?= $person['educational'] ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Occupation</p>
                        <p class='info-val'><?= $person['occupation'] ?></p>
                    </div>
                </div>

                <h3>Contact Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Contact Number</p>
                        <p class='info-val'><?= $person['contact_number'] ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Email</p>
                        <p class='info-val'><?= $person['email'] ?></p>
                    </div>
                </div>
            </div>
            
            <div class='f-col info-col'>
                <h3>Location Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Purok</p>
                        <p class='info-val'><?= $person['purok'] ?></p>
                    </div>
                </div>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Address</p>
                        <p class='info-val'><?= $person['address'] ?></p>
                    </div>
                </div>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Family Planning</p>
                        <p class='info-val'><?= $person['family_planning_method'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class='f-row pending-util-btn-wrapper'>
            <a href='residence' class='pending-close-btn'>Close</a>
        </div>
    <?php
    }
    ?>
    </main>
</div>