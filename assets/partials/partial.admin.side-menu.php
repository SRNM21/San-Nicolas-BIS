<?php 

$origin = '/'. strtolower(getProjectFolder()) . '/administrator/';
$admin_uri = substr($uri, 29); 
$onDashboard =      str_starts_with($admin_uri, 'dashboard');
$onBrgyOfficials =  str_starts_with($admin_uri, 'barangay-officials');
$onResidence =      str_starts_with($admin_uri, 'residence');
$onBlotter =        str_starts_with($admin_uri, 'blotter');
$onSettings =       str_starts_with($admin_uri, 'settings');

$acc_username   = $_SESSION['USERNAME'];
$acc_email      = $_SESSION['EMAIL'];
?>

<link rel='stylesheet' href=<?= getStyle('partial.side-menu'); ?>>
<aside class='f-row side-menu-wrapper'>
    <main class='f-col side-menu-content side-menu-content-hide'>
        <header class='f-col upper-container'>
            <div class='f-row container'>
                <a class='menu'>
                    <span class='f-center menu-wrapper'>
                        <?= getSVG('menu'); ?>
                    </span>
                </a>
                <div class='f-center f-row brgy-info'>
                    <h3><?= $_SESSION['PRIVILEGE'] ?></h3>
                </div>
            </div>
        </header>
        <hr>
        <div class='f-col admin-nav-link-wrapper'>
            <a href='<?php echo $origin; ?>dashboard' class='f-row admin-nav-link <?= $onDashboard ? 'active' : '' ?>' data-nav='dashboard'>
                <span class='f-center'><?= getSVG('dashboard'); ?></span>
                <p>Dashboard</p>
            </a>
            <a href='<?php echo $origin; ?>barangay-officials' class='f-row admin-nav-link <?= $onBrgyOfficials ? 'active' : '' ?>' data-nav='brgy-officials'>
                <span class='f-center'><?= getSVG('brgy_officials'); ?></span>
                <p>Barangay Officials</p>
            </a>
            <a href='<?php echo $origin; ?>residence' class='f-row admin-nav-link <?= $onResidence ? 'active' : '' ?>' data-nav='residence'>
                <span class='f-center'><?= getSVG('residence'); ?></span>
                <p>Residence</p>
            </a>
            <a href='<?php echo $origin; ?>blotter' class='f-row admin-nav-link  <?= $onBlotter ? 'active' : '' ?>' data-nav='blotter'>
                <span class='f-center'><?= getSVG('blotter1'); ?></span>
                <p>Blotter</p>
            </a>
            <a href='<?php echo $origin; ?>settings' class='f-row admin-nav-link  <?= $onSettings ? 'active' : '' ?>' data-nav='settings'>
                <span class='f-center'><?= getSVG('settings'); ?></span>
                <p>Settings</p>
            </a>
        </div>
        <hr>
        <footer class='f-row f-col lower-container'>
            <div class='f-row acc-info-wrapper'>
                <div class='acc-icon'><?= getSVG('account'); ?></div>
                <div class='f-col acc-info'>
                    <p class='acc-name' title='<?= $acc_username ?>'><?= $acc_username ?></p>
                    <p class='acc-email' itle='<?= $acc_email ?>'><?= $acc_email ?></p>
                </div>
                <a href='/sannicolasbis/administrator/logout' class='f-center logout-wrapper'>
                    <span class='f-center logout'>
                        <?= getSVG('logout'); ?>
                    </span>
                </a>
            </div>
        </footer>
    </main>
</aside>

<script type='module' src=<?=  getScript('partial.side-menu'); ?>></script>