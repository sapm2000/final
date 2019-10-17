<?php
session_start();
require_once("../Modelo/registro_medico.php");
$registro_medico = new Registro_medico();
$registro_medico->setTabla("registro_medicos");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $registro_medico->getAll($tab);
		$_SESSION['cataale'] = $todos;
		header("Location: ../Vista/registro_medico/registro_medico.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$stdo = strtoupper($_POST['registro_medico']);
			$registro_medico->setRegistro_medico($stdo);
			$registro_medico->guardarRegistro_medico();
			header("Location: ../Vista/registro_medico/registro_medico.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$registro_medico->setId($_GET['id']);
		$registro_medico->deleteById($id);
		header("Location: ../Vista/registro_medico/registro_medico.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$registro_medico->setId($_GET['id']);
		$datos = $registro_medico->getById($id);
		$_SESSION['modimed'] = $datos;
		header("Location: ../Vista/registro_medico/registro_medico.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$registro_medico->setId($_GET['id']);
			$stdo = strtoupper($_POST['registro_medico']);
			$registro_medico->setRegistro_medico($stdo);
			$registro_medico->modificarRegistro_medico($id);
			header("Location: ../Vista/registro_medico/registro_medico.php?accion=actualizar");
		}
		break;
	}
}
?>