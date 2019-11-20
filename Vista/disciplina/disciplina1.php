<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/DisciplinaController.php?accion=buscatodos1");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}

$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<form name="regdisciplina" method="post" action="../../Controlador/DisciplinaController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Disciplina:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" id="caracteres" onkeypress="return caracteres(event)" onpaste="return false" name="disciplina" maxlenght="9" required></td>';
$form.='</tr>';
$form.='</table>';
/*$form.='<input type="submit" value="+ Añadir" id="submit" name="BtRegistrar">';*/
$form.='</form>';

if($_GET['accion']=="actual" && !empty($_SESSION['catadisci1']))
{
	$catalogo = $_SESSION['catadisci1'];
	$cata.="<form name='catalog' action='../../Controlador/DisciplinaController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Disciplinas</th><th colspan='2'>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['disciplina']."</td>";	
		$cata.="<td><a href='../../Controlador/DisciplinaController.php?accion=reactivar1&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/activo1.png' width='15px' height='15px' title='reactivar'></a></td>";	
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
}
elseif ($_GET['accion']=='ver_detalles')
{
	$datos = $_SESSION['modidisci'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$dis=$d['disciplina'];
	}
	$cata.="<form name='modiform' method='post' action='../../Controlador/DisciplinaController.php?accion=modificar&id=".$id."'>";
	$cata.="<table>";
	$cata.="<tr>";
	$cata.="<td>Disciplina:</td>";
	$cata.="<td><input type='text' id='caractere' class='cajasdetexto' name='disciplina' maxlenght='9' value='".$dis."' onkeypress='return caracteres(event)' onpaste='return false' required></td>";
	$cata.="</tr>";
	$cata.="</table>";
	$cata.="<br><input type='submit' value='Modificar' id='submit' name='BtModificar'>";
	unset($form);
	$form="";
}
else
{
	$cata.= "Aún no se han registrado disciplinas.";
	$cata.='<br>';
	$cata.='<br>';
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Disciplinas',
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
