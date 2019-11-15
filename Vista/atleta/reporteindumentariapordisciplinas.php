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
$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()"></td>';
$form.='</tr>';
$form.='</table>';
$form.='<table>';
$form.='<tr>';
$form.='<td> <a href="generarreporte.php?accion=filtroga"><input type="button" class="botonmodal" value="Generar Reporte" name="filtroga" title="Generar Reporte"> </a></td>';

$form.='</tr>';
$form.='</table>';
$reporte='';


for ($i=0;$i<=$_SESSION['contador'];$i++ ){
	if (empty($_SESSION['disc'.$i])) {

	}

	else {



	
		$cata.="<h2>".$_SESSION['ertitulo'.$i]." MASCULINO</h2>";
		$reporte.="<center><h2>".$_SESSION['ertitulo'.$i]." MASCULINO</h2></center>";
		

		$reporte.="<br><table class=tabla-cat id=tabla>";
		$reporte.="<table class=tabla-catb id=tabla align=center>";

		$cata.="<table class=tabla-cat id=tabla>";
		$reporte.="<tr><th>Calzado</th><th>Total</th></tr>";
		$cata.="<tr><th>Calzado</th><th>Total</th></tr>";
		for($h=0;$h<=$_SESSION['contadorcalzado'];$h++) {
			if ($_SESSION['calza'.$i.$h]!=0) {
				$cata.="<tr>";	

				$cata.="<td>".$_SESSION['idcalza'.$i.$h]."</td>";	
				$cata.="<td>".$_SESSION['calza'.$i.$h]."</td>";	

				$reporte.="<tr>";	

				$reporte.="<td>".$_SESSION['idcalza'.$i.$h]."</td>";	
				$reporte.="<td>".$_SESSION['calza'.$i.$h]."</td>";	
			}
			
		}
		$cata.="</table><br>";

		$reporte.="</table>";

		$reporte.="</table>";
		
		$reporte.="</table><br>";



		$reporte.="<br><table class=tabla-cat id=tabla>";
		$reporte.="<table class=tabla-catb id=tabla align=center>";

		$cata.="<table class=tabla-cat id=tabla>";
		$reporte.="<tr><th>Tallas</th><th>Total</th></tr>";
		$cata.="<tr><th>Tallas</th><th>Total</th></tr>";
		for($h=0;$h<=$_SESSION['contadortalla'];$h++) {
			if ($_SESSION['tall'.$i.$h]!=0) {
				$cata.="<tr>";	

				$cata.="<td>".$_SESSION['idtal'.$i.$h]."</td>";	
				$cata.="<td>".$_SESSION['tall'.$i.$h]."</td>";	

				$reporte.="<tr>";	

				$reporte.="<td>".$_SESSION['idtal'.$i.$h]."</td>";	
				$reporte.="<td>".$_SESSION['tall'.$i.$h]."</td>";	
			}
			
		}
		$cata.="</table><br>";
	

		$reporte.="</table>";

		$reporte.="</table>";
		
		$reporte.="</table><br>";

		

	$catalogo = $_SESSION['disc'.$i];
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";

	$cata.="<table class=tabla-cat id=tabla>";


	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Tallas</th><th>Peso</th><th>Altura</th><th>Calzado</th><th>Mano Hábil</th></tr>";

	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Tallas</th><th>Peso</th><th>Altura</th><th>Calzado</th><th>Mano Hábil</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		
		$cata.="<td>".$cat['nac']."</td>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['talla']."</td>";	
		$cata.="<td>".$cat['peso']."</td>";	
		$cata.="<td>".$cat['altura']."</td>";	
		$cata.="<td>".$cat['calzado']."</td>";	
		$cata.="<td>".$cat['mano']."</td>";	

		


		$reporte.="<tr>";	
		
		$reporte.="<td>".$cat['nac']."</td>";	
		$reporte.="<td>".$cat['cedula']."</td>";	
		$reporte.="<td>".$cat['nombre']."</td>";	
		$reporte.="<td>".$cat['apellido']."</td>";	
		$reporte.="<td>".$cat['talla']."</td>";	
		$reporte.="<td>".$cat['peso']."</td>";	
		$reporte.="<td>".$cat['altura']."</td>";	
		$reporte.="<td>".$cat['calzado']."</td>";	
		$reporte.="<td>".$cat['mano']."</td>";	


	}
	$cata.="</table><br>";


	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";

	$reporte.="<table class=tabla-catsalto></table>";
	
}

	if (empty($_SESSION['discF'.$i])) {

	}

	else {

		$cata.="<h2>".$_SESSION['ertitulo'.$i]." FEMENINO</h2>";
		$reporte.="<center><h2>".$_SESSION['ertitulo'.$i]." FEMENINO</h2></center>";
		

		$reporte.="<br><table class=tabla-cat id=tabla>";
		$reporte.="<table class=tabla-catb id=tabla align=center>";

		$cata.="<table class=tabla-cat id=tabla>";
		$reporte.="<tr><th>Calzado</th><th>Total</th></tr>";
		$cata.="<tr><th>Calzado</th><th>Total</th></tr>";
		for($h=0;$h<=$_SESSION['contadorcalzado'];$h++) {
			if ($_SESSION['calzaF'.$i.$h]!=0) {
				$cata.="<tr>";	

				$cata.="<td>".$_SESSION['idcalzaF'.$i.$h]."</td>";	
				$cata.="<td>".$_SESSION['calzaF'.$i.$h]."</td>";	

				$reporte.="<tr>";	

				$reporte.="<td>".$_SESSION['idcalzaF'.$i.$h]."</td>";	
				$reporte.="<td>".$_SESSION['calzaF'.$i.$h]."</td>";	
			}
			
		}
		$cata.="</table><br>";

		$reporte.="</table>";

		$reporte.="</table>";
		
		$reporte.="</table><br>";



		$reporte.="<br><table class=tabla-cat id=tabla>";
		$reporte.="<table class=tabla-catb id=tabla align=center>";

		$cata.="<table class=tabla-cat id=tabla>";
		$reporte.="<tr><th>Tallas</th><th>Total</th></tr>";
		$cata.="<tr><th>Tallas</th><th>Total</th></tr>";
		for($h=0;$h<=$_SESSION['contadortalla'];$h++) {
			if ($_SESSION['tallF'.$i.$h]!=0) {
				$cata.="<tr>";	

				$cata.="<td>".$_SESSION['idtalF'.$i.$h]."</td>";	
				$cata.="<td>".$_SESSION['tallF'.$i.$h]."</td>";	

				$reporte.="<tr>";	

				$reporte.="<td>".$_SESSION['idtalF'.$i.$h]."</td>";	
				$reporte.="<td>".$_SESSION['tallF'.$i.$h]."</td>";	
			}
			
		}
		$cata.="</table><br>";

	
		$reporte.="</table>";

		$reporte.="</table>";
		
		$reporte.="</table><br>";




	$catalogo = $_SESSION['discF'.$i];
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";

	$cata.="<table class=tabla-cat id=tabla>";


	$reporte.="<br><table class=tabla-cat id=tabla>";
	$reporte.="<table class=tabla-catb id=tabla align=center>";
	
	$cata.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Tallas</th><th>Peso</th><th>Altura</th><th>Calzado</th><th>Mano Hábil</th></tr>";

	$reporte.="<tr><th>Nacionalidad</th><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Tallas</th><th>Peso</th><th>Altura</th><th>Calzado</th><th>Mano Hábil</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		
		$cata.="<td>".$cat['nac']."</td>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td>".$cat['talla']."</td>";	
		$cata.="<td>".$cat['peso']."</td>";	
		$cata.="<td>".$cat['altura']."</td>";	
		$cata.="<td>".$cat['calzado']."</td>";	
		$cata.="<td>".$cat['mano']."</td>";		
		


		$reporte.="<tr>";	
		
		$reporte.="<td>".$cat['nac']."</td>";	
		$reporte.="<td>".$cat['cedula']."</td>";	
		$reporte.="<td>".$cat['nombre']."</td>";	
		$reporte.="<td>".$cat['apellido']."</td>";	
		$reporte.="<td>".$cat['talla']."</td>";	
		$reporte.="<td>".$cat['peso']."</td>";	
		$reporte.="<td>".$cat['altura']."</td>";	
		$reporte.="<td>".$cat['calzado']."</td>";	
		$reporte.="<td>".$cat['mano']."</td>";		


	}
	$cata.="</table><br>";


	$reporte.="</table>";

	$reporte.="</table>";
	
	$reporte.="</table><br>";



	}


	
	





}
$_SESSION['reporte']=$reporte;


if (empty($_SESSION['hombres'])) {
	$cata.="";
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Reporte General de Tallas por Disciplina',
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
