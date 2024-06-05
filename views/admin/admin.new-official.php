<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>New Official</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
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
                            <h4>New Official Form</h4>
                        </div>
                        <p><?= date('Y') ?></p>
                    </header>
                    <form id='new-off-from' action='' method='POST' enctype='multipart/form-data'>
                        <div class='f-row form-content-wrapper'>
                            <div class='f-col personal-info-container'>
                                <h2>Personal Information</h2>
                                <div class='f-row name-wrapper'>
                                    <div class='f-col'>
                                        <label class='no-form-label req' for='lastname'>Lastname</label>
                                        <input class='no-form-input' type='text' data-input='Lastname' name='lastname' id='lastname' placeholder='Enter Lastname'>
                                        <p class='error-info ln-err'></p>
                                    </div>
                                    <div class='f-col'>
                                        <label class='no-form-label req' for='firstname'>Firstname</label>
                                        <input class='no-form-input' type='text' data-input='Firstname' name='firstname' id='firstname' placeholder='Enter Firstname'>
                                        <p class='error-info fn-err'></p>
                                    </div>
                                    <div class='f-col'>
                                        <label class='no-form-label' for='middlename'>Middlename</label>
                                        <input class='no-form-input' type='text' data-input='Middlename' name='middlename' id='middlename' placeholder='Enter Middlename'>
                                        <p class='error-info mn-err'></p>
                                    </div>
                                </div>
                                <div class='f-row gndr-row'>
                                    <div class='f-col'>
                                        <label class='no-form-label req' for='phonenum'>Phone number</label>
                                        <input class='no-form-input' type='tel' name='phonenum' id='phonenum' placeholder='Enter Phone number'>
                                        <p class='error-info pn-err'></p>
                                    </div>
                                    <div class='f-col'>
                                        <label class='no-form-label req' for='gender'>Gender</label>
                                        <select class='no-form-input' name='gender' id='gender'>
                                            <option value='' disabled selected>Select Choices</option>
                                            <option value='Male'>Male</option>
                                            <option value='Female'>Female</option>
                                        </select>
                                        <p class='error-info gen-err'></p>
                                    </div>
                                </div>
                                <div class='f-col'>
                                    <label class='no-form-label req' for='email'>Email</label>
                                    <input class='no-form-input'  type='text' name='email' id='email' placeholder='Enter Email'>
                                        <p class='error-info em-err'></p>
                                </div>
                                <div class='f-col'>
                                    <label class='no-form-label req' for='email'>Profile</label>
                                    <input class='no-form-input' type='file' name='profile' id='profile' value='' />
                                        <p class='error-info pro-err'></p>
                                </div>
                            </div>
                            <div class='f-col barangay-position-container'>
                                <h2>Barangay Position</h2>
                                <div class='f-col'>
                                    <label class='no-form-label req' for='position'>Position</label>
                                    <select class='no-form-input' name='position' id='position'>
                                        <option value='' disabled selected>Select Choices</option>
                                        
                                        <?php foreach ($position_choices as $pos) { ?>

                                            <option value='<?= $pos ?>'><?= $pos ?></option>

                                        <?php } ?>

                                    </select>
                                    <p class='error-info pos-err'></p>
                                </div>
                                <div class='f-col'>
                                    <label class='no-form-label' for='comittee'>Comittee Title</label>
                                    <select class='no-form-input' name='comittee' id='comittee'>
                                    <option value='' disabled selected>Select Choices</option>

                                    <?php foreach ($comittee_title as $com) { ?>

                                        <option value='<?= $com ?>'><?= $com ?></option>

                                    <?php } ?>

                                    </select>
                                    <p class='error-info com-err'></p>
                                </div>
                                <div class='f-col submit-btn-wrapper'>
                                    <button class='submit-new-official-btn'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    
    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin.new-official'); ?>></script>
</body>
</html>