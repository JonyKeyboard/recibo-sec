<?php

require_once 'dompdf/autoload.inc.php';
//require __DIR__ . '/carta.html';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->setChroot(__DIR__);

$dompdf = new Dompdf($options);
//$dompdf->setHttpContext(fopen(__DIR__ . '../img/timbrado-topo.jpg', 'r'));
$dompdf->loadHtmlFile(__DIR__.'\carta.html');
$dompdf->render();

header('Content-type: application/pdf');
echo $dompdf->output();

?>