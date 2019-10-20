<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
if($_GET['accion']=="actualizar"||empty($_REQUEST['accion']))
{
	header("Location: ../../Controlador/BecaController.php?accion=buscaGlobal");
}



$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';

$form.='<table>';
$form.='<tr>';
$form.='<td>Buscador:</td>';
$form.='<td><input id="searchTerm" type="text" class="cajasdetexto" onkeyup="doSearch()" id="letra" name="Beca" maxlenght="9" pattern="[a-z A-Z 0-9 ñÑ\s]{2,25}" title="máximo de 25 caracteres" ></td>';
$form.='</tr>';
$form.='</table>';
$form.='<table>';
$form.='<tr>';
$form.='<td><a href="../beca/becanueva.php?accion=actualizar"><input type="button" class="botonmodal" value="Nueva Beca"></a></td>';
$form.='</tr>';
$form.='</table>';






if($_GET['accion']=="actual" && !empty($_SESSION['catabeca1']))
{
	$catalogo = $_SESSION['catabeca1'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>nombre</th><th>fecha</th><th>Monto Pagado</th><th>Becados</th><th>Acción</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['fecha']."</td>";	
		$cata.="<td>".$cat['montoT']."</td>";	
		$cata.="<td>".$cat['becados']."</td>";	
		
		$cata.="<td><a href='../../Controlador/BecaController.php?accion=seleccionar&fecha=".$cat['fecha']."&nombre=".$cat['nombre']."'>";	
		$cata.="<img src='../imagenes1/editar.png' width='15px' height='15px' title='Editar'></a></td>";
		
		
		$cata.="</tr>";	
	}
	$cata.="</table><br>";
	$cata.="</form>";

}

else
{
	$cata.='<br>';
	$cata.= "Aún no se han registrado becas.";
	$cata.='<br>';
	$cata.='<br>';
}

$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Becas',
	'CATALOGO'=>$cata,
	'BOTONREG'=>$boton,
	'FORMULARIO'=>$form,
	'MENU'=>$_SESSION['menu']
);
$template = file_get_contents('../Plantilla/ventanamodal.html');
foreach ($diccionario as $clave=>$valor)
{
	$template = str_replace("{".$clave."}", $valor, $template);
}
print $template;
?>
