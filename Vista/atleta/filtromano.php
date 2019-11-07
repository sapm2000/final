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

$mano = "<select name='primer' required>";
$mano.= "<option value=''>Seleccione mano habil</option>";
$mano.= "<option>DIESTRO</option>";
$mano.= "<option>ZURDO</option>";
$mano.= "<option>AMBIDIESTRO</option>";
$mano.= "</select>";
	
	


$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$_SESSION['titulo']='Reporte de Atletas Filtrado por Mano Hábil';
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtromano">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese la mano hábil a buscar:</td>';
$form.='<td>'.$mano.'</td>';
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
