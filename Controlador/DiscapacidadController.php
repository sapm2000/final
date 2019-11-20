<?php
session_start();
ob_start();
require_once("../Modelo/discapacidad.php");
$discapacidad = new Discapacidad();
$discapacidad->setTabla("discapacidades");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $discapacidad->getAll($tab);
		$_SESSION['catadisc'] = $todos;
		header("Location: ../Vista/discapacidad/discapacidad.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$stdo = strtoupper($_POST['discapacidad']);
			$discapacidad->setDiscapacidad($stdo);
			$discapacidad->guardarDiscapacidad();
			header("Location: ../Vista/discapacidad/discapacidad.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$discapacidad->setId($_GET['id']);
		$comprobar=$discapacidad->comprobarDatos();
		if (empty($comprobar)) {
			$discapacidad->deleteById($id);
		}
		else {
			echo "<script>alert('no se puede eliminar la discapacidad porque tiene atletas asociados')</script>";//Mensaje de Sesión no válida
			echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/discapacidad/discapacidad.php?accion=actualizar'>"; 

			break;
		}
		header("Location: ../Vista/discapacidad/discapacidad.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$discapacidad->setId($_GET['id']);
		$datos = $discapacidad->getById($id);
		$_SESSION['modidisc'] = $datos;
		header("Location: ../Vista/discapacidad/discapacidad.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$discapacidad->setId($_GET['id']);
			$stdo = strtoupper($_POST['discapacidad']);
			$discapacidad->setDiscapacidad($stdo);
			$discapacidad->modificarDiscapacidad($id);
			header("Location: ../Vista/discapacidad/discapacidad.php?accion=actualizar");
		}
		break;
	}
}
ob_end_flush();
?>