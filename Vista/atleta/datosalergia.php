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

	$todosal = $_SESSION['alergia1'];
	$alergia = "<select name='id_alergia' required>";
	$alergia.= "<option>Seleccione una alergia</option>";
	
	foreach ($todosal as $tb) {
		$alergia.= "<option value=".$tb['id'].">".$tb['alergia']."</option>";	
	}
	$alergia.= "</select>";


	$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrarAlergia">';
	$form.='<table align="center">';
	$form.='<tr>';
	$form.='<td>&nbsp;</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.="<td>Seleccione las alergias </td>";
	$form.='<td>'.$alergia.'</td>';
	$form.='<td> <input type="submit" value="Añadir Alergia" id="submit" name="BtRegistrar1"> </td>';
	$datos = $_SESSION['id_atleta'];
	foreach($datos as $d)
	{
		$id=$d['id'];
	}
	$form.='<td> <input type="hidden" value="'.$id.'" name="id_atleta"> </td>';
	$form.='</tr>';





	$catalogo = $_SESSION['catalergia1'];
	$form.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrarAlergia' method='post'>";
	$form.='<input type="submit" value="Datos Personales" id="siguiente11" name="Personal" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Indumentaria" id="siguiente11" name="Indumentaria" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos de Contacto" id="Personales" name="contacto" class="botonmodalsuperior">';	
	$form.='<input type="submit" value="Datos Bancarios" id="datosb" name="DatosB" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos Laborales" id="siguiente11" name="BtModificar" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Alergias" id="a" name="Alergias" class="botonmodalsuperioractual">';
	$form.='<input type="submit" value="Discapacidades" name="Discapacidades" id="d" class="botonmodalsuperior">';

	$form.="<table class=tabla-cat id=tabla>";
	$form.="<tr><th>Alergia</th><th>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$form.="<tr>";	
		$form.="<td>".$cat['alergia']."</td>";

		
		$form.="<td><a href='../../Controlador/AtletaController.php?accion=eliminarAlergia&id=".$cat['idal']."&atleta=".$cat['id']."'>";	
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
