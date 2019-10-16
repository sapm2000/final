<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
	if($_GET['accion']=="nuevo")
	{
		header("Location: ../../Controlador/EventoController.php?accion=registro");
	}
	if($_GET['accion']=="actualizar")
	{
		header("Location: ../../Controlador/EventoController3.php?accion=buscatodos&id=".$id);
	}

	if(empty($_REQUEST['accion']))
	{
	header("Location: ../menuv/menuv.php?accion=validado");
	}

$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
unset($cata);
$cata='';
$boton='';



if ($_GET['accion']=='ver_detalles')
{
	$datos = $_SESSION['modieven3'];
	foreach($datos as $d)
	{
		$id=$d['id'];
	

	}
	$cata.='<form name="regevento" method="post" action="../../Controlador/EventoController.php?accion=registrar1&id='.$id.'">';
	$cata.='<table>';
	$cata.='<tr>';
	$cata.='<td>Cédula:</td>';
	$cata.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" name="cedula" onkeypress="return solonumeros(event)" onpaste="return false" maxlenght="9" pattern="[0-9]{7,8}" title="Solo 7 u 8 digitos" required></td>';
	$cata.='<td>Posición:</td>';
	$cata.='<td><input id="searchTer" type="text" size="1" class="cajasdetexto" name="posicion" maxlenght="9" onkeypress="return solonumeros(event)" onpaste="return false" pattern="([1-9]{1})([0-9]{1,})*" required></td>';
	$cata.='<td>Observaciones:</td>';
	$cata.='<td><input id="searchTerm" type="text" class="cajasdetexto" name="obs" ></td>';
	$cata.='</tr>';
	$cata.='</table>';
	$cata.='<table>';
	$cata.='<tr>';
	$cata.='<td><input type="submit" value="Registrar" id="submit" name="BtRegistrar"></td>';
	$cata.='</tr>';
	$cata.='</table>';
	$cata.='<table align="center">';
	$cata.='<tr>';
	$cata.='<td><a href="evento2.php?accion=actualizar"><input type="button" class="botonmodal" value="Volver" title="Volver a la consulta de eventos"></td>';
	$cata.='</tr>';
	$cata.='</table>';
	$cata.='</form>';
	$cata.="<table class=tabla-cat id=tabla1>";
	$cata.="<tr><th>Nombre</th><th>Fecha de Inicio</th><th>Fecha de Cierre</th><th>Descripción</th><th>Tipo</th><th>Municipio</th><th>Parroquia</th><th colspan='2'>Acción</th></tr>";
	$catalogo = $_SESSION['modieven3'];
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nombre']."</td>";
		$fecha1=$cat['fecha_inicio'];
		$fecha2=$cat['fecha_cierre'];
		$cata.="<td>".date('d-m-Y',strtotime($fecha1))."</td>";
		$cata.="<td>".date('d-m-Y',strtotime($fecha2))."</td>";
		$cata.="<td>".$cat['descripcion']."</td>";
		$cata.="<td>".$cat['std']."</td>";
		$cata.="<td>".$cat['descrips']."</td>";
		$cata.="<td>".$cat['descrip']."</td>";
		$cata.="<td><a href='../../Controlador/EventoController.php?accion=seleccionar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Editar'></a></td>";

	
	unset($form);
	$form="";
}

$cat1 = $_SESSION['catapart'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Posición</th><th>observacion</th><th>Acción</th></tr>";
	foreach($cat1 as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td style='display:none'>".$cat['tonto']."</td>";
		$cata.="<td>".$cat['cedula']."</td>";
		$cata.="<td>".$cat['nombre']."</td>";
		$cata.="<td>".$cat['apellido']."</td>";
		$cata.="<td>".$cat['posicion']."</td>";
		$cata.="<td>".$cat['observacion']."</td>";

		
		$cata.="<td><a href='../../Controlador/EventoController.php?accion=eliminar&id=".$cat['id']."&evento=".$cat['tonto']."&atleta=".$cat['id_atleta']."'>";	
		$cata.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Eliminar'></a></td>";	
		$cata.="</tr>";	
}
}


else
{
	$cata.= "Aún no se han registrado participantes.";
	$cata.='<br>';
	$cata.='<br>';
}


$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Evento',
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
