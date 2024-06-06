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
        $this->SetFont('','B', 16);
        
        $w = array(38, 33, 34, 62, 49, 67);

        for ($i = 0; $i < count($header); $i++)
        {
            $this->Cell($w[$i],9,$header[$i],1,0,'C',true);
        }
           
        $this->Ln();
        
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('','',14);
        
        $fill = false;
        foreach ($data as $row) 
        {
            $this->Cell($w[0],7,$row['privilege'],'LR',0,'C',$fill); 
            $this->Cell($w[1],7,$row['user'],'LR',0,'C',$fill); 
            $this->Cell($w[2],7,$row['event'],'LR',0,'C',$fill); 
            $this->Cell($w[3],7,$row['involved_table'],'LR',0,'C',$fill); 
            $this->Cell($w[4],7,$row['involved_id'],'LR',0,'C',$fill); 
            $this->Cell($w[5],7,$row['time_stamp'],'LR',0,'C',$fill); 
            $this->Ln();
            $fill = !$fill;
        }
        $this->Cell(array_sum($w),0,'','T');
    }
}

$pdf = new PDF('L');
$pdf->SetTitle("LOG REPORT OF ADMIN ACTIVITY");
$pdf->SetMargins(6, 20, 25);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Watermark();

$header = array('Privilege', 'User', 'Event', 'Involved Table', 'Involved ID', 'Time Stamp');
$data = array();

foreach ($export_list as $row)
{
    $data[] = $row;
}

$pdf->FancyTable($header, $data);
$pdf->Output();