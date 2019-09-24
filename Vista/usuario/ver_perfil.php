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

if ($_GET['accion']=='ver_detalles')
{
	$datos = $_SESSION['modiusu3'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$nom=$d['nombre'];
		$ape=$d['apellido'];
		$usu=$d['usuario'];
		$cla=$d['clave'];
		$n_tel=$d['n_tel'];
		$n_eme=$d['n_eme'];
		$cor=$d['correo'];
		$conf_clave=$d['conf_clave'];


	}



	$cata.= "</select>";
	$cata.="<form name='modiform' method='post' action='../../Controlador/UsuarioController.php?accion=modificar&id=".$id."'>";
	$cata.="<table>";
	$cata.="<tr>";
	$cata.="<td>Nombre:</td>";
	$cata.="<td><input type='text' id='letras' name='nombre' class='cajasdetexto' onkeypress='return soloLetras(event)' onpaste='return false' maxlenght='20' value='".$nom."' pattern='[a-z A-Z ñÑ\s]{2,20}' title='minimo 2 caracteres' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Apellido:</td>";
	$cata.="<td><input type='text' id='letras' name='apellido' class='cajasdetexto' onkeypress='return soloLetras(event)' onpaste='return false' maxlenght='20' value='".$ape."' pattern='[a-z A-Z ñÑ\s]{2,20}' title='minimo 2 caracteres' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Usuario:</td>";
	$cata.="<td><input type='text' name='usuario' class='cajasdetexto' maxlenght='9' value='".$usu."' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Número de Teléfono:</td>";
	$cata.="<td><input id='key' type='text' name='n_tel' class='cajasdetexto' onkeypress='return solonumeros(event)' onpaste='return false' maxlenght='9' value='".$n_tel."' pattern='([0]{1})([2,4]{1})([0-9]{9})*' title='Debe tener 11 digitos' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Número de Emerencia:</td>";
	$cata.="<td><input id='key' type='text' name='n_eme' class='cajasdetexto' onkeypress='return solonumeros(event)' onpaste='return false' maxlenght='9' value='".$n_eme."' pattern='([0]{1})([2,4]{1})([0-9]{9})*' title='Debe tener 11 digitos' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Correo Electrónico:</td>";
	$cata.="<td><input type='text' id='id_mail' name='correo' class='cajasdetexto' onblur='validateMail('id_mail')' onpaste='return false' maxlenght='9' value='".$cor."' required></td>";
	$cata.="</tr>";
	$cata.="</table>";
	$cata.="<br><input type='submit' value='Modificar' id='submit' name='BtModificar'>";
	unset($form);
	$form="";

}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Perfil',
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