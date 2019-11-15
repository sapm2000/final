<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/TallaController.php?accion=buscatodos");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}


$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<form name="regtalla" method="post" action="../../Controlador/TallaController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Talla:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" id="letra" onkeypress="return soloLetras(event)" onpaste="return false" name="tal" maxlenght="9" pattern="[a-z A-Z]{1,3}" required></td>';
$form.='</tr>';
$form.='</table>';
$form.='<input type="submit" value="+ Añadir" id="submit" name="BtRegistrar">';
$form.='</form>';

if($_GET['accion']=="actual" && !empty($_SESSION['cataale']))
{
	$catalogo = $_SESSION['cataale'];
	$cata.="<form name='catalog' action='../../Controlador/TallaController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Tallas</th><th colspan='2'>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['talla']."</td>";	
		$cata.="<td><a href='../../Controlador/TallaController.php?accion=seleccionar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Editar'></a></td>";
		$cata.="<td><a href='../../Controlador/TallaController.php?accion=eliminar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
}
elseif ($_GET['accion']=='ver_detalles')
{
	$datos = $_SESSION['moditalla'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$tal=$d['talla'];
	}
	$cata.="<form name='modiform' method='post' action='../../Controlador/TallaController.php?accion=modificar&id=".$id."'>";
	$cata.="<table>";
	$cata.="<tr>";
	$cata.="<td>Talla:</td>";
	$cata.="<td><input type='text' class='cajasdetexto'  id='letra' onkeypress='return soloLetras(event)' onpaste='return false' name='talla' maxlenght='9' value='".$tal."'  required></td>";
	$cata.="</tr>";
	$cata.="</table>";
	$cata.="<br><input type='submit' value='Modificar' id='submit' name='BtModificar'>";
	unset($form);
	$form="";
}
else
{
	$cata.= "Aún no se han registrado tallas.";
	$cata.='<br>';
	$cata.='<br>';
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Tallas',
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
