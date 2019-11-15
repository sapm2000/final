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
$form.='<td> <a href="generarreporteespecial.php?accion=global"><input type="button" class="botonmodal" value="Generar Reporte" name="activos" title="Generar Reporte"> </a></td>';
$form.='</tr>';
$form.='</table>';






if($_GET['accion']=="actual" && !empty($_SESSION['catabecaespecifica']))
{
	$catalogo = $_SESSION['catabecaespecifica'];
	$reporte='';
	$cata.="<table class=tabla-cat id=tabla>";
	$reporte.="<br><table class=tabla-cat id=tabla align=center>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th><th>Fecha</th><th>Monto Pagado</th></tr>";
	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Disciplina</th><th>Fecha</th><th>Monto Pagado</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nac']."</td>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['disc']."</td>";	
		$cata.="<td>".$cat['fecha']."</td>";	
		$cata.="<td>".$cat['monto']."</td>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$cat['nac']."</td>";	
		$reporte.="<td>".$cat['cedula']."</td>";
		$reporte.="<td>".$cat['nombre']."</td>";	
		$reporte.="<td>".$cat['apellido']."</td>";	
		$reporte.="<td>".$cat['disc']."</td>";	
		$reporte.="<td>".$cat['fecha']."</td>";	
		$reporte.="<td>".$cat['monto']."</td>";	
		
		
		
		$cata.="</tr>";	
	}
	$cata.="</table><br>";

	
	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<center><h2>Monto Total por Disciplinas</h2></center>";
	$reporte.="<br><table class=tabla-cat id=tabla align=center>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";

	$total = $_SESSION['montogeneral'];

	$cata.="<tr><th>Disciplina</th><th>Monto Pagado</th>";
	$reporte.="<tr><th>Disciplina</th><th>Monto Pagado</th>";
	foreach($total as $tot){
		$cata.="<tr>";	
		$cata.="<td>".$tot['disc']."</td>";	
		$cata.="<td>".$tot['totes']."</td>";	
	

		$reporte.="<tr>";	
		$reporte.="<td>".$tot['disc']."</td>";	
		$reporte.="<td>".$tot['totes']."</td>";	
	
	}




	$cata.="</table><br>";

	
	$reporte.="</table>";
	
	$reporte.="</table><br>";


	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<center><h2>Monto Total por Fechas</h2></center>";
	$reporte.="<br><table class=tabla-cat id=tabla align=center>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";

	$reporte.="<tr><th>Desde</th><th>Hasta</th><th>Monto Pagado</th></tr>";
	$cata.="<tr><th>Desde</th><th>Hasta</th><th>Monto Pagado</th></tr>";
	$cata.="<tr>";	
	$cata.="<td>".$_SESSION['desde']."</td>";	
	$cata.="<td>".$_SESSION['hasta']."</td>";	
	$cata.="<td>".$_SESSION['montoto']."</td>";	


	$reporte.="<tr>";	
	$reporte.="<td>".$_SESSION['desde']."</td>";	
	$reporte.="<td>".$_SESSION['hasta']."</td>";	
	$reporte.="<td>".$_SESSION['montoto']."</td>";	


	$_SESSION['reportebeca']=$reporte;
	$cata.="</form>";

	$cata.="</table><br>";

	
	$reporte.="</table>";
	
	$reporte.="</table><br>";

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
