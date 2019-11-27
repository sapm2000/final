<?php
session_start();

if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}

	
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/DatoslController.php?accion=buscatodos");
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
	
	$datos = $_SESSION['datosl'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$corl=$d['correol'];
		$empr=$d['empresa'];
		$ida=$d['id_atleta'];
		$idm1=$d['id_municipio1'];
		$idp1=$d['id_parroquia1'];
		$dir1=$d['direccion1'];
	}


	$todosmun = $_SESSION['municipio3'];
	$municipio2 = "<select name='id_municipio1' required>";
	$municipio2.= "<option>Seleccione un municipio</option>";
	foreach($todosmun as $t)
	{
		if ($idm1==$t['id']) {
			$municipio2.= "<option value=".$t['id']." selected>".$t['descrips']."</option>";	

		}
		else {
			$municipio2.= "<option value=".$t['id'].">".$t['descrips']."</option>";	
		}
	}
	$municipio2.= "</select>";

	$todospar1 = $_SESSION['parroquia3'];
	$parroquia2 = "<select name='id_parroquia1' required>";
	$parroquia2.= "<option>Seleccione una parroquia</option>";
	foreach($todospar1 as $tp)
	{
		if($idp1==$tp['id']) {
			$parroquia2.= "<option value=".$tp['id']." class='mun".$tp['id_municipio']."' selected>".$tp['descrip']."</option>";	

		}
		else {
			$parroquia2.= "<option value=".$tp['id']." class='mun".$tp['id_municipio']."'>".$tp['descrip']."</option>";	
		}
	}
	$parroquia2.= "</select>";





	$form.="<form name='modiform' method='post' action='../../Controlador/DatoslController.php?accion=modificar&id=".$id."'>";
	$form.='<input type="submit" value="Datos Personales" id="siguiente11" name="Personal" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Indumentaria" id="siguiente11" name="Indumentaria" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos de Contacto" id="Personales" name="contacto" class="botonmodalsuperior">';	
	$form.='<input type="submit" value="Datos Bancarios" id="datosb" name="DatosB" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperior">';
	$form.='<input type="button" value="Datos Laborales" id="siguiente11" name="BtModificar" class="botonmodalsuperioractual">';
	$form.='<input type="submit" value="Patologia Medica" id="a" name="Patologia_medicas" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Discapacidades" name="Discapacidades" id="d" class="botonmodalsuperior">';

	$form.="<table>";
	$form.='<tr>';
	$form.='<td>&nbsp;</td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td>Correo Electrónico:</td>';
	$form.='<td><input id="" type="email" name="correol" value="'.$corl.'" class="cajasdetexto" onpaste="return false"></td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td>Nombre de la Empresa:</td>';
	$form.='<td><input id="" type="text" name="empresa" value="'.$empr.'" class="cajasdetexto" id="caracteres" onkeypress="return caracteres(event)" onpaste="return false"></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Municipio:</td>';
	$form.='<td>'.$municipio2.'</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Parroquia:</td>';
	$form.='<td>'.$parroquia2.'</td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td>Dirección:</td>';
	$form.='<td><textarea rows="5" cols="20" name="direccion1" maxlenght="9" value="" class="cajasdetexto">'.$dir1.'</textarea></td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td><input id="" type="hidden" name="id_atleta" value="'.$ida.'" class="cajasdetexto" required></td>';
	$form.='</tr>';
	$form.='</table>';
	$form.='<table align="left">';
	$form.='<tr>';
	$form.='<td><input type="submit" class="botonmodal" value="Volver" name="Disciplinas" id=""></td>';
	$form.='</tr>';
	$form.='</table>';
	$form.='<table align="right">';
	$form.='<tr>';
	$form.='<td> <input type="submit" value="Siguiente" id="submit" name="Patologia_medicas"> </td>';
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
