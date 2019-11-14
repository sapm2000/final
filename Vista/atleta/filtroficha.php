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

$form.='<form name="atleta" method="post" action="#">';
$form.='<table>';
$form.='<tr>';
$form.='<hr></hr>';
$form.='<h2>Fichas</h2>';

$form.='<td><a href="fichacedula.php?accion=actualizar"><input type="button" value="Reporte de Ficha Especifica" class="botonmodal" title="Reporte de Ficha Especifica" id="" name=""></a></td>';
$form.='<td><a href="../../Controlador/AtletaController.php?accion=fichadisciplina/fichadisciplina.php"><input type="button" value="Reporte por Ficha por Disciplina" class="botonmodal" title="Reporte por Ficha por Disciplina" id="" name=""></td>';
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
