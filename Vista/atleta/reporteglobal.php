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









		

	$catalogo = $_SESSION['atletaunidisciplina'];
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";

	$cata.="<table class=tabla-cat id=tabla>";


	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Modalidad</th></tr>";

	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Modalidad</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		
		$cata.="<td>".$cat['nac']."</td>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['disciplina']."</td>";	
		


		$reporte.="<tr>";	
		
		$reporte.="<td>".$cat['nac']."</td>";	
		$reporte.="<td>".$cat['cedula']."</td>";	
		$reporte.="<td>".$cat['nombre']."</td>";	
		$reporte.="<td>".$cat['apellido']."</td>";	
		$reporte.="<td>".$cat['disciplina']."</td>";	


	}
	$cata.="</table><br>";


	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>atletas masculinos</th><th>atletas femeninos</th><th>total</th></tr>";
	$cata.="<tr>";	
	$cata.="<td>".$_SESSION['ddd']."</td>";	
	$cata.="<td>".$_SESSION['fff']."</td>";	
	$cata.="<td>".$_SESSION['cuentaunitotal']."</td>";
	$cata.="</table><br>";



	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Modalidad</th></tr>";
	for($i=0;$i<$_SESSION['c'];$i++) {
		$catalogo = $_SESSION['multidisciplinas'.$i];

		foreach($catalogo as $cat) {
			$cata.="<tr>";	
		
			$cata.="<td>".$cat['nac']."</td>";	
			$cata.="<td>".$cat['cedula']."</td>";	
			$cata.="<td>".$cat['nombre']."</td>";	
			$cata.="<td>".$cat['apellido']."</td>";	
			$cata.="<td>".$cat['disciplina']."</td>";	
		}

	}
	$cata.="</table><br>";


	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>atletas masculinos</th><th>atletas femeninos</th><th>total</th></tr>";
	$cata.="<tr>";	
	$cata.="<td>".$_SESSION['multihombre']."</td>";	
	$cata.="<td>".$_SESSION['multimujer']."</td>";	
	$cata.="<td>".$_SESSION['multiambos']."</td>";
	$cata.="</table><br>";






$_SESSION['reporte']=$reporte;
$titulo=$_SESSION['discipli'];

if (empty($_SESSION['hombres'])) {
	$cata.="";
}


$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'REPORTE DE '.$titulo,
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
