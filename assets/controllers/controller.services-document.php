<?php

$purpose = [
    'Scholarships',
    'Medical Assistance',
    'Subsidized Housing',
    'Calamity Assistance',
    'Discounted Funeral Services'
];

$parsedUrl      = parse_url($uri, PHP_URL_PATH);
$trimmedPath    = rtrim($parsedUrl, '/');
$parts          = explode('/', $trimmedPath);
$curr_uri       = end($parts);
$doctype;

if ($curr_uri == 'barangay-clearance')
{
    $doctype = 'Barangay clearance';

    $requirements = [
        "Government issued ID addressed in Barangay San Nicolas, Pasig City (e.g. Passport, Driver's License, SSS/GSIS ID, PRC ID, Postal ID)", 
        "Contract of Lease or Land Title", 
        "Utility Billing Statement addressed in Barangay San Nicolas, Pasig City",
        "Certificate of Residency from the Building Administrator or Lessor (if tenant)"
    ];
}
else if ($curr_uri == 'barangay-indigency')
{
    $doctype = 'Barangay Indigency';

    $requirements = [
        "Government issued ID addressed in Barangay San Nicolas, Pasig City (e.g. Passport, Driver's License, SSS/GSIS ID, PRC ID, Postal ID)

        If No Government ID, Birthcertificate can be presented"
    ];
}
else if ($curr_uri == 'barangay-residency')
{
    $doctype = 'Barangay Residency';
    
    $requirements = [
        "Government issued ID addressed in Barangay San Nicolas, Pasig City (e.g. Passport, Driver's License, SSS/GSIS ID, PRC ID, Postal ID)

        If No Government ID, Birthcertificate can be presented",
        "Proof of Income"
    ];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = generateID('DOC');

    $data = [
        $id,
        $_POST['lastname'],
        $_POST['firstname'],
        $_POST['middlename'],
        $_POST['suff'],
        $_POST['birthdate'],
        $_POST['address'],
        $_POST['y-of-res'],
        $doctype,
        $_POST['purpose'],
        $_POST['cont-num'],
        $_POST['email'],
        'request',
        date('Y-m-d H:i:s'),
        null
    ];

    $add = addDocumentRequest($data);

    if ($add != 0)
    {
        $modal_icon     = 'success';
        $modal_title    = 'Request Completed!';
        $modal_message  = 'Your request is being processed.';
    }
    else 
    {
        $modal_icon     = 'error';
        $modal_title    = 'Request Failed!';
        $modal_message  = 'An Error occured while requesting document.';
    }

    $modal_pos = '-';
    $path      = '/sannicolasbis/community/services';
    require getPartial('admin.confirm-modal');
}

require getPublicView('services-document');