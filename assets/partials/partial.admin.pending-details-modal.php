<?php $origin = '/'. strtolower(getProjectFolder()) . '/administrator/'; ?>

<link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
<link rel='stylesheet' href=<?= getStyle('partial.pending-details-modal'); ?>>
<div class='f-center modal-container'>
    <main class='f-col modal'>

    <?php
    if ($role == 'family-head')
    {
        $fam_head = getRecord($id, 'pending_familyhead', 'pending_id');
    ?>
        <div class='f-row info-row'>
            <div class='f-col info-col'>
                <h3 class='group-title'>Personal Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Lastname</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_head['last_name']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Firstname</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_head['first_name']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Middlename</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $fam_head['middle_name']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Birthdate</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_head['birthdate']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Civil Status</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_head['civil_status']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Educational Status</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_head['educational']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Occupation</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $fam_head['occupation']) ?></p>
                    </div>
                </div>

                <h3 class='group-title'>Contact Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Contact Number</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $fam_head['contact_number']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Email</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $fam_head['email']) ?></p>
                    </div>
                </div>
            </div>
            
            <div class='f-col info-col'>
                <h3 class='group-title'>Location Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Purok</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_head['purok']) ?></p>
                    </div>
                </div>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Address</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_head['address']) ?></p>
                    </div>
                </div>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Family Planning</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_head['family_planning_method']) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class='f-row pending-util-btn-wrapper'>
            <a href='pendings' class='pending-close-btn'>Close</a>
        </div>

    <?php
    } 
    else if ($role == 'family-member')
    {
        $fam_member = getRecord($id, 'pending_familymember', 'pending_id');
        
        $fam_head_name = 'N/A';

        if (handleEmptyValue('N/A', $fam_member['family_head_id']) != 'N/A')
        {
            $fam_head   = getRecord($fam_member['family_head_id'], 'familyhead', 'family_head_id');
            $fam_head_name = $fam_head['last_name'] . ', ' . $fam_head['first_name'] . ' ' . $fam_head['middle_name'];
        }
    ?>

        <div class='f-row info-row'>
            <div class='f-col info-col'>
                <h3 class='group-title'>Person Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Lastname</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_member['last_name']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Firstname</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_member['first_name']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Middlename</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $fam_member['middle_name']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Sex</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_member['sex']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Birthdate</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_member['birthdate']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Place of Birth</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_member['place_of_birth']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>In School</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_member['in_school']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Occupation</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $fam_member['occupation']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Family Head</p>
                        <p class='info-val'><?= $fam_head_name ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Relationship</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $fam_member['relationship']) ?></p>
                    </div>
                </div>

                <h3 class='group-title'>Contact Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Email</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $fam_member['email']) ?></p>
                    </div>
                </div>
            </div>
            
            <div class='f-col info-col'>
                <h3 class='group-title'>Location Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Purok</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_member['purok']) ?></p>
                    </div>
                </div>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Address</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $fam_member['address']) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class='f-row pending-util-btn-wrapper'>
            <a href='pendings' class='pending-close-btn'>Close</a>
        </div>

    <?php
    } 
    else if ($role == 'spouse')
    {
        $spouse = getRecord($id, 'pending_spouse', 'pending_id');
        
        $fam_head_name = 'N/A';

        if (handleEmptyValue('N/A', $spouse['family_head_id']) != 'N/A')
        {
            $fam_head   = getRecord($spouse['family_head_id'], 'familyhead', 'family_head_id');
            $fam_head_name = $fam_head['last_name'] . ', ' . $fam_head['first_name'] . ' ' . $fam_head['middle_name'];
        }
    ?>

        <div class='f-row info-row'>
            <div class='f-col info-col'>
                <h3 class='group-title'>Person Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Lastname</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $spouse['last_name']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Firstname</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $spouse['first_name']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Middlename</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $spouse['middle_name']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Birthdate</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $spouse['birthdate']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Civil Status</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $spouse['civil_status']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Occupation</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $spouse['occupation']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Educational Status</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $spouse['educational']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Family Head</p>
                        <p class='info-val'><?= $fam_head_name ?></p>
                    </div>
                </div>

                <h3 class='group-title'>Contact Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Email</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $spouse['email']) ?></p>
                    </div>
                </div>
            </div>
            
            <div class='f-col info-col'>
                <h3 class='group-title'>Location Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Purok</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $spouse['purok']) ?></p>
                    </div>
                </div>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Address</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $spouse['address']) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class='f-row pending-util-btn-wrapper'>
            <a href='pendings' class='pending-close-btn'>Close</a>
        </div>

    <?php
    }
    ?>
    
    </main>
</div>