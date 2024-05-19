<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href=<?= getStyle('admin.brgy-officials'); ?>>
</head>
<body>
    <div class='f-row brgy-off-wrapper'>
        <?php include getPartial('admin.side-menu'); ?>
        <main class='brgy-off-content'>
            <header class='f-col'>
                <h3>New Barangay officials</h3>
                <div class='f-row breadcrumbs-wrapper'>
                    <a class='breadcrumb' href='<?= $origin ?>barangay-officials'>Barangay Officials</a> <p>/</p>
                    <a class='breadcrumb' href=''>New Official</a>
                </div>
            </header>
            <div class='new-official-form-wrapper'>
                <form action='' method='POST'>
                    <div class='f-row'>
                        <div class='f-col'>
                            <div class='f-col personal-info-container'>
                                <h3>Personal Information</h3>
                                <div class='f-row'>
                                    <div class='f-col'>
                                        <label for='prefix'>Prefix</label>
                                        <input required type='text' name='prefix' id='prefix'>
                                    </div>

                                    <div class='f-col'>
                                        <label for='lastname'>Lastname</label>
                                        <input required type='text' name='lastname' id='lastname'>
                                    </div>

                                    <div class='f-col'>
                                        <label for='firstname'>Firstname</label>
                                        <input required type='text' name='firstname' id='firstname'>
                                    </div>

                                    <div class='f-col'>
                                        <label for='middlename'>Middlename</label>
                                        <input required type='text' name='middlename' id='middlename'>
                                    </div>
                                </div>
                                <div class='f-row'>
                                    <div class='f-col'>
                                        <label for='birthdate'>Birthdate</label>
                                        <input required type='date' name='birthdate' id='birthdate'>
                                    </div>
                                    <div class='f-col'>
                                        <label for='gender'>Gender</label>
                                        <select name='gender' id='gender'>
                                            <option value='male'>Male</option>
                                            <option value='female'>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='f-col'>
                                    <label for='address'>Address</label>
                                    <input required type='text' name='address' id='address'>
                                </div>
                            </div>
                            <div class='f-col contact-info-container'>
                                <h3>Contact Information</h3>
                                <div class='f-col'>
                                    <label for='phonenum'>Phone number</label>
                                    <input required type='text' name='phonenum' id='phonenum'>
                                </div>
                                <div class='f-col'>
                                    <label for='email'>Email</label>
                                    <input required type='text' name='email' id='email'>
                                </div>
                            </div>
                        </div>
                        <div class=' barangay-position-container'>
                            <h3>Barangay Position</h3>
                            <div class='f-col'>
                                <label for='position'>Position</label>
                                <select name='position' id='position'>
                                    <option value='Barangay Captain'>Barangay Captain</option>
                                    <option value='Barangay Kagawad'>Barangay Kagawad</option>
                                    <option value='SK Chairperson'>SK Chairperson</option>
                                    <option value='Barangay Secretary'>Barangay Secretary</option>
                                    <option value='Barangay Tresurer'>Barangay Tresurer</option>
                                </select>
                            </div>
                            <div class='f-col'>
                                <label for='description'>Description</label>
                                <textarea class='description' name='description' id='description' placeholder='description'></textarea>
                            </div>
                            <button class='submit-new-official-btn' type='submit'>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>