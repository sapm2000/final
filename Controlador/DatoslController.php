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
		
		$muni=$municipio->getAll($tab);
		$_SESSION['municipio1'] = $muni;	
		$parr = $parroquia->getAll($tab);
		$_SESSION['parroquia1'] = $parr;
		header("Location: ../Vista/atleta/datosl.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			

			$corrl = strtoupper($_POST['correol']);
			$empre = strtoupper($_POST['empresa']);
			$dire1 = strtoupper($_POST['direccion1']);
			$atleta->setCorreo($corrl);
			$datosl->setEmpresa($empre);
			$datosl->setId_municipio1($_POST['id_municipio1']);
			$datosl->setId_parroquia1($_POST['id_parroquia1']);
			$datosl->setDireccion1($dire1);
			$m=$datosl->selecmax();
			$n=$m[0][0];
			$datosl->setId_atleta($n);		
			$datosl->guardarDatos();

			
			header("Location: ../Vista/atleta/datosb.php?accion=actualizar");			
		}
		break;
	}
	case "eliminar":
	{
		$atleta->setId($_GET['id']);
		$atleta->deleteById($id);
		header("Location: ../Vista/usuario/usuario.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$atleta->setId($_GET['id']);
		$datos = $atleta->getById($id);
		$_SESSION['modiusu'] = $datos;
		header("Location: ../Vista/usuario/usuario.php?accion=ver_detalles&id=".$id);	
		break;	
	}
	case 'modificar':
	{
		
			$datosl->setId_atleta($_POST['id_atleta']);
			$corrl = strtoupper($_POST['correol']);
			$empre = strtoupper($_POST['empresa']);
			$dire1 = strtoupper($_POST['direccion1']);
			$datosl->setCorreol($corrl);
			$datosl->setEmpresa($empre);
			$datosl->setId_municipio1($_POST['id_municipio1']);
			$datosl->setId_parroquia1($_POST['id_parroquia1']);
			$datosl->setDireccion1($dire1);
			$datosl->modificarDatosl();

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
}
ob_end_flush();
?>