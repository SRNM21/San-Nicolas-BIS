<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>New Staff Account</title>
    <link rel='stylesheet' href=<?= getStyle('admin.new-staff-acc'); ?>>
</head>
<body>
    <div class='f-col new-staff-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row new-staff-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-center f-col new-staff-acc-content'>
                <div class='f-col new-staff-acc-form-wrapper'> 
                    <header class='f-row form-header'>
                        <div class='f-center f-row'>
                            <div class='f-row back-btn-wrapper'>
                                <a href='<?= $origin ?>staff-accounts' class='back-btn'><?= getSVG('back'); ?></a>
                            </div>
                            <h4>New Staff Account</h4>
                        </div>
                        <p><?= date('Y') ?></p>
                    </header>
                    <form id='new-staff-acc-from' action='' method='post'>
                        <div class='f-col form-content-wrapper'>
                            <section class='f-col personal-info-container active'>
                                <h2>Personal Information</h2>
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
                                <div class='f-col'>
                                    <label class='no-form-label req' for='email'>Email</label>
                                    <input class='no-form-input' type='text' name='email' id='email' placeholder='Enter Email'>
                                    <p class='error-info em-err'></p>
                                </div>
                                <div class='f-row btn-wrapper'>
                                    <p>1/2</p>
                                    <button class='util-btn next-btn'>Next</button>
                                </div>
                            </section>

                            <section class='f-col account-info-container'>
                                <h2>Account Information</h2>
                                <div class='f-col'>
                                    <label class='no-form-label req' for='username'>Username</label>
                                    <input class='no-form-input' type='text' data-input='Username' name='username' id='username' placeholder='Enter Username'>
                                    <p class='error-info un-err'></p>
                                </div>
                                <div class='f-col'>
                                    <label class='no-form-label req' for='password'>Password</label>
                                    <input class='no-form-input' type='password' data-input='Password' name='password' id='password' placeholder='Enter Password'>
                                </div>
                                <div class='f-col'>
                                    <label class='no-form-label req' for='conf-password'>Confirm Password</label>
                                    <input class='no-form-input' type='password' data-input='Confirm Password' name='conf-password' id='conf-password' placeholder='Enter Confirm Password'>
                                    <p class='error-info cps-err'></p>
                                </div>
                                <div class='f-col'>
                                    <div class='f-center f-row toggle-pass-wrapper'>
                                        <input type='checkbox' name='toggle-pass' id='toggle-pass' class='toggle-pass'>
                                        <p class='toggle-pass-hint'>Show password</p>
                                    </div>    
                                </div>
                                <div class='f-col'>
                                    <p>Your Password must:</p> 
                                    <p class='pass-req'>Be at least 8 characters</p>
                                    <p class='pass-req'>Include at least one lowercase letter</p>
                                    <p class='pass-req'>Include at least one uppercase letter</p>
                                    <p class='pass-req'>Include at least one number</p>
                                    <p class='pass-req'>Include at least one symbol</p>
                                </div>
                                <div class='f-row btn-wrapper'>
                                    <p>2/2</p>
                                    <div class='f-row'>
                                        <button class='util-btn staff-acc-back-btn'>Back</button>
                                        <button class='util-btn submit-new-staff-acc-btn'>Submit</button>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    
    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('partial.side-menu'); ?>></script>
    <script type='module' src=<?=  getScript('admin.new-staff-acc'); ?>></script>
</body>
</html>