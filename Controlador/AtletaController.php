<?php
session_start();
require_once("../Modelo/atleta.php");
require_once("../Modelo/nivel.php");
require_once("../Modelo/municipio.php");
require_once("../Modelo/parroquia.php");
require_once("../Modelo/banco.php");
require_once("../Modelo/datosl.php");
require_once("../Modelo/cuenta.php");
require_once("../Modelo/alergia.php");
require_once("../Modelo/discapacidad.php");
require_once("../Modelo/disciplina.php");
require_once("../Modelo/modalidades.php");
require_once("../Modelo/estatu.php");
require_once("../Modelo/atleta.php");
require_once("../Modelo/calzado.php");
require_once("../Modelo/talla.php");








$atleta = new Atleta();
$nivel = new Nivel();
$municipio = new Municipio();
$parroquia = new Parroquia();
$datosl = new Datosl();
$cuenta= new Cuenta();
$banco= new Banco();
$alergia= new Alergia();
$discapacidad= new Discapacidad();
$modalidad= new Modalidad();
$disciplina= new Disciplina();
$estatu= new Estatu();
$calzado= new Calzado();
$talla= new Talla();








$atleta->setTabla("atleta");
$nivel->setTabla("nivels");
$municipio->setTabla("municipio");
$parroquia->setTabla("parroquia");
$datosl->setTabla("datoll");
$cuenta->setTabla("cuenta");
$banco->setTabla("bancos");
$alergia->setTabla("alergias");
$discapacidad->setTabla("discapacidades");
$disciplina->setTabla("disciplinas");
$modalidad->setTabla("modalidades");
$estatu->setTabla("estatus");
$calzado->setTabla("calzados");
$talla->setTabla("tallas");





switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$n = $nivel->getAll($tab);
		$_SESSION['nivel'] = $n;
		
		header("Location: ../Vista/atleta/datosp.php?accion=actual");
		break;
	}

	case "buscatodos1":
	{
		
		$todos = $atleta->getAllAtleta($tab);
		$_SESSION['cataatle'] = $todos;
		$n = $nivel->getAll($tab);
		$_SESSION['nivel'] = $n;
		
		header("Location: ../Vista/atleta/consultaatleta.php?accion=actual");
		break;
	}

	case "buscatodos2":
	{
		
		$todos = $atleta->getAllAtletai($tab);
		$_SESSION['cataatle1'] = $todos;

		
		header("Location: ../Vista/atleta/consultaatleta1.php?accion=actual");
		break;
	}

	

	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$nom = strtoupper($_POST['nombre']);
			$ape = strtoupper($_POST['apellido']);
			$atleta->setCedula($_POST['cedula']);
			$atleta->setNac($_POST['nacio']);
			$atleta->setNombre($nom);
			$atleta->setApellido($ape);
			$atleta->setF_nac($_POST['f_nac']);
			$atleta->setTipos($_POST['tipos']);
			$atleta->setEstadoc($_POST['estadoc']);
			$atleta->setSexo($_POST['sexo']);
			$atleta->setId_nivel($_POST['id_nivel']);

			$at=$atleta->todoslosatletas();
			$t= count($at);
			$ced=$atleta->getCedula();
			for ($i=0;$i<=$t;$i++) {
				if ($ced==$at[$i][0]) {
					echo "<script>alert('el atleta ya esta registrado')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/atleta/consultaatleta.php?accion=actualizar'>"; 

					break 2;
				}
			}





			$atleta->guardarAtleta();


			$s=$datosl->selecmax();
			$datosl->setId_Atleta($s[0][0]);
			$datosl->guardarDatos();

			$cuenta->setId_Atleta($s[0][0]);
			$cuenta->guardarCuenta();

			$atleta->setId($s[0][0]);

			$datos1 = $atleta->getById($id);
			$_SESSION['indumentaria'] = $datos1;
			$muni=$talla->getAll($tab);
			$_SESSION['talla'] = $muni;	
			$cal = $calzado->getAll($tab);
			$_SESSION['calzado1'] = $cal;
			header("Location: ../Vista/atleta/indumentaria.php?accion=ver_detalles&id=".$id);		
		}
		break;
	}
	case "eliminar":
	{
		$atleta->setId($_GET['id']);
		$atleta->updateestado();
		header("Location: ../Vista/atleta/consultaatleta.php?accion=actualizar");		
		break;	
	}
	case "reactivar":
	{
		$atleta->setId($_GET['id']);
		$atleta->updateestado1();
		header("Location: ../Vista/atleta/consultaatleta1.php?accion=actualizar");		
		break;	
	}

	case "eliminardisca":
	{
		
		$atleta->setId($_GET['id']);
		$atleta->deletedisca();
		$atleta->setId_atleta($_GET['atleta']);
		$_SESSION['catadisca1'] = $atleta->consdetDiscapacidad();
		header("Location: ../Vista/atleta/datosdiscapacidad.php?accion=ver_detalles");		
		break;	
	}

	case "eliminarAlergia":
	{
		
		$atleta->setId($_GET['id']);
		$atleta->deleteAlergia($id);
		$atleta->setId_atleta($_GET['atleta']);
		$_SESSION['catalergia1'] = $atleta->consdetAlergia();
		header("Location: ../Vista/atleta/datosalergia.php?accion=ver_detalles");		
		break;	
	}

	case "eliminarDisciplina":
	{
		
		$atleta->setId($_GET['id']);
		$atleta->deleteDisciplina();
		$atleta->setId_atleta($_GET['atleta']);
		$_SESSION['catadisci1'] = $atleta->consdetDisciplina();
		header("Location: ../Vista/atleta/datosdisciplina.php?accion=ver_detalles");			
		break;	
	}

	case 'seleccionar':
	{
		$atleta->setId($_GET['id']);
		$datos = $atleta->getById($id);
		$_SESSION['datosp'] = $datos;
		$n = $nivel->getAll($tab);
		$_SESSION['nivel1'] = $n;
		header("Location: ../Vista/atleta/datosp.php?accion=ver_detalles&id=".$id);	
		break;	
	}

	case 'seleccionarEstatus':
	{
		$atleta->setId($_GET['id']);
		$datos = $atleta->getEstatus();
		$_SESSION['modiestatus'] = $datos;
		$est = $estatu->getAll($tab);
		$_SESSION['estatus'] = $est;

		header("Location: ../Vista/atleta/categoria.php?accion=ver_detalles&id=".$id);	
		break;	
	}


	case 'modificar':
	{
		
			$atleta->setId($_GET['id']);
			$nom = strtoupper($_POST['nombre']);
			$ape = strtoupper($_POST['apellido']);
			$atleta->setNac($_POST['nacio']);
			$atleta->setCedula($_POST['cedula']);
			$atleta->setNombre($nom);
			$atleta->setApellido($ape);
			$atleta->setF_nac($_POST['f_nac']);
			$atleta->setTipos($_POST['tipos']);
			$atleta->setEstadoc($_POST['estadoc']);
			$atleta->setSexo($_POST['sexo']);
			$atleta->setId_nivel($_POST['id_nivel']);
			$atleta->modificarDatosp();
			if(isset($_REQUEST['BtModificar']))
			{
				$datos1 = $atleta->getById($id);
				$_SESSION['datosc'] = $datos1;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio2'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia2'] = $parr;
				header("Location: ../Vista/atleta/datosc.php?accion=ver_detalles&id=".$id);

			}
			if(isset($_REQUEST['DatosL']))
			{
				$datosl->setId_atleta($_GET['id']);
				$datos1 = $datosl->getByIdDatos();
				$_SESSION['datosl'] = $datos1;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio3'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia3'] = $parr;
	
				header("Location: ../Vista/atleta/datosl.php?accion=ver_detalles&id=".$id);
			}

			if(isset($_REQUEST['DatosB']))
			{
				$cuenta->setId_atleta($_GET['id']);
				$datosc = $cuenta->getByIdCuenta();
				$_SESSION['datosb'] = $datosc;
				$banc = $banco->getAll($tab);
				$_SESSION['banco1'] = $banc;

			header("Location: ../Vista/atleta/datosb.php?accion=ver_detalles&id_atleta=".$id_atleta);
			}

			if(isset($_REQUEST['Alergias']))
			{
				$ale = $alergia->getAll($tab);
				$_SESSION['alergia1'] = $ale;
				
				$atleta->setId_atleta($_GET['id']);
				
				$_SESSION['catalergia1'] = $atleta->consdetAlergia();
				$atleta->setId($_GET['id']);
				$datos = $atleta->getById($id);
				$_SESSION['id_atleta'] = $datos;
				
			header("Location: ../Vista/atleta/datosalergia.php?accion=ver_detalles&id=".$id);
			}

			if(isset($_REQUEST['Discapacidades']))
			{
				$atleta->setId_atleta($_GET['id']);
				$atleta->setId($_GET['id']);
				$datos = $atleta->getById($id);
				$_SESSION['modiusu'] = $datos;
				
				$_SESSION['catadisca1'] = $atleta->consdetDiscapacidad();
				$dis = $discapacidad->getAll($tab);
				$_SESSION['discapacidad1'] = $dis;
				
				header("Location: ../Vista/atleta/datosdiscapacidad.php?accion=ver_detalles");
			}

			if(isset($_REQUEST['Disciplinas']))
			{
				$atleta->setId_atleta($_GET['id']);
				$atleta->setId($_GET['id']);
				$datos = $atleta->getById($id);
				$_SESSION['modidisciplinas'] = $datos;
				$mod = $modalidad->getAll($tab);
				$_SESSION['modalidad1'] = $mod;
				$dis = $disciplina->getAll($tab);
				$_SESSION['disciplina1'] = $dis;
				$est = $estatu->getAll($tab);
				$_SESSION['estatus1'] = $est;
				$_SESSION['catadisci1'] = $atleta->consdetDisciplina();

			header("Location: ../Vista/atleta/datosdisciplina.php?accion=ver_detalles");
			}
			if(isset($_REQUEST['Indumentaria']))
			{
				$datos1 = $atleta->getById($id);
				$_SESSION['indumentaria'] = $datos1;
				$muni=$talla->getAll($tab);
				$_SESSION['talla'] = $muni;	
				$cal = $calzado->getAll($tab);
				$_SESSION['calzado1'] = $cal;
				header("Location: ../Vista/atleta/indumentaria.php?accion=ver_detalles&id=".$id);

			}
		
		break;
	}





	case "registrardisca":
	{
		

		if(isset($_REQUEST['BtRegistrar1']))
		{
			
			$atleta->setId_atleta($_POST['id_atleta']);
			$atleta->setId_discapacidad($_POST['id_discapacidad']);

			$asd=$atleta->detdiscapacidad();
			$t= count($asd);
			$idd=$atleta->getId_discapacidad();

			for ($i=0;$i<=$t;$i++) {
				if ($idd==$asd[$i][0]) {
					$_SESSION['catadisca1'] = $atleta->consdetDiscapacidad();
					echo "<script>alert('este atleta ya tiene registrada esta discapacidad')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/atleta/datosdiscapacidad.php?accion=ver_detalles'>"; 

					break 2;
				}
			}




			$atleta->guardarPuente1();
			$_SESSION['catadisca1'] = $atleta->consdetDiscapacidad();

			

			
			header("Location: ../Vista/atleta/datosdiscapacidad.php?accion=ver_detalles");			
		}
		if(isset($_REQUEST['BtModificar']))
			{

				$datosl->setId_atleta($_POST['id_atleta']);
				$datos1 = $datosl->getByIdDatos();
				$_SESSION['datosl'] = $datos1;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio3'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia3'] = $parr;

				header("Location: ../Vista/atleta/datosl.php?accion=ver_detalles&id=".$id);
			}
			
			if(isset($_REQUEST['DatosL']))
			{
				$datosl->setId_atleta($_GET['id']);
				$datos1 = $datosl->getByIdDatos();
				$_SESSION['datosl'] = $datos1;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio3'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia3'] = $parr;
	
				header("Location: ../Vista/atleta/datosl.php?accion=ver_detalles&id=".$id);
			}

			if(isset($_REQUEST['Personal']))
			{
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['datosp'] = $datos;
				$n = $nivel->getAll($tab);
				$_SESSION['nivel1'] = $n;
				header("Location: ../Vista/atleta/datosp.php?accion=ver_detalles&id=".$id);	
			}

			if(isset($_REQUEST['DatosB']))
			{
				$cuenta->setId_atleta($_POST['id_atleta']);
				$datosc = $cuenta->getByIdCuenta();
				$_SESSION['datosb'] = $datosc;
				$banc = $banco->getAll($tab);
				$_SESSION['banco1'] = $banc;

				header("Location: ../Vista/atleta/datosb.php?accion=ver_detalles&id_atleta=".$id_atleta);
			}

			if(isset($_REQUEST['Alergias']))
			{
				$ale = $alergia->getAll($tab);
				$_SESSION['alergia1'] = $ale;
				
				$atleta->setId_atleta($_POST['id_atleta']);
				
				$_SESSION['catalergia1'] = $atleta->consdetAlergia();
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['id_atleta'] = $datos;
				
			header("Location: ../Vista/atleta/datosalergia.php?accion=ver_detalles&id=".$id);
			}
			if(isset($_REQUEST['Discapacidades']))
			{
				$atleta->setId_atleta($_POST['id_atleta']);
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['modiusu'] = $datos;
				
				$_SESSION['catadisca1'] = $atleta->consdetDiscapacidad();
				$dis = $discapacidad->getAll($tab);
				$_SESSION['discapacidad1'] = $dis;
				
				header("Location: ../Vista/atleta/datosdiscapacidad.php?accion=ver_detalles");
			}

			if(isset($_REQUEST['Disciplinas']))
			{
				$atleta->setId_atleta($_POST['id_atleta']);
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['modidisciplinas'] = $datos;
				$mod = $modalidad->getAll($tab);
				$_SESSION['modalidad1'] = $mod;
				$dis = $disciplina->getAll($tab);
				$_SESSION['disciplina1'] = $dis;
				$est = $estatu->getAll($tab);
				$_SESSION['estatus1'] = $est;
				$_SESSION['catadisci1'] = $atleta->consdetDisciplina();

			header("Location: ../Vista/atleta/datosdisciplina.php?accion=ver_detalles");
			}
			if(isset($_REQUEST['contacto']))
			{
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['datosc'] = $datos;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio2'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia2'] = $parr;
				header("Location: ../Vista/atleta/datosc.php?accion=ver_detalles&id=".$id);

			}
			if(isset($_REQUEST['Indumentaria']))
			{
				$atleta->setId($_POST['id_atleta']);
				$datos1 = $atleta->getById($id);
				$_SESSION['indumentaria'] = $datos1;
				$muni=$talla->getAll($tab);
				$_SESSION['talla'] = $muni;	
				$cal = $calzado->getAll($tab);
				$_SESSION['calzado1'] = $cal;
				header("Location: ../Vista/atleta/indumentaria.php?accion=ver_detalles&id=".$id);

			}
		break;
}

