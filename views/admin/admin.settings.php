<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel='icon' type='image/x-icon' href=<?= getLogo(); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.settings'); ?>>
</head>
<body>
    <div class='f-col settings-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row settings-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-row settings-content'>
                <div class='f-col choice-panel'>
                    <a href='#system' draggable='false' class='f-center setting-btn scale-anim'><?= getSVG('settings'); ?><p>System Configuration</p></a>
                    <a href='#event' draggable='false' class='f-center setting-btn scale-anim'><?= getSVG('event'); ?><p>Manage Event</p></a>
                    <a href='#hotline' draggable='false' class='f-center setting-btn hotline-setting scale-anim'><?= getSVG('phone'); ?><p>Hotlines</p></a>
                    <a href='#feedback' draggable='false' class='f-center setting-btn scale-anim'><?= getSVG('feedback'); ?><p>Feedback</p></a>

                    <?php if ($_SESSION['PRIVILEGE'] == 'ADMIN') { ?>

                    <a href='#account' draggable='false' class='f-center setting-btn'><?= getSVG('account'); ?><p>Account</p></a>
                    
                    <?php } ?>

                </div>
                <div class='seperator'></div>
                <div class='gen-setting-content'>
                    <section id='event' class='f-col setting-sec event-section'>
                        <div class='f-center f-row header-sec'>
                            <h3>System Configuration</h3>
                            <div class='f-row event-btn-wrapper'>
                                <button class='toggles save-config-btn scale-anim' disabled='true'>Save Changes</button>
                            </div>
                        </div>
                        <main class='f-col system-config-content'>
                            <form action='' method='post' class='f-col system-config-card' enctype='multipart/form-data'>
                                <input type='hidden' name='system-config' value='change'>
                                <div class='f-col sys-group'>
                                    <h4>Logo</h4>
                                    <div class='f-col'>
                                        <div class='logo-preview'>
                                            <img src='<?= getLogo() ?>' alt="">
                                        </div>
                                        <input class='system-config-inp' type='file' name='logo' id='logo' value='' />
                                    </div>
                                </div>
                            </form>
                        </main>
                        <main class='f-col events-content'>
                            <div class='f-col table-limiter'>
                                <div class='f-col events-wrapper'>

                                    <?php foreach($events as $row) { ?>

                                        <div class='event-card'>
                                            <header class='f-row event-header'>
                                                <p><?= formatDate(explode(' ', $row['event_when'])[0]) ?></p>
                                                <a href='?delete-event=<?= $row['event_id'] ?>' class='f-center f-row'><?= getSVG('close'); ?>Remove</a>
                                            </header>
                                            <div class='event-info'>
                                                <div class='event-img-wrapper'>
                                                    <img src='/sannicolasbis/assets/uploads/<?= $row['event_image'] ?>' alt="">
                                                </div>
                                                <div class='f-col'>
                                                    <h3 class='event-title'><?= $row['event_what'] ?></h3>
                                                    <p class='event-details'><?= $row['event_details'] ?></p>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>
                        </main>
                    </section>
                    <hr>
                    <section id='event' class='f-col setting-sec event-section'>
                        <div class='f-center f-row header-sec'>
                            <h3>Manage Event</h3>
                            <div class='f-row event-btn-wrapper'>
                                <button class='toggles show-events-toggle scale-anim'data-text='Event'>Show Events</button>
                                <button class='toggles add-event-btn scale-anim' data-text='Add Event'>Show Add Event</button>
                            </div>
                        </div>
                        <main class='f-col new-events-content'>
                            <form action='' method='post' class='new-event-card' enctype='multipart/form-data'>
                                <header class='event-header'></header>
                                <div class='f-col event-info new-event-info'>
                                    <div class='f-col event-img-wrapper new-event-img-wrapper'>
                                        <label for='event-img'>Enter Image</label>
                                        <input type='file' name='event-img' id='event-img' class='new-inp new-event-img' value=''/>
                                        <p class='error-info img-err'></p>
                                    </div>
                                    <div class='f-row event-detail-row'>
                                        <div class='f-col'>
                                            <label for='what' class='req'>What</label>
                                            <input name='what' id='what' type='text' placeholder='Enter Title' class='new-inp new-event-details'></input>
                                            <p class='error-info wht-err'></p>
                                        </div>
                                        <div class='f-col'>
                                            <label for='date' class='req'>When (Date)</label>
                                            <input name='date' id='date' type='date' class='new-inp new-event-details'></input>
                                            <p class='error-info dtd-err'></p>
                                        </div>
                                        <div class='f-col'>
                                            <label for='time' class='req'>When (Time)</label>
                                            <input name='time' id='time' type='time' class='new-inp new-event-details'></input>
                                            <p class='error-info dtt-err'></p>
                                        </div>
                                    </div>
                                    <div class='f-row event-detail-row'>
                                        <div class='f-col'>
                                            <label for='where' class='req'>Where</label>
                                            <input name='where' id='where' type='text' placeholder='Enter Place' class='new-inp new-event-details'></input>
                                            <p class='error-info whr-err'></p>
                                        </div>
                                        <div class='f-col'>
                                            <label for='who' class='req'>Who</label>
                                            <input name='who' id='who' type='text' placeholder='Enter Attendees' class='new-inp new-event-details'></input>
                                            <p class='error-info wh-err'></p>
                                        </div>
                                    </div>
                                    <div class='f-row event-detail-row'>
                                        <div class='f-col'>
                                            <label for='details' class='req'>Details</label>
                                            <textarea name='details' id='details' type='text' placeholder='Enter Details' class='new-inp new-event-details details-txt-area'></textarea>
                                            <p class='error-info det-err'></p>
                                        </div>
                                    </div>
                                    <button class='sbmt-new-event scale-anim' name='event-sbmt' type='submit'>Add Event</button>
                                </div>
                            </form>
                        </main>
                        <main class='f-col events-content'>
                            <div class='f-col table-limiter'>
                                <div class='f-col events-wrapper'>

                                    <?php foreach($events as $row) { ?>

                                        <div class='event-card'>
                                            <header class='f-row event-header'>
                                                <p><?= formatDate(explode(' ', $row['event_when'])[0]) ?></p>
                                                <a href='?delete-event=<?= $row['event_id'] ?>' class='f-center f-row'><?= getSVG('close'); ?>Remove</a>
                                            </header>
                                            <div class='event-info'>
                                                <div class='event-img-wrapper'>
                                                    <img src='/sannicolasbis/assets/uploads/<?= $row['event_image'] ?>' alt="">
                                                </div>
                                                <div class='f-col'>
                                                    <h3 class='event-title'><?= $row['event_what'] ?></h3>
                                                    <p class='event-details'><?= $row['event_details'] ?></p>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>
                        </main>
                    </section>
                    <hr>
                    <section id='hotline' class='f-col setting-sec hotline-section'>
                        <div class='f-center f-row header-sec'>
                            <h3>Hotlines</h3>
                            <div class='f-row event-btn-wrapper'>
                                <button class='toggles show-hotline-toggle scale-anim' data-text='Hotlines'>Show Hotlines</button>
                                <button class='toggles add-hotline-btn scale-anim' data-text='Add Hotline'>Show Add Hotline</button>
                            </div>
                        </div>
                        <main class='f-col new-hotline-content'>
                            <form action='' method='post' class='new-hotline-card' enctype='multipart/form-data'>
                                <header class='hotline-header'></header>
                                <div class='f-col hotline-wrapper'>
                                    <div class='f-row hotline-detail-row'>
                                        <div class='f-col'>
                                            <label for='h-image'>Hotline Image</label>
                                            <input name='h-image' id='h-image' type='file' class='new-inp new-hotline-details' value=''></input>
                                        </div>
                                        <div class='f-col'>
                                            <label for='h-name' class='req'>Hotline Name</label>
                                            <input name='h-name' id='h-name' type='text' placeholder='Enter Hotline Name' class='new-inp new-hotline-details'></input>
                                            <p class='error-info hna-err'></p>
                                        </div>
                                        <div class='f-col'>
                                            <label for='h-num' class='req'>Hotline Number</label>
                                            <input name='h-num' id='h-num' type='text' placeholder='Enter Hotline Number' class='new-inp new-hotline-details'></input>
                                            <p class='error-info hnu-err'></p>
                                        </div>
                                    </div>
                                    <button class='sbmt-new-hotline scale-anim' name='hotline-sbmt' type='submit'>Add Hotline</button>
                                </div>
                            </form>
                        </main>
                        <main class='f-col hotline-content'>
                            <div class='f-col table-limiter'>
                                <div class='table-wrapper'>
                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Hotline</th>
                                                <th>Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($hotlines as $row) { ?>

                                            <tr>
                                                <td class='hl-img-wrapper'><img src='/sannicolasbis/assets/uploads/<?= $row['hotline_img'] ?>' alt=""></td>
                                                <td><?= $row['hotline_name'] ?></td>
                                                <td><?= $row['hotline_num'] ?></td>
                                                <td>
                                                    <a href="settings?delete-hotline=<?= $row['hotline_id'] ?>" draggable='false' class='data-util-btn red-details-btn'>Delete</a>
                                                </td>
                                            </tr>

                                        <?php 
                                            } 
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </main>
                    </section>  
                    <hr>
                    <section id='feedback' class='f-col setting-sec feedback-section'>
                        <div class='f-center f-row header-sec'>
                            <h3>Feedback</h3>
                            <button class='toggles show-fb-toggle scale-anim' data-text='Feedback'>Show Feedback</button>
                        </div>
                        <main class='f-col fb-content'>
                            <div class='f-col table-limiter'>
                                <div class='table-wrapper'>
                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Feedback</th>
                                                <th>Date and Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($fb as $row) { ?>

                                            <tr>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['feedback'] ?></td>
                                                <td><?= $row['date_and_time'] ?></td>
                                            </tr>

                                        <?php 
                                            } 
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </main>
                    </section>

                    <?php if ($_SESSION['PRIVILEGE'] == 'ADMIN') { ?>

                    <hr>
                    <section id='account' class='f-col setting-sec account-section'>
                        <div class='f-center f-row header-sec'>
                            <h3>Account</h3>
                            <button class='toggles edit-account scale-anim'>Edit Account</button>
                        </div>
                        <main class='setting-acc-info-wrapper f-col'>
                            <form action='' method='post' class='f-col upd-account-admin-form'>
                                <div class='f-col'>   
                                    <input type='hidden' name='old-user' value='<?= $_SESSION['USERNAME'] ?>'>
                                    <label for='acc-username'>Username</label>
                                    <input type='text' id='acc-username' name='acc-username' class='acc-inp setting-acc-username' placeholder='Enter Username' value='<?= $_SESSION['USERNAME'] ?>' data-default='<?= $_SESSION['USERNAME'] ?>' disabled='true'>
                                    <p class='error-info us-err'></p>
                                </div>

                                <div class='f-col'>   
                                    <label for='acc-email'>Email</label>
                                    <input type='mail' id='acc-email' name='acc-email' class='acc-inp setting-acc-email' placeholder='Enter Email' value='<?= $_SESSION['EMAIL'] ?>' data-default='<?= $_SESSION['EMAIL'] ?>' disabled='true'>
                                    <p class='error-info em-err'></p>
                                </div>

                                <div class='f-col more-acc-details'>
                                    <div class='f-col setting-acc-util-btn-wrapper'>
                                        <button class='f-center acc-inp reset-pass scale-anim'>Reset Password</button>
                                    </div>

                                    <div class='f-col pass-wrapper'>
                                        <div class='f-col'>   
                                            <label for='acc-pass'>Password</label>
                                            <input type='password' id='acc-pass' name='acc-pass' class='acc-inp setting-acc-pass' placeholder='Enter Password'>
                                        </div>

                                        <div class='f-col'>   
                                            <label for='acc-cpass'>Confirm Password</label>
                                            <input type='password' id='acc-cpass' name='acc-cpass' class='acc-inp setting-acc-cpass' placeholder='Enter Confirm Password'>
                                            <p class='error-info cp-err'></p>
                                        </div>

                                        <div class='f-col'>
                                            <div class='f-row toggle-pass-wrapper'>
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
                                    </div>

                                    <div class='f-col setting-acc-util-btn-wrapper'>
                                        <button name='acc-sbmt' class='f-center acc-inp save-changes-btn scale-anim' id='save-changes-btn'>Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </main>
                    </section>

                    <?php } ?>

                </div>
            </main>
        </div>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin.settings'); ?>></script>
</body>
</html>