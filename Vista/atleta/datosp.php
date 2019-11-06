<?php
session_start();
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/AtletaController.php?accion=buscatodos");
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
if($_GET['accion']!='ver_detalles') {

$select = "<select name='tipos' required>";
$select.= "<option value=''>Seleccione un tipo de sangre</option>";
$select.= "<option value='A+'>A+</option>";
$select.= "<option value='A-'>A-</option>";
$select.= "<option value='B+'>B+</option>";
$select.= "<option value='B-'>B-</option>";
$select.= "<option value='O+'>O+</option>";
$select.= "<option value='O-'>O-</option>";
$select.= "<option value='AB+'>AB+</option>";
$select.= "<option value='AB-'>AB-</option>";
$select.= "</select>";
$estadocivil.="<select name='estadoc' required>";
$estadocivil.= "<option value=''>Seleccione un estado civil</option>";
$estadocivil.= "<option>SOLTERO/A</option>";
$estadocivil.= "<option>CASADO/A</option>";
$estadocivil.= "<option>DIVORCIADO/A</option>";
$estadocivil.= "<option>VIUDO/A</option>";
$estadocivil.= "</select>";
$sexo.="<select name='sexo' required>";
$sexo.="<option value=''>Seleccione un sexo</option>";
$sexo.= "<option>F</option>";
$sexo.= "<option>M</option>";
$todos = $_SESSION['nivel'];
$nivel = "<select name='id_nivel' required>";
$nivel.= "<option value=''>Seleccione un nivel</option>";
foreach($todos as $td)
{
	$nivel.= "<option value=".$td['id'].">".$td['nivel']."</option>";	
}
$nivel.= "</select>";
$nac='';
$nac.="<select name='nacio'  style='width:40px' required>";
$nac.= "<option>V</option>";
$nac.= "<option>E</option>";
$nac.= "<option>P</option>";
$nac.= "</select>";






$form.="<div id=parte1>";
$form.='<input type="button" value="Datos Personales" id="Personales" class="botonmodalsuperioractual">';
$form.='<input type="button" value="Indumentaria" id="datosb" class="botonmodalsuperior">';
$form.='<input type="button" value="Datos de Contacto" id="siguiente11" class="botonmodalsuperior">';
$form.='<input type="button" value="Datos Bancarios" id="datosb" class="botonmodalsuperior">';
$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperior">';
$form.='<input type="button" value="Datos Laborales" id="datosl" class="botonmodalsuperior">';
$form.='<input type="button" value="Registro Médicos" id="a" class="botonmodalsuperior">';
$form.='<input type="button" value="Discapacidades" id="d" class="botonmodalsuperior">';

$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>&nbsp;</td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Cédula:</td>';
$form.='<td>'.$nac.'<input id="" type="text" name="cedula" class="cajasdetexto" maxlenght="9" onkeypress="return solonumeros(event)" onpaste="return false" pattern="[0-9]{7,8}" title="Solo 7 u 8 digitos" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Nombres:</td>';
$form.='<td><input id="letra" type="text" class="cajasdetexto" onkeypress="return soloLetras(event)" name="nombre" maxlenght="9" onpaste="return false" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Apellidos:</td>';
$form.='<td><input id="letras" type="text" name="apellido" class="cajasdetexto" maxlenght="9" onkeypress="return soloLetras(event)" onpaste="return false" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Fecha de Nacimiento:</td>';
$form.='<td><input type="date" name="f_nac" class="date" maxlenght="9" id="fnac" onblur="hoyfechas()" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Tipo Sanguíneo:</td>';
$form.='<td>'.$select.'</td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Estado Civil:</td>';
$form.='<td>'.$estadocivil.'</td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Sexo:</td>';
$form.='<td>'.$sexo.'</td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Nivel de Estudio:</td>';
$form.='<td>'.$nivel.'</td>';
$form.='</tr>';
$form.='</table>';
$form.='<table align="left">';
$form.='<tr>';
$form.='</tr>';
$form.='</table>';
$form.='<table align="right">';
$form.='<tr>';
$form.='<td> <input type="submit" value="Siguiente" id="submit" name="BtRegistrar"> </td>';
$form.='</tr>';
$form.='</table>';
$form.="</form>";
$form.="</div>";
}