case "registrarAlergia":
	{
		
		if(isset($_REQUEST['BtRegistrar1']))
		{
			
		

			$atleta->setId_atleta($_POST['id_atleta']);
			$atleta->setId_alergia($_POST['id_alergia']);

			$asd=$atleta->detalergias();
			$t= count($asd);
			$ida=$atleta->getId_alergia();

			for ($i=0;$i<=$t;$i++) {
				if ($ida==$asd[$i][0]) {
					$_SESSION['catalergia1'] = $atleta->consdetAlergia();
					echo "<script>alert('este atleta ya tiene registrada esta alergia')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/atleta/datosalergia.php?accion=ver_detalles'>"; 

					break 2;


				}
			}





			$atleta->guardarPuente();
			$_SESSION['catalergia1'] = $atleta->consdetAlergia();

			

			
			header("Location: ../Vista/atleta/datosalergia.php?accion=ver_detalles");			
		}
		if(isset($_REQUEST['BtModificar']))
			{

				$datosl->setId_atleta($_POST['id_atleta']);
				$datos1 = $datosl->getByIdDatos();
				$_SESSION['datosl'] = $datos1;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio3'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia3'] = $parr;

				header("Location: ../Vista/atleta/datosl.php?accion=ver_detalles&id=".$id);
			}
			
			if(isset($_REQUEST['DatosL']))
			{
				$datosl->setId_atleta($_GET['id']);
				$datos1 = $datosl->getByIdDatos();
				$_SESSION['datosl'] = $datos1;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio3'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia3'] = $parr;
	
				header("Location: ../Vista/atleta/datosl.php?accion=ver_detalles&id=".$id);
			}

			if(isset($_REQUEST['Personal']))
			{
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['datosp'] = $datos;
				$n = $nivel->getAll($tab);
				$_SESSION['nivel1'] = $n;
				header("Location: ../Vista/atleta/datosp.php?accion=ver_detalles&id=".$id);	
			}

			if(isset($_REQUEST['DatosB']))
			{
				$cuenta->setId_atleta($_POST['id_atleta']);
				$datosc = $cuenta->getByIdCuenta();
				$_SESSION['datosb'] = $datosc;
				$banc = $banco->getAll($tab);
				$_SESSION['banco1'] = $banc;

			header("Location: ../Vista/atleta/datosb.php?accion=ver_detalles&id_atleta=".$id_atleta);
			}

			if(isset($_REQUEST['Alergias']))
			{
				$ale = $alergia->getAll($tab);
				$_SESSION['alergia1'] = $ale;
				
				$atleta->setId_atleta($_POST['id_atleta']);
				
				$_SESSION['catalergia1'] = $atleta->consdetAlergia();
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['id_atleta'] = $datos;
				
			header("Location: ../Vista/atleta/datosalergia.php?accion=ver_detalles&id=".$id);
			}
			if(isset($_REQUEST['Discapacidades']))
			{
				$atleta->setId_atleta($_POST['id_atleta']);
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['modiusu'] = $datos;
				
				$_SESSION['catadisca1'] = $atleta->consdetDiscapacidad();
				$dis = $discapacidad->getAll($tab);
				$_SESSION['discapacidad1'] = $dis;
				
				header("Location: ../Vista/atleta/datosdiscapacidad.php?accion=ver_detalles");
			}

			if(isset($_REQUEST['Disciplinas']))
			{
				$atleta->setId_atleta($_POST['id_atleta']);
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['modidisciplinas'] = $datos;
				$mod = $modalidad->getAll($tab);
				$_SESSION['modalidad1'] = $mod;
				$dis = $disciplina->getAll($tab);
				$_SESSION['disciplina1'] = $dis;
				$est = $estatu->getAll($tab);
				$_SESSION['estatus1'] = $est;
				$_SESSION['catadisci1'] = $atleta->consdetDisciplina();

			header("Location: ../Vista/atleta/datosdisciplina.php?accion=ver_detalles");
			}
			if(isset($_REQUEST['contacto']))
			{
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['datosc'] = $datos;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio2'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia2'] = $parr;
				header("Location: ../Vista/atleta/datosc.php?accion=ver_detalles&id=".$id);

			}
			if(isset($_REQUEST['Indumentaria']))
			{
				$atleta->setId($_POST['id_atleta']);
				$datos1 = $atleta->getById($id);
				$_SESSION['indumentaria'] = $datos1;
				$muni=$talla->getAll($tab);
				$_SESSION['talla'] = $muni;	
				$cal = $calzado->getAll($tab);
				$_SESSION['calzado1'] = $cal;
				header("Location: ../Vista/atleta/indumentaria.php?accion=ver_detalles&id=".$id);

			}


		break;
	}

	case "registrarDisciplina":
	{
		
		if(isset($_REQUEST['BtRegistrar1']))
		{
		
			$atleta->setId_atleta($_POST['id_atleta']);
			$atleta->setId_disciplina($_POST['id_disciplina']);
			$atleta->setId_modalidad($_POST['id_modalidad']);
			$atleta->setId_estatus($_POST['id_estatus']);

			$asd=$atleta->detdisciplinas();
			$t= count($asd);
			$idd=$atleta->getId_modalidad();

			for ($i=0;$i<=$t;$i++) {
				if ($idd==$asd[$i][0]) {
					$_SESSION['catadisci1'] = $atleta->consdetDisciplina();

					echo "<script>alert('este atleta ya tiene registrada esta modalidad')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/atleta/datosdisciplina.php?accion=ver_detalles'>"; 
					break 2;

				}
			}

			$atleta->guardarPuente2();
			$_SESSION['catadisci1'] = $atleta->consdetDisciplina();

			header("Location: ../Vista/atleta/datosdisciplina.php?accion=ver_detalles");			
		}
		if(isset($_REQUEST['BtModificar']))
			{

				$datosl->setId_atleta($_POST['id_atleta']);
				$datos1 = $datosl->getByIdDatos();
				$_SESSION['datosl'] = $datos1;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio3'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia3'] = $parr;

				header("Location: ../Vista/atleta/datosl.php?accion=ver_detalles&id=".$id);
			}
			
			if(isset($_REQUEST['DatosL']))
			{
				$datosl->setId_atleta($_GET['id']);
				$datos1 = $datosl->getByIdDatos();
				$_SESSION['datosl'] = $datos1;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio3'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia3'] = $parr;
	
				header("Location: ../Vista/atleta/datosl.php?accion=ver_detalles&id=".$id);
			}

			if(isset($_REQUEST['Personal']))
			{
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['datosp'] = $datos;
				$n = $nivel->getAll($tab);
				$_SESSION['nivel1'] = $n;
				header("Location: ../Vista/atleta/datosp.php?accion=ver_detalles&id=".$id);	
			}

			if(isset($_REQUEST['DatosB']))
			{
				$cuenta->setId_atleta($_POST['id_atleta']);
				$datosc = $cuenta->getByIdCuenta();
				$_SESSION['datosb'] = $datosc;
				$banc = $banco->getAll($tab);
				$_SESSION['banco1'] = $banc;

			header("Location: ../Vista/atleta/datosb.php?accion=ver_detalles&id_atleta=".$id_atleta);
			}

			if(isset($_REQUEST['Alergias']))
			{
				$ale = $alergia->getAll($tab);
				$_SESSION['alergia1'] = $ale;
				
				$atleta->setId_atleta($_POST['id_atleta']);
				
				$_SESSION['catalergia1'] = $atleta->consdetAlergia();
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['id_atleta'] = $datos;
				
			header("Location: ../Vista/atleta/datosalergia.php?accion=ver_detalles&id=".$id);
			}
			if(isset($_REQUEST['Discapacidades']))
			{
				$atleta->setId_atleta($_POST['id_atleta']);
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['modiusu'] = $datos;
				
				$_SESSION['catadisca1'] = $atleta->consdetDiscapacidad();
				$dis = $discapacidad->getAll($tab);
				$_SESSION['discapacidad1'] = $dis;
				
				header("Location: ../Vista/atleta/datosdiscapacidad.php?accion=ver_detalles");
			}

			if(isset($_REQUEST['Disciplinas']))
			{
				$atleta->setId_atleta($_POST['id_atleta']);
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['modidisciplinas'] = $datos;
				$mod = $modalidad->getAll($tab);
				$_SESSION['modalidad1'] = $mod;
				$dis = $disciplina->getAll($tab);
				$_SESSION['disciplina1'] = $dis;
				$est = $estatu->getAll($tab);
				$_SESSION['estatus1'] = $est;
				$_SESSION['catadisci1'] = $atleta->consdetDisciplina();

			header("Location: ../Vista/atleta/datosdisciplina.php?accion=ver_detalles");
			}
			if(isset($_REQUEST['contacto']))
			{
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['datosc'] = $datos;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio2'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia2'] = $parr;
				header("Location: ../Vista/atleta/datosc.php?accion=ver_detalles&id=".$id);

			}
			if(isset($_REQUEST['Indumentaria']))
			{
				$atleta->setId($_POST['id_atleta']);
				$datos1 = $atleta->getById($id);
				$_SESSION['indumentaria'] = $datos1;
				$muni=$talla->getAll($tab);
				$_SESSION['talla'] = $muni;	
				$cal = $calzado->getAll($tab);
				$_SESSION['calzado1'] = $cal;
				header("Location: ../Vista/atleta/indumentaria.php?accion=ver_detalles&id=".$id);

			}
		break;
	}

	case 'modificarEstatus':
	{
			if(isset($_REQUEST['BtModificar']))
			{
				$atleta->setId($_GET['id']);
				$atleta->setId_estatus($_POST['id_estatus']);
				$atleta->modificarEstatus();
				header("Location: ../Vista/atleta/consultaatleta.php?accion=actualizar");
			}
			break;
	}
	case 'modificarContacto':
		{
			
				$atleta->setId($_GET['id']);
				$corr = strtoupper($_POST['correo']);
				$dire = strtoupper($_POST['direccion']);
				$atleta->setCorreo($corr);
				$atleta->setN_tel($_POST['n_tel']);
				$atleta->setN_eme($_POST['n_eme']);
				$atleta->setId_municipio($_POST['id_municipio']);
				$atleta->setId_parroquia($_POST['id_parroquia']);
				$atleta->setDireccion($dire);
				$atleta->agregardatosc();
	
				if(isset($_REQUEST['BtModificar']))
				{
	
					$datosl->setId_atleta($_GET['id']);
					$datos1 = $datosl->getByIdDatos();
					$_SESSION['datosl'] = $datos1;
					$muni=$municipio->getAll($tab);
					$_SESSION['municipio3'] = $muni;	
					$parr = $parroquia->getAll($tab);
					$_SESSION['parroquia3'] = $parr;
	
					header("Location: ../Vista/atleta/datosl.php?accion=ver_detalles&id=".$id);
				}
	
				if(isset($_REQUEST['Personal']))
				{
					$atleta->setId($_GET['id']);
					$datos = $atleta->getById($id);
					$_SESSION['datosp'] = $datos;
					$n = $nivel->getAll($tab);
					$_SESSION['nivel1'] = $n;
					header("Location: ../Vista/atleta/datosp.php?accion=ver_detalles&id=".$id);	
				}
	
				if(isset($_REQUEST['DatosB']))
				{
					$cuenta->setId_atleta($_GET['id']);
					$datosc = $cuenta->getByIdCuenta();
					$_SESSION['datosb'] = $datosc;
					$banc = $banco->getAll($tab);
					$_SESSION['banco1'] = $banc;
	
				header("Location: ../Vista/atleta/datosb.php?accion=ver_detalles&id_atleta=".$id_atleta);
				}
	
				if(isset($_REQUEST['Alergias']))
				{
					$ale = $alergia->getAll($tab);
					$_SESSION['alergia1'] = $ale;
					
					$atleta->setId_atleta($_GET['id']);
					
					$_SESSION['catalergia1'] = $atleta->consdetAlergia();
					$atleta->setId($_GET['id']);
					$datos = $atleta->getById($id);
					$_SESSION['id_atleta'] = $datos;
					
				header("Location: ../Vista/atleta/datosalergia.php?accion=ver_detalles&id=".$id);
				}
				if(isset($_REQUEST['Discapacidades']))
				{
					$atleta->setId_atleta($_GET['id']);
					$atleta->setId($_GET['id']);
					$datos = $atleta->getById($id);
					$_SESSION['modiusu'] = $datos;
					
					$_SESSION['catadisca1'] = $atleta->consdetDiscapacidad();
					$dis = $discapacidad->getAll($tab);
					$_SESSION['discapacidad1'] = $dis;
					
					header("Location: ../Vista/atleta/datosdiscapacidad.php?accion=ver_detalles");
				}
	
				if(isset($_REQUEST['Disciplinas']))
				{
					$atleta->setId_atleta($_GET['id']);
					$atleta->setId($_GET['id']);
					$datos = $atleta->getById($id);
					$_SESSION['modidisciplinas'] = $datos;
					$mod = $modalidad->getAll($tab);
					$_SESSION['modalidad1'] = $mod;
					$dis = $disciplina->getAll($tab);
					$_SESSION['disciplina1'] = $dis;
					$est = $estatu->getAll($tab);
					$_SESSION['estatus1'] = $est;
					$_SESSION['catadisci1'] = $atleta->consdetDisciplina();
	
				header("Location: ../Vista/atleta/datosdisciplina.php?accion=ver_detalles");
				}
				if(isset($_REQUEST['Indumentaria']))
				{
					$datos1 = $atleta->getById($id);
					$_SESSION['indumentaria'] = $datos1;
					$muni=$talla->getAll($tab);
					$_SESSION['talla'] = $muni;	
					$cal = $calzado->getAll($tab);
					$_SESSION['calzado1'] = $cal;
					header("Location: ../Vista/atleta/indumentaria.php?accion=ver_detalles&id=".$id);

				}
	
			
			break;
		}	

	case 'modificarIndumentaria':
		{
				
				$atleta->setId($_GET['id']);
				$atleta->setPeso($_POST['peso']);
				$atleta->setAltura($_POST['altura']);
				$atleta->setId_talla($_POST['id_talla']);
				$atleta->setId_calzado($_POST['id_calzado']);
				$atleta->setMano($_POST['mano']);
				$atleta->modificarIndumentaria();

				if(isset($_REQUEST['BtModificar']))
				{
	
					$datosl->setId_atleta($_GET['id']);
					$datos1 = $datosl->getByIdDatos();
					$_SESSION['datosl'] = $datos1;
					$muni=$municipio->getAll($tab);
					$_SESSION['municipio3'] = $muni;	
					$parr = $parroquia->getAll($tab);
					$_SESSION['parroquia3'] = $parr;
	
					header("Location: ../Vista/atleta/datosl.php?accion=ver_detalles&id=".$id);
				}
	
				if(isset($_REQUEST['Personal']))
				{
					$atleta->setId($_GET['id']);
					$datos = $atleta->getById($id);
					$_SESSION['datosp'] = $datos;
					$n = $nivel->getAll($tab);
					$_SESSION['nivel1'] = $n;
					header("Location: ../Vista/atleta/datosp.php?accion=ver_detalles&id=".$id);	
				}
	
				if(isset($_REQUEST['DatosB']))
				{
					$cuenta->setId_atleta($_GET['id']);
					$datosc = $cuenta->getByIdCuenta();
					$_SESSION['datosb'] = $datosc;
					$banc = $banco->getAll($tab);
					$_SESSION['banco1'] = $banc;
	
					header("Location: ../Vista/atleta/datosb.php?accion=ver_detalles&id_atleta=".$id_atleta);
				}
	
				if(isset($_REQUEST['Alergias']))
				{
					$ale = $alergia->getAll($tab);
					$_SESSION['alergia1'] = $ale;
					
					$atleta->setId_atleta($_GET['id']);
					
					$_SESSION['catalergia1'] = $atleta->consdetAlergia();
					$atleta->setId($_GET['id']);
					$datos = $atleta->getById($id);
					$_SESSION['id_atleta'] = $datos;
					
				header("Location: ../Vista/atleta/datosalergia.php?accion=ver_detalles&id=".$id);
				}
				if(isset($_REQUEST['Discapacidades']))
				{
					$atleta->setId_atleta($_GET['id']);
					$atleta->setId($_GET['id']);
					$datos = $atleta->getById($id);
					$_SESSION['modiusu'] = $datos;
					
					$_SESSION['catadisca1'] = $atleta->consdetDiscapacidad();
					$dis = $discapacidad->getAll($tab);
					$_SESSION['discapacidad1'] = $dis;
					
					header("Location: ../Vista/atleta/datosdiscapacidad.php?accion=ver_detalles");
				}
	
				if(isset($_REQUEST['Disciplinas']))
				{
					$atleta->setId_atleta($_GET['id']);
					$atleta->setId($_GET['id']);
					$datos = $atleta->getById($id);
					$_SESSION['modidisciplinas'] = $datos;
					$mod = $modalidad->getAll($tab);
					$_SESSION['modalidad1'] = $mod;
					$dis = $disciplina->getAll($tab);
					$_SESSION['disciplina1'] = $dis;
					$est = $estatu->getAll($tab);
					$_SESSION['estatus1'] = $est;
					$_SESSION['catadisci1'] = $atleta->consdetDisciplina();
	
				header("Location: ../Vista/atleta/datosdisciplina.php?accion=ver_detalles");
				}

				if(isset($_REQUEST['contacto']))
				{
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['datosc'] = $datos;
				$muni=$municipio->getAll($tab);
				$_SESSION['municipio2'] = $muni;	
				$parr = $parroquia->getAll($tab);
				$_SESSION['parroquia2'] = $parr;
				header("Location: ../Vista/atleta/datosc.php?accion=ver_detalles&id=".$id);

				}
				break;
		}
}
?>