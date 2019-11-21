<?php
session_start();
ob_start();
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

	case 'buscatodos1':
		{
			$cols = $mncp->countAll();
			$_SESSION['stds'] = $std->getAll();
			if($cols>0)
			{
				$rgo = $_GET['reg'];
				$ini = $_GET['pag']*$rgo-$rgo;
				$_SESSION['catapara1'] = $mncp->consDetParroquiai($ini,$rgo);
				header("Location: ../Vista/parroquia/ParroquiaView1.php?accion=actual&cols=".$cols."&reg=".$rgo);
			}
			else
			{
				$_SESSION['catapara1'] = $mncp->consDetParroquiai(1,10);
				header("Location: ../Vista/parroquia/ParroquiaView1.php?accion=actual&cols=0&reg=10");
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
		$mncp->updatepar();
		header('Location: ../Vista/parroquia/ParroquiaView.php?accion=actualizar');
	break;
	}

	case 'buscaid':
	{
		$mncp->setId($_GET['id']);
		$_SESSION['modipara'] = $mncp->getById();
		header('Location: ../Vista/parroquia/ParroquiaView.php?accion=ver_detalles');
		break;
	}

	case "reactivar1":
		{
			$mncp->setId($_GET['id']);
			$mncp->setId_municipio($_GET['id_municipio']);

			$mncp->updatepar1();
			$mncp->updatemun1();

	
			header("Location: ../Vista/parroquia/ParroquiaView1.php?accion=actualizar");		
			break;	
		}

	default:
	{
		header('Location: ../Vista/parroquia/ParroquiaView.php?accion=actualizar');
		break;
	}
}
ob_end_flush();
?>
