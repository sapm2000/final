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

	$todosal = $_SESSION['registro_medico1'];
	$registro_medico = "<select name='id_registro_medico' required>";
	$registro_medico.= "<option>Seleccione una registro_medico</option>";
	
	foreach ($todosal as $tb) {
		$registro_medico.= "<option value=".$tb['id'].">".$tb['registro_medico']."</option>";	
	}
	$registro_medico.= "</select>";


	$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrarRegistro_medico">';
	$form.='<table align="center">';
	$form.='<tr>';
	$form.='<td>&nbsp;</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.="<td>Seleccione los registros médicos </td>";
	$form.='<td>'.$registro_medico.'</td>';
	$form.='<td> <input type="date"  name="fecha_medica" class="cajasdetexto"> </td>';
	$form.='<tr>';
	$form.='<td></td>';
	$form.='<td><input type="submit" value="Añadir Registro Médico" id="submit" name="BtRegistrar1"></td>';
	$form.='</tr>';
	$datos = $_SESSION['id_atleta'];
	foreach($datos as $d)
	{
		$id=$d['id'];
	}
	$form.='<td> <input type="hidden" value="'.$id.'" name="id_atleta"> </td>';
	$form.='</tr>';





	$catalogo = $_SESSION['catregistro_medico1'];
	$form.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrarRegistro_medico' method='post'>";
	$form.='<input type="submit" value="Datos Personales" id="siguiente11" name="Personal" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Indumentaria" id="siguiente11" name="Indumentaria" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos de Contacto" id="Personales" name="contacto" class="botonmodalsuperior">';	
	$form.='<input type="submit" value="Datos Bancarios" id="datosb" name="DatosB" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos Laborales" id="siguiente11" name="BtModificar" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Registro Médico" id="a" name="Registro_medicos" class="botonmodalsuperioractual">';
	$form.='<input type="submit" value="Discapacidades" name="Discapacidades" id="d" class="botonmodalsuperior">';

	$form.="<table class=tabla-cat id=tabla>";
	$form.="<tr><th>Registros Médico</th><th>Fecha de Registro</th><th>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$form.="<tr>";	
		$form.="<td>".$cat['registro_medico']."</td>";
		$form.="<td>".$cat['fecha_medica']."</td>";


		
		$form.="<td><a href='../../Controlador/AtletaController.php?accion=eliminarRegistro_medico&id=".$cat['idal']."&atleta=".$cat['id']."'>";	
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
