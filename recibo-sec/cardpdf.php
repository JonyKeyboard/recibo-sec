<?php
require_once('pdf/library/tcpdf.php');
require_once("globals.php");
require_once("db.php");
require_once("dao/CardDAO.php");

$id = filter_input(INPUT_GET, "id");
$cardDao = new CardDAO($conn, $BASE_URL);
$cardData = $cardDao->findById($id);

//var_dump($cardData->cpf);exit;

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Stanley Jony');
$pdf->SetTitle('Card');
$pdf->SetAutoPageBreak(TRUE, 0);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// ---------------------------------------------------------

//============================================================+
// PAGE ONE
//============================================================+
$pdf->AddPage("L");

$bMargin = $pdf->getBreakMargin();
$auto_page_break = $pdf->getAutoPageBreak();
$pdf->SetAutoPageBreak(false, 0);
$img_file = "pdf/img/card-frente.png";
$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);

$pdf->setFont('helvetica', '', 35);
// ------ NOME
$pdf->setXY(50,122);
$pdf->Write(0, $cardData->name, '', 0, 'L', true, 0, false, false, 0);
// ------ NOME

// ------ REGISTRO
$pdf->setXY(60,138);
$pdf->Write(0, $cardData->register, '', 0, 'L', true, 0, false, false, 0);
// ------ REGISTRO

// ------ CARGO
$pdf->setXY(52,154);
$pdf->Write(0, $cardData->position, '', 0, 'L', true, 0, false, false, 0);
// ------ CARGO

// ------ FUNÇÃO
$pdf->setXY(58,170);
$pdf->Write(0, $cardData->function, '', 0, 'L', true, 0, false, false, 0);
// ------ FUNÇAO

//============================================================+
// PAGE TWO
//============================================================+
$pdf->AddPage("L");

// -- set new background ---

$bMargin = $pdf->getBreakMargin();
$auto_page_break = $pdf->getAutoPageBreak();
$pdf->SetAutoPageBreak(false, 0);
$img_file = "pdf/img/card-verso.png";
$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);

$pdf->setFont('helvetica', '', 35);

// ------ RG
$pdf->setXY(35,19);
$pdf->Write(0, $cardData->generalRecord, '', 0, 'L', true, 0, false, false, 0);
// ------ RG

// ------ CPF
function formatCpf($value)
{
  $vlr_cpf = preg_replace("/\D/", '', $value);
  return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $vlr_cpf);
}
$cpf = formatCpf($cardData->cpf);
$pdf->setXY(35,37);
$pdf->Write(0, $cpf, '', 0, 'L', true, 0, false, false, 0);
// ------ CPF

// ------ ESTADO CIVIL
$pdf->setXY(76,53);
$pdf->Write(0, $cardData->maritalStatus, '', 0, 'L', true, 0, false, false, 0);
// ------ ESTADO CIVIL

// ------ NATURALIDADE
$pdf->setXY(87,70);
$pdf->Write(0, $cardData->placeOfBirth, '', 0, 'L', true, 0, false, false, 0);
// ------ NATURALIDADE

// ------ IGREJA ONDE SERVE
$pdf->setXY(105,88);
$pdf->Write(0, $cardData->worksplace, '', 0, 'L', true, 0, false, false, 0);
// ------ IGREJA ONDE SERVE


// ------ VALIDADE
$pdf->setXY(65,105);
$pdf->Write(0, $cardData->validity, '', 0, 'L', true, 0, false, false, 0);
// ------ VALIDADE


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+