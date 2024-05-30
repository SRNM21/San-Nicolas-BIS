<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | <?= $fullname ?></title>
    <link rel='stylesheet' href=<?= getStyle('admin.update-residence'); ?>>
</head>
<body>
    <div class='f-col update-resident-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row update-resident-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-center f-col update-resident-content'>
                <div class='f-col update-resident-form-wrapper'>
                    <header class='f-row form-header'>
                        <div class='f-center f-row'>
                            <div class='f-row back-btn-wrapper'>
                                <a href='<?= $origin ?>residence' class='back-btn'><?= getSVG('back'); ?></a>
                            </div>
                            <h4>Update Resident | <?= $fullname ?></h4>
                        </div>
                        <p><?= $role ?></p>
                    </header>
                    <div class='f-col form-content'>
                        
                        <!-- FAMILY HEAD UPDATE FORM -->
                        <?php if ($role == 'Family Head') { ?>

                            <form action='' method='post' id='fam-head-form'>
                                <section class='f-col fam-head-page'>
                                    <div class='f-row info-wrapper'>
                                        <div class='f-col'>
                                            <div class='f-col personal-info-wrapper'>
                                                <div class='inp-row f-row name-wrapper'>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-head-lastname' class='req'>Lastname</label>
                                                        <input type='text' name='fam-head-lastname' id='fam-head-lastname' class='info-inp fam-head-lastname' placeholder='Enter Lastname' data-input='Lastname' value='<?= $resident['last_name'] ?>'>
                                                        <p class='error-info fh-ln-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-head-firstname' class='req'>Firstname</label>
                                                        <input type='text' name='fam-head-firstname' id='fam-head-firstname' class='info-inp fam-head-firstname' placeholder='Enter Firstname' data-input='Firstname' value='<?= $resident['first_name'] ?>'>
                                                        <p class='error-info fh-fn-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-head-middlename'>Middlename</label>
                                                        <input type='text' name='fam-head-middlename' id='fam-head-middlename' class='info-inp fam-head-middlename' placeholder='Enter Middlename' data-input='Middlename' value='<?= $resident['middle_name'] ?>'>
                                                        <p class='error-info fh-mn-err'></p>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row'>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-head-birthdate' class='req'>Birthdate</label>
                                                        <input type='date' name='fam-head-birthdate' id='fam-head-birthdate' class='info-inp fam-head-birthdate' value='<?= $resident['birthdate'] ?>'>
                                                        <p class='error-info fh-bd-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-head-civil-status' class='req' >Civil Status</label>
                                                        <select name='fam-head-civil-status' id='fam-head-civil-status' class='fam-head-civil-status info-inp' selected='selected'>
                                                            <option value='single' <?= $resident['civil_status'] == 'Single' ? ' selected="selected"' : '';?>>Single</option>
                                                            <option value='married' <?= $resident['civil_status'] == 'Married' ? ' selected="selected"' : '';?>>Married</option>
                                                            <option value='divorced' <?= $resident['civil_status'] == 'Divorced' ? ' selected="selected"' : '';?>>Divorced</option>
                                                            <option value='widowed' <?= $resident['civil_status'] == 'Widowed' ? ' selected="selected"' : '';?>>Widowed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row'>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-head-educ-stat'>Educational Status</label>
                                                        <input type='text' name='fam-head-educ-stat' id='fam-head-educ-stat' class='info-inp fam-head-educ-stat' placeholder='Enter Educational Status' value='<?= $resident['educational'] ?>'>
                                                        <p class='error-info fh-es-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-head-occupation'>Occupation</label>
                                                        <input type='text' name='fam-head-occupation' id='fam-head-occupation' class='info-inp fam-head-occupation' placeholder='Enter Occupation' value='<?= $resident['occupation'] ?>'>
                                                        <p class='error-info fh-oc-err'></p>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row'>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-head-contact-num' class='req'>Contact number</label>
                                                        <input type='text' name='fam-head-contact-num' id='fam-head-contact-num' class='info-inp fam-head-contact-num' placeholder='Enter Contact Number' value='<?= $resident['contact_number'] ?>'>
                                                        <p class='error-info fh-cn-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-head-email'>Email</label>
                                                        <input type='fam-head-email' name='fam-head-email' id='fam-head-email' class='info-inp email' placeholder='Enter Email' value='<?= $resident['email'] ?>'>
                                                        <p class='error-info fh-em-err'></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='f-col'>
                                            <div class='f-col aside'>
                                                <div class='f-col other-info-wrapper'>
                                                    <div class='inp-row f-row'>
                                                        <div class='inp-group f-col'>
                                                            <label for='fam-head-purok' class='req'>Purok</label>
                                                            <select class='info-inp' name='fam-head-purok' id='fam-head-purok' selected='selected'>
                                                                
                                                            <?php for ($i = 1; $i <= 7; $i++) { ?>
                                                                <option value='Purok <?= $i ?>' <?= $resident['purok'] == "Purok $i" ? ' selected="selected"' : '';?>>Purok <?= $i ?></option>
                                                            <?php } ?>

                                                            </select>
                                                            <p class='error-info fh-ad-err'></p>
                                                        </div>
                                                    </div>
                                                    <div class='inp-row f-row'>
                                                        <div class='inp-group f-col'>
                                                            <label for='fam-head-address' class='req'>Address</label>
                                                            <input type='text' name='fam-head-address' id='fam-head-address' class='info-inp fam-head-address' placeholder='Enter Address' value='<?= $resident['address'] ?>'>
                                                            <p class='error-info fh-ad-err'></p>
                                                        </div>
                                                    </div>
                                                    <div class='inp-row f-row'>
                                                        <div class='inp-group f-col'>
                                                            <label for='fam-head-fam-plan-method'>Family Planning Method</label>
                                                            <input type='text' name='fam-head-fam-plan-method' id='fam-head-fam-plan-method' class='info-inp fam-head-fam-plan-method' placeholder='Enter Family plan method' value='<?= $resident['family_planning_method'] ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row sbm-btn-wrapper'>
                                                    <div class='f-col'>
                                                        <button id='fam-head-submit'>Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>

                        <!-- FAMILY MEMBER UPDATE FORM -->
                        <?php } else if ($role == 'Family Member') { ?>

                            <form action='' method='post' id='fam-member-form'>
                                <section class='f-col fam-member-page'>
                                    <div class='f-row info-wrapper'>
                                        <div class='f-col'>
                                            <div class='f-col personal-info-wrapper'>
                                                <div class='inp-row f-row name-wrapper'>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-lastname' class='req'>Lastname</label>
                                                        <input type='text' name='fam-member-lastname' id='fam-member-lastname' class='info-inp fam-member-lastname' placeholder='Enter Lastname' data-input='Lastname' value='<?= $resident['last_name'] ?>'>
                                                        <p class='error-info fm-ln-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-firstname' class='req'>Firstname</label>
                                                        <input type='text' name='fam-member-firstname' id='fam-member-firstname' class='info-inp fam-member-firstname' placeholder='Enter Firstname' data-input='Firstname' value='<?= $resident['first_name'] ?>'>
                                                        <p class='error-info fm-fn-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-middlename'>Middlename</label>
                                                        <input type='text' name='fam-member-middlename' id='fam-member-middlename' class='info-inp fam-member-middlename' placeholder='Enter Middlename' data-input='Middlename' value='<?= $resident['middle_name'] ?>'>
                                                        <p class='error-info fm-mn-err'></p>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row'>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-sex'>Sex</label>
                                                        <select name='fam-member-sex' id='fam-member-sex' class='fam-member-sex info-inp'>
                                                            <option value='Male'>Male</option>
                                                            <option value='Female'>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-fam-head'>Family Head Code</label>
                                                        <input type='text' name='fam-member-fam-head' id='fam-member-fam-head' class='info-inp fam-member-fam-head' placeholder='Enter Family Head Code' value='<?= $resident['bu_fam_head_id'] ?>'>
                                                        <p class='error-info fm-mn-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-relationship'>Relationship</label>
                                                        <input type='text' name='fam-member-relationship' id='fam-member-relationship' class='info-inp fam-member-relationship' placeholder='Enter Relationship' value='<?= $resident['relationship'] ?>'>
                                                        <p class='error-info fm-mn-err'></p>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row'>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-birthdate' class='req'>Birthdate</label>
                                                        <input type='date' name='fam-member-birthdate' id='fam-member-birthdate' class='info-inp fam-member-birthdate' value='<?= $resident['birthdate'] ?>'>
                                                        <p class='error-info fm-bd-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-pob'>Place of Birth</label>
                                                        <input type='text' name='fam-member-pob' id='fam-member-pob' class='info-inp fam-member-pob' placeholder='Enter Place of Birth' value='<?= $resident['place_of_birth'] ?>'>
                                                        <p class='error-info fm-mn-err'></p>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row'>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-inschool'>In School</label>
                                                        <select name='fam-member-inschool' id='fam-member-inschool' class='fam-member-inschool info-inp' value='<?= $resident['in_school'] ?>'>
                                                            <option value='Out of School'>Out of School</option>
                                                            <option value='Public'>Public</option>
                                                            <option value='Private'>Private</option>
                                                        </select>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-occupation'>Occupation</label>
                                                        <input type='text' name='fam-member-occupation' id='fam-member-occupation' class='info-inp fam-member-occupation' placeholder='Enter Occupation' value='<?= $resident['occupation'] ?>'>
                                                        <p class='error-info fm-oc-err'></p>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row'>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-email'>Email</label>
                                                        <input type='fam-member-email' name='fam-member-email' id='fam-member-email' class='info-inp email' placeholder='Enter Email' value='<?= $resident['email'] ?>'>
                                                        <p class='error-info fm-em-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='fam-member-med-hist' class='req'>Medical History</label>
                                                        <input type='text' name='fam-member-med-hist' id='fam-member-med-hist' class='info-inp fam-member-med-hist' placeholder='Enter Medical History' value='<?= $resident['medical_history'] ?>'>
                                                        <p class='error-info fm-cn-err'></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='f-col'>
                                            <div class='f-col aside'>
                                                <div class='f-col other-info-wrapper'>
                                                    <div class='inp-row f-row'>
                                                        <div class='inp-group f-col'>
                                                            <label for='fam-member-purok' class='req'>Purok</label>
                                                            <select class='info-inp' name='fam-member-purok' id='fam-member-purok' selected='selected'>
                                                            
                                                            <?php for ($i = 1; $i <= 7; $i++) { ?>
                                                                <option value='Purok <?= $i ?>' <?= $resident['purok'] == "Purok $i" ? ' selected="selected"' : '';?>>Purok <?= $i ?></option>
                                                            <?php } ?>
                                                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class='inp-row f-row'>
                                                        <div class='inp-group f-col'>
                                                            <label for='fam-member-address' class='req'>Address</label>
                                                            <input type='text' name='fam-member-address' id='fam-member-address' class='info-inp fam-member-address' placeholder='Enter Address' value='<?= $resident['address'] ?>'>
                                                            <p class='error-info fm-ad-err'></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row sbm-btn-wrapper'>
                                                    <div class='f-col'>
                                                        <button id='fam-member-submit'>Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>

                        <!-- SPOUSE UPDATE FORM -->
                        <?php } else if ($role == 'Spouse') { ?>
                            <form action='' method='post' id='spouse-form'>
                                <section class='f-col spouse-page'>
                                    <div class='f-row info-wrapper'>
                                        <div class='f-col'>
                                            <div class='f-col personal-info-wrapper'>
                                                <div class='inp-row f-row name-wrapper'>
                                                    <div class='inp-group f-col'>
                                                        <label for='spouse-lastname' class='req'>Lastname</label>
                                                        <input type='text' name='spouse-lastname' id='spouse-lastname' class='info-inp spouse-lastname' placeholder='Enter Lastname' data-input='Lastname' value='<?= $resident['last_name'] ?>'>
                                                        <p class='error-info fm-ln-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='spouse-firstname' class='req'>Firstname</label>
                                                        <input type='text' name='spouse-firstname' id='spouse-firstname' class='info-inp spouse-firstname' placeholder='Enter Firstname' data-input='Firstname' value='<?= $resident['first_name'] ?>'>
                                                        <p class='error-info fm-fn-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='spouse-middlename'>Middlename</label>
                                                        <input type='text' name='spouse-middlename' id='spouse-middlename' class='info-inp spouse-middlename' placeholder='Enter Middlename' data-input='Middlename' value='<?= $resident['middle_name'] ?>'>
                                                        <p class='error-info fm-mn-err'></p>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row'>
                                                    <div class='inp-group f-col'>
                                                        <label for='spouse-fam-head'>Family Head Code</label>
                                                        <input type='text' name='spouse-fam-head' id='spouse-fam-head' class='info-inp spouse-fam-head' placeholder='Enter Family Head Code' value='<?= $resident['bu_fam_head_id'] ?>'>
                                                        <p class='error-info fm-mn-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='spouse-civil-status' class='req'>Civil Status</label>
                                                        <select name='spouse-civil-status' id='spouse-civil-status' class='spouse-civil-status info-inp' selected='selected'>
                                                            <option value='single' <?= $resident['civil_status'] == 'Single' ? ' selected="selected"' : '';?>>Single</option>
                                                            <option value='married' <?= $resident['civil_status'] == 'Married' ? ' selected="selected"' : '';?>>Married</option>
                                                            <option value='divorced' <?= $resident['civil_status'] == 'Divorced' ? ' selected="selected"' : '';?>>Divorced</option>
                                                            <option value='widowed' <?= $resident['civil_status'] == 'Widowed' ? ' selected="selected"' : '';?>>Widowed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row'>
                                                    <div class='inp-group f-col'>
                                                        <label for='spouse-birthdate' class='req'>Birthdate</label>
                                                        <input type='date' name='spouse-birthdate' id='spouse-birthdate' class='info-inp spouse-birthdate' value='<?= $resident['birthdate'] ?>'>
                                                        <p class='error-info fm-bd-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='spouse-educ-stat'>Educational Status</label>
                                                        <input type='text' name='spouse-educ-stat' id='spouse-educ-stat' class='info-inp spouse-educ-stat' placeholder='Enter Educational Status' value='<?= $resident['educational'] ?>'>
                                                        <p class='error-info fh-es-err'></p>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row'>
                                                    <div class='inp-group f-col'>
                                                        <label for='spouse-email'>Email</label>
                                                        <input type='spouse-email' name='spouse-email' id='spouse-email' class='info-inp email' placeholder='Enter Email' value='<?= $resident['email'] ?>'>
                                                        <p class='error-info fm-em-err'></p>
                                                    </div>
                                                    <div class='inp-group f-col'>
                                                        <label for='spouse-occupation'>Occupation</label>
                                                        <input type='text' name='spouse-occupation' id='spouse-occupation' class='info-inp spouse-occupation' placeholder='Enter Occupation' value='<?= $resident['occupation'] ?>'>
                                                        <p class='error-info fm-oc-err'></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='f-col'>
                                            <div class='f-col aside'>
                                                <div class='f-col other-info-wrapper'>
                                                    <div class='inp-row f-row'>
                                                        <div class='inp-group f-col'>
                                                            <label for='spouse-purok' class='req'>Purok</label>
                                                            <select class='info-inp' name='spouse-purok' id='spouse-purok' selected='selected'>
                                                            
                                                            <?php for ($i = 1; $i <= 7; $i++) { ?>
                                                                <option value='Purok <?= $i ?>' <?= $resident['purok'] == "Purok $i" ? ' selected="selected"' : '';?>>Purok <?= $i ?></option>
                                                            <?php } ?>
                                                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class='inp-row f-row'>
                                                        <div class='inp-group f-col'>
                                                            <label for='spouse-address' class='req'>Address</label>
                                                            <input type='text' name='spouse-address' id='spouse-address' class='info-inp spouse-address' placeholder='Enter Address' value='<?= $resident['address'] ?>'>
                                                            <p class='error-info fm-ad-err'></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='inp-row f-row sbm-btn-wrapper'>
                                                    <div class='f-col'>
                                                        <button id='spouse-submit'>Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>

                        <?php } ?>

                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('partial.side-menu'); ?>></script>
    <script type='module' src=<?=  getScript('admin.update-residence'); ?>></script>
</body>
</html>