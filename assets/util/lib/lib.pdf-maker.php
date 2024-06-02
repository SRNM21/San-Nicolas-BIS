<?php

require './pdf/fpdf/fpdf.php';

class PDF extends FPDF {
    var $brgy_logo      = './pdf/template/brgy_logo.jpg';
    var $sannics_logo   = './pdf/template/sannicolas_logo.jpg';
    var $watermark      = './pdf/template/bg.png';
    var $phone          = './pdf/template/phone.png';
    var $facebook       = './pdf/template/facebook-original.png';
    var $mail           = './pdf/template/mail.png';
    var $angle          = 0;

    function Header() {
        $this->Image($this->brgy_logo, 10, 6, 30);
        $this->Image($this->sannics_logo, 170, 6, 30);
        $this->SetFont('times', '', 14);
        $this->SetY(13);
        $this->SetX(80);
        $this->Write(5, 'Republika ng Pilipinas');
        $this->Ln(3);
        $this->SetFont('times', 'B', 16);
        $this->SetX(47);
        $this->Write(10, 'SANGGUNIANG BARANGAY SAN NICOLAS');
        $this->Ln(3);
        $this->SetFont('times', '', 14);
        $this->SetX(85);
        $this->Write(15, 'Lungsod ng Pasig');
        $this->Ln(3);
        $this->SetX(84);
        $this->Write(20, 'Tel. No. 72397463');
        $this->Ln(3);
        $this->Ln(30);
        $this->SetFont('times', 'BU', 14);
        $this->Line(206, 45, 6, 45);
        $this->Line(206, 45, 6, 45);
    }

    function Watermark() 
    {
        list($width, $height) = getimagesize($this->watermark);

        $x = ($this->GetPageWidth() - $width / 1) / 0.8;
        $y = ($this->GetPageHeight() - $height / 1) / 1.2;

        $new_width = $width * 0.9;
        $new_height = $height * 0.8;

        $this->Image($this->watermark, $x, $y, $new_width, $new_height, '', '', '');
    }

    function Footer() 
    {
        $this->SetY(-40);
        $this->SetFont('times', '', 10);

        $this->Image($this->phone, 10, $this->GetY(), 5);
        $this->Ln(5);
        $this->Write(-4, '72397463');

        $this->Image($this->mail, 10, $this->GetY(), 5);
        $this->Ln(5);
        $this->Write(-4, 'barangaysannicolas.plpasig@gmail.com');

        $this->Image($this->facebook, 10, $this->GetY(), 5);
        $this->Ln(5);
        $this->Write(-4, 'facebook.com/groups/394605741237735/');
    }
}

$pdf = new PDF();

