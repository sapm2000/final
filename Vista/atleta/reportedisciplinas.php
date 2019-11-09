<?php
session_start();
if(empty($_SESSION['nombre']))
{
	header('Location: ../Persona/InicioSesion.php');
}

if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/AtletaController.php?accion=buscafiltrosdisciplinas");
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
$reporte='';


for ($i=0;$i<=$_SESSION['contador'];$i++ ){
	if (empty($_SESSION['disc'.$i])) {

	}

	else {

		$contar = $_SESSION['cue'.$i];

	$cata.="<table class=tabla-cat id=tabla>";
	foreach($contar as $con) {
		$cata.="<h2>".$con['disciplina']." Masculino</h2>";
		$cata.="<th>Cantidad</th>";
		$cata.="<tr><td>".$con['contar']."</td></tr>";
	}
	$cata.="</table><br>";

	$reporte.="<table class=tabla-cat id=tabla>";
	foreach($contar as $con) {
		$reporte.="<h2>".$con['disciplina']." Masculino</h2>";
		$reporte.="<th>Cantidad</th>";
		$reporte.="<tr><td>".$con['contar']."</td></tr>";
	}
	$reporte.="</table><br>";

	



		

	$catalogo = $_SESSION['disc'.$i];
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";

	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<center><h2>Atletas Masculinos en Cada Disciplina</h2></center>";
	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th><th>Modalidad</th><th>Estatus</th></tr>";

	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th><th>Modalidad</th><th>Estatus</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		
		$cata.="<td>".$cat['nac']."</td>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['disciplina']."</td>";	
		$cata.="<td>".$cat['modalidad']."</td>";	
		$cata.="<td>".$cat['estatu']."</td>";	
		


		$reporte.="<tr>";	
		
		$reporte.="<td>".$cat['nac']."</td>";	
		$reporte.="<td>".$cat['cedula']."</td>";	
		$reporte.="<td>".$cat['nombre']."</td>";	
		$reporte.="<td>".$cat['apellido']."</td>";	
		$reporte.="<td>".$cat['disciplina']."</td>";	
		$reporte.="<td>".$cat['modalidad']."</td>";	
		$reporte.="<td>".$cat['estatu']."</td>";		


	}
	$cata.="</table><br>";


	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	
}

	if (empty($_SESSION['discF'.$i])) {

	}

	else {

		$contar = $_SESSION['cueF'.$i];

	$cata.="<table class=tabla-cat id=tabla>";
	foreach($contar as $con) {
		$cata.="<h2>".$con['disciplina']." Femenino</h2>";
		$cata.="<th>Cantidad</th>";
		$cata.="<tr><td>".$con['contar']."</td></tr>";
	}
	$cata.="</table><br>";

	$reporte.="<table class=tabla-cat id=tabla>";
	foreach($contar as $con) {
		$reporte.="<tr><th>".$con['disciplina']." Masculino</th>";
		$reporte.="<td>".$con['contar']."</td>";
	}
	$reporte.="</table><br>";

	$catalogo = $_SESSION['discF'.$i];
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";

	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<center><h2>Atletas Femeninos en Cada Disciplina</h2></center>";
	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th><th>Modalidad</th><th>Estatus</th></tr>";

	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th><th>Modalidad</th><th>Estatus</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		
		$cata.="<td>".$cat['nac']."</td>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['disciplina']."</td>";	
		$cata.="<td>".$cat['modalidad']."</td>";	
		$cata.="<td>".$cat['estatu']."</td>";	
		


		$reporte.="<tr>";	
		
		$reporte.="<td>".$cat['nac']."</td>";	
		$reporte.="<td>".$cat['cedula']."</td>";	
		$reporte.="<td>".$cat['nombre']."</td>";	
		$reporte.="<td>".$cat['apellido']."</td>";	
		$reporte.="<td>".$cat['disciplina']."</td>";	
		$reporte.="<td>".$cat['modalidad']."</td>";	
		$reporte.="<td>".$cat['estatu']."</td>";		


	}
	$cata.="</table><br>";


	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";



	}


	
	





}
$_SESSION['reporte']=$reporte;


if (empty($_SESSION['hombres'])) {
	$cata.="";
}


$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Atletas',
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
