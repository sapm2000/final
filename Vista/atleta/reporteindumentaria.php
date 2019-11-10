<?php
session_start();
if(empty($_SESSION['nombre']))
{
	header('Location: ../Persona/InicioSesion.php');
}

if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/AtletaController.php?accion=buscafiltrosindumentaria");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}

$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()"></td>';
$form.='</tr>';
$form.='</table>';
$form.='<table>';
$form.='<tr>';
$form.='<td> <a href="generarreporte.php?accion=filtroga"><input type="button" class="botonmodal" value="Generar Reporte" name="filtroga" title="Generar Reporte"> </a></td>';

$form.='</tr>';
$form.='</table>';

if($_GET['accion']=="actual"&&!empty($_SESSION['indumentaria']))
{
	$catalogo = $_SESSION['indumentaria'];
	$reporte='';

	$cata.="<table class=tabla-cat id=tabla>";

	$cata.="<h2>Tallas</h2>";
	$reporte.="<center><h2>Tallas</h2></center>";

	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";

	$tallahombre = $_SESSION['tallashombre'];
	$reporte.="<tr><th>Tallas de Hombre</th><th>Total</th>";
	$cata.="<tr><th>Tallas de Hombre</th><th>Total</th>";
	foreach($tallahombre as $talh) {
		$cata.="<tr>";	
		$cata.="<td>".$talh['talla']."</td>";	
		$cata.="<td>".$talh['total']."</td>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$talh['talla']."</td>";	
		$reporte.="<td>".$talh['total']."</td>";	

	}


	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";




	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";

	$tallamujer = $_SESSION['tallasmujer'];
	$reporte.="<tr><th>Tallas de Mujer</th><th>Total</th>";
	$cata.="<tr><th>Tallas de Mujer</th><th>Total</th>";
	foreach($tallamujer as $talm) {
		$cata.="<tr>";	
		$cata.="<td>".$talm['talla']."</td>";	
		$cata.="<td>".$talm['total']."</td>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$talm['talla']."</td>";	
		$reporte.="<td>".$talm['total']."</td>";	
	}

	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$cata.="<table class=tabla-cat id=tabla>";

	$cata.="<h2>Calzados</h2>";
	$reporte.="<center><h2>Calzados</h2></center>";

	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";

	$calzadohombre = $_SESSION['calzadohombre'];
	$reporte.="<tr><th>Calzados de Hombre</th><th>Total</th>";
	$cata.="<tr><th>Calzados de Hombre</th><th>Total</th>";
	foreach($calzadohombre as $calh) {
		$cata.="<tr>";	
		$cata.="<td>".$calh['calzado']."</td>";	
		$cata.="<td>".$calh['total']."</td>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$calh['calzado']."</td>";	
		$reporte.="<td>".$calh['total']."</td>";	
	}

	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";

	$tallamujer = $_SESSION['calzadomujer'];
	$reporte.="<tr><th>Calzados de Mujer</th><th>Total</th>";
	$cata.="<tr><th>Calzados de Mujer</th><th>Total</th>";
	foreach($tallamujer as $calm) {
		$cata.="<tr>";	
		$cata.="<td>".$calm['calzado']."</td>";	
		$cata.="<td>".$calm['total']."</td>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$calm['calzado']."</td>";	
		$reporte.="<td>".$calm['total']."</td>";	

	}

	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";
	
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";

	$cata.="<h2>Atletas</h2>";
	$reporte.="<center><h2>Atletas</h2></center>";

	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Peso</th><th>Talla</th><th>Altura</th><th>Calzado</th><th>Mano Hábil</th></tr>";
	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Peso</th><th>Talla</th><th>Altura</th><th>Calzado</th><th>Mano Hábil</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nac']."</td>";	
		$cata.="<td>".$cat['cedula']."</td>";
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['peso']."</td>";	
		$cata.="<td>".$cat['talla']."</td>";	
		$cata.="<td>".$cat['altura']."</td>";	
		$cata.="<td>".$cat['calzado']."</td>";	
		$cata.="<td>".$cat['mano']."</td>";	



		$reporte.="<tr>";	
		$reporte.="<td>".$cat['nac']."</td>";	
		$reporte.="<td>".$cat['cedula']."</td>";	
		$reporte.="<td>".$cat['nombre']."</td>";	
		$reporte.="<td>".$cat['apellido']."</td>";	
		$reporte.="<td>".$cat['peso']."</td>";	
		$reporte.="<td>".$cat['talla']."</td>";	
		$reporte.="<td>".$cat['altura']."</td>";	
		$reporte.="<td>".$cat['calzado']."</td>";	
		$reporte.="<td>".$cat['mano']."</td>";	


	}
	$cata.="</table><br>";


	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	




	$_SESSION['reporte']=$reporte;

}
if (empty($_SESSION['indumentaria'])) {
	$cata.="No hay atletas registrados";
}


$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Reporte de Tallas y Calzado',
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
