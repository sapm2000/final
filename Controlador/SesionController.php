<?php
session_start();
require_once('../Modelo/SesionUsuario.php');//llamo al documento donde esta la clase usuario
$usu = new Usuario(); //Creo el objeto de la clase usuario
switch ($_REQUEST['accion']) //Evaluo los vaores de 'accion' enviado por URL
{
	case 'cerrar': //Caso accion=cerrar
		session_destroy();//función que destruye a TODAS las variables de sesión creadas
		header('Location: ../Vista/Persona/InicioSesion.php'); //Redirección a index
		break;

	case 'validar': //caso accion=validar
		if($_POST['BtSesion']) //Si el caso fue ejecutado por el boton de inicio de sesion
		{
			$usu->setUsuario($_POST['usuario']); //seteamos usuario
			$usu->setClave($_POST['clave']);//seteamos la clave o contraseña
			$datos = $usu->IniciarSesion(); //Invocamos al método de inicio de sesión
			if(empty($datos)) //Si el método de inicio de sesión retornó un arreglo vacío
			{
				echo "<script>alert('Usuario y/o Contraseña inválido(s)')</script>";//Mensaje de Sesión no válida
				echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../Vista/Persona/InicioSesion.php'>"; // Otra manera de redireccionar, esta permite que el mensaje anterior sea mostrado...
			}
			else //Si el areglo NO retornó vacío
			{
				$_SESSION['usuario'] = $usu->getUsuario(); //Geteo al usuario y lo almaceno en una variable de sesión

				foreach ($datos as $d) 
				{
					$_SESSION['nombre'] = $d['nombre']; 
					$_SESSION['apellido'] = $d['apellido']; //Asigno nombre y apellido a sus respectivas variables de sesión
					$_SESSION['tipo'] = $d['tipo'];
					$_SESSION['id'] = $d['id'];
					$_SESSION['usuario'] = $d['usuario'];

				}
				$menu ='<div class="barravertical1" id="hola" onclick="mostrar(2)" style="">';
				$menu.=		'<a href="#">';
				$menu.=			'<center><img src="../imagenes1/menu.png" height="50%" width="55%" class="img" > </center></a>';		
				$menu.='</div>';
				$menu.='</div>';
				$menu.='<div style="display:none" class="barraverticaldesplegada"  id="2" onclick="ocultar(2)">';
				$menu.=		'<div class="navigation">';
				$menu.=			'<ul class="mainmenu">';
				$menu.=				'<li><a href="../menuv/menuv.php?accion=validado">';
				$menu.=					'<br><img src="../imagenes1/inicio1.png" height="40px" width="40px" >  Ir a Inicio';
				$menu.=					'</a></li>';
				if ($_SESSION['tipo']=='ADMINISTRADOR' || $_SESSION['tipo']=='METODOLOGO') {
					$menu.=				'<li><a href="#" onclick="mostrar(3)">';
					$menu.=					'<img src="../imagenes1/config1.png" height="40px" width="40px" >  Archivos';
					$menu.=					'</a>';
				}
										
				$menu.=				'</li>';
				$menu.=				'<li><a href="#" onclick="mostrar(4)">';
				$menu.=			'<img src="../imagenes1/procesos1.png" height="40px" width="40px" >  Procesos';
				$menu.=					'</a>';
									
				$menu.=				'</li>';
				$menu.=				'<li><a href="#" onclick="mostrar(5)">';
				$menu.=					'<img src="../imagenes1/descargas1.png" height="40px" width="40px" > Reportes';
				$menu.=					'</a>';
								
				$menu.=				'</li>';
				$menu.=				'<li><a href="#" onclick="mostrar(6)">';
				$menu.=					'<img src="../imagenes1/ayuda1.png" height="40px" width="40px" >  Ayuda';
				$menu.=					'</a>';
						
				$menu.=				'</li>';
				$menu.=				'<li><a href="../../Controlador/SesionController.php?accion=cerrar">';
				$menu.=					'<img src="../imagenes1/salir1.png" height="40px" width="40px" >  Cerrar Sesión</li>';
				$menu.=					'</a>';
				$menu.=				'</li>';
				$menu.=				'<li>';
				$menu.=					'<i class="editararchivos"></i>';
				$menu.=				'</li>';
				$menu.=			'</ul>';
				$menu.=		'</div>';
				$menu.=	'</div>';
				$menu.=	'<div style="display:none" class="barraverticaldesplegada"  id="3" onclick="ocultar(3)">';
				$menu.=		'<div class="navigation">';
				$menu.=			'<ul class="mainmenu">';
				$menu.=				'<li><a href="../menuv/menuv.php?accion=validado" onclick="mostrar(2)">';
				$menu.=						'<br><img src="../imagenes1/inicio1.png"  height="40px" width="40px" >  Ir a Inicio';
				$menu.=				'</a></li>';
				$menu.=				'<li><a href="#"  >';
				$menu.=					'<img src="../imagenes1/config1.png" height="40px" width="40px" >  Archivos';
				$menu.=					'</a>';
				$menu.=					'<ul class="submenu"><!-- Segundo nivel desplegable -->';
				$menu.=						'<li><a href="../atleta/consultaatleta.php?accion=actualizar"><b>Atleta</b></a></li>';
				$menu.=						'<li><a href="../evento/evento2.php?accion=actualizar"><b>Eventos</b></a></li>';
				if ($_SESSION['tipo']=='ADMINISTRADOR') {

				$menu.=						'<li><a href="../banco/banco.php?accion=actualizar">Bancos</a></li>';
				$menu.=						'<li><a href="../calzado/calzado.php?accion=actualizar">Calzado</a></li>';
				$menu.=						'<li><a href="../discapacidad/discapacidad.php?accion=actualizar">Discapacidades</a></li>';
				$menu.=						'<li><a href="../disciplina/disciplina.php?accion=actualizar">Disciplinas</a></li>';
				$menu.=						'<li><a href="../estatu/estatu.php?accion=actualizar">Estatus</a></li>';
				$menu.=						'<li><a href="../modalidades/modalidades.php?accion=actualizar">Modalidades</a></li>';
				$menu.=						'<li><a href="../municipio/MunicipioView.php?accion=actualizar">Municipios</a></li>';
				$menu.=						'<li><a href="../nivel/nivel.php?accion=actualizar">Nivel Académico</a></li>';
				$menu.=						'<li><a href="../parentesco/parentezco.php?accion=actualizar">Parentesco</a></li>';
				$menu.=						'<li><a href="../parroquia/ParroquiaView.php?accion=actualizar">Parroquias</a></li>';
				$menu.=						'<li><a href="../patologia_medica/patologia_medica.php?accion=actualizar">Patologias Medica</a></li>';
				$menu.=						'<li><a href="../representante/representante2.php?accion=actualizar">Representante</a></li>';
				$menu.=						'<li><a href="../talla/talla.php?accion=actualizar">Tallas</a></li>';
				$menu.=						'<li><a href="../tipo_logro/tipo_logro.php?accion=actualizar">Tipos de Logros</a></li>';
				$menu.=						'<li><a href="../usuario/usuario2.php?accion=actualizar">Usuario</a></li>';
				}
				$menu.=					'</ul>';
				$menu.=				'</li>';
				$menu.=				'<li><a href="#" onclick="mostrar(4)">';
				$menu.=					'<img src="../imagenes1/procesos1.png" height="40px" width="40px" >  Procesos';
				$menu.=					'</a>';
				$menu.=					'<ul class="submenu"><!-- Segundo nivel desplegable -->';
										
				$menu.=					'</ul>';
				$menu.=				'</li>';
				$menu.=				'<li><a href="#" onclick="mostrar(5)">';
				$menu.=						'<img src="../imagenes1/descargas1.png" height="40px" width="40px" > Reportes';
				$menu.=						'</a>';
				$menu.=					'<ul class="submenu"><!-- Segundo nivel desplegable -->';
								
				$menu.=					'</ul>';
				$menu.=				'</li>';
				$menu.=				'<li><a href="#" onclick="mostrar(6)">';
				$menu.=					'<img src="../imagenes1/ayuda1.png" height="40px" width="40px" >  Ayuda';
				$menu.=						'</a>';
				$menu.=						'<ul class="submenu"><!-- Segundo nivel desplegable -->';
									
				$menu.=						'</ul>';
				$menu.=					'</li>';
				$menu.=					'<li><a href="../../Controlador/SesionController.php?accion=cerrar">';
				$menu.=						'<img src="../imagenes1/salir1.png" height="40px" width="40px" >  Cerrar Sesión</li>';
				$menu.=						'</a>';
				$menu.=					'</li>';
				$menu.=					'<li>';
				$menu.=						'<i class="editararchivos"></i>';
				$menu.=					'</li>';
				$menu.=				'</ul>';
				$menu.=			'</div>';
				$menu.=		'</div>';
				$menu.=	'<div style="display:none" class="barraverticaldesplegada"  id="4" onclick="ocultar(4)">';
				$menu.=		'<div class="navigation">';
				$menu.=			'<ul class="mainmenu">';
				$menu.=				'<li><a href="../menuv/menuv.php?accion=validado" onclick="mostrar(2)">';
				$menu.=						'<br><img src="../imagenes1/inicio1.png"  height="40px" width="40px" >  Ir a Inicio';
				$menu.=				'</a></li>';
				if ($_SESSION['tipo']=='ADMINISTRADOR' || $_SESSION['tipo']=='METODOLOGO') {

				$menu.=				'<li><a href="#" onclick="mostrar(3)">';
				$menu.=					'<img src="../imagenes1/config1.png" height="40px" width="40px" >  Archivos';
				$menu.=					'</a>';
				$menu.=					'<ul class="submenu"><!-- Segundo nivel desplegable -->';
					
				$menu.=					'</ul>';
				$menu.=			'</li>';
				}
				$menu.=			'<li><a href="#" >';
				$menu.=				'<img src="../imagenes1/procesos1.png" height="40px" width="40px" >  Procesos';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
				$menu.=					'<li><a href="../beca/consultaglobal.php?accion=actualizar">Becas</a></li>';
				$menu.=				'</ul>';
				$menu.=			'</li>';
				$menu.=			'<li><a href="#" onclick="mostrar(5)">';
				$menu.=				'<img src="../imagenes1/descargas1.png" height="40px" width="40px" > Reportes';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
								
				$menu.=				'</ul>';
				$menu.=			'</li>';
				$menu.=			'<li><a href="#" onclick="mostrar(6)">';
				$menu.=				'<img src="../imagenes1/ayuda1.png" height="40px" width="40px" >  Ayuda';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
									
				$menu.=				'</ul>';
				$menu.=			'</li>';
				$menu.=			'<li><a href="../../Controlador/SesionController.php?accion=cerrar">';
				$menu.=				'<img src="../imagenes1/salir1.png" height="40px" width="40px" >  Cerrar Sesión</li>';
				$menu.=				'</a>';
				$menu.=			'</li>';
				$menu.=			'<li>';
				$menu.=				'<i class="editararchivos"></i>';
				$menu.=			'</li>';
				$menu.=		'</ul>';
				$menu.=	'</div>';
				$menu.='</div>';
				$menu.='<div style="display:none" class="barraverticaldesplegada"  id="5"  onclick="ocultar(5)">';
				$menu.=	'<div class="navigation">';
				$menu.=		'<ul class="mainmenu">';
				$menu.=			'<li><a href="../menuv/menuv.php?accion=validado" onclick="mostrar(2)">';
				$menu.=					'<br><img src="../imagenes1/inicio1.png"  height="40px" width="40px" >  Ir a Inicio';
				$menu.=			'</a></li>';
				if ($_SESSION['tipo']=='ADMINISTRADOR' || $_SESSION['tipo']=='METODOLOGO') {

				$menu.=			'<li><a href="#" onclick="mostrar(3)">';
				$menu.=				'<img src="../imagenes1/config1.png" height="40px" width="40px" >  Archivos';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
									
				$menu.=				'</ul>';
				$menu.=			'</li>';
				}
				$menu.=			'<li><a href="#" onclick="mostrar(4)">';
				$menu.=				'<img src="../imagenes1/procesos1.png" height="40px" width="40px" >  Procesos';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
								
				$menu.=				'</ul>';
				$menu.=			'</li>';
				$menu.=			'<li><a href="#" >';
				$menu.=				'<img src="../imagenes1/descargas1.png" height="40px" width="40px" > Reportes';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
				$menu.=					'<li><a href="../atleta/filtros.php?accion=actualizar">Atletas con Filtros</a></li>';
				$menu.=					'<li><a href="../beca/filtros.php?accion=actualizar">Becas con Filtros</a></li>';
				$menu.=					'<li><a href="../atleta/filtroficha.php?accion=actualizar">Ficha de Atleta</a></li>';


				$menu.=				'</ul>';
				$menu.=			'</li>';
				$menu.=			'<li><a href="#" onclick="mostrar(6)">';
				$menu.=				'<img src="../imagenes1/ayuda1.png" height="40px" width="40px" >  Ayuda';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
								
				$menu.=				'</ul>';
				$menu.=			'</li>';
				$menu.=			'<li><a href="../../Controlador/SesionController.php?accion=cerrar">';
				$menu.=				'<img src="../imagenes1/salir1.png" height="40px" width="40px" >  Cerrar Sesión</li>';
				$menu.=				'</a>';
				$menu.=			'</li>';
				$menu.=			'<li>';
				$menu.=				'<i class="editararchivos"></i>';
				$menu.=			'</li>';
				$menu.=		'</ul>';
				$menu.=	'</div>';
				$menu.='</div>';
				$menu.='<div style="display:none" class="barraverticaldesplegada"  id="6" onclick="ocultar(6)">';
				$menu.='<div class="navigation">';
				$menu.=		'<ul class="mainmenu">';
				$menu.=			'<li><a href="../menuv/menuv.php?accion=validado" onclick="mostrar(2)">';
				$menu.=					'<br><img src="../imagenes1/inicio1.png"  height="40px" width="40px" >  Ir a Inicio';
				$menu.=			'</a></li>';
				if ($_SESSION['tipo']=='ADMINISTRADOR' || $_SESSION['tipo']=='METODOLOGO') {
				$menu.=			'<li><a href="#" onclick="mostrar(3)">';
				$menu.=				'<img src="../imagenes1/config1.png" height="40px" width="40px" >  Archivos';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
									
				$menu.=				'</ul>';
				$menu.=			'</li>';
				}
				$menu.=			'<li><a href="#" onclick="mostrar(4)">';
				$menu.=				'<img src="../imagenes1/procesos1.png" height="40px" width="40px" >  Procesos';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
								
				$menu.=				'</ul>';
				$menu.=			'</li>';
				$menu.=			'<li><a href="#" onclick="mostrar(5)">';
				$menu.=				'<img src="../imagenes1/descargas1.png" height="40px" width="40px" > Reportes';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
									
								
				$menu.=				'</ul>';
				$menu.=			'</li>';
				$menu.=			'<li><a href="#" >';
				$menu.=				'<img src="../imagenes1/ayuda1.png" height="40px" width="40px" >  Ayuda';
				$menu.=				'</a>';
				$menu.=				'<ul class="submenu"><!-- Segundo nivel desplegable -->';
				$menu.=					'<li><a href="#">Manual de Usuarios</a></li>';
				$menu.=					'<li><a href="#">Manual de Sistema</a></li>';
				$menu.=				'</ul>';
				$menu.=			'</li>';
				$menu.=			'<li><a href="../../Controlador/SesionController.php?accion=cerrar">';
				$menu.=				'<img src="../imagenes1/salir1.png" height="40px" width="40px" >  Cerrar Sesión</li>';
				$menu.=				'</a>';
				$menu.=			'</li>';
				$menu.=			'<li>';
				$menu.=				'<i class="editararchivos"></i>';
				$menu.=			'</li>';
				$menu.=		'</ul>';
				$menu.=	'</div>';
				$menu.='</div>';
				$_SESSION['menu'] = $menu;
				
				header('Location: ../Vista/menuv/menuv.php?accion=validado'); //redirecciono a la página de bienvenida
			}
		}
		break;

	default:
		header('Location: ../Vista/Persona/InicioSesion.php'); //si accion toma un valor NO TOMADO EN CUENTA en a URL, automáticamente redirecciona a index
		break;
}
?>