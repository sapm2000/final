<?php
session_start();
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/DatosbController.php?accion=buscatodos");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}

$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$select='';
$estadocivil='';
$sexo='';
$tipo='';

if($_GET['accion']=='ver_detalles') {

	$datos = $_SESSION['datosb'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$na=$d['nac'];
		$ced=$d['cedula'];
		$nom=$d['nombre'];
		$ape=$d['apellido'];
		$idb=$d['id_banco'];
		$num=$d['numeroc'];
		$tip=$d['tipo'];
		$ida=$d['id_atleta'];
	}

	$todosba = $_SESSION['banco1'];
	$banco1 = "<select name='id_banco1' required>";
	$banco1.= "<option value=''>Seleccione un banco</option>";
	foreach ($todosba as $tb) {
		if ($idb==$tb['id']) {
			$banco1.= "<option value=".$tb['id']." selected>".$tb['banco']."</option>";

		}
		else {
			$banco1.= "<option value=".$tb['id'].">".$tb['banco']."</option>";
		}
	}
	$banco1.= "</select>";

	$tipo1='';
	$tipo1.="<select name='tipo1' required>";
	$tipo1.="<option value=''>Seleccione un tipo de cuenta</option>";
	if ($tip=='Ahorro') {
		$tipo1.= "<option selected>AHORRO</option>";
		$tipo1.= "<option>CORRIENTE</option>";
	}
	else {
		$tipo1.= "<option>AHORRO</option>";
		$tipo1.= "<option selected>CORRIENTE</option>";
	}
	
	$tipo1.= "</select>";
$nac='';
	$nac.="<select name='nacio'  style='width:40px' required>";
	if ($na=='V' || $na=='') {
		$nac.= "<option selected>V</option>";
		$nac.= "<option>E</option>";
		$nac.= "<option>P</option>";
	}

	if ($na=='E') {
		$nac.= "<option>V</option>";
		$nac.= "<option selected>E</option>";
		$nac.= "<option>P</option>";
	} 

	if ($na=='P') {
		$nac.= "<option>V</option>";
		$nac.= "<option>E</option>";
		$nac.= "<option selected>P</option>";
	}

	$nac.= "</select>";
	


	$form.="<form name='modiform' method='post' action='../../Controlador/DatosbController.php?accion=modificar&id=".$id."'>";
	$form.='<input type="submit" value="Datos Personales" id="siguiente11" name="Personal" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Indumentaria" id="siguiente11" name="Indumentaria" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos de Contacto" id="Personales" name="contacto" class="botonmodalsuperior">';	
	$form.='<input type="submit" value="Datos Bancarios" id="datosb" name="DatosB" class="botonmodalsuperioractual">';
	$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos Laborales" id="siguiente11" name="BtModificar" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Patologia Medica" id="a" name="Patologia_medicas" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Discapacidades" name="Discapacidades" id="d" class="botonmodalsuperior">';

	$form.="<table>";
	$form.='<tr>';
	$form.='<td>&nbsp;</td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td>Documento de Identidad:</td>';
	$form.='<td>'.$nac.'<input id="" type="text" name="cedula" value="'.$ced.'" class="cajasdetexto" onkeypress="return solonumeros(event)" pattern="[0-9]{5,}" title="Por favor rellenar con el formato correcto. Solo cédula" onpaste="return false" required></td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td>Nombre:</td>';
	$form.='<td><input id="" type="text" name="nombre" value="'.$nom.'" class="cajasdetexto" onkeypress="return soloLetras(event)" onpaste="return false" required></td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td>Apellido:</td>';
	$form.='<td><input id="" type="text" name="apellido" value="'.$ape.'" class="cajasdetexto" onkeypress="return soloLetras(event)" onpaste="return false" required></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Banco:</td>';
	$form.='<td required>'.$banco1.'</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Número de Cuenta:</td>';
	$form.= " <td> <input type='text' name='cuenta' class='cajasdetexto' value='".$num."' maxlenght='20' onkeypress='return solonumeros(event)' pattern='[0]{1}[1]{1}[0-9]{18}' title='Solo 20 digitos' onpaste='return false' required></td>";
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Tipo de Cuenta:</td>';
	$form.='<td>'.$tipo1.'</td>';
	$form.='</tr>';
	
	$form.= "<td> <input type='hidden' name='id_atleta' class='cajasdetexto' value='".$ida."'  required></td>";

	$form.='</table>';
	$form.='<table align="left">';
	$form.='<tr>';
	$form.='<td><input type="submit" class="botonmodal" value="Volver" name="contacto" id=""></td>';
	$form.='</tr>';
	$form.='</table>';
	$form.='<table align="right">';
	$form.='<tr>';
	$form.='<td> <input type="submit" value="Siguiente" id="submit" name="Disciplinas"> </td>';
	$form.='</tr>';
	$form.='</table>';









}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Atleta',
	'CATALOGO'=>'',
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
