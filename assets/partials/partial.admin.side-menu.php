<?php 

$origin = '/'. strtolower(getProjectFolder()) . '/administrator/';
$admin_uri = substr($uri, 29); 
$onDashboard =      str_starts_with($admin_uri, 'dashboard');
$onBrgyOfficials =  str_starts_with($admin_uri, 'barangay-officials');
$onResidence =      str_starts_with($admin_uri, 'residence');
$onBlotter =        str_starts_with($admin_uri, 'blotter');
$onSettings =       str_starts_with($admin_uri, 'settings');

?>

<link rel='stylesheet' href=<?= getStyle('partial.side-bar'); ?>>
<aside class='f-col side-menu-wrapper'>
    <header class='f-col upper-container'>
        <div class='f-center f-row brgy-container'>
            <div class='icon'></div>
            <h3>Barangay San Nicolas</h3>
        </div>
    </header>
    <hr>
    <div class='f-col admin-nav-link-wrapper'>
        <a href='<?php echo $origin; ?>dashboard' class='f-row admin-nav-link <?= $onDashboard ? 'active' : '' ?>' data-nav='dashboard'>
            <span><?= getSVG('dashboard'); ?></span>
            <p>Dashboard</p>
        </a>
        <a href='<?php echo $origin; ?>barangay-officials' class='f-row admin-nav-link <?= $onBrgyOfficials ? 'active' : '' ?>' data-nav='brgy-officials'>
            <span><?= getSVG('brgy_officials'); ?></span>
            <p>Barangay Officials</p>
        </a>
        <a href='<?php echo $origin; ?>residence' class='f-row admin-nav-link <?= $onResidence ? 'active' : '' ?>' data-nav='residence'>
            <div class='f-row group-nav'>
                <span><?= getSVG('residence'); ?></span>
                <p>Residence</p>
            </div>
            <span><?= getSVG('markdown'); ?></span>
        </a>
        <a href='<?php echo $origin; ?>blotter' class='f-row admin-nav-link  <?= $onBlotter ? 'active' : '' ?>' data-nav='blotter'>
            <span><?= getSVG('blotter1'); ?></span>
            <p>Blotter</p>
        </a>
        <a href='<?php echo $origin; ?>settings' class='f-row admin-nav-link  <?= $onSettings ? 'active' : '' ?>' data-nav='settings'>
            <span><?= getSVG('settings'); ?></span>
            <p>Settings</p>
        </a>
    </div>
    <hr>
    <footer class='f-row f-col lower-container'>
        <div class='f-row acc-info-wrapper'>
            <div class='acc-icon'><?= getSVG('account'); ?></div>
            <div class='f-col acc-info'>
                <p class='acc-name'><?php echo $_SESSION['USERNAME']; ?></p>
                <p class='acc-email'><?php echo $_SESSION['EMAIL']; ?></p>
            </div>
            <a href='logout' class='f-center logout-wrapper'><?= getSVG('logout'); ?></a>
        </div>
    </footer>
</aside>
<script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
<script type='module' src=<?=  getScript('partial.side-menu'); ?>></script>