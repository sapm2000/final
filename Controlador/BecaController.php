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

	case "buscatodos1":
	{
		$todos = $beca->todosBecas($tab);
		$_SESSION['catabeca'] = $todos;
		header("Location: ../Vista/beca/becanueva.php?accion=actual");
		break;
	}

	case "buscatodos2":
	{
		$todos = $beca->todosBecas($tab);
		$_SESSION['catabeca5'] = $todos;
		header("Location: ../Vista/beca/crear.php?accion=actual");
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
		
			

			

			

			$q=$beca->selecid();
			$w=$q[0][0];
			

			$ladilla=0;

			for ($i=0;$i<$w;$i++) {
				$beca->setMonto($_POST['pago'.$i]);
				$comprobador=$beca->getMonto();


				if (empty($comprobador)) {
					$ladilla=$ladilla+1;
				}
				else  {

				}
			}

			if ($w==$ladilla) {
					echo "<script>alert('no puedes dejar todos los campos vacios')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/beca/becanueva.php?accion=actual'>"; 
				break;
			}

			$beca->truncar();

			for ($i=0;$i<=$x;$i++) {
				$beca->setId_atleta($i);
				$beca->setMonto($_POST['pago'.$i]);
				$beca->setFecha($_POST['fecha']);
				
				$comprobador=$beca->getMonto();
			
				if (empty($comprobador)) {

				}
				elseif ($comprobador==0) {

				}

				elseif ($comprobador>0) {
					$cont=$cont+1;
					$temp=$beca->getMonto();
					$total=$total+$temp;
					$beca->guardarPersona();
					$beca->guardarRegistro();
				}
			}
			$beca->setFecha($_POST['fecha']);
			$beca->setNombre($_POST['nombre']);
			$beca->setMontoT($total);
			$beca->setBecados($cont);
			$beca->guardarDefinitivo();
			header("Location: ../Vista/beca/beca.php?accion=actualizar");		

			
		}
		break;
	}
	
	case 'seleccionar':
	{
		$beca->setFecha($_GET['fecha']);
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