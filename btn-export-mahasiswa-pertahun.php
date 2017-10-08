<?php

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('isJavascriptEnabled', TRUE);
$dompdf = new Dompdf($options);

// Load content from html file
$html = file_get_contents("export-mahasiswa-pertahun.php");
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream("codexworld",array("Attachment"=>0));

?>