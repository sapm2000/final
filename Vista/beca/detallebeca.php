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
$form.='<td> <a href="generarreporte.php?accion=detalle"><input type="button" class="botonmodal" value="Generar Reporte" name="activos" title="Generar Reporte"> </a></td>';
$form.='</tr>';
$form.='</table>';






if($_GET['accion']=="actual")
{
	$reporte='';


	$encabezado = $_SESSION['encabezado'];
	$cata.="<table class=tabla-cat id=tabla>";
	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla>";


	$cata.="<tr><th>Fecha</th><th>Monto Total</th><th>Becados</th><th>Nombre de la Beca</th></tr>";
	$reporte.="<tr><th>Fecha</th><th>Monto Total</th><th>Becados</th><th>Nombre de la Beca</th></tr>";

	foreach($encabezado as $enc)
	{
		$cata.="<tr>";	
		$cata.="<td>".$enc['fecha']."</td>";	
		$cata.="<td>".$enc['montoT']."</td>";	
		$cata.="<td>".$enc['becados']."</td>";	
		$cata.="<td>".$enc['nombre']."</td>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$enc['fecha']."</td>";	
		$reporte.="<td>".$enc['montoT']."</td>";	
		$reporte.="<td>".$enc['becados']."</td>";	
		$reporte.="<td>".$enc['nombre']."</td>";
		
	}
	$cata.="</table><br>";
	$reporte.="</table>";
	$reporte.="</table>";



	$catalogo = $_SESSION['detallebeca'];
	$cata.="<table class=tabla-cat id=tabla>";

	$reporte.="<br><table class=tabla-catdetalle id=tabla align=center>";
	$reporte.="<table class=tabla-catdeta id=tabla>";

	$cata.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Monto</th></tr>";
	$reporte.="<h1>Becados.</h1>";
	$reporte.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Monto</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td> <input type='text' readonly id='b".$cat['id']."' name='pago".$cat['id']."'  value=".$cat['monto']."></td>";
		
		$reporte.="<tr>";	
		$reporte.="<td>".$cat['cedula']."</td>";	
		$reporte.="<td>".$cat['nombre']."</td>";	
		$reporte.="<td>".$cat['apellido']."</td>";	
		$reporte.="<td> <input type='text' readonly id='b".$cat['id']."' name='pago".$cat['id']."'  value=".$cat['monto']."></td>";	
		
		



		
		$cata.="</tr>";	
	}
	$cata.='<br>';

	$cata.="</table><br>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";
	$cata.="</form>";

	$_SESSION['reportebecadetalle']=$reporte;

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