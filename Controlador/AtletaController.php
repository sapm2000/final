<?php
session_start();
ob_start();
require_once("../Modelo/atleta.php");
require_once("../Modelo/nivel.php");
require_once("../Modelo/municipio.php");
require_once("../Modelo/parroquia.php");
require_once("../Modelo/banco.php");
require_once("../Modelo/datosl.php");
require_once("../Modelo/cuenta.php");
require_once("../Modelo/registro_medico.php");
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
$registro_medico= new Registro_medico();
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
$registro_medico->setTabla("registro_medicos");
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

	case "buscatallas":
	{
		$n = $talla->getAll($tab);
		$_SESSION['talla'] = $n;
		
		header("Location: ../Vista/atleta/filtrotalla.php?accion=actual");
		break;
	}

	case "buscamunicipios":
	{
		$n = $municipio->getAll($tab);
		$_SESSION['municipio'] = $n;
		
		header("Location: ../Vista/atleta/filtromunicipio.php?accion=actual");
		break;
	}

	case "buscabancos":
	{
		$n = $banco->getAll($tab);
		$_SESSION['bancos1'] = $n;
		
		header("Location: ../Vista/atleta/filtrobancos.php?accion=actual");
		break;
	}

	case "buscadisciplinas":
	{
		$n = $disciplina->getAll($tab);
		$_SESSION['disciplin'] = $n;
		
		header("Location: ../Vista/atleta/filtrodisciplinas.php?accion=actual");
		break;
	}

	case "buscaestatus":
	{
		$n = $estatu->getAll($tab);
		$_SESSION['estatus'] = $n;
		
		header("Location: ../Vista/atleta/filtroestatus.php?accion=actual");
		break;
	}

	case "buscaparroquias":
	{
		$n = $municipio->getAll($tab);
		$_SESSION['municipio'] = $n;
		$d = $parroquia->getAll($tab);
		$_SESSION['parroquia'] = $d;
		
		header("Location: ../Vista/atleta/filtroparroquia.php?accion=actual");
		break;
	}
	case "buscamodalidades":
	{
		$n = $disciplina->getAll($tab);
		$_SESSION['disciplin'] = $n;
		$d = $modalidad->getAll($tab);
		$_SESSION['modalidad'] = $d;
		
		header("Location: ../Vista/atleta/filtromodalidad.php?accion=actual");
		break;
	}

	case "buscacalzado":
	{
		$n = $calzado->getAll($tab);
		$_SESSION['calzado'] = $n;
		
		header("Location: ../Vista/atleta/filtrocalzado.php?accion=actual");
		break;
	}

	case "buscatodos1":
	{
		$n = $nivel->getAll($tab);
		$_SESSION['nivel'] = $n;
		
		header("Location: ../Vista/atleta/filtronivel.php?accion=actual");
		break;
	}

	case "buscafiltros":
	{
		$n = $atleta->getDatosPersonales();
		$_SESSION['nivel10'] = $n;
		$_SESSION['titulo']='Reporte de Datos Personales de los Atletas';
		
		
		header("Location: ../Vista/atleta/reportedatospersonales.php?accion=actual");
		break;
	}
	case "buscafiltrosindumentaria":
	{
		$n = $atleta->getIndumentaria();
		$_SESSION['indumentaria'] = $n;
		$_SESSION['tallashombre'] = $atleta->cuentatallasshombre();
		$_SESSION['tallasmujer'] = $atleta->cuentatallassmujer();
		$_SESSION['calzadohombre'] = $atleta->cuentacalzadoshombre();
		$_SESSION['calzadomujer'] = $atleta->cuentacalzadosmujer();


		$_SESSION['titulo']='Reporte de Indumentaria de los Atletas';
		
		
		header("Location: ../Vista/atleta/reporteindumentaria.php?accion=actual");
		break;
	}

	case "buscafiltroslaboral":
	{
		$n = $atleta->getLlaboral();
		$_SESSION['laboral'] = $n;
		$_SESSION['titulo']='Reporte de Trabajo de los Atletas';
		
		
		header("Location: ../Vista/atleta/reportelaboral.php?accion=actual");
		break;
	}

	case "buscafiltrosmedico":
	{
		$n = $atleta->getMedico();
		$_SESSION['medico'] = $n;
		$_SESSION['titulo']='Reporte de Registro Médico de los Atletas';
		
		
		header("Location: ../Vista/atleta/reportemedico.php?accion=actual");
		break;
	}

	case "buscafiltrosdiscapacidad":
	{
		$n = $atleta->getDiscappacidades();
		$_SESSION['discapacidad'] = $n;
		$_SESSION['titulo']='Reporte de Discapacidades de los Atletas';
		
		
		header("Location: ../Vista/atleta/reportediscapacidad.php?accion=actual");
		break;
	}

	case "buscafiltroscontacto":
	{
		$n = $atleta->getContacto();
		$_SESSION['contacto'] = $n;
		$_SESSION['titulo']='Reporte de Contacto de los Atletas';
		
		
		header("Location: ../Vista/atleta/reportecontacto.php?accion=actual");
		break;
	}

	case "buscafiltrosbancos":
	{
		$n = $atleta->getBancario();
		$_SESSION['bancos'] = $n;

		$n = $atleta->getBancariototal();
		$_SESSION['total'] = $n;	
		$_SESSION['titulo']='Reporte de Datos Bancarios de los Atletas';
		
		
		header("Location: ../Vista/atleta/reportebancario.php?accion=actual");
		break;
	}

	case "buscafiltrosdisciplinas":
	{
		$_SESSION['titulo']='Reporte de Atletas por Disciplinas';

		$disc=$atleta->traeDisciplinas();
		$t=$atleta->cuentaDisciplina();
		$_SESSION['contador']=$t[0][0];
		for ($i=0;$i<=$t[0][0];$i++) {
			$atleta->setPrimer($disc[$i][0]);
			$_SESSION['ertitulo'.$i]=$atleta->getPrimer();

			$_SESSION['disc'.$i]=$atleta->detalledisciplinas();
			$p=$atleta->cuentapordisciplina();
			$_SESSION['cue'.$i]=count($p);
			 echo  $_SESSION['cue'.$i];

		}

		for ($i=0;$i<=$t[0][0];$i++) {
			$atleta->setPrimer($disc[$i][0]);
			$_SESSION['ertitulomujer'.$i]=$atleta->getPrimer();

			$_SESSION['discF'.$i]=$atleta->detalledisciplinasmujer();
			$o=$atleta->cuentapordisciplinamujer();
			$_SESSION['cueF'.$i]=count($o);
			

		}

		
		header("Location: ../Vista/atleta/reportedisciplinas.php?accion=actual");
		break;
	}

	

	case "buscatodos5":
	{
		
		$todos = $atleta->getAllAtleta($tab);
		$_SESSION['cataatle'] = $todos;
		$n = $nivel->getAll($tab);
		$_SESSION['nivel'] = $n;
		
		header("Location: ../Vista/atleta/consultaatleta.php?accion=actual");
		break;
	}

	case "buscatodosreporte":
	{
		
		$todos = $atleta->getAllAtleta($tab);
		$_SESSION['cataatle'] = $todos;
		$n = $nivel->getAll($tab);
		$_SESSION['nivel'] = $n;
		
		header("Location: ../Vista/atleta/atletareporte.php?accion=actual");
		break;
	}

	case "buscatodos2":
	{
		
		$todos = $atleta->getAllAtletai($tab);
		$_SESSION['cataatle1'] = $todos;

		
		header("Location: ../Vista/atleta/consultaatleta1.php?accion=actual");
		break;
	}

	case "buscatodos3":
	{
		
		$todos = $atleta->getAllAtletaglorioso($tab);
		$_SESSION['cataatle2'] = $todos;

		
		header("Location: ../Vista/atleta/consultaatleta2.php?accion=actual");
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

	case "eliminar1":
	{
		$atleta->setId($_GET['id']);
		$atleta->updateestado2();
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
	case "reactivar1":
	{
		$atleta->setId($_GET['id']);
		$atleta->updateestado1();
		header("Location: ../Vista/atleta/consultaatleta2.php?accion=actualizar");		
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

	case "eliminarRegistro_medico":
	{
		
		$atleta->setId($_GET['id']);
		$atleta->deleteRegistro_medico($id);
		$atleta->setId_atleta($_GET['atleta']);
		$_SESSION['catregistro_medico1'] = $atleta->consdetRegistro_medico();
		header("Location: ../Vista/atleta/datosregistro_medico.php?accion=ver_detalles");		
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
		$atleta->setId_atleta($_GET['atleta']);

		$_SESSION['id_atleta']=$atleta->getId_atleta();
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

			if(isset($_REQUEST['Registro_medicos']))
			{
				$ale = $registro_medico->getAll($tab);
				$_SESSION['registro_medico1'] = $ale;
				
				$atleta->setId_atleta($_GET['id']);
				
				$_SESSION['catregistro_medico1'] = $atleta->consdetRegistro_medico();
				$atleta->setId($_GET['id']);
				$datos = $atleta->getById($id);
				$_SESSION['id_atleta'] = $datos;
				
			header("Location: ../Vista/atleta/datosregistro_medico.php?accion=ver_detalles&id=".$id);
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

			if(isset($_REQUEST['Registro_medicos']))
			{
				$ale = $registro_medico->getAll($tab);
				$_SESSION['registro_medico1'] = $ale;
				
				$atleta->setId_atleta($_POST['id_atleta']);
				
				$_SESSION['catregistro_medico1'] = $atleta->consdetRegistro_medico();
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['id_atleta'] = $datos;
				
			header("Location: ../Vista/atleta/datosregistro_medico.php?accion=ver_detalles&id=".$id);
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

case "registrarRegistro_medico":
	{
		
		if(isset($_REQUEST['BtRegistrar1']))
		{
			
		

			$atleta->setId_atleta($_POST['id_atleta']);
			$atleta->setId_registro_medico($_POST['id_registro_medico']);
			$atleta->setFecha_medica($_POST['fecha_medica']);


			$asd=$atleta->detregistro_medicos();
			$t= count($asd);
			$ida=$atleta->getId_registro_medico();

			for ($i=0;$i<=$t;$i++) {
				if ($ida==$asd[$i][0]) {
					$_SESSION['catregistro_medico1'] = $atleta->consdetRegistro_medico();
					echo "<script>alert('este atleta ya tiene registrada este registro_medico')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/atleta/datosregistro_medico.php?accion=ver_detalles'>"; 

					break 2;


				}
			}





			$atleta->guardarPuente();
			$_SESSION['catregistro_medico1'] = $atleta->consdetRegistro_medico();

			

			
			header("Location: ../Vista/atleta/datosregistro_medico.php?accion=ver_detalles");			
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

			if(isset($_REQUEST['Registro_medicos']))
			{
				$ale = $registro_medico->getAll($tab);
				$_SESSION['registro_medico1'] = $ale;
				
				$atleta->setId_atleta($_POST['id_atleta']);
				
				$_SESSION['catregistro_medico1'] = $atleta->consdetRegistro_medico();
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['id_atleta'] = $datos;
				
			header("Location: ../Vista/atleta/datosregistro_medico.php?accion=ver_detalles&id=".$id);
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
			$atleta->setBecar($_POST['becar']);
			$becar=$atleta->getBecar();



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

			$l=$atleta->getBbecar();
			$v=count($l);
			for ($w=0;$w<=$v;$w++) {
				if ($l[$w][0]==$becar&&$becar==1) {
					echo "<script>alert('este atleta ya esta becado por otra disciplina')</script>";//Mensaje de Sesión no válida
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

			if(isset($_REQUEST['Registro_medicos']))
			{
				$ale = $registro_medico->getAll($tab);
				$_SESSION['registro_medico1'] = $ale;
				
				$atleta->setId_atleta($_POST['id_atleta']);
				
				$_SESSION['catregistro_medico1'] = $atleta->consdetRegistro_medico();
				$atleta->setId($_POST['id_atleta']);
				$datos = $atleta->getById($id);
				$_SESSION['id_atleta'] = $datos;
				
			header("Location: ../Vista/atleta/datosregistro_medico.php?accion=ver_detalles&id=".$id);
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
				$atleta->setId_atleta($_SESSION['id_atleta']);
				$atleta->setBecar($_POST['becar']);
				$becar=$atleta->getBecar();
				$l=$atleta->getBbecar();
				$v=count($l);
				for ($w=0;$w<=$v;$w++) {
					if ($l[$w][0]==$becar&&$becar==1) {
						echo "<script>alert('este atleta ya esta becado por otra disciplina')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/atleta/datosdisciplina.php?accion=ver_detalles'>"; 
						break 2;
					}
				
				}

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
	
				if(isset($_REQUEST['Registro_medicos']))
				{
					$ale = $registro_medico->getAll($tab);
					$_SESSION['registro_medico1'] = $ale;
					
					$atleta->setId_atleta($_GET['id']);
					
					$_SESSION['catregistro_medico1'] = $atleta->consdetRegistro_medico();
					$atleta->setId($_GET['id']);
					$datos = $atleta->getById($id);
					$_SESSION['id_atleta'] = $datos;
					
				header("Location: ../Vista/atleta/datosregistro_medico.php?accion=ver_detalles&id=".$id);
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
	
				if(isset($_REQUEST['Registro_medicos']))
				{
					$ale = $registro_medico->getAll($tab);
					$_SESSION['registro_medico1'] = $ale;
					
					$atleta->setId_atleta($_GET['id']);
					
					$_SESSION['catregistro_medico1'] = $atleta->consdetRegistro_medico();
					$atleta->setId($_GET['id']);
					$datos = $atleta->getById($id);
					$_SESSION['id_atleta'] = $datos;
					
				header("Location: ../Vista/atleta/datosregistro_medico.php?accion=ver_detalles&id=".$id);
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

		case 'filtrosprimerdigito':
			{
				$atleta->setPrimer($_POST['primer']);
				
				$n = $atleta->getPrimerdigito();
				$_SESSION['nivel10'] = $n;
				var_dump ($n);				
				header("Location: ../Vista/atleta/reportedatospersonales.php?accion=actual");
				break;
			}

			case 'filtroultimodigito':
			{
				$atleta->setPrimer($_POST['primer']);
				
				$n = $atleta->getUltimodigito();
				$_SESSION['nivel10'] = $n;
				
				header("Location: ../Vista/atleta/reportedatospersonales.php?accion=actual");
				break;
			}
			case 'filtrofechanac':
			{
				$atleta->setPrimer($_POST['primer']);
				$atleta->setSegundo($_POST['segundo']);
				
				
				$n = $atleta->getFechaNac();
				$_SESSION['nivel10'] = $n;
				
				header("Location: ../Vista/atleta/reportedatospersonalesnac.php?accion=actual");
				break;
			}

			case 'filtrofechanacdis':
				{
					$atleta->setPrimer($_POST['primer']);
					$atleta->setSegundo($_POST['segundo']);
					$atleta->setTercer($_POST['tercer']);

					
					
					$n = $atleta->getFechaNacdis();
					$_SESSION['nivel10'] = $n;
					
					header("Location: ../Vista/atleta/reportedatospersonalesnac.php?accion=actual");
					break;
				}
			case 'filtrotiposanguineo':
			{
				$atleta->setPrimer($_POST['primer']);
				
				
				$n = $atleta->getTiposangre();
				$_SESSION['nivel10'] = $n;
				
				header("Location: ../Vista/atleta/reportedatospersonales.php?accion=actual");
				break;
			}
			case 'filtroestadocivil':
			{
				$atleta->setPrimer($_POST['primer']);
				
				$n = $atleta->getEstadocivil();
				$_SESSION['nivel10'] = $n;
				
				
				header("Location: ../Vista/atleta/reportedatospersonales.php?accion=actual");
				break;
			}

			case 'filtrosexo':
			{
				$atleta->setPrimer($_POST['primer']);
				
				$n = $atleta->getSsexo();
				$_SESSION['nivel10'] = $n;
				
				
				header("Location: ../Vista/atleta/reportedatospersonales.php?accion=actual");
				break;
			}

			case 'filtronivel':
			{
				$atleta->setPrimer($_POST['primer']);
			
				
				$n = $atleta->getnnivel();
				$_SESSION['nivel10'] = $n;
				
				
				header("Location: ../Vista/atleta/reportedatospersonales.php?accion=actual");
				break;
			}

			case 'filtronacionalidad':
			{
				$atleta->setPrimer($_POST['primer']);
			
				
				$n = $atleta->getNacionalidad();
				$_SESSION['nivel10'] = $n;
				
				
				header("Location: ../Vista/atleta/reportedatospersonales.php?accion=actual");
				break;
			}

			case 'filtropeso':
			{
				$atleta->setPrimer($_POST['primer']);
				$atleta->setSegundo($_POST['segundo']);
				
				
				$n = $atleta->getPpeso();
				$_SESSION['indumentaria'] = $n;
				
				header("Location: ../Vista/atleta/reporteindumentaria.php?accion=actual");
				break;
			}

			case 'filtroaltura':
			{
				$atleta->setPrimer($_POST['primer']);
				$atleta->setSegundo($_POST['segundo']);
				
				
				$n = $atleta->getAaltura();
				$_SESSION['indumentaria'] = $n;
				
				header("Location: ../Vista/atleta/reporteindumentaria.php?accion=actual");
				break;
			}

			case 'filtrotalla':
			{
				$atleta->setPrimer($_POST['primer']);
				
				
				$n = $atleta->getTtalla();
				$_SESSION['indumentaria'] = $n;
				
				header("Location: ../Vista/atleta/reporteindumentaria.php?accion=actual");
				break;
			}

			case 'filtrocalzado':
			{
				$atleta->setPrimer($_POST['primer']);
				
				
				$n = $atleta->getCcalzado();
				$_SESSION['indumentaria'] = $n;
				
				header("Location: ../Vista/atleta/reporteindumentaria.php?accion=actual");
				break;
			}

			case 'filtromano':
			{
				$atleta->setPrimer($_POST['primer']);
				
				
				$n = $atleta->getMmano();
				$_SESSION['indumentaria'] = $n;
				
				header("Location: ../Vista/atleta/reporteindumentaria.php?accion=actual");
				break;
			}

			case 'filtrooperadora':
			{
				$atleta->setPrimer($_POST['primer']);
				
				
				$n = $atleta->getOperadora();
				$_SESSION['contacto'] = $n;
				
				header("Location: ../Vista/atleta/reportecontacto.php?accion=actual");
				break;
			}

			case 'filtromunicipio':
			{
				$atleta->setPrimer($_POST['primer']);
				
				
				$n = $atleta->getMmunicipio();
				$_SESSION['contacto'] = $n;
				
				header("Location: ../Vista/atleta/reportecontacto.php?accion=actual");
				break;
			}

			case 'filtroparroquia':
			{
				$atleta->setId_municipio($_POST['id_municipio']);
				$atleta->setId_parroquia($_POST['id_parroquia']);
				
				
				$n = $atleta->getPparroquia();
				$_SESSION['contacto'] = $n;
				
				header("Location: ../Vista/atleta/reportecontacto.php?accion=actual");
				break;
			}

			case 'buscamelasdisciplinas':
				{
					$n = $disciplina->getAll($tab);
					$_SESSION['disciplin'] = $n;
					
					
					
					
					header("Location: ../Vista/atleta/filtrofechanacdis.php?accion=actual");
					break;
				}

			case 'filtrobancos':
			{
				$atleta->setPrimer($_POST['primer']);
				
				
				$n = $atleta->getBbancos();
				$_SESSION['bancos'] = $n;

				
				$n = $atleta->getBbancostotal();
				$_SESSION['total'] = $n;	
				
				header("Location: ../Vista/atleta/reportebancario.php?accion=actual");
				break;
			}

			case 'filtrotipocuenta':
			{
				$atleta->setPrimer($_POST['primer']);
				
				
				$n = $atleta->gettipocuenta();
				$_SESSION['bancos'] = $n;
				
				header("Location: ../Vista/atleta/reportebancario.php?accion=actual");
				break;
			}

			case 'filtrodisciplinas':
			{
				$atleta->setPrimer($_POST['primer']);
				$y=$atleta->traela();
				$_SESSION['discipli']=$y[0][0];

				
				$disc=$atleta->traemodalidades();
				var_dump($disc);
				$t=$atleta->cuentamodalidadesdefinitivo();

				$_SESSION['contadormod']=$t[0][0];

				for ($i=0;$i<=$t[0][0];$i++) {
					$atleta->setSegundo($disc[$i][0]);
					$_SESSION['ertitulo'.$i]=$atleta->getSegundo();
		
					$_SESSION['disc'.$i]=$atleta->detallemodalidad();
					$u=$atleta->cuentapormodalidad();
					$_SESSION['cue'.$i]=$u[0][0];
					
					echo($_SESSION['cue'.$i]);
					
					

				}

				for ($i=0;$i<=$t[0][0];$i++) {
					$atleta->setSegundo($disc[$i][0]);
					$_SESSION['ertituloF'.$i]=$atleta->getSegundo();
		
					$_SESSION['discF'.$i]=$atleta->detallemodalidadmujer();
					$u=$atleta->cuentapormodalidadmujer();
					$_SESSION['cueF'.$i]=$u[0][0];
					
					echo($_SESSION['cueF'.$i]);
					var_dump ($_SESSION['discF'.$i]);


				}

			

				
				header("Location: ../Vista/atleta/reportedisciplinaespecifica.php?accion=actual");
				break;
			}

			case 'filtroestatus':
			{
				$atleta->setPrimer($_POST['primer']);
				
				
				$n = $atleta->getEestatus();
				$_SESSION['disciplinas'] = $n;
				
				header("Location: ../Vista/atleta/reportedisciplinas.php?accion=actual");
				break;
			}

			case 'filtromodalidad':
			{
				$atleta->setId_disciplina($_POST['id_disciplina']);
				$atleta->setId_modalidad($_POST['id_modalidad']);
				
				
				$n = $atleta->getMmodalidad();
				$_SESSION['disciplinas'] = $n;
				
				header("Location: ../Vista/atleta/reportedisciplinas.php?accion=actual");
				break;
			}

			case 'reportegeneral':
				{
					$_SESSION['atletaunidisciplina']=$atleta->Atletasunidiciplina();
					

					$d=$atleta->cuentaloshombres();
					$dd=count($d);
					$_SESSION['ddd']=$dd;
					$f=$atleta->cuentalasmujeres();
					$ff=count($f);
					$_SESSION['fff']=$ff;
					$_SESSION['cuentaunitotal']=$_SESSION['fff']+$_SESSION['ddd'];


					$s=$atleta->traemulti();
					$ss=count($s);
					$_SESSION['multidisciplinas']='';

					$_SESSION['c']=$ss;

					$m=$atleta->traemultihombre();
					$_SESSION['multihombre']=count($m);
					$w=$atleta->traemultimujer();
					$_SESSION['multimujer']=count($w);
					$_SESSION['multiambos']=$_SESSION['multimujer']+$_SESSION['multihombre'];

					$_SESSION['totaltotal']=$_SESSION['multiambos']+$_SESSION['cuentaunitotal'];
					$_SESSION['totalhombre']=$_SESSION['ddd']+$_SESSION['multihombre'];
					$_SESSION['totalmujer']=$_SESSION['fff']+$_SESSION['multimujer'];







					for ($i=0;$i<$ss;$i++) {
						$atleta->setPrimer($s[$i][0]);
						$_SESSION['multidisciplinas'.$i]=$atleta->detalleAtleta();
						
						
					}

					$_SESSION['titulo']='Reporte Global de Atletas';
					header("Location: ../Vista/atleta/reporteglobal.php?accion=actual");
					break;
				}

				case 'reportegeneralgloria':
					{
						$_SESSION['atletaunidisciplina']=$atleta->Atletasunidiciplinagloria();
						
	
						$d=$atleta->cuentaloshombresgloria();
						$dd=count($d);
						$_SESSION['ddd']=$dd;
						$f=$atleta->cuentalasmujeresgloria();
						$ff=count($f);
						$_SESSION['fff']=$ff;
						$_SESSION['cuentaunitotal']=$_SESSION['fff']+$_SESSION['ddd'];
	
	
						$s=$atleta->traemultigloria();
						$ss=count($s);
						$_SESSION['multidisciplinas']='';
	
						$_SESSION['c']=$ss;
	
						$m=$atleta->traemultihombregloria();
						$_SESSION['multihombre']=count($m);
						$w=$atleta->traemultimujergloria();
						$_SESSION['multimujer']=count($w);
						$_SESSION['multiambos']=$_SESSION['multimujer']+$_SESSION['multihombre'];
	
						$_SESSION['totaltotal']=$_SESSION['multiambos']+$_SESSION['cuentaunitotal'];
						$_SESSION['totalhombre']=$_SESSION['ddd']+$_SESSION['multihombre'];
						$_SESSION['totalmujer']=$_SESSION['fff']+$_SESSION['multimujer'];
	
	
	
	
	
	
	
						for ($i=0;$i<$ss;$i++) {
							$atleta->setPrimer($s[$i][0]);
							$_SESSION['multidisciplinas'.$i]=$atleta->detalleAtletagloria();
							
							
						}
	
						$_SESSION['titulo']='Reporte de Global de Atletas Gloriosos';
						header("Location: ../Vista/atleta/reporteglobal.php?accion=actual");
						break;
					}

				case 'indumentariapordisciplina':
					{

						$disc=$atleta->traeDisciplinas();
						$cal=$atleta->traecalzado();
						$tal=$atleta->traetallas();
						$t=$atleta->cuentaDisciplina();
						$tcal=$atleta->cuentacalzado();
						$ttal=$atleta->cuentatallas();
						$_SESSION['contador']=$t[0][0];
						$_SESSION['contadorcalzado']=$tcal[0][0];
						$_SESSION['contadortalla']=$ttal[0][0];


						for ($i=0;$i<=$t[0][0];$i++) {
							$atleta->setPrimer($disc[$i][0]);
							$_SESSION['ertitulo'.$i]=$atleta->getPrimer();
							$_SESSION['disc'.$i]=$atleta->detalleindumentaria();
							for ($h=0;$h<=$tcal[0][0];$h++) {
								$atleta->setSegundo($cal[$h][0]);
								$_SESSION['idcalza'.$i.$h]=$atleta->getSegundo();
								$k=$atleta->detallecalzado();
								$_SESSION['calza'.$i.$h]=count($k);
							
							}
							for ($h=0;$h<=$ttal[0][0];$h++) {
								$atleta->setSegundo($tal[$h][0]);
								$_SESSION['idtal'.$i.$h]=$atleta->getSegundo();
								$k=$atleta->detalletallas();
								$_SESSION['tall'.$i.$h]=count($k);
							
							}
					
						}

					
				
						for ($i=0;$i<=$t[0][0];$i++) {
							$atleta->setPrimer($disc[$i][0]);
							$_SESSION['ertitulomujer'.$i]=$atleta->getPrimer();
							$_SESSION['discF'.$i]=$atleta->detalleindumentariamujer();
							for ($h=0;$h<=$tcal[0][0];$h++) {
								$atleta->setSegundo($cal[$h][0]);
								$_SESSION['idcalzaF'.$i.$h]=$atleta->getSegundo();
								$k=$atleta->detallecalzadomujer();
								$_SESSION['calzaF'.$i.$h]=count($k);
							
							}

							for ($h=0;$h<=$ttal[0][0];$h++) {
								$atleta->setSegundo($tal[$h][0]);
								$_SESSION['idtalF'.$i.$h]=$atleta->getSegundo();
								$k=$atleta->detalletallasmujer();
								$_SESSION['tallF'.$i.$h]=count($k);
							
							}
				
						}
				
						$_SESSION['titulo']='Reporte de Indumentaria por Disciplina';
						header("Location: ../Vista/atleta/reporteindumentariapordisciplinas.php?accion=actual");
						break;
					}


					case 'fichaespecifica':
						{
							$atleta->setCedula($_POST['primer']);
							
							
							$n = $atleta->traeid();
							$x = $n[0][0];

							$atleta->setPrimer($x);

							$_SESSION['datospersonales']=$atleta->traedatospersonales();
							$_SESSION['indumentaria']=$atleta->traeindumentaria();
							$_SESSION['contacto']=$atleta->traedatoscontacto();
							$_SESSION['bancario']=$atleta->traedatosbancarios();
							$_SESSION['representante']=$atleta->traerepresentante();
							$_SESSION['laboral']=$atleta->datoslaboral();
							$_SESSION['datosdisciplina']=$atleta->datosdisciplinas();
							$_SESSION['medicos']=$atleta->datosmedicos();
							$_SESSION['discapacidad']=$atleta->datosdiscapacidad();
							$_SESSION['beca']=$atleta->traebeca();

							var_dump($_SESSION['datospersonales']);
							echo '<br>';
							var_dump($_SESSION['indumentaria']);
							echo '<br>';
							var_dump($_SESSION['datosdisciplina']);
							echo '<br>';
							var_dump($_SESSION['contacto']);
							echo '<br>';
							var_dump($_SESSION['bancario']);
							echo '<br>';
							var_dump($_SESSION['representante']);
							echo '<br>';
							var_dump($_SESSION['laboral']);
							echo '<br>';
							var_dump($_SESSION['medicos']);
							echo '<br>';
							var_dump($_SESSION['discapacidad']);
							echo '<br>';
							var_dump($_SESSION['beca']);


							




							
							header("Location: ../Vista/atleta/reporteficha.php?accion=actual");
							break;
						}


}
ob_end_flush();

?>