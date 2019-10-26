

<?php
session_start();
require_once("../dompdf/dompdf_config.inc.php");

$dompdf = new DOMPDF();
$dompdf->load_html($_SESSION['reporte']);
$dompdf->render(); //este comando renderiza el PDF
$pdf = $dompdf->output(); //extrae el contenido renderizado del PDF
$filename= 'nombre.pdf';
$dompdf->stream($filename,array("attachment"=>0));

$html_para_pdf = ob_get_clean();
