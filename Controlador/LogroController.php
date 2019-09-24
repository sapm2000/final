<?php
session_start();
require_once("../Modelo/logro.php");
require_once("../Modelo/tipo_logro.php");
require_once("../Modelo/disciplina.php");
require_once("../Modelo/evento.php");


$logro = new Logro();
$tipo_logro = new Tipo_logro();
$disciplina= new Disciplina();
$evento = new Evento();


$logro->setTabla("logros");
$tipo_logro->setTabla("tipo_logros");
$disciplina->setTabla("disciplinas");
$evento->setTabla("eventos");


switch($_REQUEST['accion'])
{
	case 'buscatodos':
	{
		$logro->setId_atleta($_SESSION['logro']);
		$datos = $logro->getById_atleta($id);
		$_SESSION['catalogro'] = $datos;
		header("Location: ../Vista/logro/consultalogro.php?accion=actual&id=".$id);	
		break;	
	}
	case "buscacosas":
	{
		$todos = $tipo_logro->getAll($tab);
		$_SESSION['tipologro'] = $todos;
		$z = $disciplina->getAll($tab);
		$_SESSION['disciplinas'] = $z;
		header("Location: ../Vista/logro/registro.php?");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$logro->setTipo($_POST['tipo']);
			$logro->setPais($_POST['pais']);
			$logro->setEstado($_POST['estado']);
			$logro->setCiudad($_POST['ciudad']);
			$logro->setDisciplina($_POST['disciplina']);
			$logro->setDescripcion($_POST['descripcion']);
			$logro->setResultado($_POST['resultado']);
			$logro->setObservacion($_POST['observacion']);
			$logro->setId_atleta($_SESSION['logro']);
			$logro->setModi(1);








			$logro->guardarLogro();
			header("Location: ../Vista/logro/consultalogro.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$logro->setId($_GET['id']);
		$logro->deleteById($id);
		header("Location: ../Vista/logro/consultalogro.php?accion=actualizar");		
		break;	
	}

	case "eliminartodo":
	{
		$logro->setId($_GET['id']);
		$logro->setId_evento($_GET['id_evento']);
		$evento->setId_evento($_GET['id_evento']);
		$x=$evento->buscaActual();
		$_SESSION['act']=$x[0][0];
		$_SESSION['act']=$_SESSION['act']-1;
		$evento->setActual($_SESSION['act']);
		$logro->setId_atleta($_GET['id_atleta']);
		$evento->guardarA();
		$logro->deleteById($id);
		$logro->deletetodo();
		header("Location: ../Vista/logro/consultalogro.php?accion=actualizar");		
		break;	
	}

	case 'seleccionar':
	{
		$logro->setId_atleta($_GET['id']);
		$_SESSION['logro']=$logro->getId_atleta();
		$datos = $logro->getById_atleta($id);
		$_SESSION['catalogro'] = $datos;
		
		header("Location: ../Vista/logro/consultalogro.php?accion=actual&id=".$id);	
		break;	
	}

	case 'selec':
	{
		$logro->setId($_GET['id']);
		$datos = $logro->getById($id);
		$_SESSION['modilogro'] = $datos;
		$todos = $tipo_logro->getAll($tab);
		$_SESSION['tipologro'] = $todos;
		$z = $disciplina->getAll($tab);
		$_SESSION['disciplinas'] = $z;
		header("Location: ../Vista/logro/modificar.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$logro->setId($_GET['id']);
			$logro->setTipo($_POST['tipo']);
			$logro->setPais($_POST['pais']);
			$logro->setEstado($_POST['estado']);
			$logro->setCiudad($_POST['ciudad']);
			$logro->setDisciplina($_POST['disciplina']);
			$logro->setDescripcion($_POST['descripcion']);
			$logro->setResultado($_POST['resultado']);
			$logro->setObservacion($_POST['observacion']);

		
			$logro->modificarLogro();
			header("Location: ../Vista/logro/consultalogro.php?accion=actualizar");
		}
		break;
	}
}
?>