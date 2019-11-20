<?php
session_start();
if(empty($_SESSION['nombre']))
{
	header('Location: ../Persona/InicioSesion.php');
}

if($_GET['accion']=="actualizar")
{
	header("Location: ../../Controlador/LogroController.php?accion=buscatodos");
}



$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()"></td>';
$form.='<td> <a href="../../Controlador/LogroController.php?accion=buscacosas"><input type="button" class="botonmodal" value="+ Logro" title="Agregar un logro"> </a></td>';
$form.='<td> <a href="../atleta/consultaatleta.php?accion=actualizar"><input type="button" class="botonmodal" value="Volver" title="Volver a consulta atleta"> </a></td>';
$form.='<td> <a href="generarreporte.php?accion=activos"><input type="button" class="botonmodal" value="Generar Reporte" name="activos" title="Generar Reporte"> </a></td>';
$form.='</tr>';
$form.='</table>';

if($_GET['accion']=="actual")
{
	$encabezado = $_SESSION['encabezado'];
	$reporte='';
	$cata.="<table class=tabla-cat id=tabla>";
	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla>";

	$cata.="<tr><th>Documento de Identidad</th><th>Nombres</th><th>Apellidos</th><th>Fecha de Nacimiento</th><th>Tipo Sanguíneo</th><th>Mano Hábil</th><th>Sexo</th><th>Peso</th><th>Altura</th><th>Talla</th><th>Calzado</th><th>Número de Teléfono</th></tr>";
	$reporte.="<tr><th>Documento de Identidad</th><th>Nombres</th><th>Apellidos</th><th>Fecha de Nacimiento</th><th>Tipo Sanguíneo</th><th>Mano Hábil</th><th>Sexo</th><th>Peso</th><th>Altura</th><th>Talla</th><th>Calzado</th><th>Número de Teléfono</th></tr>";

	foreach($encabezado as $enc)
	{
		$cata.="<tr>";	
		$cata.="<td>".$enc['cedula']."</td>";	
		$cata.="<td>".$enc['nombre']."</td>";	
		$cata.="<td>".$enc['apellido']."</td>";	
		$cata.="<td>".$enc['f_nac']."</td>";	
		$cata.="<td>".$enc['tipos']."</td>";	
		$cata.="<td>".$enc['mano']."</td>";	
		$cata.="<td>".$enc['sexo']."</td>";	
		$cata.="<td>".$enc['peso']."</td>";
		$cata.="<td>".$enc['altura']."</td>";	
		$cata.="<td>".$enc['talla']."</td>";	
		$cata.="<td>".$enc['calzado']."</td>";	
		$cata.="<td>".$enc['n_tel']."</td>";	
		$cata.="</tr>";	

		$reporte.="<tr>";	
		$reporte.="<td>".$enc['cedula']."</td>";	
		$reporte.="<td>".$enc['nombre']."</td>";	
		$reporte.="<td>".$enc['apellido']."</td>";	
		$reporte.="<td>".$enc['f_nac']."</td>";	
		$reporte.="<td>".$enc['tipos']."</td>";	
		$reporte.="<td>".$enc['mano']."</td>";	
		$reporte.="<td>".$enc['sexo']."</td>";	
		$reporte.="<td>".$enc['peso']."</td>";
		$reporte.="<td>".$enc['altura']."</td>";	
		$reporte.="<td>".$enc['talla']."</td>";	
		$reporte.="<td>".$enc['calzado']."</td>";	
		$reporte.="<td>".$enc['n_tel']."</td>";	
		$reporte.="</tr>";	
	}
	$cata.="</table><br>";
	$reporte.="</table>";
	$reporte.="</table>";



	$catalogo = $_SESSION['catalogro'];
	$reporte.="<br><table class=tabla-catdeta id=tabla align=center>";
	$reporte.="<table class=tabla-catdetalle id=tabla align=center>";
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Tipo de Logro</th><th>Pais</th><th>Estado</th><th>Ciudad</th><th>Disciplina</th><th>Resultado</th><th>Descripción</th><th>Observación</th><th colspan='3'>Acción</th></tr>";
	$reporte.="<tr><th>Tipo de Logro</th><th>Pais</th><th>Estado</th><th>Ciudad</th><th>Disciplina</th><th>Resultado</th><th>Descripción</th><th>Observación</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['tipo']."</td>";	
		$cata.="<td>".$cat['pais']."</td>";	
		$cata.="<td>".$cat['estado']."</td>";
		$cata.="<td>".$cat['ciudad']."</td>";
		$cata.="<td>".$cat['disciplina']."</td>";
		$cata.="<td>".$cat['resultado']."</td>";
		$cata.="<td>".$cat['descripcion']."</td>";
		$cata.="<td>".$cat['observacion']."</td>";
		

		if ($cat['modi']==1) {
			$cata.="<td><a href='../../Controlador/LogroController.php?accion=selec&id=".$cat['id']."'>";	
			$cata.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Editar'></a></td>";
		}
		else {
			$cata.="<td>&nbsp</td>";
		}

		if ($cat['modi']==1) {
			$cata.="<td><a href='../../Controlador/LogroController.php?accion=eliminar&id=".$cat['id']."'>";	
			$cata.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Inhabilitar'></a></td>";	
		}
		else {
			$cata.="<td><a href='../../Controlador/LogroController.php?accion=eliminartodo&id=".$cat['id']."&id_evento=".$cat['id_evento']."&id_atleta=".$cat['id_atleta']."'>";	
			$cata.="<img src='../imagenes1/eliminar.png' width='15px' height='15px' title='Inhabilitar'></a></td>";	
		}

		$reporte.="<tr>";	
		$reporte.="<td>".$cat['tipo']."</td>";	
		$reporte.="<td>".$cat['pais']."</td>";	
		$reporte.="<td>".$cat['estado']."</td>";
		$reporte.="<td>".$cat['ciudad']."</td>";
		$reporte.="<td>".$cat['disciplina']."</td>";
		$reporte.="<td>".$cat['resultado']."</td>";
		$reporte.="<td>".$cat['descripcion']."</td>";
		$reporte.="<td>".$cat['observacion']."</td>";
		
		
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
	$reporte.="</table>";

	$reporte.="</table>";
	$_SESSION['reporte']=$reporte;

}
if (empty($_SESSION['catalogro'])) {
	$cata.="No hay logros registrados";
}


$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Logros',
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
