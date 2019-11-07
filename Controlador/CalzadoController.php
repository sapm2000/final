<?php
session_start();
ob_start();
require_once("../Modelo/calzado.php");
$calzado = new Calzado();
$calzado->setTabla("calzados");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $calzado->getAll($tab);
		$_SESSION['catacal'] = $todos;
		header("Location: ../Vista/calzado/calzado.php?accion=actual");
		break;
	}
	case "buscatodosreporte":
	{
		$todos = $calzado->getreporte();
		$_SESSION['catacalrep'] = $todos;
		header("Location: ../Vista/calzado/reportecalzado.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$stdo = strtoupper($_POST['cal']);
			$calzado->setCalzado($stdo);
			$calzado->guardarCalzado();
			header("Location: ../Vista/calzado/calzado.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$calzado->setId($_GET['id']);
		$calzado->deleteById($id);
		header("Location: ../Vista/calzado/calzado.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$calzado->setId($_GET['id']);
		$datos = $calzado->getById($id);
		$_SESSION['modical'] = $datos;
		header("Location: ../Vista/calzado/calzado.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$calzado->setId($_GET['id']);
			$stdo = strtoupper($_POST['calzado']);
			$calzado->setCalzado($stdo);
			$calzado->modificarCalzado($id);
			header("Location: ../Vista/calzado/calzado.php?accion=actualizar");
		}
		break;
	}
}
ob_end_flush();
?>