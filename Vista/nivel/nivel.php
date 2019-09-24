<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/NivelController.php?accion=buscatodos");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}

$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<form name="regnivel" method="post" action="../../Controlador/NivelController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Nivel Académico:</td>';
$form.='<td><input id="searchTerm" class="cajasdetexto" type="text" onkeyup="doSearch()" id="caracteres" onkeypress="return caracteres(event)" onpaste="return false" name="nivel" maxlenght="9" required></td>';
$form.='</tr>';
$form.='</table>';
$form.='<input type="submit" value="+ Añadir" id="submit" name="BtRegistrar">';
$form.='</form>';

if($_GET['accion']=="actual" && !empty($_SESSION['catanive']))
{
	$catalogo = $_SESSION['catanive'];
	$cata.="<form name='catalog' action='../../Controlador/NivelController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nivel Académico</th><th colspan='2'>Opción</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nivel']."</td>";	
		$cata.="<td><a href='../../Controlador/NivelController.php?accion=seleccionar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Editar'></a></td>";
		$cata.="<td><a href='../../Controlador/NivelController.php?accion=eliminar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
}
elseif ($_GET['accion']=='ver_detalles')
{
	$datos = $_SESSION['modinive'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$dis=$d['nivel'];
	}
	$cata.="<form name='modiform' method='post' action='../../Controlador/NivelController.php?accion=modificar&id=".$id."'>";
	$cata.="<table>";
	$cata.="<tr>";
	$cata.="<td>Nivel Académico:</td>";
	$cata.="<td><input type='text' id='caractere' class='cajasdetexto' name='nivel' maxlenght='9' value='".$dis."' onkeypress='return caracteres(event)' onpaste='return false' required></td>";
	$cata.="</tr>";
	$cata.="</table>";
	$cata.="<br><input type='submit' value='Modificar' id='submit' name='BtModificar'>";
	unset($form);
	$form="";
}
else
{
	$cata.= "Aún no se han registrado niveles académicos.";
	$cata.='<br>';
	$cata.='<br>';
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Nivel Académico',
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
