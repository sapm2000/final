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

$tipo = "<select name='tipo' required>";
$tipo.= "<option value=''>Seleccione el tipo de usuario</option>";

$tipo.= "<option >ASISTENTE ADMINISTRATIVO</option>";	
$tipo.= "<option >METODOLOGO</option>";	
$tipo.= "<option >ADMINISTRADOR</option>";	

$tipo.= "</select>";


$form.='<form name="regusuario" method="post" action="../../Controlador/UsuarioController.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Nombre:</td>';
$form.='<td><input id="letra" type="text" class="cajasdetexto" onkeypress="return soloLetras(event)" onpaste="return false" name="nombre" pattern="[a-z A-Z ñÑ\s]{2,20}" title="minimo 2 caracteres" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Apellido:</td>';
$form.='<td><input id="letras" type="text" name="apellido" class="cajasdetexto" onkeypress="return soloLetras(event)" onpaste="return false" pattern="[a-z A-Z ñÑ\s]{2,20}" title="minimo 2 caracteres" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Usuario:</td>';
$form.='<td><input id="" type="text" name="usuario" class="cajasdetexto" maxlenght="9" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Número de Teléfono:</td>';
$form.='<td><input id="key" type="text" name="n_tel" class="cajasdetexto" maxlenght="9" onkeypress="return solonumeros(event)" onpaste="return false" pattern="([0]{1})([2,4]{1})([0-9]{9})*" title="Debe tener de 11 digitos" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Número de Emergencia:</td>';
$form.='<td><input id="key" type="text" name="n_eme" class="cajasdetexto" maxlenght="9" onkeypress="return solonumeros(event)" onpaste="return false" pattern="([0]{1})([2,4]{1})([0-9]{9})*" title="Debe tener de 11 digitos" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Correo Electrónico:</td>';
$form.='<td><input id="id_mail" type="email" name="correo" class="cajasdetexto" maxlenght="9" onblur="validateMail("id_mail")" onpaste="return false" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Contraseña:</td>';
$form.='<td><input id="contra1" type="password" name="clave" class="cajasdetexto" maxlenght="9" onblur="campodoble()" pattern="[a-z A-Z 0-9 ñÑ\s]{8,30}" title="minimo 8 caracteres" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Confirmar Contraseña:</td>';
$form.='<td><input id="contra2" type="password" name="conf_clave" class="cajasdetexto" maxlenght="9" onkeyup="campodoble()" pattern="[a-z A-Z 0-9 ñÑ\s]{8,30}" title="minimo 8 caracteres" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Tipo de Usuario</td>';
$form.='<td>'.$tipo.'</td>';
$form.='</tr>';
$form.='</table>';
$form.='<br>';
$form.=' <input type="submit" value="Registrar" id="submit" name="BtRegistrar">';
$form.='</form>';

if($_GET['accion']=="actual" && !empty($_SESSION['catausu']))
{
	$catalogo = $_SESSION['catausu'];
	$cata.="<form name='catalog' action='../../Controlador/UsuarioController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nombre</th><th>Apellido</th><th>Usuario</th><th>Clave</th><th colspan='2'>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nombre']."</td>";
		$cata.="<td>".$cat['apellido']."</td>";
		$cata.="<td>".$cat['usuario']."</td>";
		$cata.="<td>".$cat['clave']."</td>";
		$cata.="<td><a href='../../Controlador/UsuarioController.php?accion=seleccionar&id=".$cat['id']."'>";	
		$cata.="<img src='../Imagenes/editar.png' width='20px' height='20px' title='editar'></a></td>";
		$cata.="<td><a href='../../Controlador/UsuarioController.php?accion=eliminar&id=".$cat['id']."'>";	
		$cata.="<img src='../Imagenes/eliminar.png' width='20px' height='20px' title='eliminar'></a></td>";	
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
}
elseif ($_GET['accion']=='ver_detalles')
{
	$datos = $_SESSION['modiusu'];
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
	$cata.="<form name='modiform' method='post' action='../../Controlador/UsuarioController.php?accion=modificar&id=".$id."'>";
	$cata.="<table>";
	$cata.="<tr>";
	$cata.="<td>Nombre:</td>";
	$cata.="<td><input type='text' name='nombre' class='cajasdetexto' maxlenght='9' value='".$nom."' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Apellido:</td>";
	$cata.="<td><input type='text' name='apellido' class='cajasdetexto' maxlenght='9' value='".$ape."' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Usuario:</td>";
	$cata.="<td><input type='text' name='usuario' class='cajasdetexto' maxlenght='9' value='".$usu."' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$form.='<td>Número de teléfono:</td>';
	$cata.="</tr>";
	$cata.="</table>";
	$cata.="<br><input type='submit' value='Modificar' id='submit' name='BtModificar'>";
	unset($form);
	$form="";
}
else
{
	$cata.= "Aún no se han registrado usuarios.";
	$cata.='<br>';
	$cata.='<br>';
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Usuario',
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