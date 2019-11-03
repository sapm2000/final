<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/EventoController.php?accion=buscatodos1");
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
$form.='<form name="regevento" method="post" action="../../Controlador/EventoController2.php?accion=registrar">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" name="nombre" maxlenght="9" ></td>';
$form.='<td> <a href="../evento/evento.php?accion=actualizar"><input type="button" class="botonmodal" value="+ Evento"> </a></td>';
$form.='<td> <a href="generarreporte.php?accion=global"><input type="button" class="botonmodal" value="Generar Reporte" name="activos" title="Generar Reporte"> </a></td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';

if($_GET['accion']=="actual" && !empty($_SESSION['cataeven2']))
{
	$catalogo = $_SESSION['cataeven2'];
	$reporte='';

	$cata.="<form name='catalog' action='../../Controlador/EventoController2.php?accion=registrar' method='post'>";
	$cata.="<table class=tabla-cat id=tabla>";
	$reporte.="<br><table class=tabla-cateve id=tabla>";
	$reporte.="<table class=tabla-catevento id=tabla>";
	$cata.="<tr><th>Nombre</th><th>Fecha de Inicio</th><th>Fecha de Cierre</th><th>Descripción</th><th>Tipo</th><th>Municipio</th><th>Parroquia</th><th>Cantidad de Participantes Registrados</th><th colspan='2'>Acción</th></tr>";
	$reporte.="<tr><th>Nombre</th><th>Fecha de Inicio</th><th>Fecha de Cierre</th><th>Descripción</th><th>Tipo</th><th>Municipio</th><th>Parroquia</th><th>Cantidad de Participantes Registrados</th></tr>";
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
		$cata.="<td>".$cat['actual']."</td>";
		$cata.="<td><a href='../../Controlador/EventoController.php?accion=seleccionar1&id=".$cat['id']."&max=".$cat['maxpo']."&can=".$cat['canti']."&par=".$cat['parti']."'>";	
		$cata.="<img src='../imagenes1/participantes.png' width='15px' height='15px' title='Añadir mas participantes'></a></td>";
		$cata.="<td><a href='../../Controlador/EventoController.php?accion=seleccionar&id=".$cat['id']."'>";	
		$cata.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Editar'></a></td>";

		$reporte.="<tr>";	
		$reporte.="<td>".$cat['nombre']."</td>";
		$fecha1=$cat['fecha_inicio'];
		$fecha2=$cat['fecha_cierre'];
		$reporte.="<td>".date('d-m-Y',strtotime($fecha1))."</td>";
		$reporte.="<td>".date('d-m-Y',strtotime($fecha2))."</td>";
		$reporte.="<td>".$cat['descripcion']."</td>";
		$reporte.="<td>".$cat['std']."</td>";
		$reporte.="<td>".$cat['descrips']."</td>";
		$reporte.="<td>".$cat['descrip']."</td>";
		$reporte.="<td>".$cat['actual']."</td>";	
	}
	$cata.="</table><br>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$_SESSION['reporteevento']=$reporte;
}
elseif ($_GET['accion']=='ver_detalles')
{
	$datos = $_SESSION['modieven2'];
	foreach($datos as $d)
	{
		$id=$d['id'];
		$nom=$d['nombre'];
		$fei=$d['fecha_inicio'];
		$fec=$d['fecha_cierre'];
		$des=$d['descripcion'];
		$idd=$d['id_disciplina'];
		$idm=$d['id_municipio'];
		$idp=$d['id_parroquia'];
		$can=$d['canti'];
		$par=$d['parti'];

		

	}

	$todos = $_SESSION['coño'];
$select = "<select name='id_disciplina' required>";
$select.= "<option>Seleccione una disciplina</option>";
foreach($todos as $t)
{
	if($idd==$t['id'])
	{
		$select.= "<option value=".$t['id']." selected>".$t['disciplina']."</option>";	
	}
	else
	{
		$select.= "<option value=".$t['id'].">".$t['disciplina']."</option>";	
	}
}
$select.= "</select>";

$todostd = $_SESSION['municipio'];
$municipio = "<select name='id_municipio' required>";
$municipio.= "<option>Seleccione un municipio</option>";
foreach($todostd as $t)
{
	if($idm==$t['id'])
	{
		$municipio.= "<option value=".$t['id']." selected>".$t['descrips']."</option>";	
	}
	else
	{
		$municipio.= "<option value=".$t['id'].">".$t['descrips']."</option>";	
	}
}
$municipio.= "</select>";

$parroquia = "<select name='id_parroquia' required>";
$parroquia.= "<option>Seleccione una parroquia</option>";
$todospa = $_SESSION['parroquia'];
foreach($todospa as $t)
{
	if($idp==$t['id'])
	{
		$parroquia.= "<option value=".$t['id']." class='mun".$t['id_municipio']."' selected>".$t['descrip']."</option>";	
}
	else
	{
		$parroquia.= "<option value=".$t['id']." class='mun".$t['id_municipio']."'>".$t['descrip']."</option>";	
}
}
$parroquia.= "</select>";

	$cata.="<form name='modiform' method='post' action='../../Controlador/EventoController.php?accion=modificar&id=".$id."'>";
	$cata.="<table>";
	$cata.="<tr>";
	$cata.="<td>Nombre:</td>";
	$cata.="<td><input type='text' id='letras' name='nombre' class='cajasdetexto' onkeypress='return caracteres(event)' maxlenght='9' value='".$nom."' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Tipo:</td>";
	$cata.="<td>$select</td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Municipio:</td>";
	$cata.="<td>$municipio</td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Parroquia:</td>";
	$cata.="<td>$parroquia</td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Fecha de Inicio:</td>";
	$cata.="<td><input type='date' name='fecha_inicio' class='date' maxlenght='9'  id='fecha1' onblur='valFechas()' value='".$fei."' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Fecha de Cierre:</td>";
	$cata.="<td><input type='date' name='fecha_cierre' class='date' maxlenght='9' id='fecha2' onblur='valFechas()' value='".$fec."' required></td>";
	$cata.="</tr>";
	$cata.="<tr>";
	$cata.="<td>Descripción:</td>";
	$cata.="<td><textarea rows='5' cols='20' name='descripcion' id='descripcion' class='cajasdetexto' value='' required>".$des."</textarea></td>";
	$cata.="</tr>";
	$cata.='<tr>';
	$cata.='<td>Cantidad de Participantes:</td>';
	$cata.='<td><input id="" type="text" class="cajasdetexto" name="canti" size="3" value="'.$can.'" onkeypress="return solonumeros(event)" onpaste="return false" required></td>';
	$cata.='</tr>';
	$cata.='<tr>';
	$cata.='<td>N de Participantes por Equipo:</td>';
	$cata.='<td><input id="" type="text" class="cajasdetexto" name="parti" size="3" value="'.$par.'" onkeypress="return solonumeros(event)" onpaste="return false" required></td>';
	$cata.='</tr>';
	
	$cata.="</table>";
	$cata.="<br><input type='submit' value='Modificar' id='submit' name='BtModificar'>";
	unset($form);
	$form="";
}


else
{
	$cata.= "Aún no se han registrado eventos.";
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
