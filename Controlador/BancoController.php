<?php
session_start();
require_once("../Modelo/banco.php");
$banco = new Banco();
$banco->setTabla("bancos");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $banco->getAll($tab);
		$_SESSION['catbanco'] = $todos;
		header("Location: ../Vista/banco/banco.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$ban = strtoupper($_POST['banco']);
			$banco->setBanco($ban);
			$banco->guardarPersona();
			header("Location: ../Vista/banco/banco.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$banco->setId($_GET['id']);
		$banco->deleteById($id);
		header("Location: ../Vista/banco/banco.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$banco->setId($_GET['id']);
		$datos = $banco->getById($id);
		$_SESSION['modibanco'] = $datos;
		header("Location: ../Vista/banco/banco.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$banco->setId($_GET['id']);
			$ban = strtoupper($_POST['banco']);
			$banco->setBanco($ban);
			$banco->modificarPersona($id);
			header("Location: ../Vista/banco/banco.php?accion=actualizar");
		}
		break;
	}
}

?>