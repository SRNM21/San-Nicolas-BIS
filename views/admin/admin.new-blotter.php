<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>New Blotter</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('admin.new-blotter'); ?>>
</head>
<body>
    <div class='f-col new-blotter-wrapper'>
        <?php include getPartial('admin.header'); ?>
        <div class='f-row new-blotter-container'>
            <?php include getPartial('admin.side-menu'); ?>
            <main class='f-center f-col new-blotter-content'>
                <div class='f-col new-blotter-form-wrapper'> 
                    <header class='f-row form-header'>
                        <div class='f-center f-row'>
                            <div class='f-row back-btn-wrapper'>
                                <a href='<?= $origin ?>blotter' class='back-btn'><?= getSVG('back'); ?></a>
                            </div>
                            <h4>New Blotter Form</h4>
                        </div>
                        <p><?= date('Y') ?></p>
                    </header>
                    <form id='new-blotter-from' action='' method='post'>
                        <div class='f-col form-content-wrapper'>
                            <section class='f-col personal-info-container active'>
                                <div class='f-row t-row'>
                                    <div class='f-col inf-group'>
                                        <label class='b-form-label req' for='dat-date'>Date</label>
                                        <input class='b-form-input' type='date' data-input='Date' name='dat-date' id='dat-date'>
                                        <p class='error-info d-err'></p>
                                    </div>
                                    <div class='f-col inf-group'>
                                        <label class='b-form-label' for='dat-time'>Time</label>
                                        <input class='b-form-input' type='time' data-input='Time' name='dat-time' id='dat-time'>
                                        <p class='error-info t-err'></p>
                                    </div>
                                </div>
                                <div class='f-row g-row'>
                                    <div class='f-col inf-group'>
                                        <label class='b-form-label req' for='complainant'>Complainant</label>
                                        <input class='b-form-input' type='text' data-input='Complainant' name='complainant' id='complainant' placeholder='Enter Complainant'>
                                        <p class='error-info cp-err'></p>
                                    </div>
                                    <div class='f-col inf-group'>
                                        <label class='b-form-label req' for='respondent'>Respondent</label>
                                        <input class='b-form-input' type='text' data-input='Respondent' name='respondent' id='respondent' placeholder='Enter Respondent'>
                                        <p class='error-info re-err'></p>
                                    </div>
                                </div>
                                <div class='f-row g-row'>
                                    <div class='f-col inf-group'>
                                        <label class='b-form-label req' for='complainant-add'>Complainant's Address</label>
                                        <input class='b-form-input' type='text' data-input="Complainant's Address" name='complainant-add' id='complainant-add' placeholder="Enter Complainant's Address">
                                        <p class='error-info ca-err'></p>
                                    </div>
                                    <div class='f-col inf-group'>
                                        <label class='b-form-label req' for='respondent-add'>Respondent's Address</label>
                                        <input class='b-form-input' type='text' data-input="Respondent's Address" name='respondent-add' id='respondent-add' placeholder="Enter Respondent's Address">
                                        <p class='error-info ra-err'></p>
                                    </div>
                                </div>
                                <div class='f-col inf-group'>
                                    <label class='b-form-label req' for='nature-of-complaint'>Nature of Complaint</label>
                                    <textarea class='b-form-input nature-of-complaint' type='text' name='nature-of-complaint' id='nature-of-complaint' placeholder='Enter Nature of Complaint'></textarea>
                                    <p class='error-info nc-err'></p>
                                </div>
                                <div class='f-col inf-group'>
                                    <label class='b-form-label req' for='status'>Status</label>
                                    <select class='b-form-input' type='text' data-input="Status" name='status' id='status'>
                                        <option value='' disabled selected>Select Choices</option>
                                        <option value='Pending'>Pending</option>
                                        <option value='Active'>Active</option>
                                        <option value='Settled'>Settled</option>
                                    </select>
                                    <p class='error-info st-err'></p>
                                </div>
                                <div class='f-row btn-wrapper'>
                                    <button class='util-btn submit-new-blotter-btn'>Submit</button>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    
    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('partial.side-menu'); ?>></script>
    <script type='module' src=<?=  getScript('admin.new-blotter'); ?>></script>
</body>
</html>