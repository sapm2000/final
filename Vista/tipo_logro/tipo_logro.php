<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/TipoLogroController.php?accion=buscatodos");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}


$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<form name="regtipo_logro" method="post" action="../../Controlador/TipoLogroController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Tipo de Logro:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" id="letra" onkeypress="return soloLetras(event)" onpaste="return false" name="tipo_logro" maxlenght="9" pattern="[a-z A-Z ñÑ\s]{2,25}" title="máximo de 25 caracteres" required></td>';
$form.='</tr>';
$form.='</table>';
$form.='<input type="submit" value="+ Añadir" id="submit" name="BtRegistrar">';
$form.='</form>';

if($_GET['accion']=="actual" && !empty($_SESSION['catalog']))
{
	$catalogo = $_SESSION['catalog'];
	$cata.="<form name='catalog' action='../../Controlador/TipoLogroController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Tipos de Logros</th><th colspan='2'>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['tipo_logro']."</td>";	
		$cata.="<td><a href='../../Controlador/TipoLogroController.php?accion=seleccionar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Editar'></a></td>";
		$cata.="<td><a href='../../Controlador/TipoLogroController.php?accion=eliminar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
}
elseif ($_GET['accion']=='ver_detalles')
{
	$datos = $_SESSION['moditipo'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$ale=$d['tipo_logro'];
	}
	$cata.="<form name='modiform' method='post' action='../../Controlador/TipoLogroController.php?accion=modificar&id=".$id."'>";
	$cata.="<table>";
	$cata.="<tr>";
	$cata.="<td>Tipo de Logro:</td>";
	$cata.="<td><input type='text' class='cajasdetexto'  id='letra' onkeypress='return soloLetras(event)' onpaste='return false' name='tipo_logro' maxlenght='9' value='".$ale."' pattern='[a-z A-Z ñÑ\s]{2,25}' title='máximo de 25 caracteres' required></td>";
	$cata.="</tr>";
	$cata.="</table>";
	$cata.="<br><input type='submit' value='Modificar' id='submit' name='BtModificar'>";
	unset($form);
	$form="";
}
else
{
	$cata.= "Aún no se han registrado Tipo de Logro.";
	$cata.='<br>';
	$cata.='<br>';
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Tipos de Logros',
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
