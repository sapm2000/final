

<?php
session_start();
require_once("../dompdf/dompdf_config.inc.php");



if ($_REQUEST['accion']=="global") {
    $code.="<h1 class=texto>Reporte de Representantes.</h1>";
   $code.=$_SESSION['reporterepresentante'];
   $code.='<link rel="stylesheet" href="../css/pdfreporte.css" type="text/css">';
   $filename= 'Reporte de Representantes.pdf';
}
    
if ($_REQUEST['accion']=="detalle") {
    $code.="<h1 class=texto>Reporte Especifico de un Representante.</h1>";
    $code.=$_SESSION['reporterepresentantedetalles'];
    $code.='<link rel="stylesheet" href="../css/pdfreporterepresentanteagregar.css" type="text/css">';
    $filename= 'Reporte Especifico de un Representante.pdf';
}




$dompdf = new DOMPDF();
$dompdf->load_html($code);
$dompdf->set_paper('office','landscape');
$dompdf->render(); //este comando renderiza el PDF

$canvas = $dompdf->get_canvas();
$footer = $canvas->open_object();
$w = $canvas->get_width();
$h = $canvas->get_height();
$canvas->page_text($w-80,$h-15,"Página {PAGE_NUM} de {PAGE_COUNT}", Font_Metrics::get_font('helvetica'),9);
$canvas->page_text($w-450,$h-15,"Instituto Autónomo del Deporte FUNDEY", Font_Metrics::get_font('helvetica'),9);

$pdf = $dompdf->output(); //extrae el contenido renderizado del PDF


$dompdf->stream($filename,array("attachment"=>0));

$html_para_pdf = ob_get_clean();


