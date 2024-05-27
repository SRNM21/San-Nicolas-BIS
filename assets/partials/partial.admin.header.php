<link rel='stylesheet' href=<?= getStyle('partial.header'); ?>>
<header class='f-row header-wrapper'>
    <div class='f-center header-name-wrapper'>
        <a class='menu'>
            <span class='f-center menu-wrapper'>
                <?= getSVG('menu'); ?>
            </span>
        </a>
        <div class='f-row header-content'>
            <p class='header-name'><?= $header_name ?></p>
            <h4><?= $_SESSION['PRIVILEGE'] ?></h2>
        </div>
    </div>
</header>