<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
	

	

$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
unset($cata);
$cata='';
$boton='';


if($_GET['accion']=="actual")
{
	$reporte='';


	$algunis = $_SESSION['selectp'];
	$select = "<select name='parentesco' required>";
	$select.= "<option value=''>Seleccione un parentesco</option>";
	foreach($algunis as $t)
	{
		$select.= "<option value=".$t['id'].">".$t['parentesco']."</option>";	
	}
	$select.= "</select>";

	

	$catalogo = $_SESSION['agrega'];
	foreach($catalogo as $cat) {
		$id=$cat['id'];
	}
	$form.='<form name="regevento" method="post" action="../../Controlador/RepresentanteController.php?accion=registrar1">';
	$form.='<table>';
	$form.='<tr>';
	$form.='<td>Documento de Identidad del Representado:</td>';
	$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" name="cedula_a" maxlenght="9" onkeypress="return solonumeros(event)" onpaste="return false"  pattern="[0-9]{5,}" title="Por favor colocar el formato correcto. Si es pasaporte solo colocar los números" required></td>';
	$form.='<td> <a href="generarreporte.php?accion=detalle"><input type="button" class="botonmodal" value="Generar Reporte" name="activos" title="Generar Reporte"> </a></td>';
	$form.='<td><input id="searchTerm" type="hidden" class="cajasdetexto" onkeyup="doSearch()" value="'.$id.'" name="cedula" maxlenght="9" pattern="[0-9]{7,8}" title="Debe tener de 7 u 8 digitos" required></td>';
	$form.='<tr>';
	$form.='<td>Parentesco con el Representado:</td>';
	$form.='<td>'.$select.'</td>';
	$form.='</tr>';
	$form.='</table>';
	$form.='<table>';
	$form.='<tr>';
	$form.='<td><input type="submit" value="Registrar" id="submit" name="BtRegistrar"></td';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td><a href="evento2.php?accion=actualizar"><input type="button" class="botonmodal" value="Volver" title="Volver a la consulta de eventos"></td>';
	$form.='</tr>';
	$form.='</table>';
	

	$form.='</form>';
	$cata.="<table class=tabla-cat id=tabla1>";

	$reporte.="<br><table class=tabla-cat2 id=tabla>";
	$reporte.="<table class=tabla-catborde id=tabla>";

	$cata.="<tr><th>Documento de Identidad</th><th>Nombre</th><th>Apellido</th><th>Correo Electrónico</th><th>Número de Teléfono</th></tr>";
	$reporte.="<tr><th>Documento de Identidad</th><th>Nombre</th><th>Apellido</th><th>Correo Electrónico</th><th>Número de Teléfono</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";
		$cata.="<td>".$cat['nombre']."</td>";
		$cata.="<td>".$cat['apellido']."</td>";
		$cata.="<td>".$cat['correo']."</td>";
		$cata.="<td>".$cat['n_tel']."</td>";

		$reporte.="<tr>";	
		$reporte.="<td>".$cat['cedula']."</td>";
		$reporte.="<td>".$cat['nombre']."</td>";
		$reporte.="<td>".$cat['apellido']."</td>";
		$reporte.="<td>".$cat['correo']."</td>";
		$reporte.="<td>".$cat['n_tel']."</td>";


		
		
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
	$reporte.="</table>";
	$reporte.="</table>";

	$machu = $_SESSION['catapar'];
	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<br><table class=tabla-catrepre id=tabla>";
	$reporte.="<table class=tabla-catrepresenta id=tabla>";

	$cata.="<tr><th>Documento de Identidad</th><th>Nombre</th><th>Apellido</th><th>Parentesco</th><th>Acción</th></tr>";
	$reporte.="<h1>Representados.</h1>";
	$reporte.="<tr><th>Documento de Identidad</th><th>Nombre</th><th>Apellido</th><th>Parentesco</th></tr>";

	foreach($machu as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";
		$cata.="<td>".$cat['nombre']."</td>";
		$cata.="<td>".$cat['apellido']."</td>";
		$cata.="<td>".$cat['parentesco']."</td>";
		
		$cata.="<td><a href='../../Controlador/RepresentanteController.php?accion=eliminar1&id=".$cat['id']."&id_repre=".$cat['carajo']."'>";	
		$cata.="<img src='../Imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
		$cata.="</tr>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$cat['cedula']."</td>";
		$reporte.="<td>".$cat['nombre']."</td>";
		$reporte.="<td>".$cat['apellido']."</td>";
		$reporte.="<td>".$cat['parentesco']."</td>";
	}
	$cata.="</table><br>";

	
	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$_SESSION['reporterepresentantedetalles']=$reporte;

}




$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Parentesco',
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