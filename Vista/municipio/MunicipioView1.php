<?php
	session_start();
	if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
	if($_GET['accion']=='actualizar')
	{
		header('Location: ../../Controlador/CtrlMunicipio.php?accion=buscatodos1');
	}

	if(empty($_REQUEST['accion']))
	{
		header("Location: ../menuv/menuv.php?accion=validado");
	}

	$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
	if($_GET['accion']=='actual')
	$cat='';
	{
		$form = "<form name='formstd' method='POST' action='../../Controlador/CtrlMunicipio.php?accion=registrar'>";
		$form.= "<table>";
		$form.= "<tr>";
		$form.= "<td>Municipio:</td>";
		$form.= "<td><input id='searchTerm' type='text' class='cajasdetexto' onkeyup='doSearch()' id='letra' onkeypress='return soloLetras(event)' onpaste='return false' name='municipio' maxlength='50' required></td>";
		$form.= "</tr>";
		$form.= "</table>";
		$form.= "<br>";
		$form.= "<input type='submit' value='Registrar' name='BtRegistrar' id='submit'>";
		$form.= "</form>";
		$cat.= "<table class='tabla-cat' id='tabla'>";
		$cat.= "<thead>";
		$cat.= "<tr>";
		$cat.= "<th>Municipios</th>";
		$cat.= "<th colspan='2'>Acción</th>";
		$cat.= "</tr>";
		$cat.= "</thead>";
		$cat.= "<tbody>";
		$datos = $_SESSION['catamuni1'];
		foreach($datos as $d)
		{
	
			$cat.= "<tr>";
			$cat.= "<td>".$d['descrips']."</td>";
			$cat.="<td><a href='../../Controlador/CtrlMunicipio.php?accion=reactivar1&id=".$d['id']."'>";	
			$cat.="<img src='../imagenes1/activo1.png' width='15px' height='15px' title='reactivar'></a></td>";	
			$cat.= "</tr>";
		}
		$cat.= "</tbody>";
		$cat.= "</table>";
	
		
			$cat.= "<br>";
		

		$cat.= "<a href='../Parroquia/ParroquiaView.php?accion=actualizar'><input type='button' class='botonmodalmuni' value='Parroquias'></a>";
	}
	if($_GET['accion']=='ver_detalles')
	{
		$datos = $_SESSION['modimuni'];
		foreach($datos as $d)
		{
			$id = $d['id'];
			$desc = $d['descrips'];
		}
		$form ='';
		$cat = "<form name='formmunicipio' method='POST' action='../../Controlador/CtrlMunicipio.php?accion=modificar&id=".$id."'>";
		$cat.= "<table>";
		$cat.= "<tr>";
		$cat.= "<td>Municipio:</td>";
		$cat.= "<td><input type='text' name='municipio' maxlength='50' class='cajasdetexto' id='letra' onkeypress='return soloLetras(event)' onpaste='return false' required value='".$desc."'></td>";
		$cat.= "</tr>";
		$cat.= "</table>";
		$cat.= "<br>";
		$cat.= "<input type='submit' value='Modificar' name='BtModificar' id='submit'>";
		$cat.= "</form>";
	}
	if(empty($_SESSION['catamuni']))
	{
		$cat = "No se han registrado municipios.";
	}
	$diccionario = array
	(
		'PERFIL' => $perfil,
		'TITULO' => 'Municipios',
		'FORMULARIO' => $form,
		'BOTONREG' => '',
		'CATALOGO' => $cat,
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
