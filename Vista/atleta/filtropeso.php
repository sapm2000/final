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
$_SESSION['titulo']='Reporte de Atletas Filtrado por Peso';
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtropeso">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese el rango de peso a buscar:</td>';
$form.='</tr>';
$form.='</table>';
$form.='<table align=center>';
$form.='<tr>';
$form.='<td>Desde:<input  type="text" class="cajasdetexto" name="primer" pattern="[1-9]{1}[0-9]{1,}" title="ej: 47.5 ó 47 "  onkeypress="return solonumerosypuntos(event)" onpaste="return false" required></td>';
$form.='<td>Hasta:<input  type="text" class="cajasdetexto"  name="segundo" pattern="[1-9]{1}[0-9]{1,}" title="ej: 47.5 ó 47 " onkeypress="return solonumerosypuntos(event)" onpaste="return false" required></td>';
$form.='<td> <input type="submit" class="botonmodal" value="Buscar"> </td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';






$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Filtrar por Peso',
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
