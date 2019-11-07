<?php
session_start();
ob_start();
require_once("../Modelo/tipo_logro.php");
$tipo_logro = new Tipo_logro();
$tipo_logro->setTabla("tipo_logros");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $tipo_logro->getAll($tab);
		$_SESSION['catalog'] = $todos;
		header("Location: ../Vista/tipo_logro/tipo_logro.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$stdo = strtoupper($_POST['tipo_logro']);
			$tipo_logro->setTipo_logro($stdo);
			$tipo_logro->guardarTipoLogro();
			header("Location: ../Vista/tipo_logro/tipo_logro.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$tipo_logro->setId($_GET['id']);
		$tipo_logro->deleteById($id);
		header("Location: ../Vista/tipo_logro/tipo_logro.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$tipo_logro->setId($_GET['id']);
		$datos = $tipo_logro->getById($id);
		$_SESSION['moditipo'] = $datos;
		header("Location: ../Vista/tipo_logro/tipo_logro.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$tipo_logro->setId($_GET['id']);
			$stdo = strtoupper($_POST['tipo_logro']);
			$tipo_logro->setTipo_logro($stdo);
			$tipo_logro->modificarTipoLogro($id);
			header("Location: ../Vista/tipo_logro/tipo_logro.php?accion=actualizar");
		}
		break;
	}
}
ob_end_flush();
?>