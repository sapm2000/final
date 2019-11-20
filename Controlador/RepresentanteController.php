<?php
session_start();
ob_start();
require_once("../Modelo/representante.php");
require_once("../Modelo/parentesco.php");

$representante = new Representante();
$parentesco = new Parentesco();

$representante->setTabla("representantes");
$parentesco->setTabla("parentescos");

switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$algunos = $parentesco->getAll($tab);
		$_SESSION['selectp'] = $algunos;
		$todos = $representante->condet($tab);
		$_SESSION['catarepre'] = $todos;
		header("Location: ../Vista/representante/representante.php?accion=actual");
		break;
	}
	case "buscatodos1":
	{
		$todos = $representante->getallrepre();
		$_SESSION['catarepre2'] = $todos;
		header("Location: ../Vista/representante/representante2.php?accion=actual");
		break;
	}

	case "buscatodos1":
	{
		
		header("Location: ../Vista/representante/representante.php?accion=actual");
		break;
	}

	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$x = strtoupper($_POST['nombre']);
			$y = strtoupper($_POST['apellido']);
			$z = strtoupper($_POST['correo']);
			$representante->setCedula($_POST['cedula']);
			$representante->setNombre($x);
			$representante->setApellido($y);
			$representante->setN_tel($_POST['n_tel']);
			$representante->setCorreo($z);



			$representante->setCedula_a($_POST['cedula_a']);

			$datos=$representante->getByIdAtleta();

			$coño=$datos[0][0];


			$representante->setId_atleta($coño);
			$representante->setId_parentesco($_POST['parentesco']);


			if(empty($datos[0][0])) {
				
				echo "<script>alert('el atleta no existe en la base de datos/ cedula incorrecta')</script>";//Mensaje de Sesión no válida
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/representante/representante2.php?accion=actualizar'>"; 
				break;
			}

			else {
				$repre=$representante->todoslosrepresentantes();
				$t= count($repre);
				$ced=$representante->getCedula();

				for ($i=0;$i<=$t;$i++) {
					if ($ced==$repre[$i][0]) {
						echo "<script>alert('el representante ya esta registrado')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/representante/representante.php?accion=actual'>"; 

						break 2;
					}
				}

				$atle=$representante->todoslosatletasreg();
				$q= count($atle);

				for ($i=0;$i<=$q;$i++) {
					if ($coño==$atle[$i][0]) {
						echo "<script>alert('el atleta ya tiene a este representante asignado verifica el catologo')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/representante/representante.php?accion=actual'>"; 

						break 2;

					}
				}


				$representante->guardarRepresentante();

				$id_repre=$representante->selecmax();
				$representante->setId_representante($id_repre[0][0]);
				
				$representante->guardarpuenterepre();


				

				header("Location: ../Vista/representante/representante2.php?accion=actualizar");


			}

		}
		break;
	}

	case "registrar1":
	{
		$representante->setCedula_a($_POST['cedula_a']);
		$representante->setId_parentesco($_POST['parentesco']);

		$datos=$representante->getByIdAtleta();
		$coño=$datos[0][0];
		$representante->setId_atleta($coño);
		$representante->setId_representante($_POST['cedula']);
		

		if(empty($datos[0][0])) {
				
			echo "<script>alert('el atleta no existe en la base de datos/ cedula incorrecta')</script>";//Mensaje de Sesión no válida
			echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/representante/representante2.php?accion=actualizar'>"; 
			
		}

		else {
			$todos=$representante->todoslosatletas();
			$n= count($todos);

			for ($i=0;$i<=$n;$i++) {
				if ($coño==$todos[$i][0]) {
					$algunos = $parentesco->getAll($tab);
					$_SESSION['selectp'] = $algunos;
					$par = $representante->condet();
					$_SESSION['catapar'] = $par;
					echo "<script>alert('el ya tiene este representante asignado')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/representante/agregar.php?accion=actual'>"; 

					break 2;
				}
			}

			$atle=$representante->todoslosatletasreg();
				$q= count($atle);

				for ($i=0;$i<=$q;$i++) {
					if ($coño==$atle[$i][0]) {
						echo "<script>alert('el atleta ya tiene un representante asignado verifica el catologo')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/representante/representante2.php?accion=actualizar'>"; 

						break 2;

					}
				}


			

			
			$representante->guardarpuenterepre();

			$algunos = $parentesco->getAll($tab);
			$_SESSION['selectp'] = $algunos;
			$par = $representante->condet();
			$_SESSION['catapar'] = $par;
				header("Location: ../Vista/representante/agregar.php?accion=actual");


		}
		break;




	}
	case "eliminar":
	{
		$representante->setId($_GET['id']);
		$representante->deleteById($id);
		$representante->deletePuente();
		header("Location: ../Vista/representante/representante2.php?accion=actualizar");		
		break;	
	}

	case "eliminar1":
	{
		$representante->setId_representante($_GET['id_repre']);
		$representante->setId($_GET['id']);

		$xxx=$representante->Todosmenos1();
		$n= count($xxx);

		if ($n<=1) {
				
			echo "<script>alert('el representante tiene que tener minimo un representado')</script>";//Mensaje de Sesión no válida
			echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/representante/agregar.php?accion=actual'>"; 

			break;
		}

		else {
			$representante->deleteById1();
			$algunos = $parentesco->getAll($tab);
			$_SESSION['selectp'] = $algunos;
			$par = $representante->condet();
			$_SESSION['catapar'] = $par;

			header("Location: ../Vista/representante/agregar.php?accion=actual");
			break;
		}


		
		break;	
	}

	case 'seleccionar':
	{
		$representante->setId($_GET['id']);
		$datos = $representante->getById($id);
		$_SESSION['modirepre2'] = $datos;
		header("Location: ../Vista/representante/representante2.php?accion=ver_detalles&id=".$id);	
		break;	
	}	

	case 'seleccionar1':
	{
		$algunos = $parentesco->getAll($tab);
		$_SESSION['selectp'] = $algunos;
		$representante->setId($_GET['id']);
		$representante->setId_representante($_GET['id']);	
		$datos = $representante->getById($id);
		$_SESSION['agrega'] = $datos;
		$par = $representante->condet();
		$_SESSION['catapar'] = $par;
		header("Location: ../Vista/representante/agregar.php?accion=actual");
	}

	case 'modificar':
		{
			if(isset($_REQUEST['BtModificar']))
			{
				$representante->setId($_GET['id']);
				$x = strtoupper($_POST['nombre']);
				$y = strtoupper($_POST['apellido']);
				$z = strtoupper($_POST['correo']);
				$representante->setCedula($_POST['cedula']);
				$representante->setNombre($x);
				$representante->setApellido($y);
				$representante->setN_tel($_POST['n_tel']);
				$representante->setCorreo($z);
	
				
	
	
				$repre=$representante->todoslosrepresentantes();
				$t= count($repre);
				$ced=$representante->getCedula();
	
				$m=$representante->esterepre();
	
				if ($ced==$m[0][0]) {
					$representante->modificarRepresentante();
					header("Location: ../Vista/representante/representante2.php?accion=actualizar");
				}
	
				for ($i=0;$i<=$t;$i++) {
					if ($ced==$repre[$i][0]) {
						echo "<script>alert('el representante ya esta registrado')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/representante/representante2.php?accion=actualizar'>"; 
	
						break 2;
					}
				}
	
	
	
				$representante->modificarRepresentante();
				header("Location: ../Vista/representante/representante2.php?accion=actualizar");
			}
			break;
		}
}
ob_end_flush();
?>