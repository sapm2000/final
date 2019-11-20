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
$form.='<td> <a href="generarreportefichaespecial.php?accion=filtroga"><input type="button" class="botonmodal" value="Generar Reporte" name="filtroga" title="Generar Reporte"> </a></td>';
$reporte='';

$form.='</tr>';
$form.='</table>';
for ($i=0;$i<$_SESSION['contador'];$i++) {


	

if($_GET['accion']=="actual")
{
	$catalogo = $_SESSION['datospersonales'.$i];
	$cata.="<form name='catalog' action='../../Controlador/AtletaController.php?accion=registrar' method='post'>";
	
	if (empty($_SESSION['datospersonales'.$i])) {

	}

	else {

	$cata.="<h2>Atleta #".$i."</h2>";
	$cata.="<table class=tabla-catficha id=tabla width=65%>";

	$reporte.="<center><h2>Atleta #".$i."</h2></center>";
	$reporte.="<table class=tabla-catfichar id=tabla align=center>";
		$reporte.="<table class=tabla-catb id=tabla align=center>";


	$cata.="<th colspan=4>Datos Personales</th>";
	$reporte.="<tr><th colspan=4>Datos Personales</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<th width=25.30%>Nacionalidad</th>";
		$cata.="<td width=25.30%>".$cat['nac']."</td>";
	
		$cata.="<th width=25.30%>Documento de Identidad</th>";
		$cata.="<td width=25.30%>".$cat['cedula']."</td>";	
		$cata.="</tr>";	
		$cata.="<tr>";	
		$cata.="<th>Nombres</th>";
		$cata.="<td>".$cat['nombre']."</td>";	
		
		$cata.="<th>Apellidos</th>";
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="</tr>";	
		$cata.="<tr>";
		$cata.="<th>Fecha de Nacimiento</th>";
		$cata.="<td>".$cat['f_nac']."</td>";
	
		$cata.="<th>Tipo Sanguíneo</th>";
		$cata.="<td>".$cat['tipos']."</td>";
		$cata.="</tr>";	
		$cata.="<tr>";	
		$cata.="<th>Estado Cívil</th>";
		$cata.="<td>".$cat['estadoc']."</td>";	
		
		$cata.="<th>Sexo</th>";
		$cata.="<td>".$cat['sexo']."</td>";	
		$cata.="</tr>";	
		$cata.="<tr>";
		$cata.="<th>Nivel Académico</th>";
		$cata.="<td>".$cat['nivel']."</td>";	
		$cata.="<th>Becado</th>";
		if (empty($_SESSION['beca'.$i])) {
			$cata.="<td>No</td>";	
		}
		else {
			$cata.="<td>Si</td>";	
		}

			


		$reporte.="<tr>";	
		$reporte.="<th>Nacionalidad</th>";
		$reporte.="<td>".$cat['nac']."</td>";
	
		$reporte.="<th>Documento de Identidad</th>";
		$reporte.="<td>".$cat['cedula']."</td>";	
		$reporte.="</tr>";	
		$reporte.="<tr>";	
		$reporte.="<th>Nombre</th>";
		$reporte.="<td>".$cat['nombre']."</td>";	
		
		$reporte.="<th>Apellido</th>";
		$reporte.="<td>".$cat['apellido']."</td>";	
		$reporte.="</tr>";	
		$reporte.="<tr>";
		$reporte.="<th>Fecha de Nacimiento</th>";
		$reporte.="<td>".$cat['f_nac']."</td>";
	
		$reporte.="<th>Tipo Sanguíneo</th>";
		$reporte.="<td>".$cat['tipos']."</td>";
		$reporte.="</tr>";	
		$reporte.="<tr>";	
		$reporte.="<th>Estado Cívil</th>";
		$reporte.="<td>".$cat['estadoc']."</td>";	
		
		$reporte.="<th>Sexo</th>";
		$reporte.="<td>".$cat['sexo']."</td>";	
		$reporte.="</tr>";	
		$reporte.="<tr>";
		$reporte.="<th>Nivel Académico</th>";
		$reporte.="<td>".$cat['nivel']."</td>";	
		$reporte.="<th>Becado</th>";
		if (empty($_SESSION['beca'.$i])) {
			$reporte.="<td>No</td>";	
		}
		else {
			$reporte.="<td>Si</td>";	
		}
		$reporte.="</tr>";	


			
	}
	$cata.="</table>";

}

	
	if (empty($_SESSION['indumentaria'.$i])) {

	}

	else {

	

	$catalogo = $_SESSION['indumentaria'.$i];

	$cata.="<table class=tabla-cat id=tabla width=65%>";


	$cata.="<th colspan=4 >Datos de Indumentaria</th>";
	$reporte.="<tr><th colspan=4 >Datos de Indumentaria</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<th width=13.60%>Peso</th>";
		$cata.="<td width=16.90%>".$cat['peso']."KG.</td>";

		$cata.="<th width=13.60%>Altura</th>";
		$cata.="<td width=10.60%>".$cat['altura']."cm.</td>";	

		$cata.="</tr>";	
		$cata.="<tr>";
		$cata.="<th>Calzado</th>";
		$cata.="<td>".$cat['calzado']."</td>";	

		$cata.="<th>Talla</th>";
		$cata.="<td width=29.9%>".$cat['talla']."</td>";

		$cata.="</tr>";	
		$cata.="<tr>";	
		$cata.="<th>Mano Hábil</th>";
		$cata.="<td>".$cat['mano']."</td>";	


		$reporte.="<tr>";	
		$reporte.="<th>Peso</th>";
		$reporte.="<td width=16.90%>".$cat['peso']."KG.</td>";

		$reporte.="<th>Altura</th>";
		$reporte.="<td>".$cat['altura']."cm.</td>";	

		$reporte.="</tr>";	
		$reporte.="<tr>";
		$reporte.="<th>Calzado</th>";
		$reporte.="<td>".$cat['calzado']."</td>";	

		$reporte.="<th>Talla</th>";
		$reporte.="<td width=29.9%>".$cat['talla']."</td>";

		$reporte.="</tr>";	
		$reporte.="<tr>";	
		$reporte.="<th>Mano Hábil</th>";
		$reporte.="<td>".$cat['mano']."</td>";
		$reporte.="</tr>";	

	}
	$cata.="</table>";

}

