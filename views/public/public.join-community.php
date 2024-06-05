<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Join Community</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('join-community'); ?>>
</head>
<body>
    <main class='f-center join-community-content-wrapper'>
        <div class='f-col form-modal'>
            <header class='f-row'>
                <div class='f-row brgy-info-wrapper'>
                    <div class='logo'>
                        <img src='<?= getImage('logo_sn.jpg') ?>' alt="">
                    </div>
                    <div class='f-col'>
                        <h2>Barangay San Nicolas</h2>
                        <p>Pasig City, Metro Manila, Philippines</p>
                    </div>
                </div>
            </header>
            
            <!-- SELECTION FORM -->

            <div class='form-wrapper'>
                <?php if ($form == 0) { ?>
                    <form action='' method='post' class='f-col'>
                        <section class='f-col selection-page'>
                            <div class='f-col role-selection-wrapper'>
                                <div class='f-row menu-wrapper'>
                                    <a href='/sannicolasbis/community' draggable='false' class='f-center f-row back-btn scale-anim'><?= getSVG('back') ?>Back</a>
                                </div>
                                <label for='role'>Register in Community as</label>
                                <select name='role' id='role-selection' class='role-selection info-inp'>
                                    <option value='family-head'>Family Head</option>
                                    <option value='family-member'>Family Member</option>
                                    <option value='spouse'>Spouse</option>
                                </select>
                            </div>
                            <div class='btn-wrapper f-row'>
                                <a href='join-community?role=family-head' draggable='false' id='select-link' class='scale-anim'>Next</a>
                            </div>
                        </section>
                    </form>
                <?php } ?>

                <!-- FAMILY HEAD REGISTRAION FORM -->
      
                <?php if ($form == 1) { ?>

                    <form action='' method='post' id='fam-head-form'>
                        <section class='f-col fam-head-page'>
                            <div class='f-col menu-wrapper'>
                                <a href='join-community' draggable='false' class='f-center f-row back-btn scale-anim'><?= getSVG('back') ?>Back</a>
                                <h3>Register as Family Head</h3>
                            </div>
                            <div class='f-row info-wrapper'>
                                <div class='f-col'>
                                    <div class='f-col personal-info-wrapper'>
                                        <div class='inp-row f-row name-wrapper'>
                                            <div class='inp-group f-col'>
                                                <label for='fam-head-lastname' class='req'>Lastname</label>
                                                <input type='text' name='fam-head-lastname' id='fam-head-lastname' class='info-inp fam-head-lastname' placeholder='Enter Lastname' data-input='Lastname'>
                                                <p class='error-info fh-ln-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-head-firstname' class='req'>Firstname</label>
                                                <input type='text' name='fam-head-firstname' id='fam-head-firstname' class='info-inp fam-head-firstname' placeholder='Enter Firstname' data-input='Firstname'>
                                                <p class='error-info fh-fn-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-head-middlename'>Middlename</label>
                                                <input type='text' name='fam-head-middlename' id='fam-head-middlename' class='info-inp fam-head-middlename' placeholder='Enter Middlename' data-input='Middlename'>
                                                <p class='error-info fh-mn-err'></p>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row'>
                                            <div class='inp-group f-col'>
                                                <label for='fam-head-birthdate' class='req'>Birthdate</label>
                                                <input type='date' name='fam-head-birthdate' id='fam-head-birthdate' class='info-inp fam-head-birthdate' data-input='FamBDY'>
                                                <p class='error-info fh-bd-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-head-civil-status' class='req'>Civil Status</label>
                                                <select name='fam-head-civil-status' id='fam-head-civil-status' class='fam-head-civil-status info-inp'>
                                                    <option value='' disabled selected>Select Choices</option>
                                                    <option value='Single'>Single</option>
                                                    <option value='Married'>Married</option>
                                                    <option value='Widowed'>Widowed</option>
                                                </select>
                                                <p class='error-info fh-cs-err'></p>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row'>
                                            <div class='inp-group f-col'>
                                                <label for='fam-head-educ-stat' class='req'>Educational Status</label>
                                                <select name='fam-head-educ-stat' id='fam-head-educ-stat' class='fam-head-educ-stat info-inp'>
                                                    <option value='' disabled selected>Select Choices</option>
                                                    <option value='Elementary'>Elementary</option>
                                                    <option value='High School'>High School</option>
                                                    <option value='College'>College</option>
                                                </select>
                                                <p class='error-info fh-es-err'></p>
                                            </div>
                                            
                                            <div class='inp-group f-col'>
                                                <label for='fam-head-occupation'>Occupation</label>
                                                <input type='text' name='fam-head-occupation' id='fam-head-occupation' class='info-inp fam-head-occupation' placeholder='Enter Occupation'>
                                                <p class='error-info fh-oc-err'></p>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row'>
                                            <div class='inp-group f-col'>
                                                <label for='fam-head-contact-num' class='req'>Contact number</label>
                                                <input type='text' name='fam-head-contact-num' id='fam-head-contact-num' class='info-inp fam-head-contact-num' placeholder='Enter Contact Number'>
                                                <p class='error-info fh-cn-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-head-email' class='req'>Email</label>
                                                <input type='fam-head-email' name='fam-head-email' id='fam-head-email' class='info-inp fam-head-email' placeholder='Enter Email'>
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
                                                    <select class='info-inp' name='fam-head-purok' id='fam-head-purok'>
                                                        <option value='' disabled selected>Select Choices</option>
                                                   
                                                    <?php for ($i = 1; $i <= 7; $i++) { ?>
                                                        <option value='Purok <?= $i ?>'>Purok <?= $i ?></option>
                                                    <?php } ?>

                                                    </select>
                                                    <p class='error-info fh-pk-err'></p>
                                                </div>
                                            </div>
                                            <div class='inp-row f-row'>
                                                <div class='inp-group f-col'>
                                                    <label for='fam-head-address' class='req'>Address</label>
                                                    <input type='text' name='fam-head-address' id='fam-head-address' class='info-inp fam-head-address' placeholder='Enter Address'>
                                                    <p class='error-info fh-ad-err'></p>
                                                </div>
                                            </div>
                                            <div class='inp-row f-row'>
                                                <div class='inp-group f-col'>
                                                    <label for='fam-head-fam-plan-method'>Family Planning Method</label>
                                                    <input type='text' name='fam-head-fam-plan-method' id='fam-head-fam-plan-method' class='info-inp fam-head-fam-plan-method' placeholder='Enter Family plan method'>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row sbm-btn-wrapper'>
                                            <div class='f-col'>
                                                <button id='fam-head-submit' class='scale-anim'>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>

                <!-- FAMILY MEMBER REGISTRAION FORM -->

                <?php } else if ($form == 2) { ?> 

                    <form action='' method='post' id='fam-member-form'>
                        <section class='f-col fam-member-page'>
                            <div class='f-col menu-wrapper'>
                                <a href='join-community' draggable='false' class='f-center f-row back-btn scale-anim'><?= getSVG('back') ?>Back</a>
                                <h3>Register as Family Member</h3>
                            </div>
                            <div class='f-row info-wrapper'>
                                <div class='f-col'>
                                    <div class='f-col personal-info-wrapper'>
                                        <div class='inp-row f-row name-wrapper'>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-lastname' class='req'>Lastname</label>
                                                <input type='text' name='fam-member-lastname' id='fam-member-lastname' class='info-inp fam-member-lastname' placeholder='Enter Lastname' data-input='Lastname'>
                                                <p class='error-info fm-ln-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-firstname' class='req'>Firstname</label>
                                                <input type='text' name='fam-member-firstname' id='fam-member-firstname' class='info-inp fam-member-firstname' placeholder='Enter Firstname' data-input='Firstname'>
                                                <p class='error-info fm-fn-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-middlename'>Middlename</label>
                                                <input type='text' name='fam-member-middlename' id='fam-member-middlename' class='info-inp fam-member-middlename' placeholder='Enter Middlename' data-input='Middlename'>
                                                <p class='error-info fm-mn-err'></p>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row'>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-sex' class='req'>Sex</label>
                                                <select name='fam-member-sex' id='fam-member-sex' class='fam-member-sex info-inp'>
                                                    <option value='' disabled selected>Select Choices</option>
                                                    <option value='Male'>Male</option>
                                                    <option value='Female'>Female</option>
                                                </select>
                                                <p class='error-info fm-sx-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-fam-head'>Family Head Code</label>
                                                <input type='text' name='fam-member-fam-head' id='fam-member-fam-head' class='info-inp fam-member-fam-head' placeholder='Enter Family Head Code'>
                                                <p class='error-info fm-hc-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-relationship'>Relationship</label>
                                                <input type='text' name='fam-member-relationship' id='fam-member-relationship' class='info-inp fam-member-relationship' placeholder='Enter Relationship'>
                                                <p class='error-info fm-rs-err'></p>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row'>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-birthdate' class='req'>Birthdate</label>
                                                <input type='date' name='fam-member-birthdate' id='fam-member-birthdate' class='info-inp fam-member-birthdate'  data-input='Birthday'>
                                                <p class='error-info fm-bd-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-pob' class='req'>Place of Birth</label>
                                                <input type='text' name='fam-member-pob' id='fam-member-pob' class='info-inp fam-member-pob' placeholder='Enter Place of Birth'>
                                                <p class='error-info fm-pb-err'></p>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row'>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-inschool' class='req'>In School</label>
                                                <select name='fam-member-inschool' id='fam-member-inschool' class='fam-member-inschool info-inp'>
                                                    <option value='' disabled selected>Select Choices</option>
                                                    <option value='Out of School'>Out of School</option>
                                                    <option value='Public'>Public</option>
                                                    <option value='Private'>Private</option>
                                                </select>
                                                <p class='error-info fm-is-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-occupation'>Occupation</label>
                                                <input type='text' name='fam-member-occupation' id='fam-member-occupation' class='info-inp fam-member-occupation' placeholder='Enter Occupation'>
                                                <p class='error-info fm-oc-err'></p>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row'>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-email' class='req'>Email</label>
                                                <input type='fam-member-email' name='fam-member-email' id='fam-member-email' class='info-inp fam-member-email' placeholder='Enter Email'>
                                                <p class='error-info fm-em-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='fam-member-med-hist' class='req'>Medical History</label>
                                                <input type='text' name='fam-member-med-hist' id='fam-member-med-hist' class='info-inp fam-member-med-hist' placeholder='Enter Medical History'>
                                                <p class='error-info fm-mh-err'></p>
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
                                                    <select class='info-inp' name='fam-member-purok' id='fam-member-purok'>
                                                        <option value='' disabled selected>Select Choices</option>
                                                    
                                                    <?php for ($i = 1; $i <= 7; $i++) { ?>
                                                        <option value='Purok <?= $i ?>'>Purok <?= $i ?></option>
                                                    <?php } ?>
                                                    
                                                    </select>
                                                    <p class='error-info fm-pk-err'></p>
                                                </div>
                                            </div>
                                            <div class='inp-row f-row'>
                                                <div class='inp-group f-col'>
                                                    <label for='fam-member-address' class='req'>Address</label>
                                                    <input type='text' name='fam-member-address' id='fam-member-address' class='info-inp fam-member-address' placeholder='Enter Address'>
                                                    <p class='error-info fm-ad-err'></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row sbm-btn-wrapper'>
                                            <div class='f-col'>
                                                <button id='fam-member-submit' class='scale-anim'>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>

                <!-- SPOUSE REGISTRAION FORM -->
                <?php } else if ($form == 3) { ?> 

                    <form action='' method='post' id='spouse-form'>
                        <section class='f-col spouse-page'>
                            <div class='f-col menu-wrapper'>
                                <a href='join-community'  draggable='false' class='f-center f-row back-btn scale-anim'><?= getSVG('back') ?>Back</a>
                                <h3>Register as Spouse</h3>
                            </div>
                            <div class='f-row info-wrapper'>
                                <div class='f-col'>
                                    <div class='f-col personal-info-wrapper'>
                                        <div class='inp-row f-row name-wrapper'>
                                            <div class='inp-group f-col'>
                                                <label for='spouse-lastname' class='req'>Lastname</label>
                                                <input type='text' name='spouse-lastname' id='spouse-lastname' class='info-inp spouse-lastname' placeholder='Enter Lastname' data-input='Lastname'>
                                                <p class='error-info sp-ln-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='spouse-firstname' class='req'>Firstname</label>
                                                <input type='text' name='spouse-firstname' id='spouse-firstname' class='info-inp spouse-firstname' placeholder='Enter Firstname' data-input='Firstname'>
                                                <p class='error-info sp-fn-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='spouse-middlename'>Middlename</label>
                                                <input type='text' name='spouse-middlename' id='spouse-middlename' class='info-inp spouse-middlename' placeholder='Enter Middlename' data-input='Middlename'>
                                                <p class='error-info sp-mn-err'></p>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row'>
                                            <div class='inp-group f-col'>
                                                <label for='spouse-fam-head'>Family Head Code</label>
                                                <input type='text' name='spouse-fam-head' id='spouse-fam-head' class='info-inp spouse-fam-head' placeholder='Enter Family Head Code'>
                                                <p class='error-info sp-fc-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='spouse-civil-status' class='req'>Civil Status</label>
                                                <select name='spouse-civil-status' id='spouse-civil-status' class='spouse-civil-status info-inp'>
                                                    <option value='' disabled selected>Select Choices</option>
                                                    <option value='single'>Single</option>
                                                    <option value='married'>Married</option>
                                                    <option value='widowed'>Widowed</option>
                                                </select>
                                                <p class='error-info sp-cs-err'></p>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row'>
                                            <div class='inp-group f-col'>
                                                <label for='spouse-birthdate' class='req'>Birthdate</label>
                                                <input type='date' name='spouse-birthdate' id='spouse-birthdate' class='info-inp spouse-birthdate' data-input='Birthday'>
                                                <p class='error-info sp-bd-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='spouse-educ-stat' class='req'>Educational Status</label>
                                                <select name='spouse-educ-stat' id='spouse-educ-stat' class='spouse-educ-stat info-inp'>
                                                    <option value='' disabled selected>Select Choices</option>
                                                    <option value='Elementary'>Elementary</option>
                                                    <option value='High School'>High School</option>
                                                    <option value='College'>College</option>
                                                </select>
                                                <p class='error-info sp-es-err'></p>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row'>
                                            <div class='inp-group f-col'>
                                                <label for='spouse-email' class='req'>Email</label>
                                                <input type='spouse-email' name='spouse-email' id='spouse-email' class='info-inp spouse-email' placeholder='Enter Email'>
                                                <p class='error-info sp-em-err'></p>
                                            </div>
                                            <div class='inp-group f-col'>
                                                <label for='spouse-occupation'>Occupation</label>
                                                <input type='text' name='spouse-occupation' id='spouse-occupation' class='info-inp spouse-occupation' placeholder='Enter Occupation'>
                                                <p class='error-info sp-oc-err'></p>
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
                                                    <select class='info-inp' name='spouse-purok' id='spouse-purok'>
                                                        <option value='' disabled selected>Select Choices</option>
                                                    
                                                    <?php for ($i = 1; $i <= 7; $i++) { ?>
                                                        
                                                        <option value='Purok <?= $i ?>'>Purok <?= $i ?></option>
                                                    
                                                    <?php } ?>
                                                    
                                                    </select>
                                                    <p class='error-info sp-pk-err'></p>
                                                </div>
                                            </div>
                                            <div class='inp-row f-row'>
                                                <div class='inp-group f-col'>
                                                    <label for='spouse-address' class='req'>Address</label>
                                                    <input type='text' name='spouse-address' id='spouse-address' class='info-inp spouse-address' placeholder='Enter Address'>
                                                    <p class='error-info sp-ad-err'></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='inp-row f-row sbm-btn-wrapper'>
                                            <div class='f-col'>
                                                <button id='spouse-submit' class='scale-anim'>Submit</button>
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
    
    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('join-community'); ?>></script>
</body>
</html>