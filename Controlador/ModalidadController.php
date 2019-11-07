<?php
session_start();
ob_start();
include('../Modelo/modalidades.php');
include('../Modelo/disciplina.php');
$mod = new Modalidad();
$dis= new Disciplina();
$mod->setTabla('modalidades');
$dis->setTabla('disciplinas');
switch($_REQUEST['accion'])
{
	case 'buscatodos':
	{
		$_SESSION['disciplina'] = $dis->getAll();
		
		
			
			$_SESSION['catamoda'] = $mod->consDetModalidad();
			
			header("Location: ../Vista/modalidades/modalidades.php?accion=actual");
		
		
		break;
	}

	case 'registrar':
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$modal = strtoupper($_POST['modalidad']);
			$mod->setModalidad($modal);
			$mod->setId_disciplina($_POST['disciplina']);
			$mod->RegModalidad();
			header('Location: ../Vista/modalidades/modalidades.php?accion=actualizar');
		}
		break;
	}

	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$id=$_GET['id'];
			$modal = strtoupper($_POST['modalidad']);
			$mod->setModalidad($modal);
			$mod->setId_disciplina($_POST['disciplina']);
			$mod->ModModalidad($id);
			unset($_SESSION['catamoda']);
			header('Location: ../Vista/modalidades/modalidades.php?accion=actualizar');
		}
		break;
	}

	case 'eliminar':
	{
		echo "<script>confirm('¿Está seguro de eliminar el regitro?')</script>";
		$mod->setId($_GET['id']);
		$mod->deleteById();
		header('Location: ../Vista/modalidades/modalidades.php?accion=actualizar');

		break;
	}

	case 'buscaid':
	{
		$mod->setId($_GET['id']);
		$_SESSION['catamoda'] = $mod->getById();
		header('Location: ../Vista/modalidades/modalidades.php?accion=ver_detalles');
		break;
	}

	
}
ob_end_flush();
?>
