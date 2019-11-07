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


$todostd = $_SESSION['municipio'];
$municipio1 = "<select name='id_municipio' required>";
$municipio1.= "<option value=''>Seleccione un municipio</option>";
foreach($todostd as $t)
{
	$municipio1.= "<option value=".$t['id'].">".$t['descrips']."</option>";	

}
$municipio1.= "</select>";

$todospar = $_SESSION['parroquia'];
	$parroquia1 = "<select name='id_parroquia' required>";
	$parroquia1.= "<option value=''>Seleccione una parroquia</option>";
	foreach($todospar as $tp)
	{
		$parroquia1.= "<option value=".$tp['id']." class='mun".$tp['id_municipio']."'>".$tp['descrip']."</option>";	
	}
	$parroquia1.= "</select>";


$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtroparroquia">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese el municipio</td>';
$form.='<td>'.$municipio1.'</td>';
$form.='<td>Ingrese la parroquia</td>';
$form.='<td>'.$parroquia1.'</td>';
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
