<?php

require './pdf/fpdf/fpdf.php';

class PDF extends FPDF 
{
    var $brgy_logo      = './pdf/template/brgy_logo.jpg';
    var $sannics_logo   = './pdf/template/sannicolas_logo.jpg';
    var $watermark      = './pdf/template/bg.png';

    function Header() 
    {
        $this->Image($this->brgy_logo,10,8,30); 
        $this->Image($this->sannics_logo,262,6,30); 
        $this->SetFont('times','',14);
        $this->SetY(13);
        $this->SetX(125);
        $this->Write(5,'Republika ng Pilipinas');
        $this->Ln(3);
        $this->SetFont('times','B',16);
        $this->SetX(87);
        $this->Write(10,'SANGGUNIANG BARANGAY SAN NICOLAS');
        $this->Ln(3);
        $this->SetFont('times','',14);
        $this->SetX(130);
        $this->Write(15,'Lungsod ng Pasig');
        $this->Ln(3);
        $this->SetX(129);       
        $this->Write(20,'Tel. No. 72397463');
        $this->Ln(30);
        $this->SetFont('times', 'BU', 14);
        $this->Line(289,45,6,45);
    }

    function Watermark() 
    {
        list($width, $height) = getimagesize($this->watermark);
        
        $new_width = $width * 0.5; 
        $new_height = $height * 0.5; 
        
        $x = ($this->GetPageWidth() - $new_width) / 2; 
        $y = ($this->GetPageHeight() - $new_height) / 2;

        $this->Image($this->watermark, $x, $y, $new_width, $new_height, '', '', ''); 
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetX(28);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function FancyTable($header, $data) 
    {
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.2);
        $this->SetFont('','B', 10);
        
        $w = array(30, 16, 27, 20, 18, 36, 36, 25, 20, 25, 30);
        for ($i = 0; $i < count($header); $i++)
        {
            $this->Cell($w[$i],8,$header[$i],1,0,'C',true);
        }

        $this->Ln();
        
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('','',7);
        
        $fill = false;
        foreach ($data as $row) 
        {
            $this->Cell($w[0],6,$row['last_name'].' '.$row['middle_name'].' '.$row['first_name'],'LR',0,'C',$fill);  
            $this->Cell($w[1],6,$row['sex'],'LR',0,'C',$fill); 
            $this->Cell($w[2],6,$row['relationship'],'LR',0,'C',$fill); 
            $this->Cell($w[3],6,$row['birthdate'],'LR',0,'C',$fill); 
            $this->Cell($w[4],6,$row['purok'],'LR',0,'C',$fill); 
            $this->Cell($w[5],6,$row['address'],'LR',0,'C',$fill); 
            $this->Cell($w[6],6,$row['email'],'LR',0,'C',$fill); 
            $this->Cell($w[7],6,$row['place_of_birth'],'LR',0,'C',$fill); 
            $this->Cell($w[8],6,$row['in_school'],'LR',0,'C',$fill); 
            $this->Cell($w[9],6,$row['occupation'],'LR',0,'C',$fill); 
            $this->Cell($w[10],6,$row['medical_history'],'LR',0,'C',$fill); 
            $this->Ln();
            $fill = !$fill;
        }

        $this->Cell(array_sum($w),0,'','T');
    }
}
    
$pdf = new PDF('L');
$pdf->SetTitle("FAMILY MEMBER REPORT");
$pdf->SetMargins(6, 20, 25);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Watermark();

$header = array( 'Fullname', 'Sex', 'Relationship', 'Birthdate', 'Purok', 'Address', 'Email', 'Place of Birth','In School','Occupation', 'Medical History');
$data = array();

foreach ($export_list as $row)
{
    $data[] = $row;
}

$pdf->FancyTable($header, $data);
$pdf->Output();