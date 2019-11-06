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
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtrotiposanguineo">';
$select = '<select name="primer" required>';
$select.= "<option value=''>Seleccione un tipo de sangre</option>";
$select.= "<option value='A+'>A+</option>";
$select.= "<option value='A-'>A-</option>";
$select.= "<option value='B+'>B+</option>";
$select.= "<option value='B-'>B-</option>";
$select.= "<option value='O+'>O+</option>";
$select.= "<option value='O-'>O-</option>";
$select.= "<option value='AB+'>AB+</option>";
$select.= "<option value='AB-'>AB-</option>";
$select.= "</select>";
$form.='<table>';
$form.='<tr>';
$form.='<td>ingrese el tipo sanguineo</td>';
$form.='<td>'.$select.'</td>';
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
