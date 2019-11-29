<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}




$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';




$form.='<form name="regusuario" method="post" action="../../Controlador/UsuarioController.php?accion=registrar_contra">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Contraseña Actual</td>';
$form.='<td><input type="password" class="cajasdetexto" name="contra_vieja" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Nueva Contraseña:</td>';
$form.='<td><input id="contra1" type="password" name="clave" class="cajasdetexto" maxlenght="9" onblur="campodoble()" pattern="{8,30}" title="minimo 8 caracteres maximo 30" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Confirmar Nueva Contraseña:</td>';
$form.='<td><input id="contra2" type="password" name="conf_clave" class="cajasdetexto" maxlenght="9" onblur="campodoble()" pattern="{8,30}" title="minimo 8 caracteres maximo 30" required></td>';
$form.='</tr>';
$form.='</table>';
$form.=' <input type="submit" value="Registrar" id="submit" name="BtRegistrar">';
$form.='</form>';


$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Contraseña',
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
