<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout | Barangay San Nicolas</title>
    <link rel='icon' type='image/x-icon' href=<?= getLogo(); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.logout'); ?>>
</head>
<body>
    <main class='f-center logout-wrapper'>
        <div class='logout-content'>
            <form class='f-center f-col logout-form' action="" method="POST">
                <div class='warning-wrapper'><?= getSVG('error'); ?></div>
                <h3>Logout</h3>
                <p>You will returned to the login screen</p>
                <div class='f-col btn-wrapper'>
                    <button class='f-center logout-btn prm scale-anim' name='logout' type="submit">Log out</button>
                    <button class='f-center logout-btn scn scale-anim' name='cancel' type="submit">Cancel</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>