<form class='f-center f-row searchbar-wrapper' action='' method='post'>
    <div class='f-center f-row query-wrapper'>
        <input class='f-center search-bar' type='text' name='query' id='query' placeholder='Search' value='<?= $q ?>'>
        <span class='f-center search-icon-wrapper' title='search'>
            <button type='submit' class='query-btn'><?= getSVG('search'); ?></button>
        </span>
    </div>
    <span class='f-center refresh-btn-wrapper'>
        <button name='refresh' type='submit' class='f-center refresh-btn' title='Refresh'>
            <?= getSVG('refresh'); ?>
        </button>
    </span>
</form>