if($_GET['accion']=='ver_detalles') {
	
	$datos = $_SESSION['datosp'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$na=$d['nac'];
		$ced=$d['cedula'];
		$nom=$d['nombre'];
		$ape=$d['apellido'];
		$fnac=$d['f_nac'];
		$tip=$d['tipos'];
		$est=$d['estadoc'];
		$sex=$d['sexo'];
		$niv=$d['id_nivel'];

		

	}

	$select1 = "<select name='tipos' required>";
	$select1.= "<option value=''>Seleccione un tipo de sangre</option>";
if ($tip=='A+') {
	$select1.= "<option value='A+' selected>A+</option>";
}
else {
	$select1.= "<option value='A+'>A+</option>";
}
if ($tip=='A-') {
	$select1.= "<option value='A-' selected>A-</option>";
}
else {
	$select1.= "<option value='A-'>A-</option>";
}
if ($tip=='B+') {
	$select1.= "<option value='B+' selected>B+</option>";
}
else {
	$select1.= "<option value='B+'>B+</option>";
}
if ($tip=='B-') {
	$select1.= "<option value='B-' selected>B-</option>";
}
else {
	$select1.= "<option value='B-'>B-</option>";
}
if ($tip=='O+') {
	$select1.= "<option value='O+' selected>O+</option>";
}
else {
	$select1.= "<option value='O+'>O+</option>";
}
if ($tip=='O-') {
	$select1.= "<option value='O-' selected>O+</option>";
}
else {
	$select1.= "<option value='O-'>O-</option>";
}
if ($tip=='AB+') {
	$select1.= "<option value='AB+' selected>AB+</option>";
}
else {
	$select1.= "<option value='AB+'>AB+</option>";
}
if ($tip=='AB-') {
	$select1.= "<option value='AB-' selected>AB-</option>";
}
else {
	$select1.= "<option value='AB-'>AB-</option>";
}
$select1.= "</select>";



$estadocivil1='';
$estadocivil1.="<select name='estadoc' required>";
$estadocivil1.="<option value=''>Seleccione un estado civil</option>";

if ($est=='SOLTERO/A') {
	$estadocivil1.= "<option selected>SOLTERO/A</option>";
}
else {
	$estadocivil1.= "<option>SOLTERO/A</option>";

}
if ($est=='CASADO/A<') {
	$estadocivil1.= "<option selected>CASADO/A</option>";
}
else {
	$estadocivil1.= "<option>CASADO/A</option>";

}
if ($est=='DIVORCIADO/A') {
	$estadocivil1.= "<option selected>DIVORCIADO/A</option>";
}
else {
	$estadocivil1.= "<option>DIVORCIADO/A</option>";

}
if ($est=='VIUDO/A') {
	$estadocivil1.= "<option selected>VIUDO/A</option>";
}
else {
	$estadocivil1.= "<option>VIUDO/A</option>";

}
$estadocivil1.= "</select>";




$sexo1='';
$sexo1.="<select name='sexo' required>";
$sexo1.="<option value=''>Selecione un sexo</option>";
if ($sex=='F') {
	$sexo1.= "<option selected>F</option>";
	$sexo1.= "<option>M</option>";
}
else {
	$sexo1.= "<option>F</option>";
	$sexo1.= "<option selected>M</option>";
}
	$sexo1.= "</select>";


$todosni = $_SESSION['nivel1'];
$nivel1 = "<select name='id_nivel' required>";
$nivel1.= "<option value=''>Seleccione un nivel</option>";
foreach($todosni as $td)
{
	if ($niv==$td['id']) {
		$nivel1.= "<option value=".$td['id']." selected>".$td['nivel']."</option>";	

	}
	else {
		$nivel1.= "<option value=".$td['id'].">".$td['nivel']."</option>";	
	}
}
$nivel1.= "</select>";

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







	$form.="<form name='modiform' method='post' action='../../Controlador/AtletaController.php?accion=modificar&id=".$id."'>";
	$form.='<input type="button" value="Datos Personales" id="Personales" class="botonmodalsuperioractual">';	
	$form.='<input type="submit" value="Indumentaria" id="siguiente11" name="Indumentaria" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos de Contacto" id="siguiente11" name="BtModificar" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos Bancarios" id="datosb" name="DatosB" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos Laborales" id="datosl" name="DatosL" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Registro Médico" id="a" name="Registro_medicos" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Discapacidades" name="Discapacidades" id="d" class="botonmodalsuperior">';




	$form.="<table>";
	$form.='<tr>';
	$form.='<td>&nbsp;</td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td>Cédula:</td>';
	$form.='<td>'.$nac.'<input id="" type="text" name="cedula" value="'.$ced.'" class="cajasdetexto" maxlenght="9" onkeypress="return solonumeros(event)" onpaste="return false" pattern="[0-9]{7,8}" title="Solo 7 u 8 digitos" required></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Nombres:</td>';
	$form.='<td><input id="letra" type="text" class="cajasdetexto" value="'.$nom.'" onkeypress="return soloLetras(event)" onpaste="return false" name="nombre" required></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Apellidos:</td>';
	$form.='<td><input id="letras" type="text" name="apellido" class="cajasdetexto" value="'.$ape.'" maxlenght="9" onkeypress="return soloLetras(event)" onpaste="return false" required></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Fecha de Nacimiento:</td>';
	$form.='<td><input id="fnac" type="date" name="f_nac" class="date" maxlenght="9" value="'.$fnac.'" onblur="hoyfecha()" required></td>';
	$form.='<td><input id="key" type="hidden" name="id_atleta" class="date" maxlenght="9" value="'.$id.'"></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Tipo Sanguíneo:</td>';
	$form.='<td>'.$select1.'</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Estado Civil:</td>';
	$form.='<td>'.$estadocivil1.'</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Sexo:</td>';
	$form.='<td>'.$sexo1.'</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Nivel de Estudio:</td>';
	$form.='<td>'.$nivel1.'</td>';
	$form.='</tr>';
	$form.='</tr>';
	$form.='</table>';
	$form.="<br><input type='submit' value='Siguiente' id='submit' name='Indumentaria'>";




































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
