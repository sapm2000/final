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
$_SESSION['titulo']='Reporte de Atletas Filtrado por los Dos Primeros Digitos de los Documentos de Identidad';
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtrosprimerdigito">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese los primeros dígitos de los Documentos de Identidad a buscar:</td>';
$form.='<td><input  type="text" class="cajasdetexto"  name="primer" pattern="[A-Z a-z Ññ/s 1-9]{1,2}" title="Solo uno o dos dígitos" onkeypress="return caracteress(event)" onpaste="return false" required></td>';
$form.='<td><input type="submit" class="botonmodal" value="Buscar"> </td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';






$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Filtrar por Primeros Dígitos del Documento de Identidad',
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
