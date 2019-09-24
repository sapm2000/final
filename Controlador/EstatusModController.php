<?php
session_start();
require_once("../Modelo/atleta.php");
require_once("../Modelo/estatu.php");

$atleta = new Atleta();
$estatu= new Estatu();

$atleta->setTabla("atleta");
$estatu->setTabla("estatus");

switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $atleta->getAll($tab);
		$_SESSION['cataale'] = $todos;
		header("Location: ../Vista/alergia/alergia.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$atleta->setAlergia($_POST['alergia']);
			$atleta->guardarPersona();
			header("Location: ../Vista/alergia/alergia.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$atleta->setId($_GET['id']);
		$atleta->deleteById($id);
		header("Location: ../Vista/alergia/alergia.php?accion=actualizar");		
		break;	
	}
	case 'seleccionarEstatus':
	{
		$atleta->setId($_GET['id']);
		$datos = $atleta->getById($id);
		$_SESSION['modiestatus'] = $datos;
		$est = $estatu->getAll($tab);
		$_SESSION['estatus'] = $est;

		header("Location: ../Vista/atleta/categoria.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificarEstatus':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$atleta->setId($_GET['id']);
			$atleta->setId_estatus($_POST['id_estatus']);
			$atleta->modificarEstatus();
			header("Location: ../Vista/atleta/consultaatleta.php?accion=actualizar");
		}
		break;
	}
}
?>