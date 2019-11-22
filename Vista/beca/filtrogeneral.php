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
$_SESSION['titulo']='Reporte General de Becas por Fecha';
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/BecaController.php?accion=filtrogeneral">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese el rango de fecha a buscar:</td>';
$form.='</tr>';
$form.='</table>';
$form.='<table align=center>';
$form.='<tr>';
$form.='<td>Desde:<input  type="text" class="date" name="primer" id="fecha1" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" max="'.date("Y-m-d").'" value="'.date("Y-m-d").'" onkeypress="return solonumerosguion(event)" onpaste="return false" onblur="valFechasfiltro()" required></td>';
$form.='<td>Hasta:<input  type="text" class="date"  name="segundo" id="fecha2" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" max="'.date("Y-m-d").'" value="'.date("Y-m-d").'" onkeypress="return solonumerosguion(event)" onpaste="return false" onblur="valFechasfiltro()" required></td>';
$form.='<td> <input type="submit" class="botonmodal" value="Buscar"> </td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';






$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Becas',
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
