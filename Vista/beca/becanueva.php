<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar"||empty($_REQUEST['accion']))
{
	header("Location: ../../Controlador/BecaController.php?accion=buscatodos1");
}



$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$select = "<select name='mes' required>";
$select.= "<option value=''>Seleccione un mes a pagar</option>";
$select.= "<option value='Enero'>Enero</option>";
$select.= "<option value='Febrero'>Febrero</option>";
$select.= "<option value='Marzo'>Marzo</option>";
$select.= "<option value='Abril'>Abril</option>";
$select.= "<option value='Mayo'>Mayo</option>";
$select.= "<option value='Junio'>Junio</option>";
$select.= "<option value='Julio'>Julio</option>";
$select.= "<option value='Agosto'>Agosto</option>";
$select.= "<option value='Septiembre'>Septiembre</option>";
$select.= "<option value='Octubre'>Octubre</option>";
$select.= "<option value='Noviembre'>Noviembre</option>";
$select.= "<option value='Diciembre'>Diciembre</option>";
$select.= "</select>";
$form.="<form name='catalog' action='../../Controlador/BecaController.php?accion=registrarPago' method='post'>";
$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';

$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" id="letra" name="Beca" maxlenght="9" pattern="[a-z A-Z 0-9 ñÑ\s]{2,25}" title="máximo de 25 caracteres" ></td>';
$form.='</tr>';
$form.='<tr>';
$form.="<td>Mes:</td>";
$form.="<td>".$select."</td>";
$form.='</tr>';
$form.='<tr>';
$form.='<td>Año:</td>';
$form.='<td><input type="text" name="anio" class="cajasdetexto" onkeypress="return solonumeros(event)" pattern="([2]{1})([0]{1})([0-9]{2})" title="Solo 4 digitos" onpaste="return false" required></td>';
$form.='</tr>';
$form.='</table>';






if($_GET['accion']=="actual" && !empty($_SESSION['catabeca']))
{
	$catalogo = $_SESSION['catabeca'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Becar</th><th>Monto</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		
		$cata.="<td> <input  type='checkbox' class='a' id=".$cat['id']."> </td>";	
		
		
		$cata.="<td> <input type='text' id='b".$cat['id']."' name='pago".$cat['id']."' style='display:none'  onkeypress='return solonumerosypuntos(event)' pattern='([1-9]{1})([0-9]{1,})([.]{1})([0-9]{2})' title='ej: 2500.50 el punto indica los decimales' class='cajasdetexto' onpaste='return false'></td>";	
		
		



		
		$cata.="</tr>";	
	}
	$cata.='<input type="submit" value="Pagar" id="submit" name="BtRegistrar">';
	$cata.="</table><br>";
	$form.='<table>';
	$form.='<tr>';
	$form.='<td><a href="../beca/beca.php?accion=actualizar"><input type="button" class="botonmodal" value="Cargar Beca Anterior"></a></td>';
	$form.='</tr>';
	$form.='</table>';
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