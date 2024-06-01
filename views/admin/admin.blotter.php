<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blotter</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.blotter'); ?>>
</head>
<body>
    <div class='f-col blotter-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row blotter-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-col blotter-content'>
                <div class='f-col'>
                    <div class='f-center f-row utility'>   
                        <?php require getPartial('search-bar'); ?>
                        <div class='util-btn-wrapper'>
                            <a href='blotter/new-blotter' class='f-center f-row new-blotter-btn'><?= getSVG('add-blotter'); ?><p>New blotter</p></a>
                        </div>
                    </div>
                </div>
                <div class='f-row query-filter-wrapper'>
                    <a href='blotter?filter=all' class='filter-btn filter-all <?= $filter == 'all' ? 'active' : '' ?>'>All</a>
                    <a href='blotter?filter=pending' class='filter-btn filter-pending <?= $filter == 'pending' ? 'active' : '' ?>'>Pending</a>
                    <a href='blotter?filter=active' class='filter-btn filter-active <?= $filter == 'active' ? 'active' : '' ?>'>Active<sa>
                    <a href='blotter?filter=settled' class='filter-btn filter-settled <?= $filter == 'settled' ? 'active' : '' ?>'>Settled</a>
                </div>
                <div class='f-col table-limiter'>
                    <div class='table-wrapper'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Complainant</th>
                                    <th>Respondent</th>
                                    <th>Nature of Complaint</th>
                                    <th>Date and Time</th>
                                    <th>Status</th>
                                    <th>Blotter Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                            foreach ($data as $row) 
                            { 
                                if (strtolower($row['status'] ) == $filter || $filter == 'all')
                                {
                            ?>

                                <tr>
                                    <td><?= $row['complainant'] ?></td>
                                    <td><?= $row['respondent'] ?></td>
                                    <td><?= $row['nature_of_complaint'] ?></td>
                                    <td><?= $row['date_and_time'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                    <td><?= $row['blotter_date'] ?></td>
                                    <td class='action-cell'>
                                        <a href="?filter=<?= $filter ?>&details=<?= $row['complaint_id'] ?>" class="data-util-btn black-details-btn">Details</a>
                                        <a href="blotter/update-blotter?id=<?= $row['complaint_id'] ?>" class="data-util-btn blue-details-btn">Edit</a>
                                        <a href="?filter=<?= $filter ?>&delete=<?= $row['complaint_id'] ?>" class="data-util-btn red-details-btn">Delete</a>
                                    </td>
                                </tr>

                            <?php 
                                }
                            } 
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script type='text/javascript' src=<?= getScript('jquery-3.7.1'); ?>></script>
</body>
</html>