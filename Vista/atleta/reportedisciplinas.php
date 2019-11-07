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

if($_GET['accion']=="actual"&&!empty($_SESSION['disciplinas']))
{
	$catalogo = $_SESSION['disciplinas'];
	$reporte='';
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";

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

	if($_SESSION['contar']!='') {

	


	$contar = $_SESSION['contar'];

	$cata.="<table class=tabla-cat id=tabla>";

	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th><th>Modalidad</th><th>Estatus</th></tr>";

	foreach($contar as $con)
	{
		
		$cata.="<tr>";	

		$cata.="<td>".$con['disciplina']."</td>";	
		$cata.="<td>".$con['total']."</td>";	

			
		

	}
	$cata.="</table><br>";

	$contarmod = $_SESSION['contarmod'];

	$cata.="<table class=tabla-cat id=tabla>";

	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th><th>Modalidad</th><th>Estatus</th></tr>";

	foreach($contarmod as $conta)
	{
		
		$cata.="<tr>";	

		$cata.="<td>".$conta['disciplina']."</td>";	
		$cata.="<td>".$conta['modalidad']."</td>";	
		$cata.="<td>".$conta['total']."</td>";	

			
		

	}
	$cata.="</table><br>";
	}
	}


	$_SESSION['reporte']=$reporte;
	



if (empty($_SESSION['disciplinas'])) {
	$cata.="No hay atletas registrados";
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
