<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}

if ($_GET['accion']=='ver_detalles')
{
	$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
	$cata='';
	$boton='';
	$datos = $_SESSION['modiestatus'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$ide=$d['id_estatus'];
		$bec=$d['becar'];

	}

	$todosal = $_SESSION['estatus'];
	$estatus = "<select name='id_estatus' required>";
	$estatus.= "<option>Seleccione un estatus</option>";

	foreach ($todosal as $tb) {
		if($ide==$tb['id']) {
			$estatus.= "<option value=".$tb['id']." selected>".$tb['estatu']."</option>";	

		}
		else {
			$estatus.= "<option value=".$tb['id'].">".$tb['estatu']."</option>";	
		}
	}
	$estatus.= "</select>";

	$becar.="<select name='becar' required>";
	if ($bec==1) {
		$becar.= "<option selected value='1'>SI</option>";
		$becar.= "<option value='0'>NO</option>";

	}
	else {
		$becar.= "<option value='1'>SI</option>";
		$becar.= "<option value='0' selected>NO</option>";
	}

	$becar.= "</select>";

	$cata.="<form name='modiform' method='post' action='../../Controlador/AtletaController.php?accion=modificarEstatus&id=".$id."'>";
	$cata.="<table>";
	$cata.="<tr>";
	$cata.="<td>Estatus:</td>";
	$cata.="<td>".$estatus."</td>";
	$cata.="<td>¿Disciplina Becada?:</td>";
	$cata.="<td>".$becar."</td>";
	$cata.="</tr>";
	$cata.="</table>";
	$cata.="<br><input type='submit' value='Modificar' id='submit' name='BtModificar'>";
	unset($form);
	$form="";
}


$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Atleta',
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