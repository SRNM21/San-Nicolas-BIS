<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pending Documents</title>
    <link rel='stylesheet' href=<?= getStyle('admin.requested-documents'); ?>>
</head>

<body>
    <div class='f-col pend-doc-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row pend-doc-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-col pend-doc-content'>
                <div class='f-col'>
                    <div class='f-center f-row utility'>   
                        <?php require getPartial('search-bar'); ?>
                    </div>
                </div>
                <div class='f-row query-filter-wrapper'>
                    <a href='requested-documents?filter=request' class='filter-btn filter-request <?= $filter == 'request' ? 'active' : '' ?>'>Request</a>
                    <a href='requested-documents?filter=pending' class='filter-btn filter-pending <?= $filter == 'pending' ? 'active' : '' ?>'>Pendings</a>
                    <a href='requested-documents?filter=archive' class='filter-btn filter-archive <?= $filter == 'archive' ? 'active' : '' ?>'>Archive</a>
                </div>
                <div class='f-col table-limiter'>
                    <div class='table-wrapper'>
                        <table class='table'>

                            <?php if ($filter == 'request') { ?>

                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Document Type</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Date Requested</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class='pend-doc-tbl-body'>

                                <?php foreach ($data as $row) { 
                                    if ($row['status'] == 'request') {?>

                                    <tr>
                                        <td><?= $row['last_name'] . ', ' . (handleEmptyValue('', $row['suffix']) == '' ? '' : $row['suffix'] . ', ') . $row['first_name'] . ' ' . $row['middle_name']?></td>
                                        <td><?= $row['document_type'] ?></td>
                                        <td><?= $row['contact_number'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['request_date_time'] ?></td>
                                        <td class='action-cell'>
                                            <a href="requested-documents?details=<?= $row['docs_id'] ?>" class="data-util-btn black-details-btn" data-id='<?= $row['docs_id'] ?>>'>Details</a>
                                            <a href="requested-documents?approve=<?= $row['docs_id'] ?>" class="data-util-btn green-details-btn" data-id='<?= $row['docs_id'] ?>>'>Approve</a>
                                            <a href="requested-documents?decline=<?= $row['docs_id'] ?>" class="data-util-btn red-details-btn" data-id='<?= $row['docs_id'] ?>>'>Decline</a>
                                        </td>
                                    </tr>

                                <?php } } ?>

                                </tbody>

                            <?php } else if ($filter == 'pending') { ?>

                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Document Type</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Date Requested</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class='pend-doc-tbl-body'>

                                <?php foreach ($data as $row) { 
                                    if (in_array($row['status'], ['pending', 'ongoing', 'ready'])) {?>

                                    <tr>
                                        <td><?= $row['last_name'] . ', ' . (handleEmptyValue('', $row['suffix']) == '' ? '' : $row['suffix'] . ', ') . $row['first_name'] . ' ' . $row['middle_name']?></td>
                                        <td><?= $row['document_type'] ?></td>
                                        <td><?= $row['contact_number'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['request_date_time'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td>
                                            <a href="requested-documents?print=<?= $row['docs_id'] ?>" class="data-util-btn green-details-btn" data-id='<?= $row['docs_id'] ?>>'>Claim</a>
                                            <a href="requested-documents?filter=pending&remove=<?= $row['docs_id'] ?>" class="data-util-btn red-details-btn" data-id='<?= $row['docs_id'] ?>>'>Remove</a>
                                        </td>
                                    </tr>

                                <?php } } ?>

                                </tbody>

                            <?php } else if ($filter == 'archive') { ?>
                                
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Document Type</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Date Requested</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class='pend-doc-tbl-body'>

                                <?php foreach ($data as $row) { 
                                    if (in_array($row['status'], ['declined', 'removed', 'claimed'])) {?>

                                    <tr>
                                        <td><?= $row['last_name'] . ', ' . (handleEmptyValue('', $row['suffix']) == '' ? '' : $row['suffix'] . ', ') . $row['first_name'] . ' ' . $row['middle_name']?></td>
                                        <td><?= $row['document_type'] ?></td>
                                        <td><?= $row['contact_number'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['request_date_time'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td>
                                            <a href="requested-documents?filter=archive&restore=<?= $row['docs_id'] ?>" class="data-util-btn orange-details-btn" data-id='<?= $row['docs_id'] ?>>'>Restore</a>
                                        </td>
                                    </tr>

                                <?php } } ?>

                                </tbody>

                            <?php } ?>

                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>

</body>
</html>