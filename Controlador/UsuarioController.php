<?php
session_start();
ob_start();
require_once("../Modelo/usuario.php");
$usuario = new Usuario();
$usuario->setTabla("usuarios");
switch($_REQUEST['accion'])
{
	case "buscatodos":
	{
		$todos = $usuario->getAll($tab);
		$_SESSION['catausu2'] = $todos;
		header("Location: ../Vista/usuario/usuario2.php?accion=actual");
		break;
	}
	case "registrar":
	{
		if(isset($_REQUEST['BtRegistrar']))
		{
			$x = strtoupper($_POST['nombre']);
			$y = strtoupper($_POST['apellido']);
			$z = strtoupper($_POST['correo']);
			$u = strtoupper($_POST['usuario']);
			$usuario->setNombre($x);
			$usuario->setApellido($y);
			$usuario->setUsuario($u);
			$usuario->setN_tel($_POST['n_tel']);
			$usuario->setN_eme($_POST['n_eme']);
			$usuario->setCorreo($z);
			$usuario->setClave($_POST['clave']);
			$usuario->setConf_clave($_POST['conf_clave']);
			$usuario->setTipo($_POST['tipo']);

			$clave=$usuario->getClave();
			$clave1=$usuario->getConf_clave();

			if ($clave==$clave1) {

				$usu=$usuario->todoslosusuarios();
				$t= count($usu);
				$us=$usuario->getUsuario();

				for ($i=0;$i<=$t;$i++) {
					if ($us==$usu[$i][0]) {
						echo "<script>alert('ese usuario ya esta registrado')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/usuario/usuario2.php?accion=actualizar'>"; 

						break 2;
					}
				}


				$usuario->guardarUsuario();
				header("Location: ../Vista/usuario/usuario2.php?accion=actualizar");		


			}

			else {
				
					echo "<script>alert('las claves no coinciden')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/usuario/usuario.php?accion=validado'>"; // Otra 
				
			}


			
		}
		break;
	}

	case "registrar_contra":
	{
			$usuario->setId($_SESSION['id']);
			$contra=$usuario->getByContra();		
		
			$usuario->setClave_vieja($_POST['contra_vieja']);
			$compa= $usuario->getClave_vieja();
			$usuario->setClave($_POST['clave']);
			$usuario->setConf_clave($_POST['conf_clave']);

			$clave=$usuario->getClave();
			$clave1=$usuario->getConf_clave();

			if ($clave!=$clave1) {

				echo "<script>alert('las claves no coinciden')</script>";//Mensaje de Sesión no válida
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/menuv/menuv.php?accion=validado'>"; // Otra 
				break;
				
	
			}

			else {
				if ($contra[0][0]==$compa) {
				
					$usuario->guardarclave();
					header("Location: ../Vista/menuv/menuv.php?accion=validado");			
	
				}
	
				else {
					echo "<script>alert('clave actual invalida')</script>";//Mensaje de Sesión no válida
					echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/menuv/menuv.php?accion=validado'>"; // Otra 
					break;
				}
				
			}

			


			


		
		break;
	}
	case "eliminar":
	{
		$usuario->setId($_GET['id']);
		$usuario->deleteById($id);
		header("Location: ../Vista/usuario/usuario2.php?accion=actualizar");		
		break;	
	}
	case 'seleccionar':
	{
		$usuario->setId($_GET['id']);
		$datos = $usuario->getById($id);
		$_SESSION['modiusu2'] = $datos;
		header("Location: ../Vista/usuario/usuario2.php?accion=ver_detalles&id=".$id);	
		break;	
	}

	
	case 'modificar':
		{
			if(isset($_REQUEST['BtModificar']))
			{
				$usuario->setId($_GET['id']);
				$x = strtoupper($_POST['nombre']);
				$y = strtoupper($_POST['apellido']);
				$z = strtoupper($_POST['correo']);
				$u = strtoupper($_POST['usuario']);
				$usuario->setNombre($x);
				$usuario->setApellido($y);
				$usuario->setUsuario($u);
				$usuario->setN_tel($_POST['n_tel']);
				$usuario->setN_eme($_POST['n_eme']);
				$usuario->setCorreo($z);
	
				$usu=$usuario->todoslosusuarios();
				$t= count($usu);
				$us=$usuario->getUsuario();
	
				if ($us==$_SESSION['usuario']) {
					$_SESSION['nombre'] =$usuario->getNombre();
					$_SESSION['apellido'] =$usuario->getApellido();
					$_SESSION['usuario']=$us;
					$usuario->modificarUsuario();
					header("Location: ../Vista/menuv/menuv.php?accion=validado");
	
	
	
					break;
				}
	
				for ($i=0;$i<=$t;$i++) {
					if ($us==$usu[$i][0]) {
	
						echo "<script>alert('ese usuario ya esta registrado')</script>";//Mensaje de Sesión no válida
						echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/menuv/menuv.php?accion=validado'>"; 
						
	
						break 2;
					}
				}
	
				$_SESSION['nombre'] =$usuario->getNombre();
				$_SESSION['apellido'] =$usuario->getApellido();
				$_SESSION['usuario']=$us;
	
	
	
				
				$usuario->modificarUsuario();
				header("Location: ../Vista/menuv/menuv.php?accion=validado");
			}
			break;
		}

		case 'modificar1':
			{
			
					$usuario->setId($_GET['id']);
					$usuario->setTipo($_POST['tipo']);
	
					$usuario->modificarTipo();
	
	
		
					
					header("Location: ../Vista/usuario/usuario2.php?accion=actualizar");
				
				break;
			}

		case 'ver':
	{
		$usuario->setId($_SESSION['id']);
		$datos = $usuario->getById($id);
		$_SESSION['modiusu3'] = $datos;
		header("Location: ../Vista/usuario/ver_perfil.php?accion=ver_detalles&id=".$id);	
		break;	
	}
}
ob_end_flush();
?>