if (empty($_SESSION['contacto'.$i])) {

}

else {


	$catalogo = $_SESSION['contacto'.$i];
	$cata.="<table class=tabla-catficha id=tabla width=65%>";
	$cata.="<th colspan=4>Datos de Contacto</th>";
	$reporte.="<tr><th colspan=4>Datos de Contacto</th></tr>";

	foreach($catalogo as $cat)
	{

		$cata.="<tr>";			
		$cata.="<th width=25.15%>Número de Telefóno</th>";
		$cata.="<td width=25.15%>".$cat['n_tel']."</td>";
	
		$cata.="<th width=25.15%>Número de Emergencia</th>";
		$cata.="<td width=25.15%>".$cat['n_eme']."</td>";
		$cata.="</tr>";
		$cata.="<tr>";	
		$cata.="<th>Parroquia</th>";
		$cata.="<td>".$cat['descrip']."</td>";
	
		$cata.="<th>Municipio</th>";
		$cata.="<td>".$cat['descrips']."</td>";
		$cata.="</tr>";
		$cata.="<tr>";		

		$cata.="<th>Dirección</th>";
		$cata.="<td colspan=3>".$cat['direccion']."</td>";

		$cata.="</tr>";
		$cata.="<tr>";

		$cata.="<th>Correo Eléctronico</th>";
		$cata.="<td  colspan=3>".$cat['correo']."</td>";

	



		$reporte.="<tr>";			
		$reporte.="<th>Número de Telefóno</th>";
		$reporte.="<td>".$cat['n_tel']."</td>";
	
		$reporte.="<th>Número de Emergencia</th>";
		$reporte.="<td>".$cat['n_eme']."</td>";
		$reporte.="</tr>";
		$reporte.="<tr>";	
		$reporte.="<th>Parroquia</th>";
		$reporte.="<td>".$cat['descrip']."</td>";
	
		$reporte.="<th>Municipio</th>";
		$reporte.="<td>".$cat['descrips']."</td>";
		$reporte.="</tr>";
		$reporte.="<tr>";		

		$reporte.="<th>Dirección</th>";
		$reporte.="<td colspan=3>".$cat['direccion']."</td>";

		$reporte.="</tr>";
		$reporte.="<tr>";

		$reporte.="<th>Correo Eléctronico</th>";
		$reporte.="<td  colspan=3>".$cat['correo']."</td>";


		
	}
	$cata.="</table>";
}
if (empty($_SESSION['bancario'.$i])) {

}

