<?php
session_start();

if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
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

	$todosal = $_SESSION['patologia_medica1'];
	$patologia_medica = "<select name='id_patologia_medica' required>";
	$patologia_medica.= "<option>Seleccione una patología médica</option>";
	
	foreach ($todosal as $tb) {
		$patologia_medica.= "<option value=".$tb['id'].">".$tb['patologia_medica']."</option>";	
	}
	$patologia_medica.= "</select>";


	$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrarPatologia_medica">';
	$form.='<table align="center">';
	$form.='<tr>';
	$form.='<td>&nbsp;</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.="<td>Seleccione los patologías médicas </td>";
	$form.='<td>'.$patologia_medica.'</td>';
	$form.='<td>Fecha (yyyy-mm-dd):<input type="date"  name="fecha_medica" class="date"  pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" max="'.date("Y-m-d").'" value="'.date("Y-m-d").'" onkeypress="return solonumerosguion(event)" onpaste="return false"> </td>';
	$form.='<tr>';
	$form.='<td></td>';
	$form.='<td><input type="submit" value="Añadir Patología Médica" id="submit" name="BtRegistrar1"></td>';
	$form.='</tr>';
	$datos = $_SESSION['id_atleta'];
	foreach($datos as $d)
	{
		$id=$d['id'];
	}
	$form.='<td> <input type="hidden" value="'.$id.'" name="id_atleta"> </td>';
	$form.='</tr>';





	$catalogo = $_SESSION['catpatologia_medica1'];
	$form.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrarPatologia_medica' method='post'>";
	$form.='<input type="submit" value="Datos Personales" id="siguiente11" name="Personal" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Indumentaria" id="siguiente11" name="Indumentaria" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos de Contacto" id="Personales" name="contacto" class="botonmodalsuperior">';	
	$form.='<input type="submit" value="Datos Bancarios" id="datosb" name="DatosB" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos Laborales" id="siguiente11" name="BtModificar" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Patología Médica" id="a" name="Patologia_medicas" class="botonmodalsuperioractual">';
	$form.='<input type="submit" value="Discapacidades" name="Discapacidades" id="d" class="botonmodalsuperior">';

	$form.="<table class=tabla-cat id=tabla>";
	$form.="<tr><th>Patologías Médica</th><th>Fecha de Patología</th><th>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$form.="<tr>";	
		$form.="<td>".$cat['patologia_medica']."</td>";
		$form.="<td>".$cat['fecha_medica']."</td>";


		
		$form.="<td><a href='../../Controlador/AtletaController.php?accion=eliminarPatologia_medica&id=".$cat['idal']."&atleta=".$cat['id']."'>";	
		$form.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
	
	}
	$form.='<table align="right">';
	$form.='<td> <input type="submit" value="Siguiente" id="submit" name="Discapacidades"> </td>';
	$form.='</table>';
	$form.='<table align="left">';
	$form.='<tr>';
	$form.='<td><input type="submit" class="botonmodal" value="Volver" name="BtModificar" id=""></td>';
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
