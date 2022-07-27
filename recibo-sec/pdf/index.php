<?php
require_once('library/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//--PÁGINA 1

// add a page
$pdf->AddPage("L");

// -- set new background ---

$bMargin = $pdf->getBreakMargin();
$auto_page_break = $pdf->getAutoPageBreak();
$pdf->SetAutoPageBreak(false, 0);
$img_file = "img/lobo2.jpg";
$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
$pdf->setPageMark();

$pdf->setFont('times', '', 50);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->setCellMargins(1, 1, 1, 1);
$pdf->SetFillColor(255, 255, 127);
$txt = 'JOAO DA SILVA NEVES';
$pdf->setXY(40,60);
$pdf->Cell(200, 0, $txt, 0, 'L', 0, 0, '', '', true, 0, false, true, 0);

//--PÁGINA 2

// add a page
$pdf->AddPage("L");


// -- set new background ---
$bMargin = $pdf->getBreakMargin();
$auto_page_break = $pdf->getAutoPageBreak();
$pdf->SetAutoPageBreak(false, 0);
$img_file = "img/por-do-sol.jpg";
$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
$pdf->setPageMark();

$pdf->setFont('times', '', 20);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->setCellMargins(1, 1, 1, 1);
$pdf->SetFillColor(255, 255, 127);
$txt = 'JOAO DA SILVA NEVES';
$pdf->setXY(40,60);
$pdf->Cell(100, 0, $txt, 0, 'L', 0, 0, '', '', true, 0, false, true, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_051.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+