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


$form.='<td> <a href="#"><input type="button" value="Becas Filtradas por Fecha" class="botonmodal" title="Reporte de las Becas Según sus Fechas" id="" name=""></a></td>';
$form.='<td><a href="#"><input type="button" value="Becas Filtradas por Disciplina" class="botonmodal" title="Reporte de las Becas Según las Disciplinas" id="" name=""></a></td>';
$form.='</table>';
$form.='</form>';










$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Reportes de Becas con Filtros',
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
