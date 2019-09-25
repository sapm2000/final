<?php
session_start();
require_once("../Modelo/beca.php");
$beca = new Beca();
$beca->setTabla("becas");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $beca->todosBecas($tab);
		$_SESSION['catabeca'] = $todos;
		header("Location: ../Vista/beca/beca.php?accion=actual");
		break;
	}

	case "buscaGlobal":
	{
		$todos = $beca->todosTotal($tab);
		$_SESSION['catabeca1'] = $todos;
		header("Location: ../Vista/beca/consultaglobal.php?accion=actual");
		break;
	}

	case "registrarPago":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$cont=0;
			$z=$beca->selexmax();
			$x=$z[0][0];
			$beca->truncar();
			for ($i=0;$i<=$x;$i++) {
				$beca->setId_atleta($i);
				$beca->setMonto($_POST['pago'.$i]);
				$beca->setMes($_POST['mes']);
				$beca->setAnio($_POST['anio']);
				
				$comprobador=$beca->getMonto();
			
				if (empty($comprobador)) {

				}
				elseif ($comprobador==0) {

				}

				elseif ($comprobador>0) {
					$cont=$cont+1;
					$temp=$beca->getMonto();
					$total=$total+$temp;
					$beca->guardarBeca();
					$beca->guardarRegistro();
				}
			}
			$beca->setMes($_POST['mes']);
			$beca->setAnio($_POST['anio']);
			$beca->setMontoT($total);
			$beca->setBecados($cont);
			$beca->guardarDefinitivo();
			header("Location: ../Vista/beca/beca.php?accion=actualizar");		

			
		}
		break;
	}
	case "eliminar":
	{
		$beca->setId($_GET['id']);
		$beca->deleteById($id);
		header("Location: ../Vista/beca/beca.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$beca->setMes($_GET['mes']);
		$beca->setAnio($_GET['anio']);
		$datos = $beca->getDetalles();
		$_SESSION['detallebeca'] = $datos;

		header("Location: ../Vista/beca/detallebeca.php?accion=actual&id=".$id);	

		break;	
	}
	case 'modificar':
	{
		if(isset($_REQUEST['BtModificar']))
		{
			$beca->setId($_GET['id']);
			$stdo = strtoupper($_POST['beca']);
			$beca->setBeca($stdo);
			$beca->modificarBeca($id);
			header("Location: ../Vista/beca/beca.php?accion=actualizar");
		}
		break;
	}
}
?>