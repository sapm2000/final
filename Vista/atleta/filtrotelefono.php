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
$_SESSION['titulo']='Reporte de los Atletas Filtrado por Número de Operador Telefónico';
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtrooperadora">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese los primeros 4 dígitos del operador telefónico a buscar:</td>';
$form.='<td><input  type="text" class="cajasdetexto"  name="primer" onkeypress="return solonumeros(event)" onpaste="return false" pattern="([0]{1})([2,4]{1})([1-9]{2})*"></td>';
$form.='<td> <input type="submit" class="botonmodal" value="Buscar"></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';






$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Atletas',
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
