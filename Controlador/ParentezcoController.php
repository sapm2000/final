<?php
session_start();
require_once("../Modelo/parentezco.php");
$parentezco = new Parentezco();
$parentezco->setTabla("parentezcos");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $parentezco->getAll($tab);
		$_SESSION['cataparen'] = $todos;
		header("Location: ../Vista/parentesco/parentezco.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$stdo = strtoupper($_POST['parentezco']);
			$parentezco->setParentezco($stdo);
			$parentezco->guardarParentezco();
			header("Location: ../Vista/parentesco/parentezco.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$parentezco->setId($_GET['id']);
		$parentezco->deleteById($id);
		header("Location: ../Vista/parentesco/parentezco.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$parentezco->setId($_GET['id']);
		$datos = $parentezco->getById($id);
		$_SESSION['modiparen'] = $datos;
		header("Location: ../Vista/parentesco/parentezco.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$parentezco->setId($_GET['id']);
			$stdo = strtoupper($_POST['parentezco']);
			$parentezco->setParentezco($stdo);
			$parentezco->modificarParentezco($id);
			header("Location: ../Vista/parentesco/parentezco.php?accion=actualizar");
		}
		break;
	}
}
?>