<?php
session_start();


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
	
	$datos = $_SESSION['datosc'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$cor=$d['correo'];
		$ntel=$d['n_tel'];
		$neme=$d['n_eme'];
		$idm=$d['id_municipio'];
		$idp=$d['id_parroquia'];
		$dir=$d['direccion'];
	}


	$todostd = $_SESSION['municipio2'];
	$municipio1 = "<select name='id_municipio' required>";
	$municipio1.= "<option value=''>Seleccione un municipio</option>";
	foreach($todostd as $t)
	{
		if ($idm==$t['id']) {
			$municipio1.= "<option value=".$t['id']." selected>".$t['descrips']."</option>";	

		}
		else {
			$municipio1.= "<option value=".$t['id'].">".$t['descrips']."</option>";	
		}
	}
	$municipio1.= "</select>";



	$todospar = $_SESSION['parroquia2'];
	$parroquia1 = "<select name='id_parroquia' required>";
	$parroquia1.= "<option value=''>Seleccione una parroquia</option>";
	foreach($todospar as $tp)
	{
		if($idp==$tp['id']) {
			$parroquia1.= "<option value=".$tp['id']." class='mun".$tp['id_municipio']."' selected>".$tp['descrip']."</option>";	

		}
		else {
			$parroquia1.= "<option value=".$tp['id']." class='mun".$tp['id_municipio']."'>".$tp['descrip']."</option>";	
		}
	}
	$parroquia1.= "</select>";




	$form.="<form name='modiform' method='post' action='../../Controlador/AtletaController.php?accion=modificarContacto&id=".$id."'>";
	$form.='<input type="submit" value="Datos Personales" id="siguiente11" name="Personal" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Indumentaria" id="siguiente11" name="Indumentaria" class="botonmodalsuperior">';
	$form.='<input type="button" value="Datos de Contacto" id="Personales" class="botonmodalsuperioractual">';	
	$form.='<input type="submit" value="Datos Bancarios" id="datosb" name="DatosB" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos Laborales" id="siguiente11" name="BtModificar" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Patologia Medica" id="a" name="Patologia_medicas" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Discapacidades" name="Discapacidades" id="d" class="botonmodalsuperior">';




	$form.="<table>";
	$form.='<tr>';
	$form.='<td>&nbsp;</td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td>Correo Electrónico:</td>';
	$form.='<td><input id="" type="email" name="correo" value="'.$cor.'" class="cajasdetexto" onpaste="return false" required></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Número de Teléfono:</td>';
	$form.='<td><input id="num" type="text" class="cajasdetexto" value="'.$ntel.'"  name="n_tel" onkeypress="return solonumeros(event)" pattern="([0]{1})([2,4]{1})([0-9]{9})*" title="Solo 11 dígitos" onpaste="return false" required></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Número de Emergencia:</td>';
	$form.='<td><input id="num2" type="text" class="cajasdetexto" value="'.$neme.'"  name="n_eme" onkeypress="return solonumeros(event)" pattern="([0]{1})([2,4]{1})([0-9]{9})*" title="Solo 11 dígitos" onpaste="return false" required></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Municipio:</td>';
	$form.='<td>'.$municipio1.'</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Parroquia:</td>';
	$form.='<td>'.$parroquia1.'</td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td>Dirección:</td>';
	$form.='<td><textarea rows="5" cols="20" name="direccion" class="cajasdetexto" maxlenght="9" value="" required>'.$dir.'</textarea></td>';
	$form.='</tr>';
	$form.='<td><input id="" type="hidden" name="id_atleta" value="'.$id.'" class="cajasdetexto"  required></td>';
	$form.='</table>';
	$form.='<table align="left">';
	$form.='<tr>';
	$form.='<td><input type="submit" class="botonmodal" value="Volver" name="Indumentaria" id=""></td>';
	$form.='</tr>';
	$form.='</table>';
	$form.='<table align="right">';
	$form.='<tr>';
	$form.='<td> <input type="submit" value="Siguiente" id="submit" name="DatosB"> </td>';
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
