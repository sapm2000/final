<?php
session_start();
require_once("../Modelo/alergia.php");
$alergia = new Alergia();
$alergia->setTabla("alergias");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $alergia->getAll($tab);
		$_SESSION['cataale'] = $todos;
		header("Location: ../Vista/alergia/alergia.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$stdo = strtoupper($_POST['alergia']);
			$alergia->setAlergia($stdo);
			$alergia->guardarPersona();
			header("Location: ../Vista/alergia/alergia.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$alergia->setId($_GET['id']);
		$alergia->deleteById($id);
		header("Location: ../Vista/alergia/alergia.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$alergia->setId($_GET['id']);
		$datos = $alergia->getById($id);
		$_SESSION['modiale'] = $datos;
		header("Location: ../Vista/alergia/alergia.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$alergia->setId($_GET['id']);
			$stdo = strtoupper($_POST['alergia']);
			$alergia->setAlergia($stdo);
			$alergia->modificarPersona($id);
			header("Location: ../Vista/alergia/alergia.php?accion=actualizar");
		}
		break;
	}
}
?>