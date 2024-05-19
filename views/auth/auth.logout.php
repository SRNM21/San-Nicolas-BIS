<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout | Barangay San Nicolas</title>
    <link rel='stylesheet' href=<?= getStyle('admin.logout'); ?>>
</head>
<body>
    <main class='f-center logout-wrapper'>
        <div class='logout-content'>
            <form class='f-center f-col logout-form' action="" method="POST">
                <div class='warning-wrapper'><?= getSVG('warning'); ?></div>
                <h3>Logout</h3>
                <p>You will returned to the login screen</p>
                <div class='f-col btn-wrapper'>
                    <button class='f-center logout-btn prm' name='logout' type="submit">Log out</button>
                    <button class='f-center logout-btn scn' name='cancel' type="submit">Cancel</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>