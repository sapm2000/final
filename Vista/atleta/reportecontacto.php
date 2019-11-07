<?php
session_start();
if(empty($_SESSION['nombre']))
{
	header('Location: ../Persona/InicioSesion.php');
}

if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/AtletaController.php?accion=buscafiltroscontacto");
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

if($_GET['accion']=="actual"&&!empty($_SESSION['contacto']))
{
	$catalogo = $_SESSION['contacto'];
	$reporte='';
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Sexo</th><th>Fecha de Nacimiento</th><th>Tipo Sanguineo</th><th>Estado Cívil</th><th>Nivel de Estudio</th></tr>";
	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Sexo</th><th>Fecha de Nacimiento</th><th>Tipo Sanguineo</th><th>Estado Cívil</th><th>Nivel de Estudio</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nac']."</td>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['correo']."</td>";	
		$cata.="<td>".$cat['n_tel']."</td>";	
		$cata.="<td>".$cat['n_eme']."</td>";	
		$cata.="<td>".$cat['descrip']."</td>";	
		$cata.="<td>".$cat['descrips']."</td>";	
		$cata.="<td>".$cat['direccion']."</td>";	




		$reporte.="<tr>";	
		$reporte.="<td>".$cat['nac']."</td>";	
		$reporte.="<td>".$cat['cedula']."</td>";	
		$reporte.="<td>".$cat['correo']."</td>";	
		$reporte.="<td>".$cat['n_tel']."</td>";	
		$reporte.="<td>".$cat['n_eme']."</td>";	
		$reporte.="<td>".$cat['descrip']."</td>";	
		$reporte.="<td>".$cat['descrips']."</td>";	
		$reporte.="<td>".$cat['direccion']."</td>";


	}
	$cata.="</table><br>";


	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$_SESSION['reporte']=$reporte;

}
if (empty($_SESSION['contacto'])) {
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
