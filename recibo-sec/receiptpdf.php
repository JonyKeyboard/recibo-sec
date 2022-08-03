<?php
require_once('pdf/library/tcpdf.php');
require_once("globals.php");
require_once("db.php");
require_once("dao/ReceiptDAO.php");


$id = filter_input(INPUT_GET, "id");
$receiptDao = new ReceiptDAO($conn, $BASE_URL);
$receiptData = $receiptDao->findById($id);

//$userDao = new UserDAO($conn, $BASE_URL); 

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Stanley Jony');
$pdf->SetTitle('TCPDF Example 002');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 20);

// add a page
$pdf->AddPage();

// set some text to print
//$txt = "Recebi de " + $receiptData->payer + "a importaância de R$ " + $receiptData->value + " referente a " + $receiptData->description;
$txt = 

// set some text to print
$txt = <<<EOD
 Recebi de $receiptData->payer a importaância de R$ $receiptData->value referente a $receiptData->description
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+