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


	$todosala = $_SESSION['disciplina1'];
$disciplina1 = "<select name='id_disciplina' required>";
$disciplina1.= "<option>Seleccione una disciplina</option> required";

foreach ($todosala as $tb) {
	$disciplina1.= "<option value=".$tb['id'].">".$tb['disciplina']."</option>";	
}
$disciplina1.= "</select>";


$todospamo = $_SESSION['modalidad1'];
$modalidad1 = "<select name='id_modalidad' required>";
$modalidad1.= "<option>Seleccione una modalidad</option>";
foreach($todospamo as $tp)
{
$modalidad1.= "<option value=".$tp['id']." class='mun".$tp['id_disciplina']."'>".$tp['modalidad']."</option>";	
}
$modalidad1.= "</select>";

$todoseses = $_SESSION['estatus1'];
$estatus1 = "<select name='id_estatus' required>";
$estatus1.= "<option>Seleccione un estatus</option>";

foreach ($todoseses as $tb) {
	$estatus1.= "<option value=".$tb['id'].">".$tb['estatu']."</option>";	
}
$estatus1.= "</select>";

	$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrarDisciplina">';
	$form.='<input type="submit" value="Datos Personales" id="siguiente11" name="Personal" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Indumentaria" id="siguiente11" name="Indumentaria" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Datos de Contacto" id="Personales" name="contacto" class="botonmodalsuperior">';	
	$form.='<input type="submit" value="Datos Bancarios" id="datosb" name="DatosB" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Disciplinas" name="Disciplinas" id="d" class="botonmodalsuperioractual">';
	$form.='<input type="submit" value="Datos Laborales" id="siguiente11" name="BtModificar" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Registro_medicos" id="a" name="Registro_medicos" class="botonmodalsuperior">';
	$form.='<input type="submit" value="Discapacidades" name="Discapacidades" id="d" class="botonmodalsuperior">';



	$form.='</table>';
	$form.='<table align="center">';
	$form.='<tr>';
	$form.='<td>&nbsp;</td>';
	$form.='</tr>';
	$form.='<tr>';
	$form.='<td>'.$disciplina1.'</td>';
	$form.='<td>'.$modalidad1.'</td>';
	$form.='<td>'.$estatus1.'</td>';
	$form.='<td> <input type="submit" value="Añadir Disciplina" id="submit" name="BtRegistrar1"> </td>';
	$form.='</tr>';
	$form.='</tr>';


	$datoss = $_SESSION['modidisciplinas'];
	foreach($datoss as $d)
	{
		$id=$d['id'];
	}
	$form.='<td> <input type="hidden" value="'.$id.'" name="id_atleta"> </td>';
	$catalogo = $_SESSION['catadisci1'];
	$form.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrarDisciplina' method='post'>";
	$form.="<table class=tabla-cat id=tabla>";
	$form.="<tr><th>Disciplina</th><th>Modalidad</th><th>Estatus</th><th colspan='2'>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$form.="<tr>";	
		$form.="<td>".$cat['disciplina']."</td>";
		$form.="<td>".$cat['modalidad']."</td>";
		$form.="<td>".$cat['estatu']."</td>";


		$form.="<td><a href='../../Controlador/AtletaController.php?accion=seleccionarEstatus&id=".$cat['iddis']."&atleta=".$cat['id']."'>";
		$form.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Eliminar'></a></td>";
		$form.="<td><a href='../../Controlador/AtletaController.php?accion=eliminarDisciplina&id=".$cat['iddis']."&atleta=".$cat['id']."'>";
		$form.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
	
	}
	$form.='<table align="right">';
	$form.='<td> <input type="submit" value="Siguiente" id="submit" name="BtModificar"> </td>';
	$form.='</table>';
	$form.='<table align="left">';
	$form.='<tr>';
	$form.='<td><input type="submit" class="botonmodal" value="Volver" name="DatosB" id=""></td>';
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
