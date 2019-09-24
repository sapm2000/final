<?php
	session_start();
	if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
	if($_GET['accion']=='actualizar')
	{
		header('Location: ../../Controlador/ModalidadController.php?accion=buscatodos');
	}

	if(empty($_REQUEST['accion']))
	{
		header("Location: ../menuv/menuv.php?accion=validado");
	}

	$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
	if($_GET['accion']=='actual')
	{
		$todos = $_SESSION['disciplina'];
		$select = "<select name='disciplina' required>";
		$select.= "<option value=''>Seleccione un disciplina</option>";
		foreach($todos as $t)
		{
			$select.= "<option value=".$t['id'].">".$t['disciplina']."</option>";	
		}
		$select.= "</select>";
		$form = "<form name='formnp' method='POST' action='../../Controlador/ModalidadController.php?accion=registrar'>";
		$form.= "<table>";
		$form.= "<tr>";
		$form.= "<td>Modalidad:</td>";
		$form.= "<td><input type='text' id='searchTerm' class='cajasdetexto' onkeyup='doSearch()'  name='modalidad' maxlength='50' id='letra' onkeypress='return caracteres(event)' onpaste='return false' required></td>";
		$form.= "</tr>";
		$form.= "<tr>";
		$form.= "<td>Disciplina:</td>";
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
		$cat.= "<th>Modalidades</th>";
		$cat.= "<th>Disciplinas</th>";
		$cat.= "<th colspan='2'>Acción</th>";
		$cat.= "</tr>";
		$cat.= "</thead>";
		$cat.= "<tbody>";
		$datos = $_SESSION['catamoda'];
		foreach($datos as $d)
		{
			$cat.= "<tr>";
			$cat.= "<td>".$d['modalidad']."</td>";
			$cat.= "<td>".$d['disciplina']."</td>";
			$cat.= "<td><a href='../../Controlador/ModalidadController.php?accion=buscaid&id=".$d['id']."'>";
			$cat.= "<img src='../imagenes1/editar.png' width='15px' hegiht='15px' title='Editar'></a></td>";
			$cat.= "<td><a href='../../Controlador/ModalidadController.php?accion=eliminar&id=".$d['id']."'>";
			$cat.= "<img src='../imagenes1/eliminar.png' width='15px' hegiht='15px' title='Eliminar'></a></td>";
			$cat.= "</tr>";
		}
		$cat.= "</tbody>";
		$cat.= "</table>";
		$cat.= "";


		$cat.= "<a href='../disciplina/disciplina.php'><input type='button' class='botonmodalmuni' value='Disciplinas'></a>";
	}
	if($_GET['accion']=='ver_detalles')
	{
		$datos = $_SESSION['catamoda'];
		foreach($datos as $d)
		{
			$id = $d['id'];
			$desc = $d['modalidad'];
			$idedo = $d['id_disciplina'];
//			$municipio = $d['std'];
		}
		$todos = $_SESSION['disciplina'];
		$select = "<select name='disciplina' required>";
		foreach($todos as $t)
		{
			if($idedo==$t['id'])
			{
				$select.= "<option value=".$t['id']." selected>".$t['disciplina']."</option>";	
			}
			else
			{
				$select.= "<option value=".$t['id'].">".$t['disciplina']."</option>";	
			}
		}
		$select.= "</select>";
		$form ='';
		$boton ='';
		$cat = "<form name='formnp' method='POST' action='../../Controlador/ModalidadController.php?accion=modificar&id=".$id."'>";
		$cat.= "<table>";
		$cat.= "<tr>";
		$cat.= "<td>Modalidad:</td>";
		$cat.= "<td><input type='text' id='letras' name='modalidad' class='cajasdetexto' maxlength='50' required value='".$desc."' onkeypress='return caracteres(event)' onpaste='return false' required></td>";
		$cat.= "</tr>";
		$cat.= "<tr>";
		$cat.= "<td>Disciplina:</td>";
		$cat.= "<td>".$select."</td>";
		$cat.= "</tr>";
		$cat.= "</table>";
		$cat.= "<br>";
		$cat.= "<input type='submit' value='Modificar' name='BtModificar' id='submit'>";
		$cat.= "</form>";
	}
	if(empty($_SESSION['catamoda']))
	{
		$cat = "Aún no se han registrado modalidades..";
	}
	$diccionario = array
	(
		'PERFIL' => $perfil,
		'TITULO' => 'Modalidades',
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
