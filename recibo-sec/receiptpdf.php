<?php
require_once('pdf/library/tcpdf.php');
require_once("globals.php");
require_once("db.php");
require_once("dao/ReceiptDAO.php");

$id = filter_input(INPUT_GET, "id");
$receiptDao = new ReceiptDAO($conn, $BASE_URL);
$receiptData = $receiptDao->findById($id);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Stanley Jony');
$pdf->SetTitle('Recibo');
$pdf->SetAutoPageBreak(TRUE, 0);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// ------ CABEÇALHO PRINCIPAL
$header = "CONVENÇAO DE MINISTROS DA IGREJA EVANGÉLICA ASSEMBLEIA DE DEUS EM CAMPINA GRANDE E NO ESTADO DA PARAIBA";
$pdf->SetFont('helvetica', 'B', 17);
// 1 via
$pdf->setXY(5,15);
$pdf->Write(0, $header, '', 0, 'C', true, 0, false, false, 0);
// 2 via
$pdf->setXY(5,160);
$pdf->Write(0, $header, '', 0, 'C', true, 0, false, false, 0);
// ------ CABEÇALHO PRINCIPAL

// ------ CABEÇALHO DA CAIXA
$headerBox = <<<EOD
  RECIBO DE PAGAMENTO                                               R$ $receiptData->value
EOD;
// 1 via
$pdf->setXY(5,45);
$pdf->Write(0, $headerBox, '', 0, 'L', true, 0, false, false, 0);
// 2 via
$pdf->setXY(5,195);
$pdf->Write(0, $headerBox, '', 0, 'L', true, 0, false, false, 0);
//------------------------------------LINHA-----------------------------------------------
$pdf->SetFont('helvetica', '', 17);
$lineContent = "________________________________________________________";
$pdf->setXY(8,50);
$pdf->Write(0, $lineContent, '', 0, 'C', true, 0, false, false, 0);
$pdf->setXY(8,200);
$pdf->Write(0, $lineContent, '', 0, 'C', true, 0, false, false, 0);
// ------ CABEÇALHO DA CAIXA

// ------ CONTEUDO
$content = <<<EOD
Recebi de $receiptData->payer (INSERIR CPF) a importância de R$ $receiptData->value referente a $receiptData->description.
EOD;
$pdf->SetFont('helvetica', '', 13);
// 1 via
$pdf->setXY(10,65);
$pdf->Write(0, $content, '', 0, 'L', true, 0, false, false, 0);
// 2 via
$pdf->setXY(10,215);
$pdf->Write(0, $content, '', 0, 'L', true, 0, false, false, 0);
// ------ CONTEUDO

// ------ INFORMAÇOES FINAIS
$data = new DateTime($receiptData->emission);
$dataFormatada = $data->format('d-m-Y');

$finalInfo = <<<EOD
Para maior clareza firmamos o presente recibo, $dataFormatada.
EOD;
$pdf->SetFont('helvetica', '', 12);
// 1 via
$pdf->setXY(10,115);
$pdf->Write(0, $finalInfo, '', 0, 'C', true, 0, false, false, 0);
// 2 via
$pdf->setXY(10,265);
$pdf->Write(0, $finalInfo, '', 0, 'C', true, 0, false, false, 0);
// ------ INFORMAÇOES FINAIS

// ------ ASSINATURA
$signature = <<<EOD
____________________________________
Secretaria COMEAD-CGPB
EOD;
$pdf->SetFont('helvetica', '', 12);
// 1 via
$pdf->setXY(10,125);
$pdf->Write(0, $signature, '', 0, 'C', true, 0, false, false, 0);
// 2 via
$pdf->setXY(10,275);
$pdf->Write(0, $signature, '', 0, 'C', true, 0, false, false, 0);
// ------ ASSINATURA

//-- SEPARADOR DE VIA
$separator = "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -";
$pdf->setXY(10,145);
$pdf->Write(0, $separator, '', 0, 'J', true, 0, false, false, 0);
//-- SEPARADOR DE VIA

// -- CAIXA CENTRAL
$pdf->SetFillColor(255, 255, 255);
// 1 VIA
$pdf->MultiCell(200, 70, '', 1, 'J', 1, 2, 5/*horizontal*/, 40/*vertical*/, true);
// 2 VIA
$pdf->MultiCell(200, 70, '', 1, 'J', 1, 2, 5/*horizontal*/, 190/*vertical*/, true);
// -- CAIXA CENTRAL

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+