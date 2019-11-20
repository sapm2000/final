<?php
session_start();



$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$select='';
$estadocivil='';
$sexo='';
$tipo='';


if($_GET['accion']=='ver_detalles') {
	
	$datos = $_SESSION['indumentaria'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$idt=$d['id_talla'];
		$idc=$d['id_calzado'];
		$pes=$d['peso'];
		$alt=$d['altura'];
		$man=$d['mano'];

	}


	$todostd = $_SESSION['talla'];
	$talla = "<select name='id_talla' required>";
	$talla.= "<option value=''>Seleccione una talla</option>";
	foreach($todostd as $t)
	{
		if ($idt==$t['id']) {
			$talla.= "<option value=".$t['id']." selected>".$t['talla']."</option>";	

		}
		else {
			$talla.= "<option value=".$t['id'].">".$t['talla']."</option>";	
		}
	}
	$talla.= "</select>";



	$todospar = $_SESSION['calzado1'];
	$calzado = "<select name='id_calzado' required>";
	$calzado.= "<option value=''>Seleccione un calzado</option>";
	foreach($todospar as $tp)
	{
		if ($idc==$tp['id']) {
			$calzado.= "<option value=".$tp['id']." selected>".$tp['calzado']."</option>";	

		}
		else {
			$calzado.= "<option value=".$tp['id'].">".$tp['calzado']."</option>";	
		}
	}
	$calzado.= "</select>";

	$mano = "<select name='mano' required>";
	$mano.= "<option value=''>Seleccione mano habil</option>";
	if ($man=='DIESTRO') {
		$mano.= "<option selected>DIESTRO</option>";
	}
	else {
		$mano.= "<option>DIESTRO</option>";
	
	}

	if ($man=='ZURDO') {
		$mano.= "<option selected>ZURDO</option>";
	}
	else {
		$mano.= "<option>ZURDO</option>";
	}

	if ($man=='AMBIDIESTRO') {
		$mano.= "<option selected>AMBIDIESTRO</option>";
	}
	else {
		$mano.= "<option>AMBIDIESTRO</option>";
	
	}




	$form.="<form name='modiform' method='post' action='../../Controlador/AtletaController.php?accion=modificarIndumentaria&id=".$id."'>";
	$form.='<input type="submit" value="Datos Personales" id="siguiente11" name="Personal" class="botonmodalsuperior">';
	$form.='<input type="button" value="Indumentaria" id="siguiente11" name="Indumentaria" class="botonmodalsuperioractual">';
	$form.='<input type="submit" value="Datos de Contacto" id="Personales" name="contacto" class="botonmodalsuperior">';	
	$form.='<input type="submit" value="Datos Bancarios" id="datosb" name="DatosB" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos Laborales" id="siguiente11" name="BtModificar" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Registro Médico" id="a" name="Registro_medicos" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Discapacidades" name="Discapacidades" id="d" class="botonmodalsuperior">';




	$form.="<table>";
	$form.='<tr>';
	$form.='<td>&nbsp;</td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td>Peso:</td>';
	$form.='<td><input id="" type="text" name="peso" value="'.$pes.'" class="cajasdetexto" onkeypress="return solonumerosypuntos(event)" onpaste="return false" pattern="[1-9]{1}[0-9]{1,2}(.)*" title="ej: 47.5 ó 47 " required></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Altura (la altura se mide por cm):</td>';
	$form.='<td><input id="num" type="text" class="cajasdetexto" value="'.$alt.'"  name="altura" onkeypress="return solonumeros(event)" onpaste="return false" pattern="[0-2]{1}([0-9]{2})" title="ej: 160" required></td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Talla:</td>';
	$form.='<td>'.$talla.'</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Calzado:</td>';
	$form.='<td>'.$calzado.'</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>Mano habil:</td>';
	$form.='<td>'.$mano.'</td>';
	$form.='</tr>';
	$form.="<tr>";
	$form.='<td><input id="" type="hidden" name="id_atleta" value="'.$id.'" class="cajasdetexto"  required></td>';
	$form.='</table>';
	$form.='<table align="left">';
	$form.='<tr>';
	$form.='<td><input type="submit" class="botonmodal" value="Volver" name="Personal" id=""></td>';
	$form.='</tr>';
	$form.='</table>';
	$form.='<table align="right">';
	$form.='<tr>';
	$form.='<td> <input type="submit" value="Siguiente" id="submit" name="contacto"> </td>';
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
