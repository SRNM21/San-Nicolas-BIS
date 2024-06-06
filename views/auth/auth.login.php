<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login | Barangay San Nicolas</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.login'); ?>>
</head>
<body>
    <main class='f-center f-col admin-container'>
        <div class='f-row adm-modal'>
            <div class='f-center svg-wrapper'>
                <?= getIllustration('admin.login'); ?>
            </div>
            <aside class='f-center login-content-wrapper'>
                <div class='f-col login-content'>
                    <header class='f-col brgy-container'>
                        <h2 class='welcome-mess'>Welcome</h2>
                        <p class='login-mess'>Login as administrator / staff</p>
                    </header>
                    <main class='login-form-wrapper'>
                        <form action='administrator' method='POST' class='f-col login-form'>
                            <div class='f-col login-input-wrapper'>
                                <input value='Gengars' class='login-input username' placeholder='Username' type='text' id='username' name='username'>
                                <input value='asdASD123!' class='login-input password' placeholder='Password' type='password' id='password' name='password'>
                                <div class='f-center f-row toggle-pass-wrapper'>
                                    <input type='checkbox' name='toggle-pass' id='toggle-pass' class='toggle-pass'>
                                    <p class='toggle-pass-hint'>Show password</p>
                                </div>                                
                            </div>
                            <button type='submmit' id='login_btn' class='login_btn'>Log in</button>
                            <div class='f-center error_info_wrapper'>
                                <div class='error_info hide'></div>
                            </div>
                        </form>
                    </main>
                </div>
            </aside>
        </div>
    </main>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin'); ?>></script>
</body>
</html>