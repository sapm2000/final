<?php
session_start();
if(empty($_SESSION['nombre']))
{
	header('Location: ../Persona/InicioSesion.php');
}

if($_GET['accion']=="actualizar" || empty($_REQUEST['accion']))
{
	header("Location: ../../Controlador/AtletaController.php?accion=buscatodos3");
}




$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()"></td>';
$form.='<td> <a href="consultaatleta.php?accion=actualizar"><input type="button" class="botonmodal" value="Volver" title="Volver al maestro atleta"> </a></td>';
$form.='</tr>';
$form.='</table>';

if($_GET['accion']=="actual"&&!empty($_SESSION['cataatle2']))
{
	$catalogo = $_SESSION['cataatle2'];
	$cata.="<form name='catalog' action='../../Controlador/AtletaconsultaController.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Fecha de Nacimiento</th><th>Tipo Sanguineo</th><th>Mano Habil</th><th>Sexo</th><th>Peso</th><th>Altura</th><th>Talla</th><th>Calzado</th><th>Número de Teléfono</th><th colspan='1'>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['f_nac']."</td>";	
		$cata.="<td>".$cat['tipos']."</td>";	
		$cata.="<td>".$cat['mano']."</td>";	
		$cata.="<td>".$cat['sexo']."</td>";	
		$cata.="<td>".$cat['peso']."</td>";	
		$cata.="<td>".$cat['altura']."</td>";
		$cata.="<td>".$cat['talla']."</td>";	
		$cata.="<td>".$cat['calzado']."</td>";		
		$cata.="<td>".$cat['n_tel']."</td>";	



		$cata.="<td><a href='../../Controlador/AtletaController.php?accion=reactivar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/activo1.png' width='15px' height='15px' title='reactivar'></a></td>";	
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
}
if (empty($_SESSION['cataatle2'])) {
	$cata.="Aún no hay atletas gloriosos.";
}


$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Atletas Gloriosos',
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
