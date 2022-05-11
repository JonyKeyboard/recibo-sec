<?php

use Dompdf\Dompdf;

// include autoloader
require_once 'dompdf/autoload.inc.php';



ob_start();
require  __DIR__ . '/carta.php';
$dompdf = new Dompdf();
$dompdf->loadHtml(ob_get_clean());
$dompdf->render();
$dompdf->stream("file.pdf", ["Attachment" => false])

?>