<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Barangay San Nicolas</title>
    <link rel='stylesheet' href=<?= getStyle('services-brgy-clearance'); ?>>
</head>
<body>
    <?php require getPartial('header') ?>

    <main class='f-center brgy-clearance-wrapper'>
        <div class='f-row brgy-clearance'>
            <div class='brgy-clearance-content-wrapper'>
                <div class='brgy-clearance-content'>
                    <header class='f-row brgy-clearance-content-header'>
                        <div class='f-row back-btn-wrapper'>
                            <a href='/sannicolasbis/community/services' class='back-btn'><?= getSVG('back'); ?></a>
                        </div>
                        <h4>Barangay Clearance</h4>
                    </header>
                    <div class='brgy-clearance-form-wrapper'>
                        <form action="" method='post' class='f-col brgy-clearance-form'>
                            <div class='f-row inp-row'>
                                <div class='f-col inp-col lastname-col'>
                                    <label for='lastname' class='req'>Lastname</label>
                                    <input type='text' name='lastname' id='lastname' class='info-inp lastname' placeholder='Enter Lastname' data-input='Lastname'>
                                </div>
                                <div class='f-col inp-col firstname-col'>
                                    <label for='firstname' class='req'>Firstname</label>
                                    <input type='text' name='firstname' id='firstname' class='info-inp firstname' placeholder='Enter Firstname' data-input='Firstname'>
                                    <p class='error-inp fn-err'></p>
                                </div>
                                <div class='f-col inp-col middlename-col'>
                                    <label for='middlename'>Middlename</label>
                                    <input type='text' name='middlename' id='middlename' class='info-inp middlename' placeholder='Enter Middlename' data-input='Middlename'>
                                    <p class='error-inp mn-err'></p>
                                </div>
                                <div class='f-col inp-col suff-col'>
                                    <label for='suff req'>Suffix</label>
                                    <input type='text' name='suff' id='suff' class='info-inp suff' placeholder='Enter Suffix' data-input='Suffix'>
                                    <p class='error-inp sf-err'></p>
                                </div>
                            </div>
                            <div class='f-row inp-row'>
                                <div class='f-col inp-col'>
                                    <label for='birthdate' class='req'>Birthdate</label>
                                    <input type='date' name='birthdate' id='birthdate' class='info-inp birthdate'>
                                    <p class='error-inp bd-err'></p>
                                </div>
                                <div class='f-col inp-col'>
                                    <label for='address' class='req'>Address</label>
                                    <input type='text' name='address' id='address' class='info-inp address' placeholder='Enter Address'>
                                    <p class='error-inp ad-err'></p>
                                </div>
                            </div>
                            <div class='f-row inp-row'>
                                <div class='f-col inp-col'>
                                    <label for='y-of-res' class='req'>Years of Residence</label>
                                    <input type='number' name='y-of-res' id='y-of-res' class='info-inp y-of-res' placeholder='Enter Years of Residence'>
                                    <p class='error-inp yr-err'></p>
                                </div>

                                <div class='f-col inp-col'>
                                    <label for='purpose' class='req'>Purpose</label>
                                    <select class='info-inp' name='purpose' id='purpose' class='info-inp purpose'>
                                    
                                    <?php foreach ($purpose as $p) { ?>
                                        <option value='<?= $p ?>'><?= $p ?></option>
                                    <?php } ?>
                                    
                                    </select>
                                </div>
                            </div>

                            <div class='f-row inp-row'>
                                <div class='f-col inp-col'>
                                    <label for='cont-num' class='req'>Contact Number</label>
                                    <input type='text' name='cont-num' id='cont-num' class='info-inp cont-num' placeholder='Enter Contact Number'>
                                    <p class='error-inp bd-err'></p>
                                </div>           
                                <div class='f-col inp-col'>
                                    <label for='email' class='req'>Email</label>
                                    <input type='mail' name='email' id='email' class='info-inp email' placeholder='Enter Email'>
                                    <p class='error-inp bd-err'></p>
                                </div>                            

                            <?php if ($has_annual) { ?>

                                <div class='f-col inp-col'>
                                    <label for='annual' class='req'>Annual Income</label>
                                    <input type='number' name='annual' id='annual' class='info-inp annual' placeholder='Enter Annual Income'>
                                    <p class='error-inp yr-err'></p>
                                </div>

                            <?php } ?>

                            </div>
                            <div class='f-row inp-row brgy-clearance-btn-wrapper'>
                                <button type='submit' class='brgy-clearance-btn'>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class='req-modal'>
                <header class='req-modal-header'>
                    <h3>Other Requirements</h3>
                </header>
                <div class='f-col req-mmodal-content'>
                    <p><b>NOTE:</b> To collect your document from the barangay, please present one or all of the following:</p>
                    <div class='f-col req-modal-list'>
                        
                    <?php for ($i = 0; $i < count($requirements); $i++) { ?>

                        <div class='f-row req-row'>
                            <div><?= $i + 1 ?>.</div>
                            <div><?= $requirements[$i] ?></div>
                        </div>

                    <?php } ?>

                    </div>
                </div>
            </div>
       </div>
    </main>
</body>
</html>