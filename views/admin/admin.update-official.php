<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Update Official</title>
    <link rel='icon' type='image/x-icon' href=<?= getLogo(); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.new-official'); ?>>
</head>
<body>
    <div class='f-col brgy-off-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row brgy-off-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-center f-col new-off-content'>
                <div class='f-col new-official-form-wrapper'> 
                    <header class='f-row form-header'>
                        <div class='f-center f-row'>
                            <div class='f-row back-btn-wrapper'>
                                <a href='<?= $origin ?>barangay-officials' class='back-btn'><?= getSVG('back'); ?></a>
                            </div>
                            <h3>Update Official Form | <?= $fullname ?></h3>
                        </div>
                        <p><?= date('Y') ?></p>
                    </header>
                    <form id='new-off-form' action='' method='POST' enctype='multipart/form-data'>
                        <div class='f-row form-content-wrapper'>
                            <div class='f-col personal-info-container'>
                                <h2>Personal Information</h2>
                                <div class='f-row name-wrapper'>
                                    <div class='f-col'>
                                        <label class='no-form-label req' for='lastname'>Lastname</label>
                                        <input class='no-form-input' type='text' data-input='Lastname' name='lastname' id='lastname' placeholder='Enter Lastname' value='<?= $lastname ?>'>
                                        <p class='error-info ln-err'></p>
                                    </div>
                                    <div class='f-col'>
                                        <label class='no-form-label req' for='firstname'>Firstname</label>
                                        <input class='no-form-input' type='text' data-input='Firstname' name='firstname' id='firstname' placeholder='Enter Firstname' value='<?= $firstname ?>'>
                                        <p class='error-info fn-err'></p>
                                    </div>
                                    <div class='f-col'>         
                                        <label class='no-form-label' for='middlename'>Middlename</label>
                                        <input class='no-form-input' type='text' data-input='Middlename' name='middlename' id='middlename' placeholder='Enter Middlename' value='<?= $middlename ?>'>
                                        <p class='error-info mn-err'></p>
                                    </div>
                                </div>
                                <div class='f-row'>
                                    <div class='f-col'>
                                        <label class='no-form-label req' for='phonenum'>Phone number</label>
                                        <input class='no-form-input'  type='tel' name='phonenum' id='phonenum' placeholder='Enter Phone number' value='<?= $phone_num ?>'>
                                        <p class='error-info pn-err'></p>
                                    </div>
                                    <div class='f-col'>
                                        <label class='no-form-label req' for='gender'>Gender</label>
                                        <select class='no-form-input' name='gender' id='gender' selected='selected'>
                                            <option value='Male'<?= $gender == 'Male' ? ' selected="selected"' : '' ?>>Male</option>
                                            <option value='Female'<?= $gender == 'Female' ? ' selected="selected"' : '' ?>>Female</option>
                                        </select>
                                        <p class='error-info gen-err'></p>
                                    </div>
                                </div>
                                <div class='f-col'>
                                    <label class='no-form-label req' for='email'>Email</label>
                                    <input class='no-form-input'  type='text' name='email' id='email' placeholder='Enter Email' value='<?= $email ?>'>
                                        <p class='error-info em-err'></p>
                                </div>
                                <div class='f-col'>
                                    <label class='no-form-label' for='email'>Profile</label>
                                    <input class='no-form-input' type='file' name='profile' id='profile' value='' />
                                        <p class='error-info pro-err'></p>
                                </div>
                            </div>
                            <div class='f-col barangay-position-container'>
                                <h2>Barangay Position</h2>
                                <div class='f-col'>
                                    <label class='no-form-label req' for='position'>Position</label>
                                    <select class='no-form-input' name='position' id='position' selected='selected'>
                                    
                                    <?php foreach ($position_choices as $pos) { ?>

                                        <option value='<?= $pos ?>'><?= $pos ?></option>

                                    <?php } ?>

                                    </select>
                                    <p class='error-info pos-err'></p>
                                </div>
                                <div class='f-col'>
                                    <label class='no-form-label' for='comittee'>Comittee Title</label>
                                    <select class='no-form-input' name='comittee' id='comittee'>

                                    <?php foreach ($comittee_title as $com) { ?>

                                        <option value='<?= $com ?>'<?= $comittee == $com ? ' selected="selected"' : '' ?>><?= $com ?></option>

                                    <?php } ?>

                                    </select>
                                    <p class='error-info com-err'></p>
                                </div>
                                <div class='f-col'>
                                    <label class='no-form-label req' for='status' selected='selected'>Status</label>
                                    <select class='no-form-input' name='status' id='status'>
                                        <option value='Active' <?= $status == 'Active' ? ' selected="selected"' : '';?>>Active</option>
                                        <option value='Dismissed' <?= $status == 'Dismissed' ? ' selected="selected"' : '';?>>Dismissed</option>
                                    </select>
                                    <p class='error-info sta-err'></p>
                                </div>
                                <div class='f-col submit-btn-wrapper'>
                                    <button class='submit-new-official-btn'>Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    
    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin.update-official'); ?>></script>
</body>
</html>