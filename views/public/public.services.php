<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Barangay San Nicolas</title>
    <link rel='stylesheet' href=<?= getStyle('services'); ?>>
</head>
<body>
    <?php require getPartial('header') ?>
    <main>
        <section class='f-center online-docu-req-wrapper'>
            <div class='f-center f-col container online-docu-req'>
                <div class='f-center f-col online-docu-req-title'>
                    <p><b>Documents</b></p>
                    <h1>ONLINE BARANGAY DOCUMENT REQUEST</h1>
                </div>
                <div class='f-center f-row docu-cards-wrapper'>
                    <div class='f-center f-col docu-cards brgy-clr-card'>
                        <div class='icon-wrapper'>
                            <div class='docu-icon'>
                                <?= getSVG('document') ?>
                            </div>
                        </div>
                        <div class='f-center f-col docu-details'>
                            <h2>Barangay Clearance</h2>
                            <p>A document issued by the barangay confirming that the individual or entity has complied with local requirements</p>
                        </div>
                        <a href='services/barangay-clearance' class='f-center proceed-btn'><?= getSVG('proceed') ?> Proceed</a>
                    </div>
                    <div class='f-center f-col docu-cards brgy-cert-card'>
                        <div class='icon-wrapper'>
                            <div class='docu-icon'>
                                <?= getSVG('document') ?>
                            </div>
                        </div>
                        <div class='f-center f-col docu-details'>
                            <h2>Barangay Certificate</h2>
                            <p>A document issued by the barangay confirming that the individual or entity has complied with local requirements</p>
                        </div>
                        <a href='services/barangay-certificate' class='f-center proceed-btn'><?= getSVG('proceed') ?> Proceed</a>
                    </div>
                    <div class='f-center f-col docu-cards ind-cert-card'>
                        <div class='docu-wrapper'>
                            <div class='docu-icon'>
                                <?= getSVG('document') ?>
                            </div>
                        </div>
                        <div class='f-center f-col docu-details'>
                            <h2>Indigency Certificate</h2>
                            <p>A document issued by the barangay confirming that the individual or entity has complied with local requirements</p>
                        </div>
                        <a href='services/indigency-certificate' class='f-center proceed-btn'><?= getSVG('proceed') ?> Proceed</a>
                    </div>
                </div>
            </div>
        </section>

        <section class='f-center online-docu-req-steps-wrapper'>
            <div class='f-center f-col container online-docu-steps'>
                <h1 class='online-docu-steps-title'>Steps in Requesting Barangay Documents</h1>
                <div class='f-center f-row steps-wrapper'>
                    <div class='f-center f-col step1-container steps-cont'>
                        <div class='icon-wrapper'>
                            <div class='step-icon'></div>
                        </div>
                        <div class='f-center f-col details-wrapper'>
                            <h3>Step 1: Choose Document</h3>
                            <p>Identify and select the specific document you need based on your requirements.</p>
                        </div>
                    </div>
                    <div class='f-center f-col step2-container steps-cont'>
                        <div class='icon-wrapper'>
                            <div class='step-icon'></div>
                        </div>
                        <div class='f-center f-col details-wrapper'>
                            <h3>Step 2: Complete Details</h3>
                            <p>Complete the necessary forms with accurate personal and required details for the document request.</p>
                        </div>
                    </div>
                    <div class='f-center f-col step3-container steps-cont'>
                        <div class='icon-wrapper'>
                            <div class='step-icon'></div>
                        </div>
                        <div class='f-center f-col details-wrapper'>
                            <h3>Step 3: Gather Supporting Docs</h3>
                            <p>Gather all required supporting documents to accompany your request for the chosen document type.</p>
                        </div>
                    </div>
                    <div class='f-center f-col step4-container steps-cont'>
                        <div class='icon-wrapper'>
                            <div class='step-icon'></div>
                        </div>
                        <div class='f-center f-col details-wrapper'>
                            <h3>Step 4: Pick up</h3>
                            <p>Go to Barangay Hall during operating hours, presenting a valid ID, and collect your requested document once it's ready.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>