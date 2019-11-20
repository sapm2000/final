<?php
	session_start();
	if(isset($_SESSION['usuario']))
	{
		echo "Existe una sesión abierta para el usuario ".$_SESSION['usuario'].", para cerrarla haga click <a href='../../Controlador/SesionController.php?accion=cerrar'>AQUÍ</a>";
	}//Seguridad por si acceden al index por medio de la URL sin cerrar sesión
	else
	{
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../css/estiloiniciodessesion.css" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="../imagenes1/logo1.ico">

	<script language="javascript" src="../js/inicio.js"></script>

</head>
<body background="../imagenes1/logo.jpg" style="background-repeat:no-repeat; background-position: center -25%; background-size: 25%">
    <center><div id="inicio">
                <div class="container"></div>
                    <div class="text">
                        <div class="background trans">
                            <div class="text">
                                <div class="background">
                                        <form name='IS'method='POST' action='../../Controlador/SesionController.php?accion=validar' >
                                                <table style="margin: 0 auto;">
                                                     <tr>
                                                         <td><font color="white"><center> Usuario</center></font></td>
                                                     </tr>
                                                     <tr>
                                                        <td> <input type="text" height="10" maxlength="30" class="cajasdetexto" name='usuario' required> </td>
                                                     </tr>
                                                     <tr>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                     <tr>
                                                         <td><font color="white"><center>Contraseña</center></font></td>
                                                     </tr>
                                                     <tr>
                                                         <td><input type="password" maxlength="30" class="cajasdetexto" name='clave' required></td>
                                                     </tr>
                                                 </table>
                                                 <br>
                                                 <table align="center">
                                                     <tr>
                                                         <td>
                                                            <center><input type='submit' class="boton" value='Iniciar Sesión' name='BtSesion'></center>
                                                         </td>
                                                     </tr>
                                                 </table>
                                             </form>
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
        </center>        
    
    <div id="encabezado">
				
			</div>
		<div id="barra">
			<div id="idsis">
			<a href="#"><img src="../imagenes1/sistema.png" width="250px" height="50px"><img src="../imagenes1/baloncesto.png" width="50px" height="45px"></a>
            </div>
		</div>
        
            </body>
<?php
	}
?>