if ($data['document_type'] == 'Barangay Clearance')
{
    $pdf->SetTitle("CERTIFICATE OF CLEARANCE");
    $pdf->SetMargins(25, 30, 30);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Watermark();

    $date_string = $data['date_claimed'];
    $day = date('d', strtotime($date_string));
    $month = date('F', strtotime($date_string));
    $year = date('Y', strtotime($date_string));

    $pdf->Ln(5);
    $pdf->SetFont('times', 'BU', 18);
    $pdf->MultiCell(0, 10, 'BARANGAY CLEARANCE', 0, 'C');
    $pdf->Ln(20);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, 'This is to certify that MR./MS ');

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['first_name'] . ' ' . $data['middle_name'] . ' ' . $data['last_name']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' is bonafide ');
    $pdf->Write(5, "resident of this Barangay with address at ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['address']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' Barangay San Nicolas, Pasig City for ');

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['years_of_residence']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' years.');
    $pdf->Write(5, ' Is known to be of good moral character and law-abiding citizen in the community.');

    $pdf->Ln(15);
    $pdf->Write(5, "To certify further, that he/she has no derogatory and/or criminal files in this barangay.");
    $pdf->Ln(15);
    $pdf->Write(5, "This certification is being issued for ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['purpose']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, " and for whatever legal purpose(s) it may serve.");

    $pdf->Ln(15);
    $pdf->Write(5, "Signed this ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $day);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, " day of ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $month);
    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' ');
    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $year);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, " at Brgy. San Nicolas Pasig City.");

    $pdf->SetFont('times', 'B', 10);
    $pdf->Ln(10);
    $pdf->Write(5, "NOTE: NOT VALID WITHOUT THE OFFICIAL SEAL OF THE BARANGAY");

    $pdf->Ln(55);
    $pdf->SetFont('times', 'BU', 12);
    $pdf->SetX(55);
    $pdf->Cell(70, 5, '', 0, 0);
    $pdf->Cell(55, 0, 'HON. RIGOR J. ENRIQUEZ ', 0, 1);

    $pdf->SetFont('times', '', 12);
    $pdf->SetX(55);
    $pdf->Cell(70, 5, '', 0, 0);
    $pdf->Cell(55, 10, 'Punong Barangay', 0, 1, 'C');

    $pdf->Line(6, 239, 205, 239);
}
else if ($data['document_type'] == 'Barangay Indigency')
{
    $pdf->SetMargins(25, 30, 30);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Watermark();

    $date_string = $data['date_claimed'];
    $day = date('d', strtotime($date_string));
    $month = date('F', strtotime($date_string));
    $year = date('Y', strtotime($date_string));

    $pdf->Ln(5);
    $pdf->SetFont('times', 'BU', 18);
    $pdf->MultiCell(0, 10, 'CERTIFICATE OF INDIGENCY', 0, 'C');
    $pdf->Ln(20);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, 'This is to certify that MR./MS ');

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['first_name'] . ' ' . $data['middle_name'] . ' ' . $data['last_name']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' is bonafide ');
    $pdf->Write(5, "resident of this Barangay with address at ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['address']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' Barangay San Nicolas, Pasig City for ');

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['years_of_residence']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' years.');

    $pdf->Ln(15);
    $pdf->Write(5, "To certify further that his/her family belongs to an indigent family of the barangay ");
    $pdf->Ln(15);
    $pdf->Write(5, "This certification is being issued for ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['purpose']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, " and for whatever legal purpose(s) it may serve.");

    $pdf->Ln(15);
    $pdf->Write(5, "Signed this ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $day);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, " day of ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $month);
    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' ');
    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $year);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, " at Brgy. San Nicolas Pasig City.");

    $pdf->SetFont('times', 'B', 10);
    $pdf->Ln(10);
    $pdf->Write(5, "NOTE: NOT VALID WITHOUT THE OFFICIAL SEAL OF THE BARANGAY");

    $pdf->Ln(55);
    $pdf->SetFont('times', 'BU', 12);
    $pdf->SetX(55);
    $pdf->Cell(70, 5, '', 0, 0);
    $pdf->Cell(55, 0, 'HON. RIGOR J. ENRIQUEZ ', 0, 1);

    $pdf->SetFont('times', '', 12);
    $pdf->SetX(55);
    $pdf->Cell(70, 5, '', 0, 0);
    $pdf->Cell(55, 10, 'Punong Barangay', 0, 1, 'C');

    $pdf->Line(6, 239, 205, 239);
}
if ($data['document_type'] == 'Barangay Residency')
{
    $pdf->SetTitle("CERTIFICATE OF RESIDENCY");
    $pdf->SetMargins(25, 30, 30);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Watermark();
    
    $date_string = $data['date_claimed'];
    $day = date('d', strtotime($date_string));
    $month = date('F', strtotime($date_string));
    $year = date('Y', strtotime($date_string));

    $pdf->Ln(5);
    $pdf->SetFont('times', 'BU', 18);
    $pdf->MultiCell(0, 10, 'CERTIFICATE OF RESIDENCY', 0, 'C');
    $pdf->Ln(20);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, 'This is to certify that MR./MS ');

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['first_name'] . ' ' . $data['middle_name'] . ' ' . $data['last_name']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' is bonafide ');
    $pdf->Write(5, "resident of this Barangay with address at ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['address']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' Barangay San Nicolas, Pasig City for ');

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['years_of_residence']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' years.');

    $pdf->Ln(15);
    $pdf->Write(5, "This certification is being issued for ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $data['purpose']);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, " and for whatever legal purpose(s) it may serve.");

    $pdf->Ln(15);
    $pdf->Write(5, "Signed this ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $day);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, " day of ");

    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $month);
    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, ' ');
    $pdf->SetFont('times', 'BU', 14);
    $pdf->Write(5, $year);

    $pdf->SetFont('times', '', 14);
    $pdf->Write(5, " at Brgy. San Nicolas Pasig City.");

    $pdf->SetFont('times', 'B', 10);
    $pdf->Ln(10);
    $pdf->Write(5, "NOTE: NOT VALID WITHOUT THE OFFICIAL SEAL OF THE BARANGAY");

    $pdf->Ln(55);
    $pdf->SetFont('times', 'BU', 12);
    $pdf->SetX(55);
    $pdf->Cell(70, 5, '', 0, 0);
    $pdf->Cell(55, 0, 'HON. RIGOR J. ENRIQUEZ ', 0, 1);

    $pdf->SetFont('times', '', 12);
    $pdf->SetX(55);
    $pdf->Cell(70, 5, '', 0, 0);
    $pdf->Cell(55, 10, 'Punong Barangay', 0, 1, 'C');

    $pdf->Line(6, 239, 205, 239);
}

$pdf->Output();
$stmt->close();
$conn->close();
?>