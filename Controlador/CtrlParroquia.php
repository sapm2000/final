<?php
session_start();
include('../Modelo/parroquia.php');
include('../Modelo/municipio.php');
$std = new Municipio();
$mncp= new Parroquia();
$std->setTabla('municipio');
$mncp->setTabla('parroquia');
switch($_REQUEST['accion'])
{
	case 'buscatodos':
	{
		$cols = $mncp->countAll();
		$_SESSION['stds'] = $std->getAll();
		if($cols>0)
		{
			$rgo = $_GET['reg'];
			$ini = $_GET['pag']*$rgo-$rgo;
			$_SESSION['catapara'] = $mncp->consDetParroquia($ini,$rgo);
			header("Location: ../Vista/parroquia/ParroquiaView.php?accion=actual&cols=".$cols."&reg=".$rgo);
		}
		else
		{
			$_SESSION['catapara'] = $mncp->consDetParroquia(1,10);
			header("Location: ../Vista/parroquia/ParroquiaView.php?accion=actual&cols=0&reg=10");
		}
		break;
	}

	case 'registrar':
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$mncpio = strtoupper($_POST['parroquia']);
			$mncp->setDescrip($mncpio);
			$mncp->setId_municipio($_POST['municipio']);
			$mncp->RegParroquia();
			header('Location: ../Vista/parroquia/ParroquiaView.php?accion=actualizar');
		}
		break;
	}

	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$id=$_GET['id'];
			$mncpio = strtoupper($_POST['parroquia']);
			$mncp->setDescrip($mncpio);
			$mncp->setId_municipio($_POST['municipio']);
			$mncp->ModParroquia($id);
			unset($_SESSION['modipara']);
			header('Location: ../Vista/parroquia/ParroquiaView.php?accion=actualizar');
		}
		break;
	}

	case 'eliminar':
	{
		$mncp->setId($_GET['id']);
		$mncp->deleteById();
		echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/parroquia/ParroquiaView.php?accion=actualizar'>";
		break;
	}

	case 'buscaid':
	{
		$mncp->setId($_GET['id']);
		$_SESSION['modipara'] = $mncp->getById();
		header('Location: ../Vista/parroquia/ParroquiaView.php?accion=ver_detalles');
		break;
	}

	default:
	{
		header('Location: ../Vista/parroquia/ParroquiaView.php?accion=actualizar');
		break;
	}
}
?>
