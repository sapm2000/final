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

$todospar = $_SESSION['calzado'];
	$calzado = "<select name='primer' required>";
	$calzado.= "<option value=''>Seleccione un calzado</option>";
	foreach($todospar as $tp)
	{
	$calzado.= "<option value=".$tp['id'].">".$tp['calzado']."</option>";	
		
	}
	$calzado.= "</select>";


$_SESSION['titulo']='Reporte de Atletas Filtrado por Calzado';
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtrocalzado">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese el calzado</td>';
$form.='<td>'.$calzado.'</td>';
$form.='<td> <input type="submit" class="botonmodal" value="Buscar"> </td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';






$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Filtrar por Calzado',
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
