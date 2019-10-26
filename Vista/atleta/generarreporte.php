

<?php
session_start();
require_once("../dompdf/dompdf_config.inc.php");

$code=$_SESSION['reporte'];
$code.='<link rel="stylesheet" href="../css/estilomodal.css" type="text/css">';

$dompdf = new DOMPDF();
$dompdf->load_html($code);
$dompdf->render(); //este comando renderiza el PDF
$pdf = $dompdf->output(); //extrae el contenido renderizado del PDF
$filename= 'nombre.pdf';
$dompdf->stream($filename,array("attachment"=>0));

$html_para_pdf = ob_get_clean();
