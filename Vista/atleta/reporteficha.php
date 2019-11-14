<?php
session_start();
if(empty($_SESSION['nombre']))
{
	header('Location: ../Persona/InicioSesion.php');
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

if($_GET['accion']=="actual"&&!empty($_SESSION['datospersonales']))
{
	$catalogo = $_SESSION['datospersonales'];
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";

	
	
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Discapacidad</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nac']."</td>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['f_nac']."</td>";	
		$cata.="<td>".$cat['tipos']."</td>";	
		$cata.="<td>".$cat['estadoc']."</td>";	
		$cata.="<td>".$cat['sexo']."</td>";	
		$cata.="<td>".$cat['nivel']."</td>";	
			

			
	}
	$cata.="</table><br>";



	$catalogo = $_SESSION['indumentaria'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Discapacidad</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['peso']."</td>";	
		$cata.="<td>".$cat['altura']."</td>";	
		$cata.="<td>".$cat['mano']."</td>";	
		$cata.="<td>".$cat['calzado']."</td>";	
		$cata.="<td>".$cat['talla']."</td>";	
		
	}
	$cata.="</table><br>";


	$catalogo = $_SESSION['contacto'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Discapacidad</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['correo']."</td>";	
		$cata.="<td>".$cat['n_tel']."</td>";	
		$cata.="<td>".$cat['n_eme']."</td>";	
		$cata.="<td>".$cat['descrips']."</td>";	
		$cata.="<td>".$cat['descrip']."</td>";	
		$cata.="<td>".$cat['direccion']."</td>";	

		
	}
	$cata.="</table><br>";

	$catalogo = $_SESSION['bancario'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Discapacidad</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nac']."</td>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['banco']."</td>";	
		$cata.="<td>".$cat['numeroc']."</td>";	
		$cata.="<td>".$cat['tipo']."</td>";	


		
	}
	$cata.="</table><br>";

	$catalogo = $_SESSION['representante'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Discapacidad</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['correo']."</td>";	
		$cata.="<td>".$cat['n_tel']."</td>";	
		$cata.="<td>".$cat['parentezco']."</td>";	


		
	}
	$cata.="</table><br>";

	$catalogo = $_SESSION['laboral'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Discapacidad</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['correol']."</td>";	
		$cata.="<td>".$cat['empresa']."</td>";	
		$cata.="<td>".$cat['direccion1']."</td>";	
		$cata.="<td>".$cat['descrips']."</td>";	
		$cata.="<td>".$cat['descrip']."</td>";	


		
	}
	$cata.="</table><br>";

	$catalogo = $_SESSION['datosdisciplina'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Discapacidad</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['disciplina']."</td>";	
		$cata.="<td>".$cat['modalidad']."</td>";	
		$cata.="<td>".$cat['estatu']."</td>";	
	


		
	}
	$cata.="</table><br>";

	$catalogo = $_SESSION['datosdisciplina'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Discapacidad</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['disciplina']."</td>";	
		$cata.="<td>".$cat['modalidad']."</td>";	
		$cata.="<td>".$cat['estatu']."</td>";	
	


		
	}
	$cata.="</table><br>";

	$catalogo = $_SESSION['medicos'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Discapacidad</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['registro_medico']."</td>";	
		$cata.="<td>".$cat['fecha_medica']."</td>";	
	


		
	}
	$cata.="</table><br>";

	$catalogo = $_SESSION['discapacidad'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Discapacidad</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['discapacidad']."</td>";	
	


		
	}
	$cata.="</table><br>";



	

}
if (empty($_SESSION['datospersonales'])) {
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
