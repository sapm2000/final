<?php
	session_start();
	if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
	if($_GET['accion']=='actualizar')
	{
		header('Location: ../../Controlador/ModalidadController.php?accion=buscatodos1');
	}

	if(empty($_REQUEST['accion']))
	{
		header("Location: ../menuv/menuv.php?accion=validado");
	}

	$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
	if($_GET['accion']=='actual')
	{
		
		$form = "<form name='formnp' method='POST' action='../../Controlador/ModalidadController.php?accion=registrar'>";
		$form.= "<table>";
		$form.= "<tr>";
		$form.= "<td>Modalidad:</td>";
		$form.= "<td><input type='text' id='searchTerm' class='cajasdetexto' onkeyup='doSearch()'  name='modalidad' maxlength='50' id='letra' onkeypress='return caracteres(event)' onpaste='return false' required></td>";
		$form.= "</tr>";
		$form.= "</table>"; 
		$form.= "<br>";
		/*$form.= "<input type='submit' value='Registrar' name='BtRegistrar' id='submit'>";*/
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
		$datos = $_SESSION['catamoda1'];
		foreach($datos as $d)
		{
			$cat.= "<tr>";
			$cat.= "<td>".$d['modalidad']."</td>";
			$cat.= "<td>".$d['disciplina']."</td>";
			$cat.="<td><a href='../../Controlador/ModalidadController.php?accion=reactivar1&id=".$d['id']."&id_disciplina=".$d['id_disciplina']."'>";	
			$cat.="<img src='../imagenes1/activo1.png' width='15px' height='15px' title='reactivar'></a></td>";	
			$cat.= "</tr>";
		}
		$cat.= "</tbody>";
		$cat.= "</table>";
		$cat.= "";


		/*$cat.= "<a href='../disciplina/disciplina.php'><input type='button' class='botonmodalmuni' value='Disciplinas'></a>";*/
	}
	
	if(empty($_SESSION['catamoda1']))
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
