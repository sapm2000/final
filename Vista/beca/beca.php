<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar"||empty($_REQUEST['accion']))
{
	header("Location: ../../Controlador/BecaController.php?accion=buscatodos");
}



$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.="<form name='catalog' action='../../Controlador/BecaController.php?accion=registrarPago' method='post'>";
$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';

$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" id="letra" name="Beca" maxlenght="9" onkeypress="return caracteress(event)" onpaste="return false" pattern="[a-z A-Z 0-9 ñÑ\s]{2,25}" title="máximo de 25 caracteres" ></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Nombre de la beca</td>';
$form.='<td><input type="text" name="nombre" class="cajasdetexto" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Fecha a Pagar:</td>';
$form.='<td><input type="date" name="fecha" class="cajasdetexto" required></td>';
$form.='</tr>';
$form.='</table>';






if($_GET['accion']=="actual" && !empty($_SESSION['catabeca']))
{
	$catalogo = $_SESSION['catabeca'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th><th>Becar</th><th>Monto</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['disciplina']."</td>";	


		if (empty($cat['monto'])) {
			$cata.="<td> <input  type='checkbox' class='a' id=".$cat['id']."> </td>";	
		}
		else {
			$cata.="<td> <input  type='checkbox' class='a' id=".$cat['id']."  checked> </td>";	
		}



		if (empty($cat['monto'])) {
			$cata.="<td> <input type='text' id='b".$cat['id']."' name='pago".$cat['id']."' style='display:none' value='".$cat['monto']."' onkeypress='return solonumeros(event)' pattern='([1-9]{1})([0-9]{1,})' title='ej: 25000' class='cajasdetexto' onpaste='return false'></td>";	
		}
		else {
			$cata.="<td> <input type='text' id='b".$cat['id']."' name='pago".$cat['id']."' value='".$cat['monto']."' onkeypress='return solonumeros(event)' pattern='([1-9]{1})([0-9]{1,})' title='ej: 25000' class='cajasdetexto' onpaste='return false'></td>";	
		}
		$cata.="<td> <input type='hidden' name='cuenta".$cat['id']."' value=".$cat['numeroc']."></td>";	
		$cata.="<td><input type='hidden' name='disc".$cat['id']."' value='".$cat['disciplina']."'></td>";




		
		$cata.="</tr>";	
	}
	$cata.='<input type="submit" value="Pagar" id="submit" name="BtRegistrar">';
	$cata.="</table><br>";
	$cata.="</form>";

}

else
{
	$cata.= "Aún no se han registrado becas.";
	$cata.='<br>';
	$cata.='<br>';
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Becas',
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