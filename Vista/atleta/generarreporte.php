

<?php
session_start();
require_once("../dompdf-0.5.1/dompdf_config.inc.php");

$dompdf = new DOMPDF();
$dompdf->set_paper("A4");
ob_start();
include 'mi_template_html_de_pdf.php';
$html_para_pdf = ob_get_clean();
$dompdf->load_html($_SESSION['reporte']);
$dompdf->render(); //este comando renderiza el PDF
$output = $dompdf->output(); //extrae el contenido renderizado del PDF
file_put_contents('mipdf.pdf', $output); //guarda el PDF en un fichero llamado mipdf.pdf
