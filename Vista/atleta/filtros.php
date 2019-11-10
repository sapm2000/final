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


$_SESSION['contar']='';







$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos Personales</h2>';

$form.='<td> <a href="reportedatospersonales.php?accion=actualizar"><input type="button" value="Reporte General" class="botonmodal" title="Reporte de Datos General de los Atletas Según sus Datos Personales" id="" name=""></a></td>';
$form.='<td><a href="filtronacionalidad.php?accion=actualizar"><input type="button" value="Reporte de Nacionalidad" class="botonmodal" title="Reporte de los Atletas por Nacionalidad" id="" name=""></a></td>';
$form.='<td><a href="filtroprimercedula.php?accion=actualizar"><input type="button" value="Reporte de Primeros N° de Cédula" class="botonmodal" title="Reporte de los Atleta por sus Primeros N° de Cédula" id="" name=""></a></td>';
$form.='<td><a href="filtroultimacedula.php?accion=actualizar"><input type="button" value="Reporte de Ultimos N° de Cédula" class="botonmodal" title="Reporte de los Atleta por sus Ultimos N° de Cédula" id="" name=""></a></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td><a href="filtrofechanac.php?accion=actualizar"><input type="button" value="Reporte de Fecha de Nacimiento" class="botonmodal" title="Reporte de los Atletas por Fecha de Nacimiento" id="" name=""></a></td>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=buscamelasdisciplinas"><input type="button" value="Reporte de Fecha de Nacimiento por disciplina" class="botonmodal" title="Reporte de los Atletas por Fecha de Nacimiento" id="" name=""></a></td>';
$form.='<td><a href="filtrotiposanguineo.php?accion=actualizar"><input type="button" value="Reporte de Tipo Sanguíneo" class="botonmodal" title="Reporte de Tipo Sanguíneo de los Atletas" id="" name=""></a></td>';
$form.='<td><a href="filtroestadocivil.php?accion=actualizar"><input type="button" value="Reporte de Estado Cívil" class="botonmodal" title="Reporte de el Estado Cívil de los Atletas" id="" name=""></a></td>';
$form.='<td><a href="filtrosexo.php?accion=actualizar"><input type="button" value="Reporte de Genero" class="botonmodal" title="Reporte de Atletas Según su Genero" id="" name=""></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=buscatodos1"><input type="button" value="Reporte de Nivel de Estudio" class="botonmodal" title="Reporte de Atletas Según su Nivel de Estudio" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos de Indumentaria</h2>';

$form.='<td><a href="reporteindumentaria.php?accion=actualizar"><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según su Indumentaria" id="" name=""></a></td>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=indumentariapordisciplina"><input type="button" value="Reporte por disciplina" class="botonmodal" title="Reporte de los Atletas Según su Estatus" id="" name=""></td>';
$form.='<td><a href="filtropeso.php?accion=actualizar"><input type="button" value="Reporte de Peso" class="botonmodal" title="Reporte de los Atletas Según el Peso" id="" name=""></a></td>';
$form.='<td><a href="filtroaltura.php?accion=actualizar"><input type="button" value="Reporte de Altura" class="botonmodal" title="Reporte de los Atletas Según la Altura" id="" name=""></a></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=buscatallas"><input type="button" value="Reporte de Talla" class="botonmodal" title="Reporte de los Atletas Según la Talla" id="" name=""></a></td>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=buscacalzado"><input type="button" value="Reporte de Calzado" class="botonmodal" title="Reporte de Datos de los Atletas Según el Calzado" id="" name=""></a></td>';
$form.='<td><a href="filtromano.php?accion=actualizar"><input type="button" value="Reporte de Mano Hábil" class="botonmodal" title="Reporte de los Atletas Según la Mano Hábil" id="" name=""></a></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos de Contacto</h2>';

$form.='<td><a href="reportecontacto.php?accion=actualizar"><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Datos de Contacto" id="" name=""></a></td>';
$form.='<td><a href="filtrotelefono.php?accion=actualizar"><input type="button" value="Reporte de Operador Telefónico" class="botonmodal" title="Reporte de los Atletas Según el Operador Telefónico" id="" name=""></a></td>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=buscamunicipios"><input type="button" value="Reporte de Municipio" class="botonmodal" title="Reporte de los Atletas Según el Municipio" id="" name=""></a></td>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=buscaparroquias"><input type="button" value="Reporte de Parroquia" class="botonmodal" title="Reporte de los Atletas Según la Parroquia" id="" name=""></a></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos Bancarios</h2>';

$form.='<td><a href="reportebancario.php?accion=actualizar"><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Datos Bancarios" id="" name=""></a></td>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=buscabancos"><input type="button" value="Reporte de Bancos" class="botonmodal" title="Reporte de los Atletas Según el Banco" id="" name=""></a></td>';
$form.='<td><a href="filtrotipocuenta.php?accion=actualizar"><input type="button" value="Reporte de Tipo de Cuentas" class="botonmodal" title="Reporte de los Atletas Según el Tipo de Cuenta" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos de Disciplinas</h2>';

$form.='<td><a href="reportedisciplinas.php?accion=actualizar"><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Disciplinas" id="" name=""></td>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=buscadisciplinas"><input type="button" value="Reporte de Modalidades" class="botonmodal" title="Reporte de los Atletas Según La Modalidad" id="" name=""></td>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=reportegeneral"><input type="button" value="Reporte Global" class="botonmodal" title="Reporte Global de los Atletas Según Disciplina" id="" name=""></td>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=reportegeneralgloria"><input type="button" value="Reporte Global de Glorias" class="botonmodal" title="Reporte de los Atletas Gloriosos" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos Laborales</h2>';

$form.='<td><a href="reportelaboral.php?accion=actualizar"><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Datos Laborales" id="" name=""></td>';

$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos de Registro Médico</h2>';

$form.='<td><a href="reportemedico.php?accion=actualizar"><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Registros Médicos" id="" name=""></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';




$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtros">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Datos de Discapacidades</h2>';

$form.='<td><a href="reportediscapacidad.php?accion=actualizar"><input type="button" value="Reporte General" class="botonmodal" title="Reporte General de los Atletas Según sus Discapacidades" id="" name=""></td>';
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
