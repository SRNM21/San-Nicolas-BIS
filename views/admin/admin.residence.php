<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Residence</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.residence'); ?>>
</head>

<body>
    <div class='f-col residence-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row residence-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-col residence-content'>
                <div class='f-col'>
                    <div class='f-center f-row utility'>   
                        <?php require getPartial('search-bar'); ?>

                        <div class='f-row util-btn-wrapper'>
                        <?php if ($filter == 'all') { ?>
                            
                            <a href='residence?export-all=1' class='f-center f-row export-residence-btn'><?= getSVG('export'); ?><p>Export All</p></a>
                            
                        <?php }else if ($filter == 'family-head') { ?>
                            
                            <a href='residence?export-family-head=1' class='f-center f-row export-residence-btn'><?= getSVG('export'); ?><p>Export Family Head</p></a>
                            
                        <?php }else if ($filter == 'family-member') { ?>
                            
                            <a href='residence?export-family-member=1' class='f-center f-row export-residence-btn'><?= getSVG('export'); ?><p>Export Family Member</p></a>
                            
                        <?php }else if ($filter == 'spouse') { ?>
                            
                            <a href='residence?export-spouse=1' class='f-center f-row export-residence-btn'><?= getSVG('export'); ?><p>Export Spouse</p></a>

                        <?php } ?>
                        </div>
                    </div>
                </div>
                <div class='f-row query-filter-wrapper'>
                    <a href='residence?filter=all' class='filter-btn filter-all <?= $filter == 'all' ? 'active' : '' ?>'>All</a>
                    <a href='residence?filter=family-head' class='filter-btn filter-family-head <?= $filter == 'family-head' ? 'active' : '' ?>'>Family Head</a>
                    <a href='residence?filter=family-member' class='filter-btn filter-family-member <?= $filter == 'family-member' ? 'active' : '' ?>'>Family Member</a>
                    <a href='residence?filter=spouse' class='filter-btn filter-spouse <?= $filter == 'spouse' ? 'active' : '' ?>'>Spouse</a>
                </div>
                <div class='f-col table-limiter'>
                    <div class='table-wrapper'>
                        <table class='table'>
                            <thead>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Middlename</th>
                                <th>Purok</th>
                                <th>Role</th>
                                <th>Action</th>
                            </thead>
                            <tbody class='residence-tbl-body'>
                                
                            <?php 
                            foreach ($data as $row) 
                            { 
                                if ($filter == 'all' || ($filter != 'all' && (strtolower($row['role']) == str_replace('-', ' ', $filter)))) 
                                {
                            ?>

                                <tr>
                                    <td><?= $row['last_name'] ?></td>
                                    <td><?= $row['first_name'] ?></td>
                                    <td><?= $row['middle_name'] ?></td>
                                    <td><?= $row['purok'] ?></td>
                                    <td><?= $row['role'] ?></td>
                                    <td class='action-cell'>
                                        <a href="residence?filter=<?= $filter ?>&details=<?= $row['residence_id'] ?>" class='data-util-btn black-details-btn'>Details</a>

                                        <?php if ($_SESSION['PRIVILEGE'] == 'ADMIN') { ?>
                                            
                                            <a href="residence/update-resident?filter=<?= $filter ?>&id=<?= $row['residence_id'] ?>" class='data-util-btn blue-details-btn'>Edit</a>
                                            <a href="residence?filter=<?= $filter ?>&delete=<?= $row['residence_id'] ?>" class='data-util-btn red-details-btn'>Delete</a>

                                        <?php } ?>
                                    
                                    </td>
                                </tr>

                                <?php }} ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('admin.residence'); ?>></script>
</body>
</html>