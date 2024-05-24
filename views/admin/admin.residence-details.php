<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?= $lastname ?> | Family Head</title>
    <link rel='stylesheet' href=<?= getStyle('admin.residence-details'); ?>>
</head>
<body>
    <div class='f-row fam-head-details-wrapper'>
        <?php include getPartial('admin.side-menu'); ?>
        <main class='f-col fam-head-details-container'>
            <?php include getPartial('admin.header'); ?>
            <div class='f-col fam-head-details-content'>
                <div class='f-col details-scroller'>
                    <div class='f-row details-wrapper'>
                        <article class='f-col per-info-card card'>
                            <header class='f-row main-info-wrapper'>
                                <h2>Personal Info</h2>
                                <h5><?= $id ?></h5>
                            </header>
                            <div class='f-row personal-info'>
                                <div class='f-col info-seperator'>
                                    <span class='f-col'>
                                        <p class='ttl'>Lastname</p>
                                        <p class='info-val'><?= $lastname ?></p>
                                    </span>
                                    <span class='f-col'>
                                        <p class='ttl'>Firstname</p>
                                        <p class='info-val'><?= $firstname ?></p>
                                    </span>
                                    <span class='f-col'>
                                        <p class='ttl'>Middlename</p>
                                        <p class='info-val'><?= $middlename ?></p>
                                    </span>
                                    <span class='f-col'>
                                        <p class='ttl'>Age</p>
                                        <p class='info-val'><?= $age ?></p>
                                    </span>
                                </div>
                                <div class='f-col info-seperator'>
                                    <span class='f-col'>
                                        <p class='ttl'>Birthdate</p>
                                        <p class='info-val'><?= str_replace('-','/',$birthdate) ?></p>
                                    </span>
                                    <span class='f-col'>
                                        <p class='ttl'>Civil Status</p>
                                        <p class='info-val'><?= $civil_stat ?></p>
                                    </span>
                                    <span class='f-col'>
                                        <p class='ttl'>Educational</p>
                                        <p class='info-val'><?= $educ ?></p>
                                    </span>
                                    <span class='f-col'>
                                        <p class='ttl'>Occupation</p>
                                        <p class='info-val'><?= $occ ?></p>
                                    </span>
                                </div>
                            </div>
                        </article>
                        <article class='f-col con-info-card card'>
                            <header class='f-row main-info-wrapper'>
                                <h2>Contact Info</h2>
                            </header>
                            <div class='f-col info-seperator'>
                                <span class='f-col'>
                                    <p class='ttl'>Contact Number</p>
                                    <p class='info-val'><?= $con_num ?></p>
                                </span>
                                <span class='f-col'>
                                    <p class='ttl'>Email</p>
                                    <p class='info-val'><?= $email ?></p>
                                </span>
                            </div>
                        </article>
                    </div>
                    <div class='f-row major-details-wrapper'>
                        <article class='f-col fam-info-card card'>
                            <header class='f-row main-info-wrapper'>
                                <h2>Family Info</h2>
                            </header>
                            <div class='f-col info-seperator'>
                                <span class='f-col'>
                                    <p class='ttl'>Family Dependencies</p>
                                    <p class='info-val'><?= $fam_dep ?></p>
                                </span>
                                <span class='f-col'>
                                    <p class='ttl'>Family Planning Method</p>
                                    <p class='info-val'><?= $fpm ?></p>
                                </span>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>