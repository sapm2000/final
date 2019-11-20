<?php
session_start();
ob_start();
require_once("../Modelo/patologia_medica.php");
$patologia_medica = new Patologia_medica();
$patologia_medica->setTabla("patologia_medicas");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $patologia_medica->getAll($tab);
		$_SESSION['cataale'] = $todos;
		header("Location: ../Vista/patologia_medica/patologia_medica.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$stdo = strtoupper($_POST['patologia_medica']);
			$patologia_medica->setPatologia_medica($stdo);
			$patologia_medica->guardarPatologia_medica();
			header("Location: ../Vista/patologia_medica/patologia_medica.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$patologia_medica->setId($_GET['id']);
		$patologia_medica->deleteById($id);
		header("Location: ../Vista/patologia_medica/patologia_medica.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$patologia_medica->setId($_GET['id']);
		$datos = $patologia_medica->getById($id);
		$_SESSION['modimed'] = $datos;
		header("Location: ../Vista/patologia_medica/patologia_medica.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$patologia_medica->setId($_GET['id']);
			$stdo = strtoupper($_POST['patologia_medica']);
			$patologia_medica->setPatologia_medica($stdo);
			$patologia_medica->modificarPatologia_medica($id);
			header("Location: ../Vista/patologia_medica/patologia_medica.php?accion=actualizar");
		}
		break;
	}
}
ob_end_flush();
?>