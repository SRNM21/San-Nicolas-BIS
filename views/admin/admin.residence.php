<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Residence</title>
    <link rel='icon' type='image/x-icon' href=<?= getLogo(); ?>>
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

                        <?php 

                        $add_href = 'filter=' . $filter;

                        switch ($filter) 
                        {
                            case 'all':             $export_title = 'All';              break;
                            case 'family-head':     $export_title = 'Family Head';      break;
                            case 'family-member':   $export_title = 'Family Member';    break;
                            case 'spouse':          $export_title = 'Spouse';           break;
                            default: break;
                        }

                        require getPartial('admin.dropdown-export'); 

                        ?>
                        
                        </div>
                    </div>
                </div>
                <div class='f-row query-filter-wrapper'>
                    <a href='residence?filter=all' draggable='false' class='filter-btn filter-all <?= $filter == 'all' ? 'active' : '' ?> scale-anim'>All</a>
                    <a href='residence?filter=family-head' draggable='false' class='filter-btn filter-family-head <?= $filter == 'family-head' ? 'active' : '' ?> scale-anim'>Family Head</a>
                    <a href='residence?filter=family-member' draggable='false' class='filter-btn filter-family-member <?= $filter == 'family-member' ? 'active' : '' ?> scale-anim'>Family Member</a>
                    <a href='residence?filter=spouse' draggable='false' class='filter-btn filter-spouse <?= $filter == 'spouse' ? 'active' : '' ?> scale-anim'>Spouse</a>
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
    <script type='module' src=<?=  getScript('admin.dropdown'); ?>></script>

</body>
</html>