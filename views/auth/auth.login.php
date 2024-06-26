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
    <div class='f-row admin-container'>
        <div class='f-center f-row login-content-wrapper'>
            <div class='f-center f-row adm-modal'>
                <aside class='f-col vector-panel'>
                    <header class='f-row'>
                        <div class='icon-wrapper'>
                            <img src='<?= getLogo() ?>' alt="">
                        </div>
                        <div class='f-col'>
                            <h2>Barangay San Nicolas</h2>
                            <p>Pasig City, Metro Manila, Philippines</p>
                        </div>
                    </header>
                    <div class='vector-wrapper'>
                        <?= getIllustration('admin.login')?>
                    </div>
                </aside>
                <div class='f-col login-content'>
                    <header class='f-row brgy-container'>
                        <div class='f-col title-wrapper'>
                            <h1 class='welcome-mess'>Welcome Back</h1>
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
            </div>
        </div>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin'); ?>></script>
</body>
</html>