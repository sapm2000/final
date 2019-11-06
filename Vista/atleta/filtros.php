<?php
session_start();
if(empty($_SESSION['nombre']))
{
	header('Location: ../Persona/InicioSesion.php');
}

if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/AtletaController.php?accion=buscafiltros");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}

$select = "<select name='tipos' required>";
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

$estadocivil.="<select name='estadoc' required>";
$estadocivil.= "<option value=''>Seleccione un estado civil</option>";
$estadocivil.= "<option>SOLTERO/A</option>";
$estadocivil.= "<option>CASADO/A</option>";
$estadocivil.= "<option>DIVORCIADO/A</option>";
$estadocivil.= "<option>VIUDO/A</option>";
$estadocivil.= "</select>";

$sexo ="<select name='sexo' required>";
$sexo.="<option value=''>Seleccione un sexo</option>";
$sexo.= "<option>F</option>";
$sexo.= "<option>M</option>";
$sexo.="</select>";

$todos = $_SESSION['nivel10'];
$nivel = "<select name='id_nivel' required>";
$nivel.= "<option value=''>Seleccione un nivel</option>";
foreach($todos as $td)
{
	$nivel.= "<option value=".$td['id'].">".$td['nivel']."</option>";	
}
$nivel.= "</select>";

$nac='';
$nac.="<select name='nacio'  style='width:40px' required>";
$nac.= "<option>V</option>";
$nac.= "<option>E</option>";
$nac.= "<option>P</option>";
$nac.= "</select>";


$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>'.$select.'</td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';

$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>'.$estadocivil.'</td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';

$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>'.$sexo.'</td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';

$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>'.$nivel.'</td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';

$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>'.$nac.'</td>';
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
