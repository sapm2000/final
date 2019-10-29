<?php
session_start();
ob_start();
require_once("../Modelo/beca.php");
$beca = new Beca();
$beca->setTabla("becas");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $beca->todosatletas($tab);
		$_SESSION['catabeca'] = $todos;
		header("Location: ../Vista/beca/beca.php?accion=actual");
		break;
	}

	case "buscatodos1":
	{
		$todos = $beca->todosatletas($tab);
		$_SESSION['catabeca'] = $todos;
		header("Location: ../Vista/beca/becanueva.php?accion=actual");
		break;
	}
	case "buscatodos11":
	{
		$todos = $beca->todosatletasgloriosos($tab);
		$_SESSION['catabeca1'] = $todos;
		header("Location: ../Vista/beca/becanuevagloria.php?accion=actual");
		break;
	}
	case "buscatodos111":
	{
		$todos = $beca->todosatletasgloriosos($tab);
		$_SESSION['catabeca1'] = $todos;
		header("Location: ../Vista/beca/becagloria.php?accion=actual");
		break;
	}

	case "buscatodos2":
	{
		$todos = $beca->todosBecas($tab);
		$_SESSION['catabeca5'] = $todos;
		header("Location: ../Vista/beca/crear.php?accion=actual");
		break;
	}
	case "buscatodos22":
	{
		$todos = $beca->todosBecasgloriosos($tab);
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

			$p=$beca->selexmaxbeca();
			$l=$p[0][0];
			
		
			

			

			

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
			$contbice=0;
			$contgeneral=0;
			$totalgeneral=0;
			$totalbice=0;

			$bec = strtoupper($_POST['nombre']);
			$beca->setNombre($bec);

			$_SESSION['nombres']=$beca->getNombre();

			$m=$beca->todosBecas1();



			for ($i=0;$i<=$x;$i++) {
				$beca->setId_atleta($i);
				$beca->setMonto($_POST['pago'.$i]);
				$beca->setFecha($_POST['fecha']);
				$originalDate = $beca->getFecha();
				$newDate = date("Ymd", strtotime($originalDate));
				$_SESSION['fechas']=$newDate;
				
				$comprobador=$beca->getMonto();
			
				if (empty($comprobador)) {

				}
				elseif ($comprobador==0) {

				}

				elseif ($comprobador>0) {
					if (strncmp($_POST['cuenta'.$i],'0175',4)===0) {
						$contbice=$contbice+1;
						$bice=$beca->getMonto();

						$totalbice=$totalbice+$bice;

					}
					else {
						$contgeneral=$contgeneral+1;
						$gene=$beca->getMonto();

						$totalgeneral=$totalgeneral+$gene;

					}
					$cont=$cont+1;
					$temp=$beca->getMonto();
					$total=$total+$temp;
					$beca->guardarPersona();
					$beca->guardarRegistro();
				}
			}
			$beca->setFecha($_POST['fecha']);
			

			$beca->setMontoT($total);
			$numeroConCeros5 = str_pad($totalgeneral, 11, "0", STR_PAD_LEFT);
			$_SESSION['total']= $numeroConCeros5;
			$numeroConCeros6 = str_pad($totalbice, 11, "0", STR_PAD_LEFT);
            $_SESSION['totalbice']= $numeroConCeros6;

			$beca->setBecados($cont);
			
			$numeroConCeros3 = str_pad($contgeneral, 6, "0", STR_PAD_LEFT);
			$_SESSION['cantidad']= $numeroConCeros3;
			$numeroConCeros4 = str_pad($contbice, 6, "0", STR_PAD_LEFT);
			$_SESSION['cantidadbice']= $numeroConCeros4;

			$beca->guardarDefinitivo();

			
			header("Location: ../Vista/beca/crear.php?accion=actualizar");


			
		}
		break;
	}

	case "registrarPagogloria":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$cont=0;
			$z=$beca->selexmax();
			$x=$z[0][0];

			$p=$beca->selexmaxbeca();
			$l=$p[0][0];
			
		
			

			

			

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

			$beca->truncar_gloria();
			$contbice=0;
			$contgeneral=0;
			$totalgeneral=0;
			$totalbice=0;

			$bec = strtoupper($_POST['nombre']);
			$beca->setNombre($bec);

			$_SESSION['nombres']=$beca->getNombre();

			$m=$beca->todosBecas1();



			for ($i=0;$i<=$x;$i++) {
				$beca->setId_atleta($i);
				$beca->setMonto($_POST['pago'.$i]);
				$beca->setFecha($_POST['fecha']);
				$originalDate = $beca->getFecha();
				$newDate = date("Ymd", strtotime($originalDate));
				$_SESSION['fechas']=$newDate;
				
				$comprobador=$beca->getMonto();
			
				if (empty($comprobador)) {

				}
				elseif ($comprobador==0) {

				}

				elseif ($comprobador>0) {
					if (strncmp($_POST['cuenta'.$i],'0175',4)===0) {
						$contbice=$contbice+1;
						$bice=$beca->getMonto();

						$totalbice=$totalbice+$bice;

					}
					else {
						$contgeneral=$contgeneral+1;
						$gene=$beca->getMonto();

						$totalgeneral=$totalgeneral+$gene;

					}
					$cont=$cont+1;
					$temp=$beca->getMonto();
					$total=$total+$temp;
					$beca->setNombre($bec);

					$beca->guardarPersonagloriosa();
					$beca->guardarRegistro();
				}
			}
			$beca->setFecha($_POST['fecha']);
			

			$beca->setMontoT($total);
			$numeroConCeros5 = str_pad($totalgeneral, 11, "0", STR_PAD_LEFT);
			$_SESSION['total']= $numeroConCeros5;
			$numeroConCeros6 = str_pad($totalbice, 11, "0", STR_PAD_LEFT);
            $_SESSION['totalbice']= $numeroConCeros6;

			$beca->setBecados($cont);
			
			$numeroConCeros3 = str_pad($contgeneral, 6, "0", STR_PAD_LEFT);
			$_SESSION['cantidad']= $numeroConCeros3;
			$numeroConCeros4 = str_pad($contbice, 6, "0", STR_PAD_LEFT);
			$_SESSION['cantidadbice']= $numeroConCeros4;

			$beca->guardarDefinitivo();

			
			header("Location: ../Vista/beca/crear.php?accion=actualizar1&id=".$id);	


			
		}
		break;
	}
	
	case 'seleccionar':
	{
		$beca->setFecha($_GET['fecha']);
		$beca->setNombre($_GET['nombre']);
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
ob_end_flush();
?>