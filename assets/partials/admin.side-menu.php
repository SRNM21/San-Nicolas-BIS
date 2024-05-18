<?php $admin_uri = substr($uri, 29); ?>

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
        <a href='dashboard' class='f-row admin-nav-link <?= $admin_uri == 'dashboard' ? 'active' : '' ?>' data-nav='dashboard'>
            <span><?= getSVG('dashboard'); ?></span>
            <p>Dashboard</p>
        </a>
        <a href='barangay-officials' class='f-row admin-nav-link <?= $admin_uri == 'barangay-officials' ? 'active' : '' ?>' data-nav='brgy-officials'>
            <span><?= getSVG('brgy-officials'); ?></span>
            <p>Barangay Officials</p>
        </a>
        <a href='residence' class='f-row admin-nav-link <?= $admin_uri == 'residence' ? 'active' : '' ?>' data-nav='residence'>
            <div class='f-row group-nav'>
                <span><?= getSVG('residence'); ?></span>
                <p>Residence</p>
            </div>
            <span><?= getSVG('markdown'); ?></span>
        </a>
        <a href='blotter' class='f-row admin-nav-link  <?= $admin_uri == 'blotter' ? 'active' : '' ?>' data-nav='blotter'>
            <span><?= getSVG('blotter'); ?></span>
            <p>Blotter</p>
        </a>
        <a href='settings' class='f-row admin-nav-link  <?= $admin_uri == 'settings' ? 'active' : '' ?>' data-nav='settings'>
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
            <div class='f-center logout-wrapper'><?= getSVG('logout'); ?></div>
        </div>
    </footer>
</aside>
<script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
<script type='module' src=<?=  getScript('partial.side-menu'); ?>></script>