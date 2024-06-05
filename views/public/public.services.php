<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Barangay San Nicolas</title>
    <link rel='icon' type='image/x-icon' href=<?= getFavicon('favicon'); ?>>
    <link rel='stylesheet' href=<?= getStyle('services'); ?>>
</head>
<body>
    <?php require getPartial('header') ?>
    <main class='f-col'>
        <section class='f-center online-docu-req-wrapper'>
            <div class='f-center f-col container online-docu-req'>
                <div class='f-center f-col services-title'>
                    <h1 class='online-docu-steps-title'>ONLINE BARANGAY DOCUMENT REQUEST</h1>
                </div>
                <div class='f-center f-row docu-cards-wrapper'>
                    <div class='f-center f-col docu-cards brgy-clr-card'>
                        <div class='img-wrapper'>
                            <img src='<?= getImage('CLEARANCE.png') ?>' alt="">
                        </div>
                        <div class='f-center f-col docu-details'>
                            <h2>Barangay Clearance</h2>
                            <p>An official document issued by a barangay certifying that a person is a resident of the barangay and has no pending issues or complaints within the community.</p>
                        </div>
                        <a href='services/barangay-clearance' class='f-center proceed-btn scale-anim' draggable='false'><?= getSVG('proceed') ?> Proceed</a>
                    </div>
                    <div class='f-center f-col docu-cards brgy-cert-card'>
                        <div class='img-wrapper'>
                            <img src='<?= getImage('INDIGENCY.png') ?>' alt="">
                        </div>
                        <div class='f-center f-col docu-details'>
                            <h2>Barangay Indigency</h2>
                            <p>An official document issued by a barangay confirming that a person or family resides in the barangay and qualifies as low-income or financially disadvantaged.</p>
                        </div>
                        <a href='services/barangay-indigency' class='f-center proceed-btn scale-anim' draggable='false'><?= getSVG('proceed') ?> Proceed</a>
                    </div>
                    <div class='f-center f-col docu-cards ind-cert-card'>
                        <div class='img-wrapper'>
                            <img src='<?= getImage('RESIDENCY.png') ?>' alt="">
                        </div>
                        <div class='f-center f-col docu-details'>
                            <h2>Barangay Residency</h2>
                            <p>An official document issued by a barangay that verifies an individual's residence within the barangay for a specified period.</p>
                        </div>
                        <a href='services/barangay-residency' class='f-center proceed-btn scale-anim' draggable='false'><?= getSVG('proceed') ?> Proceed</a>
                    </div>
                </div>
            </div>
        </section>

        <section class='f-center online-docu-req-steps-wrapper'>
            <div class='f-center f-col container online-docu-steps'>
                <h1 class='services-title'>STEPS IN REQUESTING BARANGAY DOCUMENTS</h1>
                <div class='f-center f-row steps-wrapper'>
                    <div class='f-center f-col step1-container steps-cont'>
                        <div class='icon-wrapper'>
                            <div class='step-icon'>
                                <img src='<?= getImage('doc-step-1-choose.png') ?>' alt='Step 1: Choose'>
                            </div>
                        </div>
                        <div class='f-center f-col details-wrapper'>
                            <h3>Step 1: Choose Document</h3>
                            <p>Identify and select the specific document you need based on your requirements.</p>
                        </div>
                    </div>
                    <div class='f-center f-col step2-container steps-cont'>
                        <div class='icon-wrapper'>
                            <div class='step-icon'>
                                <img src='<?= getImage('doc-step-2-complete.png') ?>' alt='Step 2: Complete'>
                            </div>
                        </div>
                        <div class='f-center f-col details-wrapper'>
                            <h3>Step 2: Complete Details</h3>
                            <p>Complete the necessary forms with accurate personal and required details for the document request.</p>
                        </div>
                    </div>
                    <div class='f-center f-col step3-container steps-cont'>
                        <div class='icon-wrapper'>
                            <div class='step-icon'>
                                <img src='<?= getImage('doc-step-3-gather.png') ?>' alt='Step 3: Gather'>
                            </div>
                        </div>
                        <div class='f-center f-col details-wrapper'>
                            <h3>Step 3: Gather Supporting Docs</h3>
                            <p>Gather all required supporting documents to accompany your request for the chosen document type.</p>
                        </div>
                    </div>
                    <div class='f-center f-col step4-container steps-cont'>
                        <div class='icon-wrapper'>
                            <div class='step-icon'>
                                <img src='<?= getImage('doc-step-4-pickup.png') ?>' alt='Step 4: Pick Up'>
                            </div>
                        </div>
                        <div class='f-center f-col details-wrapper'>
                            <h3>Step 4: Pick up</h3>
                            <p>Go to Barangay Hall during operating hours, presenting a valid ID, and collect your requested document once it's ready.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class='f-center hotline-section'>
            <div class='f-center f-col hotline-wrapper'>
                <h1 class='services-title'>EMERGENCY CONTACT HOTLINES</h1>
                <div class='f-center f-row hotline-content'>

                    <?php for($i = 0; $i < count($hotline_names); $i++) { ?>

                    <div class='f-row hotline-num-card'>
                        <div class='logo-wrapper'>
                            <img src='<?= $hotline_images[$i] ?>' alt="">
                        </div>
                        <div class='f-center f-col hotline-num-wrapper'>
                            <h3><?= $hotline_names[$i] ?></h3>
                            <p>#<?= $hotline_number[$i] ?></p>
                        </div>
                    </div>

                    <?php } ?>

                </div>
            </div>
        </section>
        <footer class='f-row services-footer'>
            <p>&copy 2024 Pamantasan ng Lungsod ng Pasig, BSIT 2A - Group 3. All rights reserved.</p>
        </footer>
    </main>
    
    <div class='scroll-on-top-wrapper' title='Scroll on top'>
        <div class='scale-anim f-center scroll-on-top'>
            <?= getSVG('scroll_up'); ?>
        </div>
    </div>

    <script type='text/javascript' src=<?=  getScript('jquery-3.7.1'); ?>></script>
    <script type='module' src=<?=  getScript('home-page'); ?>></script>
</body>
</html>