else {

	$catalogo = $_SESSION['bancario'.$i];
	$cata.="<table class=tabla-catficha id=tabla width=65%>";
	$cata.="<th colspan=4>Datos Bancarios</th>";
	$reporte.="<tr><th colspan=4>Datos Bancarios</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<th>Nacionalidad</th>";
		$cata.="<td>".$cat['nac']."</td>";	

		$cata.="<th>Documento de Identidad</th>";
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="</tr>";
		$cata.="<tr>";	
		$cata.="<th>Nombre</th>";
		$cata.="<td>".$cat['nombre']."</td>";	
	
		$cata.="<th>Apellido</th>";
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="</tr>";
		$cata.="<tr>";	
		$cata.="<th>Banco</th>";
		$cata.="<td>".$cat['banco']."</td>";	
	
		$cata.="<th>Número de Cuenta</th>";
		$cata.="<td>".$cat['numeroc']."</td>";	
		$cata.="<tr>";	
		$cata.="<th>Tipo de Cuenta</th>";
		$cata.="<td>".$cat['tipo']."</td>";	


		$reporte.="<tr>";	
		$reporte.="<th>Nacionalidad</th>";
		$reporte.="<td>".$cat['nac']."</td>";	

		$reporte.="<th>Documento de Identidad</th>";
		$reporte.="<td>".$cat['cedula']."</td>";	
		$reporte.="</tr>";
		$reporte.="<tr>";	
		$reporte.="<th>Nombre</th>";
		$reporte.="<td>".$cat['nombre']."</td>";	
	
		$reporte.="<th>Apellido</th>";
		$reporte.="<td>".$cat['apellido']."</td>";	
		$reporte.="</tr>";
		$reporte.="<tr>";	
		$reporte.="<th>Banco</th>";
		$reporte.="<td>".$cat['banco']."</td>";	
	
		$reporte.="<th>Número de Cuenta</th>";
		$reporte.="<td>".$cat['numeroc']."</td>";	
		$reporte.="<tr>";	
		$reporte.="<th>Tipo de Cuenta</th>";
		$reporte.="<td>".$cat['tipo']."</td>";	
		$reporte.="</tr>";	


		
	}
	$cata.="</table>";
}
if (empty($_SESSION['representante'.$i])) {

}

else {

	$catalogo = $_SESSION['representante'.$i];
	$cata.="<table class=tabla-catficha id=tabla width=65%>";
	$cata.="<th colspan=4>Datos del Representante</th>";
	$reporte.="<tr><th colspan=4>Datos del Representante</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<th>Documento de Identidad</th>";
		$cata.="<td>".$cat['cedula']."</td>";
		
		$cata.="<th>Número de Telefóno</th>";
		$cata.="<td>".$cat['n_tel']."</td>";	

		$cata.="</tr>";
		$cata.="<tr>";	
		$cata.="<th>Nombre</th>";
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<th>Parentesco</th>";
		$cata.="<td>".$cat['parentezco']."</td>";

		$cata.="</tr>";
		$cata.="<tr>";	

		$cata.="<th>Apellido</th>";
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="</tr>";
		$cata.="<tr>";	
		$cata.="<th>Correo Eléctronico</th>";
		$cata.="<td colspan=3>".$cat['correo']."</td>";



		$reporte.="<tr>";	
		$reporte.="<th>Documento de Identidad</th>";
		$reporte.="<td>".$cat['cedula']."</td>";
		
		$reporte.="<th>Número de Telefóno</th>";
		$reporte.="<td>".$cat['n_tel']."</td>";	

		$reporte.="</tr>";
		$reporte.="<tr>";	
		$reporte.="<th>Nombre</th>";
		$reporte.="<td>".$cat['nombre']."</td>";	
		$reporte.="<th>Parentesco</th>";
		$reporte.="<td>".$cat['parentezco']."</td>";	
	

		$reporte.="</tr>";
		$reporte.="<tr>";	


		$reporte.="<th>Apellido</th>";
		$reporte.="<td>".$cat['apellido']."</td>";		

		$reporte.="</tr>";
		$reporte.="<tr>";	
		$reporte.="<th>Correo Eléctronico</th>";
		$reporte.="<td colspan=3>".$cat['correo']."</td>";
		
		
	}
	$cata.="</table>";
}

if (empty($_SESSION['laboral'.$i])) {

}

