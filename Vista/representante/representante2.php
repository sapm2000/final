<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/RepresentanteController.php?accion=buscatodos1");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}

$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<form name="regusuario" method="post" action="../../Controlador/RepresentanteController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()"  name="nombre" maxlenght="9" ></td>';
$form.='<td> <a href="generarreporte.php?accion=global"><input type="button" class="botonmodal" value="Generar Reporte" name="activos" title="Generar Reporte"> </a></td>';
$form.='<td> <a href="../representante/representante.php?accion=actualizar"><input type="button" class="botonmodal" value="+ Representante"> </a></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';

if($_GET['accion']=="actual" && !empty($_SESSION['catarepre2']))
{
	$catalogo = $_SESSION['catarepre2'];
	$reporte='';
	$cata.="<form name='catalog' action='../../Controlador/RepresentanteController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";
	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla>";
	$cata.="<tr><th>Documento de Identidad</th><th>Nombre</th><th>Apellido</th><th>Número de Teléfono</th><th>Correo Electrónico</th><th>Documento de Identidad del Representado</th><th>Parentesco</th><th colspan='3'>Acción</th></tr>";
	$reporte.="<tr><th>Documento de Identidad</th><th>Nombre</th><th>Apellido</th><th>Número de Teléfono</th><th>Correo Electrónico</th><th>Documento de Identidad del Representado</th><th>Parentesco</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";
		$cata.="<td>".$cat['nombre']."</td>";
		$cata.="<td>".$cat['apellido']."</td>";
		$cata.="<td>".$cat['n_tel']."</td>";
		$cata.="<td>".$cat['correo']."</td>";
		$cata.="<td>".$cat['atl']."</td>";
		$cata.="<td>".$cat['parentesco']."</td>";
		$cata.="<td><a href='../../Controlador/RepresentanteController.php?accion=seleccionar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Editar'></a></td>";
		$cata.="<td><a href='../../Controlador/RepresentanteController.php?accion=seleccionar1&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/parentesco.png' width='17px' height='17px' title='Agregar representado'></a></td>";
		$cata.="<td><a href='../../Controlador/RepresentanteController.php?accion=eliminar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
		$cata.="</tr>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$cat['cedula']."</td>";
		$reporte.="<td>".$cat['nombre']."</td>";
		$reporte.="<td>".$cat['apellido']."</td>";
		$reporte.="<td>".$cat['n_tel']."</td>";
		$reporte.="<td>".$cat['correo']."</td>";
		$reporte.="<td>".$cat['atl']."</td>";
		$reporte.="<td>".$cat['parentesco']."</td>";
	}
	$cata.="</table><br>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$_SESSION['reporterepresentante']=$reporte;
}
elseif ($_GET['accion']=='ver_detalles')
{
	$datos = $_SESSION['modirepre2'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$ced=$d['cedula'];
		$nom=$d['nombre'];
		$ape=$d['apellido'];
		$n_tel=$d['n_tel'];
		$cor=$d['correo'];

	}
	$cata.="<form name='modiform' method='post' action='../../Controlador/RepresentanteController.php?accion=modificar&id=".$id."'>";
	$cata.="<table>";
	$cata.="<tr>";
	$cata.="<td>Documento de Identidad:</td>";
	$cata.="<td><input type='text' id='num1' name='cedula' class='cajasdetexto' maxlenght='9' value='".$ced."' onkeypress='return solonumeros(event)' onpaste='return false' pattern='[0-9]{5,}' title='Por favor rellenar con el formato correcto. Si es pasaporte solo colocar los números' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Nombre:</td>";
	$cata.="<td><input type='text' id='letras' name='nombre' class='cajasdetexto' onkeypress='return soloLetras(event)' onpaste='return false' maxlenght='9' value='".$nom."' pattern='[a-z A-Z ñÑ\s]{2,20}' title='minimo 2 caracteres' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Apellido:</td>";
	$cata.="<td><input type='text' id='letras' name='apellido' class='cajasdetexto' onkeypress='return soloLetras(event)' onpaste='return false' maxlenght='9' value='".$ape."' pattern='[a-z A-Z ñÑ\s]{2,20}' title='minimo 2 caracteres' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Número de Teléfono:</td>";
	$cata.="<td><input id='key' type='text' name='n_tel' class='cajasdetexto' onkeypress='return solonumeros(event)' onpaste='return false' maxlenght='9' value='".$n_tel."' pattern='[0-9]{11,11}' title='Debe tener 11 digitos' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Correo Electrónico:</td>";
	$cata.="<td><input type='text' id='id_mail' name='correo' class='cajasdetexto' onblur='validateMail('id_mail')' onpaste='return false' maxlenght='9' value='".$cor."' required></td>";
	$cata.="</tr>";
	$cata.="</table>";
	$cata.="<br><input type='submit' value='Modificar' id='submit' name='BtModificar'>";
	unset($form);
	$form="";
}
else
{
	$cata.= "Aún no se han registrado representantes.";
	$cata.='<br>';
	$cata.='<br>';
}


$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Representantes',
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
