<?php
session_start();
ob_start();
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
			$banco->guardarBanco();
			header("Location: ../Vista/banco/banco.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$banco->setId($_GET['id']);
		$comprobar=$banco->comprobarDatos();
		if (empty($comprobar)) {
			$banco->deleteById($id);
		}
		else {
			echo "<script>alert('no se puede eliminar el banco porque tiene atletas asociados')</script>";//Mensaje de Sesión no válida
			echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/banco/banco.php?accion=actualizar'>"; 

			break ;
		}
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
			$banco->modificarBanco($id);
			header("Location: ../Vista/banco/banco.php?accion=actualizar");
		}
		break;
	}
}
ob_end_flush();
?>