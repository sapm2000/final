<?php
session_start();
ob_start();
include('../Modelo/municipio.php');
$std= new Municipio();
$std->setTabla('municipio');
switch($_REQUEST['accion'])
{
	case 'buscatodos':
	{
		$cols = $std->countAll();
		if($cols>0)
		{
			$rgo = $_GET['reg'];
			$ini = $_GET['pag']*$rgo-$rgo;
			$_SESSION['catamuni'] = $std->getAllactivos($ini,$rgo);
			header("Location: ../Vista/municipio/MunicipioView.php?accion=actual&cols=".$cols."&reg=".$rgo);
		}
		else
		{
			$_SESSION['catamuni'] = $std->getAllactivos(1,10);
			header("Location: ../Vista/municipio/MunicipioView.php?accion=actual&cols=0&reg=10");
		}
		break;
	}

	case 'buscatodos1':
		{
			$cols = $std->countAll();
			if($cols>0)
			{
				$rgo = $_GET['reg'];
				$ini = $_GET['pag']*$rgo-$rgo;
				$_SESSION['catamuni1'] = $std->getAllinactivos($ini,$rgo);
				header("Location: ../Vista/municipio/MunicipioView1.php?accion=actual&cols=".$cols."&reg=".$rgo);
			}
			else
			{
				$_SESSION['catamuni1'] = $std->getAllinactivos(1,10);
				header("Location: ../Vista/municipio/MunicipioView1.php?accion=actual&cols=0&reg=10");
			}
			break;
		}

	case 'registrar':
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$stdo = strtoupper($_POST['municipio']);
			$std->setDescrip($stdo);
			$std->RegMunicipio();
			header('Location: ../Vista/municipio/MunicipioView.php?accion=actualizar');
		}
		break;
	}

	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$id=$_GET['id'];
			$stdo = strtoupper($_POST['municipio']);
			$std->setDescrip($stdo);
			$std->ModMunicipio($id);
			unset($_SESSION['modimuni']);
			header('Location: ../Vista/municipio/MunicipioView.php?accion=actualizar');
		}
		break;
	}

	case 'eliminar':
	{
		$std->setId($_GET['id']);
		$std->updatemun();
		$std->updatepar();
		header('Location: ../Vista/municipio/MunicipioView.php?accion=actualizar');
	break;
	}

	case 'buscaid':
	{
		$std->setId($_GET['id']);
		$_SESSION['modimuni'] = $std->getById();
		header('Location: ../Vista/municipio/MunicipioView.php?accion=ver_detalles');
		break;
	}

	case "reactivar1":
		{
			$std->setId($_GET['id']);
			$std->updatemun1();
	
			header("Location: ../Vista/municipio/MunicipioView1.php?accion=actualizar");		
			break;	
		}

	default:
	{
		header('Location: ../Vista/municipio/MunicipioView.php?accion=actualizar');
		break;
	}
}
ob_end_flush();
?>
