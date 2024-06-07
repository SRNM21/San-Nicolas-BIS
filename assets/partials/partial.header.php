<?php 

$origin             = '/'. strtolower(getProjectFolder()) . '/community/'; 
$com_uri            = substr($uri, 25); 
$on_home            = str_starts_with($com_uri, 'home');
$on_services        = str_starts_with($com_uri, 'services');
$on_events          = str_starts_with($com_uri, 'events');
$on_lmarks          = str_starts_with($com_uri, 'landmarks');

?>

<link rel='stylesheet' href=<?= getStyle('partial.header-com') ?>>
<header class='f-center initial-header'>
    
    <!-- HEADER CONTENT -->
    <div class='f-row header-content'>
        <div class='f-row f-center sys-info'>
            <a href='/sannicolasbis/community/home' class='f-center icon'>
                <img src='<?= getLogo() ?>' alt="">
            </a>
            <div>
                <p class='brgy-title'>Barangay San Nicolas</p>
                <p class='brgy-loc'>Pasig City, Metro Manila, Philippines</p>
            </div>
        </div>
        
        <!-- DESKTOP NAVIGATION -->
        <nav class='desktop-nav'>
            <ul class='f-row desktop-nav-list'>
                <li>
                    <a href='<?= $origin ?>home' draggable='false' class='f-col <?= $on_home ? 'active' : '' ?>'>Home</a>
                </li>
                <li>
                    <a href='<?= $origin ?>services' draggable='false' class='f-col <?= $on_services ? 'active' : '' ?>'>Services</a>
                </li>
                <li>
                    <a href='<?= $origin ?>events' draggable='false' class='f-col <?= $on_events ? 'active' : '' ?>'>Events</a>
                </li>
                <li>
                    <a href='<?= $origin ?>landmarks' draggable='false' class='f-col <?= $on_lmarks ? 'active' : '' ?>'>Landmarks</a>
                </li>
            </ul>
        </nav>

        <!-- TABLET NAVIGATION -->
        <nav class='tablet-nav'>
            <div class='hamburger-wrapper'>
                <?= getSVG('menu') ?>
            </div>
        </nav>
    </div>

    <!-- TABLET NAVIGATION OVERLAY -->
    <div class='nav-overlay out-nav'> </div>
    <aside class='f-col side-menu-container'>

        <header class='f-col upper-container'>
            <div class='f-row out-nav'><?= getSVG('close'); ?></div>
            <div class='f-center f-col brgy-container'>
                <div class='icon'>
                    <img src='<?= getImage('logo_sn.jpg') ?>' alt="">
                </div>
                <h3>Barangay San Nicolas</h3>
            </div>
        </header>

        <hr>

        <div class='nav-link-wrapper'>
            <ul class='f-col overlay-nav-list'>
                <li>
                    <a href='home' class='out-nav'>Home</a>
                </li>
                <li>
                    <a href='home#officials' draggable='false' class='out-nav'>Barangay Officials</a>
                </li>
                <li>
                    <a href='home#mission-vision' draggable='false' class='out-nav'>Mission and Vision</a>
                </li>
                <li>
                    <a href='services' draggable='false' class='out-nav'>Services</a>
                </li>
                <li>
                    <a href='events' draggable='false' class='out-nav'>Events</a>
                </li>
                <li>
                    <a href='landmarks' draggable='false' class='out-nav'>Landmarks</a>
                </li>
            </ul>
        </div>
        <hr>
        <footer class='f-center f-col lower-container'>
            <div class='f-row on-contacts-wrapper'>
                <span class='f-center on-contacts'>
                    <a href='https://www.facebook.com/groups/394605741237735/' draggable='false' target='_blank' class='out-nav' title='Barangay San Nicolas Facebook Group' class='f-center'><?= getSVG('facebook'); ?></a>
                </span>
                <span class='f-center on-contacts'>
                    <a href='mailto:brgysannicolas.pasig@gmail.com' draggable='false' target='_blank' class='out-nav' title='Barangay San Nicolas Facebook Group' class='f-center'><?= getSVG('mail'); ?></a>
                </span> 
                <span class='f-center on-contacts'>
                    <a href='tel:8 643000' draggable='false' class='out-nav' target='_blank' title='Barangay San Nicolas Facebook Group' class='f-center'><?= getSVG('phone'); ?></a>
                </span>
            </div>
            <div>
                <p>H37H+67G, M.H. del Pilar St, Pasig, 1600 Metro Manila</p>
            </div>
        </footer>
    </aside>

    <!-- MOBILE NAVIGATION -->
    <div class='mobile-nav'>
        
    </div>
</header>
<script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
<script type='module' src=<?=  getScript('partial.header'); ?>></script>