else {

	$catalogo = $_SESSION['laboral'.$i];
	$cata.="<table class=tabla-catficha id=tabla width=65%>";
	$cata.="<th colspan=4>Datos Laborales</th>";
	$reporte.="<tr><th colspan=4>Datos Laborales</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";
		$cata.="<th>Nombre de la Empresa</th>";
		$cata.="<td colspan=3>".$cat['empresa']."</td>";	

	

		$cata.="</tr>";
		$cata.="<tr>";
		$cata.="<th>Correo Eléctonico</th>";
		$cata.="<td colspan=3>".$cat['correol']."</td>";
		$cata.="</tr>";
		$cata.="<tr>";
		$cata.="<th>Dirección</th>";
		$cata.="<td colspan=3>".$cat['direccion1']."</td>";


		$cata.="</tr>";
		$cata.="<tr>";
				
		$cata.="<th>Municipio</th>";
		$cata.="<td>".$cat['descrips']."</td>";
		$cata.="<th>Parroquia</th>";
		$cata.="<td>".$cat['descrip']."</td>";	



		$reporte.="<tr>";
		$reporte.="<th>Nombre de la Empresa</th>";
		$reporte.="<td colspan=3>".$cat['empresa']."</td>";	

	

		$reporte.="</tr>";
		$reporte.="<tr>";
		$reporte.="<th>Correo Eléctonico</th>";
		$reporte.="<td colspan=3>".$cat['correol']."</td>";
		$reporte.="</tr>";
		$reporte.="<tr>";
		$reporte.="<th>Dirección</th>";
		$reporte.="<td colspan=3>".$cat['direccion1']."</td>";


		$reporte.="</tr>";
		$reporte.="<tr>";
				
		$reporte.="<th>Municipio</th>";
		$reporte.="<td>".$cat['descrips']."</td>";
		$reporte.="<th>Parroquia</th>";
		$reporte.="<td>".$cat['descrip']."</td>";	
	
		
	}
	$cata.="</table>";
}

if (empty($_SESSION['datosdisciplina'.$i])) {

}

else {

	$catalogo = $_SESSION['datosdisciplina'.$i];
	$cata.="<table class=tabla-catficha id=tabla width=65%>";
	$cata.="<th colspan=3>Disciplina</th>";
	$cata.="<tr><th>Disciplina</th><th>Modalidad</th><th>Estatus</th></tr>";

	$reporte.="<tr><th colspan=4>Disciplina</th></tr>";
	$reporte.="<tr><th colspan=2>Disciplina</th><th colspan=1>Modalidad</th><th colspan=1>Estatus</th></tr>";

	foreach($catalogo as $cat)
	{

		$cata.="<tr>";	

		$cata.="<td>".$cat['disciplina']."</td>";	
		$cata.="<td>".$cat['modalidad']."</td>";		
		$cata.="<td>".$cat['estatu']."</td>";



		$reporte.="<tr>";	

		$reporte.="<td colspan=2>".$cat['disciplina']."</td>";
	
		$reporte.="<td colspan=1>".$cat['modalidad']."</td>";	
	
		$reporte.="<td colspan=1>".$cat['estatu']."</td>";	
		$reporte.="</tr>";	




		
	}
	$cata.="</table>";
}
if (empty($_SESSION['medicos'.$i])) {

}

else {



	$catalogo = $_SESSION['medicos'.$i];
	$cata.="<table class=tabla-catficha id=tabla width=65%>";
	$cata.="<th colspan=2>Registro Médico</th>";
	$cata.="<tr><th>Registro Médico</th><th>Fecha del Registro Médico</th></tr>";

	$reporte.="<tr><th colspan=4>Registro Médico</th></tr>";
	$reporte.="<tr><th colspan=2>Registro Médico</th><th colspan=2>Fecha del Registro Médico</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['registro_medico']."</td>";	
		$cata.="<td>".$cat['fecha_medica']."</td>";	
	

		$reporte.="<tr>";	

		$reporte.="<td colspan=2>".$cat['registro_medico']."</td>";	
		$reporte.="<td colspan=2>".$cat['fecha_medica']."</td>";	
		$reporte.="</tr>";	



		
	}
	$cata.="</table>";
}

if (empty($_SESSION['discapacidad'.$i])) {

}

else {

	$catalogo = $_SESSION['discapacidad'.$i];
	$cata.="<table class=tabla-catficha id=tabla width=65%>";
	$cata.="<th colspan=1>Discapacidad</th>";
	$cata.="<tr><th>Nombre de la Discapacidad</th></tr>";

	$reporte.="<tr><th colspan=4>Discapacidad</th></tr>";
	$reporte.="<tr><th  colspan=4>Nombre de la Discapacidad</th></tr>";

	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td >".$cat['discapacidad']."</td>";	
	

		$reporte.="<tr>";

		$reporte.="<td colspan=4>".$cat['discapacidad']."</td>";	
	
		$reporte.="</tr>";	

	

		
	}
	$cata.="</table>";


	$reporte.="</table>";
}

$reporte.="</table>";
	$reporte.="</table>";

	$reporte.="<table class=tabla-catsalto></table>";

}

	
}
$_SESSION['reporte']=$reporte;





$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Atletas',
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
