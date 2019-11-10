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

	$tallahombre = $_SESSION['tallashombre'];
	$cata.="<tr><th>Talla hombre</th><th>total</th>";
	foreach($tallahombre as $talh) {
		$cata.="<tr>";	
		$cata.="<td>".$talh['talla']."</td>";	
		$cata.="<td>".$talh['total']."</td>";	

	}

	$tallamujer = $_SESSION['tallasmujer'];
	$cata.="<tr><th>Talla Mujer</th><th>total</th>";
	foreach($tallamujer as $talm) {
		$cata.="<tr>";	
		$cata.="<td>".$talm['talla']."</td>";	
		$cata.="<td>".$talm['total']."</td>";	

	}

	$calzadohombre = $_SESSION['calzadohombre'];
	$cata.="<tr><th>Calzado Hombre</th><th>total</th>";
	foreach($calzadohombre as $calh) {
		$cata.="<tr>";	
		$cata.="<td>".$calh['calzado']."</td>";	
		$cata.="<td>".$calh['total']."</td>";	

	}

	$tallamujer = $_SESSION['calzadomujer'];
	$cata.="<tr><th>Calzado Mujer</th><th>total</th>";
	foreach($tallamujer as $calm) {
		$cata.="<tr>";	
		$cata.="<td>".$calm['calzado']."</td>";	
		$cata.="<td>".$calm['total']."</td>";	

	}

	
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Peso</th><th>Talla</th><th>Altura</th><th>Calzado</th><th>Mano Hábil</th></tr>";
	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Peso</th><th>Talla</th><th>Altura</th><th>Calzado</th><th>Mano Hábil</th></tr>";

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
