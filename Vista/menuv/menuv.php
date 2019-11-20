<?php
	session_start();
	if(empty($_REQUEST['accion']) OR $_REQUEST['accion']!='validado' OR empty($_SESSION['nombre']))
	{
		header('Location:../Persona/InicioSesion.php');
	} //Seguridad: Por si acceden a la página de bienvenida sin iniciar sesión...

	$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];

	$form='';
	$form.='<table align=center style="color:red">';
	$form.='<tr>';
	$form.='<td>NOTA IMPORTANTE:</td>';

	$form.='<td>Este sistema solo debe usarse con una pestaña o ventana abierta, de no ser así puede que los resultados no sean correctos.</td>';
	$form.='</table>';


	$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'BIENVENIDO '.$_SESSION['nombre']." ".$_SESSION['apellido']." (".$_SESSION['tipo'].")",
	'CATALOGO'=>'',
	'BOTONREG'=>'',
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
