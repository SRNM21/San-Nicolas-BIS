<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login | Barangay San Nicolas</title>
    <link rel='icon' type='image/x-icon' href=<?= getLogo(); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.login'); ?>>
</head>
<body>
    <main class='f-row admin-container'>
        <aside class='f-center f-col side-content'>
            <header class='f-col side-content-header'>
                <h1>Welcome to</h1>
                <h2>Barangay San Nicolas</h2>
            </header>
            <div class='f-center anim-wrapper'>
                <img src="<?= getImage('login_anim.gif'); ?>" alt="">
            </div>
            <div class='f-row contact-link-wrapper'>
                <a href='https://www.facebook.com/groups/394605741237735/' target='_blank' title='Barangay San Nicolas Facebook Group' class='f-center'><?= getSVG('facebook'); ?></a>
                <a href='mailto:brgysannicolas.pasig@gmail.com' target='_blank' title='Barangay San Nicolas Email' class='f-center'><?= getSVG('mail'); ?></a>
                <a href='tel:8 643000' title='Barangay San Nicolas Phone number' class='f-center'><?= getSVG('phone'); ?></a>
            </div>  
        </aside>
        <main class='f-center f-row login-content-wrapper'>
            <div class='f-col login-content'>
                <header class='f-row brgy-container'>
                    <div class='icon-wrapper'>
                        <img src='<?= getLogo() ?>' alt="">
                    </div>
                    <div class='f-col title-wrapper'>
                        <h2 class='welcome-mess'>Login</h2>
                        <p class='login-mess'>Administrator / Staff</p>
                    </div>
                </header>
                <main class='f-col login-form-wrapper'>
                    <p class='login-mess'>Please enter your credentials</p>
                    <form action='administrator' method='POST' class='f-col login-form'>
                        <div class='f-col login-input-wrapper'>
                            <input class='login-input username' placeholder='Username' type='text' id='username' name='username'>
                            <input class='login-input password' placeholder='Password' type='password' id='password' name='password'>
                            <div class='f-center f-row toggle-pass-wrapper'>
                                <input type='checkbox' name='toggle-pass' id='toggle-pass' class='toggle-pass'>
                                <p class='toggle-pass-hint'>Show password</p>
                            </div>                                
                        </div>
                        <button type='submmit' id='login_btn' class='login_btn scale-anim'>Log in</button>
                        <div class='f-center error_info_wrapper'>
                            <div class='error_info hide'></div>
                        </div>
                    </form>
                </main>
            </div>
            <div class='copyright'>
                <p>&copy 2024 Pamantasan ng Lungsod ng Pasig, BSIT 2A - Group 3. All rights reserved.</p>
            </div>
        </main>
    </main>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin'); ?>></script>
</body>
</html>