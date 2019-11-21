<?php
	session_start();
	if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
	if($_GET['accion']=='actualizar')
	{
		header('Location: ../../Controlador/CtrlParroquia.php?accion=buscatodos&pag=1&reg=10');
	}

	if(empty($_REQUEST['accion']))
	{
		header("Location: ../menuv/menuv.php?accion=validado");
	}

	$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
	if($_GET['accion']=='actual')
	{
		$todos = $_SESSION['stds'];
		$select = "<select name='municipio' required>";
		$select.= "<option value=''>Seleccione un municipio</option>";
		foreach($todos as $t)
		{
			$select.= "<option value=".$t['id'].">".$t['descrips']."</option>";	
		}
		$select.= "</select>";
		$form = "<form name='formnp' method='POST' action='../../Controlador/CtrlParroquia.php?accion=registrar'>";
		$form.= "<table>";
		$form.= "<tr>";
		$form.= "<td>Parroquia:</td>";
		$form.= "<td><input type='text' id='searchTerm' class='cajasdetexto' onkeyup='doSearch()'  id='letra' onkeypress='return soloLetras(event)' onpaste='return false' name='parroquia' maxlength='50' required></td>";
		$form.='<td> <a href="ParroquiaView1.php?accion=actualizar"><input type="button" class="botonmodal" value="parroquias Inactivas" title="Atletas Inactivos"> </a></td>';
		$form.= "</tr>";
		$form.= "<tr>";
		$form.= "<td>Municipio:</td>";
		$form.= "<td>".$select."</td>";
		$form.= "</tr>";
		$form.= "</table>";
		$form.= "<br>";
		$form.= "<input type='submit' value='Registrar' name='BtRegistrar' id='submit'>";
		$form.= "</form>";
		$cat = "";
		$cat.= "<table class='tabla-cat' id='tabla'>";
		$cat.= "<thead>";
		$cat.= "<tr>";
		$cat.= "<th>Parroquia</th>";
		$cat.= "<th>Municipio</th>";
		$cat.= "<th colspan='2'>Acción</th>";
		$cat.= "</tr>";
		$cat.= "</thead>";
		$cat.= "<tbody>";
		$datos = $_SESSION['catapara'];
		foreach($datos as $d)
		{
			$cat.= "<tr>";
			$cat.= "<td>".$d['descrip']."</td>";
			$cat.= "<td>".$d['std']."</td>";
			$cat.= "<td><a href='../../Controlador/CtrlParroquia.php?accion=buscaid&id=".$d['id']."'>";
			$cat.= "<img src='../imagenes1/editar.png' width='15px' hegiht='15px' title='Editar'></a></td>";
			$cat.= "<td><a href='../../Controlador/CtrlParroquia.php?accion=eliminar&id=".$d['id']."'>";
			$cat.= "<img src='../imagenes1/eliminar.png' width='15px' hegiht='15px' title='Eliminar'></a></td>";
			$cat.= "</tr>";
		}
		$cat.= "</tbody>";
		$cat.= "</table>";
		$cat.= "";

		$cat.= "<br>";
		$cat.= "<a href='../municipio/MunicipioView.php?accion=actualizar'><input type='button' class='botonmodalmuni' value='Municipios'></a>";
	}
	if($_GET['accion']=='ver_detalles')
	{
		$datos = $_SESSION['modipara'];
		foreach($datos as $d)
		{
			$id = $d['id'];
			$desc = $d['descrip'];
			$idedo = $d['id_municipio'];
//			$municipio = $d['std'];
		}
		$todos = $_SESSION['stds'];
		$select = "<select name='municipio' required>";
		foreach($todos as $t)
		{
			if($idedo==$t['id'])
			{
				$select.= "<option value=".$t['id']." selected>".$t['descrips']."</option>";	
			}
			else
			{
				$select.= "<option value=".$t['id'].">".$t['descrips']."</option>";	
			}
		}
		$select.= "</select>";
		$form ='';
		$boton ='';
		$cat = "<form name='formnp' method='POST' action='../../Controlador/CtrlParroquia.php?accion=modificar&id=".$id."'>";
		$cat.= "<table>";
		$cat.= "<tr>";
		$cat.= "<td>Parroquia:</td>";
		$cat.= "<td><input type='text' id='letras' name='parroquia' class='cajasdetexto' maxlength='50' required value='".$desc."' onkeypress='return soloLetras(event)' onpaste='return false' required></td>";
		$cat.= "</tr>";
		$cat.= "<tr>";
		$cat.= "<td>Municipio:</td>";
		$cat.= "<td>".$select."</td>";
		$cat.= "</tr>";
		$cat.= "</table>";
		$cat.= "<br>";
		$cat.= "<input type='submit' value='Modificar' name='BtModificar' id='submit'>";
		$cat.= "</form>";
	}
	if(empty($_SESSION['catapara']))
	{
		$cat = "Aún no se han registrado parroquias.";
	}
	$diccionario = array
	(
		'PERFIL' => $perfil,
		'TITULO' => 'Parroquias',
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
