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


	$reporte.="<center><h2>Reporte General de Atletas</h2></center>";
	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	
	$cata.="<center><h2>Reporte General de Atletas</h2></center>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th></tr>";


	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th></tr>";

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

	$reporte.="<center><h2>Total de Atletas</h2></center>";
	$reporte.="<table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";

	$cata.="<center><h2>Total de Atletas</h2></center>";
	$cata.="<tr><th>Atletas Masculinos</th><th>Atletas Femeninos</th><th>Total</th></tr>";
	$reporte.="<tr><th>Atletas Masculinos</th><th>Atletas Femeninos</th><th>Total</th></tr>";

	$cata.="<tr>";	
	$cata.="<td>".$_SESSION['ddd']."</td>";	
	$cata.="<td>".$_SESSION['fff']."</td>";	
	$cata.="<td>".$_SESSION['cuentaunitotal']."</td>";
	$cata.="</table><br>";


	$reporte.="<tr>";	
	$reporte.="<td>".$_SESSION['ddd']."</td>";	
	$reporte.="<td>".$_SESSION['fff']."</td>";	
	$reporte.="<td>".$_SESSION['cuentaunitotal']."</td>";
	$reporte.="</table><br>";


	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<center><h2>Reporte General de Atletas Multidisciplinas</h2></center>";
	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	
	$cata.="<center><h2>Reporte General de Atletas Multidisciplinas</h2></center>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th></tr>";

	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th></tr>";
	for($i=0;$i<$_SESSION['c'];$i++) {
		$catalogo = $_SESSION['multidisciplinas'.$i];

		foreach($catalogo as $cat) {
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

	}
	$cata.="</table><br>";

	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$cata.="<center><h2>Total de Atletas Multidisciplinas</h2></center>";
	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<center><h2>Total de Atletas Multidisciplinas</h2></center>";
	$reporte.="<table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";

	$cata.="<tr><th>Atletas Masculinos</th><th>Atletas Femeninos</th><th>Total</th></tr>";

	$reporte.="<tr><th>Atletas Masculinos</th><th>Atletas Femeninos</th><th>Total</th></tr>";
	$cata.="<tr>";	
	$cata.="<td>".$_SESSION['multihombre']."</td>";	
	$cata.="<td>".$_SESSION['multimujer']."</td>";	
	$cata.="<td>".$_SESSION['multiambos']."</td>";

	$reporte.="<tr>";	
	$reporte.="<td>".$_SESSION['multihombre']."</td>";	
	$reporte.="<td>".$_SESSION['multimujer']."</td>";	
	$reporte.="<td>".$_SESSION['multiambos']."</td>";

	$cata.="</table><br>";

	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$cata.="<center><h2>Total General</h2></center>";

	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<center><h2>Total General</h2></center>";
	$reporte.="<table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";

	$cata.="<tr><th>Atletas Masculinos</th><th>Atletas Femeninos</th><th>Total</th></tr>";

	$reporte.="<tr><th>Atletas Masculinos</th><th>Atletas Femeninos</th><th>Total</th></tr>";
	$cata.="<tr>";	
	$cata.="<td>".$_SESSION['totalhombre']."</td>";	
	$cata.="<td>".$_SESSION['totalmujer']."</td>";	
	$cata.="<td>".$_SESSION['totaltotal']."</td>";

	$reporte.="<tr>";	
	$reporte.="<td>".$_SESSION['totalhombre']."</td>";	
	$reporte.="<td>".$_SESSION['totalmujer']."</td>";	
	$reporte.="<td>".$_SESSION['totaltotal']."</td>";

	$cata.="</table><br>";

	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";




$_SESSION['reporte']=$reporte;
$titulo=$_SESSION['discipli'];

if (empty($_SESSION['hombres'])) {
	$cata.="";
}


$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Reporte Global de Atletas',
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
