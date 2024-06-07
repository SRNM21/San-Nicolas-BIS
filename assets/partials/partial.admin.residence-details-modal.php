<?php $origin = '/'. strtolower(getProjectFolder()) . '/administrator/'; ?>

<link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
<link rel='stylesheet' href=<?= getStyle('partial.pending-details-modal'); ?>>
<div class='f-center modal-container'>
    <main class='f-col modal'>
        
    <?php
    if ($role == 'FMH')
    {
        $person         = getRecord($id, 'familyhead', 'family_head_id');
    ?>
        <div class='f-row info-row fam-info-seperator'>
            <div class='f-col info-col'>
                <h3 class>Family Head</h3>
                <div class='f-row info-row group'>
                    <div class='f-col info-col'>
                        <h3 class='group-title'>Personal Info</h3>
                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Lastname</p>
                                <p class='info-val'><?=  handleEmptyValue('N/A', $person['last_name']) ?></p>
                            </div>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Firstname</p>
                                <p class='info-val'><?=  handleEmptyValue('N/A', $person['first_name']) ?></p>
                            </div>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Middlename</p>
                                <p class='info-val'><?= handleEmptyValue('N/A', $person['middle_name']) ?></p>
                            </div>
                        </div>

                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Birthdate</p>
                                <p class='info-val'><?=  handleEmptyValue('N/A', $person['birthdate']) ?></p>
                            </div>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Civil Status</p>
                                <p class='info-val'><?=  handleEmptyValue('N/A', $person['civil_status']) ?></p>
                            </div>
                        </div>

                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Educational Attainment</p>
                                <p class='info-val'><?=  handleEmptyValue('N/A', $person['educational']) ?></p>
                            </div>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Occupation</p>
                                <p class='info-val'><?= handleEmptyValue('N/A', $person['occupation']) ?></p>
                            </div>
                        </div>

                        <h3 class='group-title'>Contact Info</h3>
                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Contact Number</p>
                                <p class='info-val'><?= handleEmptyValue('N/A', $person['contact_number']) ?></p>
                            </div>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Email</p>
                                <p class='info-val'><?= handleEmptyValue('N/A', $person['email']) ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class='f-col info-col'>
                        <h3 class='group-title'>Location Info</h3>
                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Purok</p>
                                <p class='info-val'><?=  handleEmptyValue('N/A', $person['purok']) ?></p>
                            </div>
                        </div>
                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Address</p>
                                <p class='info-val'><?=  handleEmptyValue('N/A', $person['address']) ?></p>
                            </div>
                        </div>
                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Family Planning</p>
                                <p class='info-val'><?=  handleEmptyValue('N/A', $person['family_planning_method']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
            if ($person['civil_status'] != 'Single') { 
                $spouse         = getRecord($id, 'spouse', 'family_head_id');
                $fam_members    = queryFamilyMembers($id);
            ?>

            <div class='f-col info-col'>
                <h3 class>Spouse</h3>
                <div class='f-row info-row group'>
                    <div class='f-col info-col'>
                        <h3 class='group-title'>Personal Info</h3>
                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Lastname</p>
                                <p class='info-val'><?=  $spouse == null ? 'N/A' : handleEmptyValue('N/A', $spouse['last_name']) ?></p>
                            </div>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Firstname</p>
                                <p class='info-val'><?=  $spouse == null ? 'N/A' : handleEmptyValue('N/A', $spouse['first_name']) ?></p>
                            </div>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Middlename</p>
                                <p class='info-val'><?= $spouse == null ? 'N/A' : handleEmptyValue('N/A', $spouse['middle_name']) ?></p>
                            </div>
                        </div>

                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Birthdate</p>
                                <p class='info-val'><?=  $spouse == null ? 'N/A' : handleEmptyValue('N/A', $spouse['birthdate']) ?></p>
                            </div>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Civil Status</p>
                                <p class='info-val'><?=  $spouse == null ? 'N/A' : handleEmptyValue('N/A', $spouse['civil_status']) ?></p>
                            </div>
                        </div>

                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Occupation</p>
                                <p class='info-val'><?= $spouse == null ? 'N/A' : handleEmptyValue('N/A', $spouse['occupation']) ?></p>
                            </div>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Educational Attainment</p>
                                <p class='info-val'><?= $spouse == null ? 'N/A' : handleEmptyValue('N/A', $spouse['educational']) ?></p>
                            </div>
                        </div>

                        <h3 class='group-title'>Contact Info</h3>
                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Email</p>
                                <p class='info-val'><?= $spouse == null ? 'N/A' : handleEmptyValue('N/A', $spouse['email']) ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class='f-col info-col'>
                        <h3 class='group-title'>Location Info</h3>
                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Purok</p>
                                <p class='info-val'><?=  $spouse == null ? 'N/A' : handleEmptyValue('N/A', $spouse['purok']) ?></p>
                            </div>
                        </div>
                        <div class='f-row info-row'>
                            <div class='f-col info-grp'>
                                <p class='info-lbl'>Address</p>
                                <p class='info-val'><?=  $spouse == null ? 'N/A' : handleEmptyValue('N/A', $spouse['address']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        </div>

        <?php if ($person['civil_status'] != 'Single') {  ?>

        <main class='f-col fam-members-content shown'>
            <h3>Family Members</h3>
            <div class='f-col table-limiter'>
                <div class='f-col fam-members'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Sex</th>
                                <th>Birthdate</th>
                                <th>Relationship</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        foreach($fam_members as $row) { 
                        $fullname =
                         $row['last_name'] . ', ' . $row['first_name'] . ' ' . $row['middle_name'];
                        ?>
                            <tr>
                                <td><?= $fullname ?></td>
                                <td><?= handleEmptyValue('N/A', $row['sex']) ?></td>
                                <td><?= handleEmptyValue('N/A', $row['birthdate']) ?></td>
                                <td><?= handleEmptyValue('N/A', $row['relationship']) ?></td>
                                <td>
                                    <a href="residence?filter=family-member&details=<?= $row['family_member_id'] ?>" class='data-util-btn black-details-btn'>Go to Details</a>
                                </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        
        <?php } ?>


        <div class='f-row pending-util-btn-wrapper'>
            
            <?php if ($person['civil_status'] != 'Single') { ?>

            <button class='show-fam-members-btn' type='button' data-text='Family Members'>Hide Family Members</button>

            <?php } ?>

            <a href='residence?filter=<?= $filter ?>' class='pending-close-btn'>Close</a>
        </div>

        <?php
    } 
    else if ($role == 'FMM')
    {
        $person = getRecord($id, 'familymember', 'family_member_id ');
        
        $fam_head_name = 'N/A';

        if (handleEmptyValue('N/A', $person['family_head_id']) != 'N/A')
        {
            $fam_head   = getRecord($person['family_head_id'], 'familyhead', 'family_head_id');
            $fam_head_name = $fam_head['last_name'] . ', ' . $fam_head['first_name'] . ' ' . $fam_head['middle_name'];
        }
    ?>

        <div class='f-row info-row'>
            <div class='f-col info-col'>
                <h3 class='group-title'>Person Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Lastname</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['last_name']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Firstname</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['first_name']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Middlename</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $person['middle_name']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Sex</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['sex']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Birthdate</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['birthdate']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Place of Birth</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['place_of_birth']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>In School</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['in_school']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Occupation</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $person['occupation']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Family Head</p>
                        <p class='info-val'><?= $fam_head_name ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Relationship</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $person['relationship']) ?></p>
                    </div>
                </div>

                <h3 class='group-title'>Contact Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Email</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $person['email']) ?></p>
                    </div>
                </div>
            </div>
            
            <div class='f-col info-col'>
                <h3 class='group-title'>Location Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Purok</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['purok']) ?></p>
                    </div>
                </div>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Address</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['address']) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class='f-row pending-util-btn-wrapper'>
            <a href='residence?filter=<?= $filter ?>' class='pending-close-btn'>Close</a>
        </div>

    <?php
    } 
    else if ($role == 'SPS')
    {
        $person = getRecord($id, 'spouse', 'spouse_ID');
        
        $fam_head_name = 'N/A';

        if (handleEmptyValue('N/A', $person['family_head_id']) != 'N/A')
        {
            $fam_head   = getRecord($person['family_head_id'], 'familyhead', 'family_head_id');
            $fam_head_name = $fam_head['last_name'] . ', ' . $fam_head['first_name'] . ' ' . $fam_head['middle_name'];
        }
    ?>

        <div class='f-row info-row'>
            <div class='f-col info-col'>
                <h3 class='group-title'>Person Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Lastname</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['last_name']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Firstname</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['first_name']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Middlename</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $person['middle_name']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Birthdate</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['birthdate']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Civil Status</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['civil_status']) ?></p>
                    </div>
                </div>

                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Occupation</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $person['occupation']) ?></p>
                    </div>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Educational Attainment</p>
                        <p class='info-val'><?= handleEmptyValue('N/A', $person['educational']) ?></p>
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
                        <p class='info-val'><?= handleEmptyValue('N/A', $person['email']) ?></p>
                    </div>
                </div>
            </div>
            
            <div class='f-col info-col'>
                <h3 class='group-title'>Location Info</h3>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Purok</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['purok']) ?></p>
                    </div>
                </div>
                <div class='f-row info-row'>
                    <div class='f-col info-grp'>
                        <p class='info-lbl'>Address</p>
                        <p class='info-val'><?=  handleEmptyValue('N/A', $person['address']) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class='f-row pending-util-btn-wrapper'>
            <a href='residence?filter=<?= $filter ?>' class='pending-close-btn'>Close</a>
        </div>

    <?php
    }
    ?>

    </main>
</div>

<script type='module' src=<?=  getScript('admin.residence-details-modal'); ?>></script>
