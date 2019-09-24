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

	$algunis = $_SESSION['selectp'];
	$select = "<select name='parentezco' required>";
	$select.= "<option value=''>Seleccione un parentesco</option>";
	foreach($algunis as $t)
	{
		$select.= "<option value=".$t['id'].">".$t['parentezco']."</option>";	
	}
	$select.= "</select>";

	

	$catalogo = $_SESSION['agrega'];
	foreach($catalogo as $cat) {
		$id=$cat['id'];
	}
	$form.='<form name="regevento" method="post" action="../../Controlador/RepresentanteController.php?accion=registrar1">';
	$form.='<table>';
	$form.='<tr>';
	$form.='<td>Cédula:</td>';
	$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" name="cedula_a" maxlenght="9" pattern="[0-9]{7,8}" title="Debe tener de 7 u 8 digitos" required></td>';
	$form.='<tr>';
	$form.='<tr>';

	$form.='<td><input id="searchTerm" type="hidden" class="cajasdetexto" onkeyup="doSearch()" value="'.$id.'" name="cedula" maxlenght="9" pattern="[0-9]{7,8}" title="Debe tener de 7 u 8 digitos" required></td>';
	$form.='<tr>';
	$form.='<td>Parentezco con el Representado:</td>';
	$form.='<td>'.$select.'</td>';
	$form.='</tr>';
	$form.='</tr>';
	$form.='</table>';
	$form.=' <input type="submit" value="Registrar" id="submit" name="BtRegistrar">';
	$form.='</form>';
	$cata.="<table class=tabla-cat id=tabla1>";
	$cata.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Correo Electrónico</th><th>Número de Teléfono</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";
		$cata.="<td>".$cat['nombre']."</td>";
		$cata.="<td>".$cat['apellido']."</td>";
		$cata.="<td>".$cat['correo']."</td>";
		$cata.="<td>".$cat['n_tel']."</td>";


		
		
		$cata.="</tr>";	
	}
	$cata.="</table><br>";

	$machu = $_SESSION['catapar'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Parentesco</th><th>Acción</th></tr>";
	foreach($machu as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";
		$cata.="<td>".$cat['nombre']."</td>";
		$cata.="<td>".$cat['apellido']."</td>";
		$cata.="<td>".$cat['parentezco']."</td>";
		
		$cata.="<td><a href='../../Controlador/RepresentanteController.php?accion=eliminar1&id=".$cat['id']."&id_repre=".$cat['carajo']."'>";	
		$cata.="<img src='../Imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
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