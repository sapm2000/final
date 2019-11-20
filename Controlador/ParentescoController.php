<?php
session_start();
ob_start();
require_once("../Modelo/parentesco.php");
$parentesco = new Parentesco();
$parentesco->setTabla("parentescos");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $parentesco->getAll($tab);
		$_SESSION['cataparen'] = $todos;
		header("Location: ../Vista/parentesco/parentesco.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$stdo = strtoupper($_POST['parentesco']);
			$parentesco->setParentesco($stdo);
			$parentesco->guardarParentesco();
			header("Location: ../Vista/parentesco/parentesco.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$parentesco->setId($_GET['id']);
		$comprobar=$parentesco->comprobarDatos();
		if (empty($comprobar)) {
			$parentesco->deleteById($id);
		}
		else {
			echo "<script>alert('no se puede eliminar el parentesco porque tiene atletas asociados')</script>";//Mensaje de Sesión no válida
			echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/parentesco/parentesco.php?accion=actualizar'>"; 

			break ;
		}
		header("Location: ../Vista/parentesco/parentesco.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$parentesco->setId($_GET['id']);
		$datos = $parentesco->getById($id);
		$_SESSION['modiparen'] = $datos;
		header("Location: ../Vista/parentesco/parentesco.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$parentesco->setId($_GET['id']);
			$stdo = strtoupper($_POST['parentesco']);
			$parentesco->setParentesco($stdo);
			$parentesco->modificarParentesco($id);
			header("Location: ../Vista/parentesco/parentesco.php?accion=actualizar");
		}
		break;
	}
}
ob_end_flush();
?>