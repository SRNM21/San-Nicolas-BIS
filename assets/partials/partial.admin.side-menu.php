<?php 

$origin             = '/'. strtolower(getProjectFolder()) . '/administrator/';
$admin_uri          = substr($uri, 29); 
$on_dashboard       = str_starts_with($admin_uri, 'dashboard');
$on_brgy_officials  = str_starts_with($admin_uri, 'barangay-officials');
$on_residence       = str_starts_with($admin_uri, 'residence');
$on_pendings        = str_starts_with($admin_uri, 'pendings');
$on_blotter         = str_starts_with($admin_uri, 'blotter');
$on_request         = str_starts_with($admin_uri, 'requested-documents');
$on_staff_accs      = str_starts_with($admin_uri, 'staff-accounts');
$on_settings        = str_starts_with($admin_uri, 'settings');

$acc_username       = $_SESSION['USERNAME'];
$acc_email          = $_SESSION['EMAIL'];
?>

<link rel='stylesheet' href=<?= getStyle('partial.side-menu'); ?>>
<aside class='f-row side-menu-wrapper'>
    <main class='f-col side-menu-content side-menu-content-hide'>
        <div class='f-col admin-nav-link-wrapper'>
            <a href='<?= $origin; ?>dashboard' class='f-row admin-nav-link <?= $on_dashboard ? 'active' : '' ?>' data-nav='dashboard'>
                <span class='f-center'><?= getSVG('dashboard'); ?></span>
                <p>Dashboard</p>
            </a>
            <a href='<?= $origin; ?>barangay-officials' class='f-row admin-nav-link <?= $on_brgy_officials ? 'active' : '' ?>' data-nav='brgy-officials'>
                <span class='f-center'><?= getSVG('brgy_officials'); ?></span>
                <p>Barangay Officials</p>
            </a>
            <a href='<?= $origin; ?>residence' class='f-row admin-nav-link <?= $on_residence ? 'active' : '' ?>' data-nav='residence'>
                <span class='f-center'><?= getSVG('residence'); ?></span>
                <p>Residence</p>
            </a>
            <a href='<?= $origin; ?>pendings' class='f-row admin-nav-link <?= $on_pendings ? 'active' : '' ?>' data-nav='pendings'>
                <span class='f-center'><?= getSVG('pending'); ?></span>
                <p>Pendings</p>
            </a>
            <a href='<?= $origin; ?>blotter' class='f-row admin-nav-link  <?= $on_blotter ? 'active' : '' ?>' data-nav='blotter'>
                <span class='f-center'><?= getSVG('blotter1'); ?></span>
                <p>Blotter</p>
            </a>
            <a href='<?= $origin; ?>requested-documents' class='f-row admin-nav-link  <?= $on_request ? 'active' : '' ?>' data-nav='requested-documents'>
                <span class='f-center'><?= getSVG('document-fill'); ?></span>
                <p>Requested Documents</p>
            </a>

            <?php if ($_SESSION['PRIVILEGE'] == 'ADMIN') {?>

            <a href='<?= $origin; ?>staff-accounts' class='f-row admin-nav-link  <?= $on_staff_accs ? 'active' : '' ?>' data-nav='staff-accounts'>
                <span class='f-center'><?= getSVG('staff'); ?></span>
                <p>Staff Accounts</p>
            </a>
            
            <?php } ?>
            
            <a href='<?= $origin; ?>settings' class='f-row admin-nav-link  <?= $on_settings ? 'active' : '' ?>' data-nav='settings'>
                <span class='f-center'><?= getSVG('settings'); ?></span>
                <p>Settings</p>
            </a>
        </div>
        <hr>
        <footer class='f-row f-col lower-container'>
            <div class='f-row acc-info-wrapper'>
                <div class='f-row'>
                    <div class='acc-icon'><?= getSVG('account'); ?></div>
                    <div class='f-col acc-info'>
                        <p class='acc-name' title='<?= $acc_username ?>'><?= $acc_username ?></p>
                        <p class='acc-email' itle='<?= $acc_email ?>'><?= $acc_email ?></p>
                    </div>
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