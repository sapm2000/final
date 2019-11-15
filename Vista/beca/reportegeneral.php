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

$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" id="letra" name="Beca" maxlenght="9" pattern="[a-z A-Z 0-9 ñÑ\s]{2,25}" title="máximo de 25 caracteres" ></td>';
$form.='</tr>';
$form.='</table>';
$form.='<table>';
$form.='<tr>';
$form.='<td> <a href="generarreporteespecial.php?accion=detalle"><input type="button" class="botonmodal" value="Generar Reporte" name="activos" title="Generar Reporte"> </a></td>';
$form.='</tr>';
$form.='</table>';






if($_GET['accion']=="actual" && !empty($_SESSION['catabecageneral']))
{
	$catalogo = $_SESSION['catabecageneral'];
	$reporte='';
	$cata.="<table class=tabla-cat id=tabla>";
	$reporte.="<br><table class=tabla-cat id=tabla align=center>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	$cata.="<tr><th>Nombre</th><th>Fecha</th><th>Monto Pagado</th><th>Becados</th><th>Acción</th></tr>";
	$reporte.="<tr><th>Nombre</th><th>Fecha</th><th>Monto Pagado</th><th>Becados</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['fecha']."</td>";	
		$cata.="<td>".$cat['montoT']."</td>";	
		$cata.="<td>".$cat['becados']."</td>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$cat['nombre']."</td>";	
		$reporte.="<td>".$cat['fecha']."</td>";	
		$reporte.="<td>".$cat['montoT']."</td>";	
		$reporte.="<td>".$cat['becados']."</td>";	
		
		$cata.="<td><a href='../../Controlador/BecaController.php?accion=seleccionar&fecha=".$cat['fecha']."&nombre=".$cat['nombre']."'>";	
		$cata.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Editar'></a></td>";
		
		
		$cata.="</tr>";	
	}
	$cata.="</table><br>";

	
	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<center><h2>Monto Total</h2></center>";
	$reporte.="<br><table class=tabla-cat id=tabla align=center>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";


	$cata.="<tr><th>Desde</th><th>Hasta</th><th>Monto Pagado</th></tr>";
	$reporte.="<tr><th>Desde</th><th>Hasta</th><th>Monto Pagado</th></tr>";
	$cata.="<tr>";	
	$cata.="<td>".$_SESSION['desde']."</td>";	
	$cata.="<td>".$_SESSION['hasta']."</td>";	
	$cata.="<td>".$_SESSION['montogeneral']."</td>";	

	$reporte.="<tr>";	
	$reporte.="<td>".$_SESSION['desde']."</td>";	
	$reporte.="<td>".$_SESSION['hasta']."</td>";	
	$reporte.="<td>".$_SESSION['montogeneral']."</td>";	


	$cata.="</table><br>";

	
	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$_SESSION['reportebeca']=$reporte;
	$cata.="</form>";

}

else
{
	$cata.='<br>';
	$cata.= "Aún no se han registrado becas.";
	$cata.='<br>';
	$cata.='<br>';
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Becas',
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
