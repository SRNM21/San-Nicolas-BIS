<?php 

$origin = '/'. strtolower(getProjectFolder()) . '/administrator/';
$admin_uri = substr($uri, 29); 
$onDashboard =      str_starts_with($admin_uri, 'dashboard');
$onBrgyOfficials =  str_starts_with($admin_uri, 'barangay-officials');
$onFamilyHead =     str_starts_with($admin_uri, 'family-head');
$onFamilyMember =   str_starts_with($admin_uri, 'family-member');
$onSpouse =         str_starts_with($admin_uri, 'spouse');
$onBlotter =        str_starts_with($admin_uri, 'blotter');
$onSettings =       str_starts_with($admin_uri, 'settings');

?>

<link rel='stylesheet' href=<?= getStyle('partial.side-menu'); ?>>
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
            <span class='f-center'><?= getSVG('dashboard'); ?></span>
            <p>Dashboard</p>
        </a>
        <a href='<?php echo $origin; ?>barangay-officials' class='f-row admin-nav-link <?= $onBrgyOfficials ? 'active' : '' ?>' data-nav='brgy-officials'>
            <span class='f-center'><?= getSVG('brgy_officials'); ?></span>
            <p>Barangay Officials</p>
        </a>
        <a href='<?php echo $origin; ?>family-head' class='f-row admin-nav-link <?= $onFamilyHead ? 'active' : '' ?>' data-nav='family-head'>
            <span class='f-center'><?= getSVG('family-head'); ?></span>
            <p>Family Head</p>
        </a>
        <a href='<?php echo $origin; ?>family-member' class='f-row admin-nav-link <?= $onFamilyMember ? 'active' : '' ?>' data-nav='family-member'>
            <span class='f-center'><?= getSVG('family-member'); ?></span>
            <p>Family Member</p>
        </a>
        <a href='<?php echo $origin; ?>spouse' class='f-row admin-nav-link <?= $onSpouse ? 'active' : '' ?>' data-nav='spouse'>
            <span class='f-center'><?= getSVG('spouse'); ?></span>
            <p>Spouse</p>
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
                <p class='acc-name'><?php echo $_SESSION['USERNAME']; ?></p>
                <p class='acc-email'><?php echo $_SESSION['EMAIL']; ?></p>
            </div>
            <a href='logout' class='f-center logout-wrapper'><?= getSVG('logout'); ?></a>
        </div>
    </footer>
</aside>
<script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
<script type='module' src=<?=  getScript('partial.side-menu'); ?>></script>