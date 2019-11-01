<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/RepresentanteController.php?accion=buscatodos");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}

$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';

$algunis = $_SESSION['selectp'];
$select = "<select name='parentezco' required>";
$select.= "<option value=''>Seleccione un parentesco</option>";
foreach($algunis as $t)
{
	$select.= "<option value=".$t['id'].">".$t['parentezco']."</option>";	
}
$select.= "</select>";

$form.='<form name="regusuario" method="post" action="../../Controlador/RepresentanteController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Cédula:</td>';
$form.='<td><input id="num" type="text" class="cajasdetexto" onkeypress="return solonumeros(event)" onpaste="return false" name="cedula" maxlenght="9" pattern="[0-9]{7,8}" title="Debe tener de 7 u 8 digitos" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Nombre:</td>';
$form.='<td><input id="letras" type="text" name="nombre" class="cajasdetexto" onkeypress="return soloLetras(event)" onpaste="return false" pattern="[a-z A-Z ñÑ\s]{2,20}" title="minimo 2 caracteres" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Apellido:</td>';
$form.='<td><input id="letras" type="text" name="apellido" class="cajasdetexto" onkeypress="return soloLetras(event)" onpaste="return false" pattern="[a-z A-Z ñÑ\s]{2,20}" title="minimo 2 caracteres" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Número de teléfono:</td>';
$form.='<td><input id="key" type="text" name="n_tel" class="cajasdetexto" maxlenght="9" onkeypress="return solonumeros(event)" onpaste="return false" pattern="([0]{1})([2,4]{1})([0-9]{9})*" title="Debe tener 11 digitos" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Correo Electrónico:</td>';
$form.='<td><input id="id_mail" type="email" name="correo" class="cajasdetexto" maxlenght="9" onblur="validateMail("id_mail")" onpaste="return false" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Cédula del Representado:</td>';
$form.='<td><input id="num2" type="text" name="cedula_a" class="cajasdetexto" onkeypress="return solonumeros(event)" onpaste="return false" pattern="[0-9]{7,8}" title="Debe tener de 7 u 8 digitos" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Parentesco con el Representado:</td>';
$form.='<td>'.$select.'</td>';
$form.='</tr>';
$form.='</table>';
$form.='<br>';
$form.=' <input type="submit" value="Registrar" id="submit" name="BtRegistrar">';
$form.='</form>';

if($_GET['accion']=="actual" && !empty($_SESSION['catarepre']))
{
	$catalogo = $_SESSION['catarepre'];
	$cata.="<form name='catalog' action='../../Controlador/UsuarioController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nombre</th><th>Apellido</th><th>Usuario</th><th>Clave</th><th colspan='2'>Opcción</th></tr>";
	
}

else
{
	$cata.= "Aún no se han registrado representantes.";
	$cata.='<br>';
	$cata.='<br>';
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Representantes.',
	'CATALOGO'=>'',
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