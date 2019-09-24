<?php
session_start();
if(!$_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/DatosdiscapacidadController.php?accion=buscatodos");
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

	$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrardisca">';

	$form.='<table align="center">';
	$form.='<tr>';
	$form.='<td>&nbsp;</td>';
	$form.='</tr>';
	$form.='<tr>';
	$todosal = $_SESSION['discapacidad1'];
	$discapacidad1 = "<select name='id_discapacidad' required>";
	$discapacidad1.= "<option>Seleccione una discapacidad</option>";
	
	foreach ($todosal as $tb) {
		$discapacidad1.= "<option value=".$tb['id'].">".$tb['discapacidad']."</option>";	
	}
	$discapacidad1.= "</select>";
	$form.="<td>Discapacidades:</td>";
	$form.='<td>'.$discapacidad1.'</td>';
	$form.='<td> <input type="submit" value="Añadir Discapacidad" id="submit" name="BtRegistrar1"> </td>';
	$datoss = $_SESSION['modiusu'];
	foreach($datoss as $d)
	{
		$id=$d['id'];
	}
	
	$form.='<td> <input type="hidden" value="'.$id.'" name="id_atleta"> </td>';
	$catalogo = $_SESSION['catadisca1'];
	$form.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrardisca' method='post'>";
	$form.='<input type="submit" value="Datos Personales" id="siguiente11" name="Personal" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Indumentaria" id="siguiente11" name="Indumentaria" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos de Contacto" id="Personales" name="contacto" class="botonmodalsuperior">';	
	$form.='<input type="submit" value="Datos Bancarios" id="datosb" name="DatosB" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos Laborales" id="siguiente11" name="BtModificar" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Alergias" id="a" name="Alergias" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Discapacidades" name="Discapacidades" id="d" class="botonmodalsuperioractual">';

	$form.="<table class=tabla-cat id=tabla>";
	$form.="<tr><th>Discapacidad</th><th>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$form.="<tr>";	
		$form.="<td>".$cat['discapacidad']."</td>";
		
		$form.="<td><a href='../../Controlador/AtletaController.php?accion=eliminardisca&id=".$cat['iddi']."&atleta=".$cat['id']."'>";
		$form.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
		
	}
	$form.='<table align="right">';
	$form.='<td><a href="../atleta/consultaatleta.php?accion=actualizar"><input type="button" class="botonmodal" value="Finalizar" id="anterior4"></td></a>';
	$form.='</table>';
	$form.='<table align="left">';
	$form.='<tr>';
	$form.='<td><input type="submit" class="botonmodal" value="Volver" name="Alergias" id=""></td>';
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
