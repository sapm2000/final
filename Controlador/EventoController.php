<?php
session_start();
ob_start();
require_once("../Modelo/evento.php");
require_once("../Modelo/municipio.php");
require_once("../Modelo/disciplina.php");
require_once("../Modelo/parroquia.php");
require_once("../Modelo/logro.php");
require_once("../Modelo/tipo_logro.php");

$evento = new Evento();
$municipio = new Municipio();
$disciplinas = new Disciplina();
$parroquia = new Parroquia();
$logro = new Logro();
$tipo_logro = new Tipo_logro();



$evento->setTabla("eventos");
$disciplinas->setTabla("disciplinas");
$municipio->setTabla("municipio");
$parroquia->setTabla("parroquia");
$logro->setTabla("logros");
$tipo_logro->setTabla("tipo_logros");

switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $evento->getAll($tab);
		$_SESSION['catalogo'] = $todos;
		$coño = $disciplinas->getallactivas($tab);
		$_SESSION['coño'] = $coño;
		$carajo=$municipio->getAllactivos($tab);
		$_SESSION['municipio'] = $carajo;	
		$hola = $parroquia->getAllactivos($tab);
		$_SESSION['parroquia'] = $hola;
		$tip = $tipo_logro->getAll();
		$_SESSION['tipo_logro'] = $tip;
		header("Location: ../Vista/evento/evento.php?accion=actual");
		break;
	}

	case "buscatodos1":
	{
		$_SESSION['cataeven2'] = $evento->consDetdisciplina();
		$coño = $disciplinas->getAll($tab);
		$_SESSION['coño'] = $coño;
		$carajo=$municipio->getAllactivos($tab);
		$_SESSION['municipio'] = $carajo;	
		$hola = $parroquia->getAllactivos($tab);
		$_SESSION['parroquia'] = $hola;

		header("Location: ../Vista/evento/evento2.php?accion=actual");
		break;
	}

	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$x = strtoupper($_POST['nombre']);
			$y = strtoupper($_POST['descripcion']);
			$evento->setNombre($x);
			$evento->setFecha_Inicio($_POST['fecha_inicio']);
			$evento->setFecha_Cierre($_POST['fecha_cierre']);
			$evento->setDescripcion($y);
			$evento->setId_disciplina($_POST['id_disciplina']);
			$evento->setId_municipio($_POST['id_municipio']);
			$evento->setId_parroquia($_POST['id_parroquia']);
			$evento->setParti($_POST['parti']);
			$evento->setTipo($_POST['tipo']);
			$_SESSION['tipologroevento']=$evento->getTipo();
			$equipos=$evento->getParti();
			$_SESSION['parti']=$evento->getParti();
			$evento->setCanti($_POST['canti']);
			$cantidad=$evento->getCanti();
			$_SESSION['canti']=$evento->getCanti();

			$_SESSION['total']=$cantidad/$equipos;
			$evento->setMaxpo($_SESSION['total']);



			$evento->guardarEvento();

			$hola=$evento->selecmax();
			$_SESSION['evento']=$hola[0][0];


			$evento->setId_evento($_SESSION['evento']);
			$x=$evento->buscaActual();
			$_SESSION['act']=$x[0][0];
			$q=$evento->buscaCiudad();
			$_SESSION['ciudad']=$q[0][0];
			$w=$evento->buscaDisciplina();
			$_SESSION['disciplina']=$w[0][0];
			$e=$evento->buscaDescripcion();
			$_SESSION['descripcion']=$e[0][0];
			$datos = $evento->consDetdisciplina1();
			$_SESSION['modieven3'] = $datos;
			$_SESSION['catapart'] = $evento->consdetparticipante();
			$_SESSION['act']=0;
			header("Location: ../Vista/evento/evento3.php?accion=ver_detalles&id=".$id);


		}
		break;
	}
	case "registrar1":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$evento->setCedula($_POST['cedula']);
			$c=$evento->buscaid();
			$evento->setId_atleta($c[0][0]);
			$logro->setId_atleta($c[0][0]);
			$evento->setId_evento($_SESSION['evento']);
			$logro->setId_evento($_SESSION['evento']);
			$evento->setPosicion($_POST['posicion']);
			$evento->setObservacion($_POST['obs']);
			$pos=$evento->getPosicion();



			if(empty($c[0][0])) {
				
				echo "<script>alert('El atleta no existe en la base de datos/ cedula incorrecta')</script>";//Mensaje de Sesión no válida
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/evento/evento3.php?accion=ver_detalles'>"; 
				break;
			}

			else {

				$even=$evento->losatletasdeesteevento();
				$t= count($even);
				$ida=$evento->getId_atleta();

				if ($pos>$_SESSION['total']) {
						echo "<script>alert('No puede colocar esa posición')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/evento/evento3.php?accion=ver_detalles'>";
						break;
				}

				for ($i=0;$i<=$t;$i++) {
					if ($ida==$even[$i][0]) {
						$_SESSION['catapart'] = $evento->consdetparticipante();
						echo "<script>alert('El atleta ya esta registrado en este evento')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/evento/evento3.php?accion=ver_detalles'>"; 

						break 2;

					}
				}

				if ($_SESSION['act']>=$_SESSION['canti']) {
					echo "<script>alert('el evento ya tiene el maximo de participantes')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/evento/evento3.php?accion=ver_detalles'>";
					break;
				}

				for ($i=0;$i<1;$i++) {
					$valor=$evento->consultaPosicion();
					$hola=count($valor);
					echo $hola;

					if ($hola>=$_SESSION['parti']) {
						echo "<script>alert('esta posicion tiene el maximo de integrantes permitidos')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/evento/evento3.php?accion=ver_detalles'>";
						break 2;

					}
				}

				$_SESSION['act']=$_SESSION['act']+1;

				$evento->setActual($_SESSION['act']);
				$logro->setTipo($_SESSION['tipologroevento']);
				$logro->setPais('venezuela');
				$logro->setEstado('yaracuy');
				$logro->setCiudad($_SESSION['ciudad']);
				$logro->setDisciplina($_SESSION['disciplina']);
				$logro->setDescripcion($_SESSION['descripcion']);
				$logro->setResultado($_POST['posicion']);
				$logro->setObservacion($_POST['obs']);


				$evento->guargarPuente();
				$evento->guardarA();
				$logro->guardarLogro();
				$_SESSION['catapart'] = $evento->consdetparticipante();
				header("Location: ../Vista/evento/evento3.php?accion=ver_detalles&id=".$id);



			}


					
		}
		break;
	}
	case "registro":
	{
		$m=$evento->selecmax();	
		$evento->setId_evento($m[0][0]);
		$datos = $evento->consDetdisciplina1();
		$_SESSION['modieven3'] = $datos;
		$_SESSION['catapart'] = $evento->consdetparticipante();
		header("Location: ../Vista/evento/evento3.php?accion=ver_detalles&id=".$id);
		

		break;
	}
	case "eliminar":
	{
		$evento->setId($_GET['id']);
		$evento->setId_evento($_GET['evento']);
		$evento->setId_atleta($_GET['atleta']);
		$_SESSION['act']=$_SESSION['act']-1;
		$evento->setActual($_SESSION['act']);		
		$evento->guardarA();
		$evento->deleteById1($id);
		$evento->deletetodo();
		$_SESSION['catapart'] = $evento->consdetparticipante();
		header("Location: ../Vista/evento/evento3.php?accion=ver_detalles");		
		break;	
	}
	case 'seleccionar':
	{
		$evento->setId($_GET['id']);
		$datos = $evento->getById($id);
		$_SESSION['modieven2'] = $datos;
		header("Location: ../Vista/evento/evento2.php?accion=ver_detalles&id=".$id);	
		break;	
	}

	case 'seleccionar1':
	{
		$evento->setId_evento($_GET['id']);
		$_SESSION['evento'] = $evento->getId_evento();
		$evento->setMaxpo($_GET['max']);
		$_SESSION['total']=$evento->getMaxpo();
		$evento->setCanti($_GET['can']);
		$_SESSION['canti']=$evento->getCanti();
		$evento->setParti($_GET['par']);
		$_SESSION['parti']=$evento->getParti();


		$datos = $evento->consDetdisciplina1();
		$_SESSION['modieven3'] = $datos;
		$_SESSION['catapart'] = $evento->consdetparticipante();
		$x=$evento->buscaActual();
		$_SESSION['act']=$x[0][0];
		$q=$evento->buscaCiudad();
		$_SESSION['ciudad']=$q[0][0];
		$w=$evento->buscaDisciplina();
		$_SESSION['disciplina']=$w[0][0];
		$e=$evento->buscaDescripcion();
		$_SESSION['descripcion']=$e[0][0];
		header("Location: ../Vista/evento/evento3.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
		{
			if(isset($_REQUEST['BtModificar']))
			{
				$evento->setId($_GET['id']);
				$x = strtoupper($_POST['nombre']);
				$y = strtoupper($_POST['descripcion']);
				$evento->setNombre($x);
				$evento->setFecha_Inicio($_POST['fecha_inicio']);
				$evento->setFecha_Cierre($_POST['fecha_cierre']);
				$evento->setDescripcion($y);
				$evento->setId_municipio($_POST['id_municipio']);
				$evento->setId_parroquia($_POST['id_parroquia']);
				$evento->setParti($_POST['parti']);
				$equipos=$evento->getParti();
				$evento->setCanti($_POST['canti']);
				$cantidad=$evento->getCanti();
				$_SESSION['total']=$cantidad/$equipos;
				$evento->setMaxpo($_SESSION['total']);

				$todo=$evento->consultarTodo();
				$ah= count($todo);
				if ($ah>$cantidad) {
					echo "<script>alert('existen mas atletas registrados en este evento que el maximo indicado')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/evento/evento2.php?accion=actualizar'>";
					break;
				}

				for ($i=1;$i<=$_SESSION['total'];$i++) {
					$evento->setPosicion($i);
					$algo=$evento->consultaPosicionmodi();					
					$k=count($algo);
					if ($k>$equipos) {
						echo "<script>alert('existen equipos con mas integrantes que los que esta indicando')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/evento/evento2.php?accion=actualizar'>";
						break 2;
					}
				}

				if ($cantidad%$equipos!=0) {
						echo "<script>alert('no coinciden el maximo de participantes con los participantes por equipo')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/evento/evento2.php?accion=actualizar'>";
						break;
				}


				$evento->modificarEvento($id);
				header("Location: ../Vista/evento/evento2.php?accion=actualizar");

			}
			break;
		}
}
ob_end_flush();
?>