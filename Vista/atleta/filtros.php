<?php
session_start();
if(empty($_SESSION['nombre']))
{
	header('Location: ../Persona/InicioSesion.php');
}

if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/AtletaController.php?accion=buscafiltros");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}

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

$sexo ="<select name='sexo' required>";
$sexo.="<option value=''>Seleccione un sexo</option>";
$sexo.= "<option>F</option>";
$sexo.= "<option>M</option>";
$sexo.="</select>";

$todos = $_SESSION['nivel10'];
$nivel = "<select name='id_nivel' required>";
$nivel.= "<option value=''>Seleccione un nivel</option>";
foreach($todos as $td)
{
	$nivel.= "<option value=".$td['id'].">".$td['nivel']."</option>";	
}
$nivel.= "</select>";

$nac='';
$nac.="<select name='nacio'  style='width:40px' required>";
$nac.= "<option value=''>Seleccione una nacionalidad</option>";
$nac.= "<option>V</option>";
$nac.= "<option>E</option>";
$nac.= "<option>P</option>";
$nac.= "</select>";


$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos Personales</h2>';

$form.='<td><input type="button" value="Reporte General" class="botonmodal" title="Reporte de Datos General de los Atletas Según sus Datos Personales" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Primeros N° de Cédula" class="botonmodal" title="Reporte de los Atleta por sus Primeros N° de Cédula" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Ultimos N° de Cédula" class="botonmodal" title="Reporte de los Atleta por sus Ultimos N° de Cédula" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Fecha de Nacimiento" class="botonmodal" title="Reporte de los Atletas por Fecha de Nacimiento" id="" name=""></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td><input type="button" value="Reporte de Tipo Sanguíneo" class="botonmodal" title="Reporte de Tipo Sanguíneo de los Atletas" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Estado Cívil" class="botonmodal" title="Reporte de el Estado Cívil de los Atletas" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Genero" class="botonmodal" title="Reporte de Atletas Según su Genero" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Nivel de Estudio" class="botonmodal" title="Reporte de Atletas Según su Nivel de Estudio" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos de Indumentaria</h2>';

$form.='<td><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según su Indumentaria" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Peso" class="botonmodal" title="Reporte de los Atletas Según el Peso" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Altura" class="botonmodal" title="Reporte de los Atletas Según la Altura" id="" name=""></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td><input type="button" value="Reporte de Talla" class="botonmodal" title="Reporte de los Atletas Según la Talla" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Calzado" class="botonmodal" title="Reporte de Datos de los Atletas Según el Calzado" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Mano Hábil" class="botonmodal" title="Reporte de los Atletas Según la Mano Hábil" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos de Contacto</h2>';

$form.='<td><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Datos de Contacto" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Operador Telefónico" class="botonmodal" title="Reporte de los Atletas Según el Operador Telefónico" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Municipio" class="botonmodal" title="Reporte de los Atletas Según el Municipio" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Parroquia" class="botonmodal" title="Reporte de los Atletas Según la Parroquia" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos Bancarios</h2>';

$form.='<td><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Datos Bancarios" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Bancos" class="botonmodal" title="Reporte de los Atletas Según el Banco" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Tipo de Cuentas" class="botonmodal" title="Reporte de los Atletas Según el Tipo de Cuenta" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos de Disciplinas</h2>';

$form.='<td><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Disciplinas" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Disciplinas" class="botonmodal" title="Reporte de los Atletas Según La Disciplina" id="" name=""></td>';
$form.='<td><input type="button" value="Reporte de Modalidades" class="botonmodal" title="Reporte de los Atletas Según su Modalidad" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos Laborales</h2>';

$form.='<td><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Datos Laborales" id="" name=""></td>';

$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos de Registro Médico</h2>';

$form.='<td><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Registros Médicos" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos de Discapacidades</h2>';

$form.='<td><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Discapacidades" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';





$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Reportes de Atletas con Filtros',
	'CATALOGO'=>$cata,
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
