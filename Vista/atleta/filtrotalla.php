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

$todostd = $_SESSION['talla'];
	$talla = "<select name='primer' required>";
	$talla.= "<option value=''>Seleccione una talla</option>";
	foreach($todostd as $t)
	{
			$talla.= "<option value=".$t['id']." selected>".$t['talla']."</option>";	


	}
	$talla.= "</select>";


$_SESSION['titulo']='Reporte de Atletas Filtrado por Talla';
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtrotalla">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese la talla</td>';
$form.='<td>'.$talla.'</td>';
$form.='<td> <input type="submit" class="botonmodal" value="Buscar"> </td>';
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
