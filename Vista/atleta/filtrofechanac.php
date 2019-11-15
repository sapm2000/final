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
$_SESSION['titulo']='Reporte de Atletas Filtrado por Fecha de Nacimiento';
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtrofechanac">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese el rango de fecha a buscar:</td>';
$form.='</tr>';
$form.='</table>';
$form.='<table align=center>';
$form.='<tr>';
$form.='<td>Desde:<input  type="date" class="date" name="primer" id="fecha1"  max="'.date("Y-m-d").'" value="'.date("Y-m-d").'" required></td>';
$form.='<td>Hasta:<input  type="date" class="date"  name="segundo" id="fecha2"  max="'.date("Y-m-d").'" value="'.date("Y-m-d").'" required></td>';
$form.='<td> <input type="submit" class="botonmodal" value="Buscar"> </td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';






$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Filtrar por Fecha de Nacimiento',
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
