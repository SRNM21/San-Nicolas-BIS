<?php

require './pdf/fpdf/fpdf.php';

class PDF extends FPDF 
{
    var $brgy_logo      = './pdf/template/brgy_logo.jpg';
    var $sannics_logo   = './pdf/template/sannicolas_logo.jpg';
    var $watermark      = './pdf/template/bg.png';
    var $angle          = 0;

    function Header() 
    {
        // Logos
        $this->Image($this->brgy_logo,10,6,30); 
        $this->Image($this->sannics_logo,170,6,30); 
        $this->SetFont('times','',14);
        $this->Cell(80);
        $this->Cell(30,6,'Republika ng Pilipinas',0,1,'C');
        $this->Cell(80);
        $this->SetFont('times','B',16);
        $this->Cell(30,6,'SANGGUNIANG BARANGAY SAN NICOLAS',0,1,'C');
        $this->Cell(80);
        $this->SetFont('times','',14);
        $this->Cell(30,6,'Lungsod ng Pasig',0,1,'C');
        $this->Cell(80);
        $this->Cell(30,6,'Tel. No. 72397463',0,1,'C');
        $this->Ln(20);
    }
    // Watermark
    function Watermark() 
    {
        // Get the dimensions of the watermark image
        $watermark = $this->watermark; 
        list($width, $height) = getimagesize($watermark);

        // Calculate the position to center the watermark on the page
        $x = ($this->GetPageWidth() - $width / 1) / 0.8; 
        $y = ($this->GetPageHeight() - $height / 1) / 1.2;
        
        // Increase the width and height for a larger watermark (adjust as needed)
        $new_width = $width * 0.9; 
        $new_height = $height * 0.8; 

        // Add the watermark image with alpha channel and adjusted size
        $this->Image($watermark, $x, $y, $new_width, $new_height, '', '', ''); 
    }
}


$padding = 20;
$name = $data['last_name'];

$text = "This is to certify that MR./MS $name is bonafide resident of this Barangay with address at 242 marigold st. Pinagbuhatan Pasig City Barangay San Nicolas, Pasig City.I certify further that his/her family belongs to an indigent family of the barangay This certification is being issued for INDIGENCY and for whatever legal purpose(s) it may serve.";

$pdf = new PDF();
$pdf->AddPage();

//! NAME
$pdf->SetFont('times', '', 14);
$pdf->SetX(50);
$pdf->Ln(20);
$pdf->MultiCell(0, 15, $text, 1, 'L', false);

$pdf->Output();