<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/UsuarioController.php?accion=buscatodos");
}

if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}

$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" name="nombre" maxlenght="9" ></td>';
$form.='<td> <a href="../usuario/usuario.php?accion=actualizar"><input type="button" class="botonmodal" value="+ Usuario"> </a></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';

if($_GET['accion']=="actual" && !empty($_SESSION['catausu2']))
{
	$catalogo = $_SESSION['catausu2'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Nombre</th><th>Apellido</th><th>Usuario</th><th>Número de Teléfono</th><th>Número de Emergencia</th><th>Correo Electrónico</th><th>Tipo de Usuario</th><th colspan='2'>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nombre']."</td>";
		$cata.="<td>".$cat['apellido']."</td>";
		$cata.="<td>".$cat['usuario']."</td>";
		$cata.="<td>".$cat['n_tel']."</td>";
		$cata.="<td>".$cat['n_eme']."</td>";
		$cata.="<td>".$cat['correo']."</td>";
		$cata.="<td>".$cat['tipo']."</td>";
		$cata.="<td><a href='../../Controlador/UsuarioController.php?accion=seleccionar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Editar'></a></td>";
		$cata.="<td><a href='../../Controlador/UsuarioController.php?accion=eliminar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
}
elseif ($_GET['accion']=='ver_detalles')
{
	$datos = $_SESSION['modiusu2'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$tip=$d['tipo'];


	}

	$tipo = "<select name='tipo' required>";
	if ($tip=='ASISTENTE ADMINISTRATIVO') {
		$tipo.= "<option selected>ASISTENTE ADMINISTRATIVO</option>";	
	}
	else {
		$tipo.= "<option>ASISTENTE ADMINISTRATIVO</option>";	
	}
	if ($tip=='METODOLOGO') {
		$tipo.= "<option selected>METODOLOGO</option>";	
	}
	else {
		$tipo.= "<option >METODOLOGO</option>";	
	}
	if ($tip=='ADMINISTRADOR') {
		$tipo.= "<option selected>ADMINISTRADOR</option>";	
	}
	else {
		$tipo.= "<option >ADMINISTRADOR</option>";	
	}


	$cata.= "</select>";
	$cata.="<form name='modiform' method='post' action='../../Controlador/UsuarioController.php?accion=modificar1&id=".$id."'>";
	$cata.="<table>";
	$cata.="<tr>";
	
	$cata.='<tr>';
	$cata.='<td>Tipo de Usuario</td>';
	$cata.='<td>'.$tipo.'</td>';
	$cata.='</tr>';
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
