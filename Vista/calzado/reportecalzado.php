<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/CalzadoController.php?accion=buscatodosreporte");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}


$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<form name="regcalzado" method="post" action="../../Controlador/CalzadoController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Calzado:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" id="letra" onkeypress="return solonumeros(event)" onpaste="return false" name="cal" maxlenght="9" pattern="[0-9]{2}" title="máximo de 2 caracteres" required></td>';
$form.='<td> <a href="generarreporte.php?"><input type="button" class="botonmodal" value="Generar Reporte" name="activos" title="Generar Reporte"> </a></td>';
$form.='</tr>';
$form.='</table>';

$form.='</form>';

if($_GET['accion']=="actual" && !empty($_SESSION['catacalrep']))
{
	$catalogo = $_SESSION['catacalrep'];
	$reporte='';

	$cata.="<form name='catalog' action='../../Controlador/CalzadoController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla>";

	$cata.="<tr><th>Calzados</th><th>Total</th></tr>";
	$reporte.="<tr><th>Calzados</th><th>Total</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['calzado']."</td>";	
		$cata.="<td>".$cat['total']."</td>";	

		$cata.="</tr>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$cat['calzado']."</td>";	
		$reporte.="<td>".$cat['total']."</td>";	

		$reporte.="</tr>";	
	}
	$cata.="</table><br>";
	$reporte.="</table><br>";

	$_SESSION['reportecalzado']=$reporte;

}
else
{
	$cata.= "Aún no se han registrado calzados.";
	$cata.='<br>';
	$cata.='<br>';
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Calzados',
	'CATALOGO'=>$cata,
	'BOTONREG'=>$boton,
	'FORMULARIO'=>$form,
	'MENU'=>$_SESSION['menu']
);
$template = file_get_contents('../Plantilla/ventanamodal.html');
foreach ($diccionario as $clave=>$valor)
{
	$template = str_replace("{".$clave."}", $valor, $template);
}
print $template;
?>
