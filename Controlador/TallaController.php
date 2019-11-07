<?php
session_start();
ob_start();
require_once("../Modelo/talla.php");
$talla = new Talla();
$talla->setTabla("tallas");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $talla->getAll($tab);
		$_SESSION['cataale'] = $todos;
		header("Location: ../Vista/talla/talla.php?accion=actual");
		break;
	}

	case "buscatodosreporte":
	{
		$todos = $talla->getreporte();
		$_SESSION['catatalrep'] = $todos;
		header("Location: ../Vista/talla/reportetalla.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$stdo = strtoupper($_POST['tal']);
			$talla->setTalla($stdo);
			$talla->guardarTalla();
			header("Location: ../Vista/talla/talla.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$talla->setId($_GET['id']);
		$talla->deleteById($id);
		header("Location: ../Vista/talla/talla.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$talla->setId($_GET['id']);
		$datos = $talla->getById($id);
		$_SESSION['moditalla'] = $datos;
		header("Location: ../Vista/talla/talla.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$talla->setId($_GET['id']);
			$stdo = strtoupper($_POST['talla']);
			$talla->setTalla($stdo);
			$talla->modificarTalla($id);
			header("Location: ../Vista/talla/talla.php?accion=actualizar");
		}
		break;
	}
}
ob_end_flush();
?>