<?php
session_start();
if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
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






if($_GET['accion']=="actual")
{

	$encabezado = $_SESSION['encabezado'];
	$cata.="<table class=tabla-cat id=tabla>";

	$cata.="<tr><th>Fecha</th><th>Monto Total</th><th>Becados</th><th>Nombre de la Beca</th></tr>";
	foreach($encabezado as $enc)
	{
		$cata.="<tr>";	
		$cata.="<td>".$enc['fecha']."</td>";	
		$cata.="<td>".$enc['montoT']."</td>";	
		$cata.="<td>".$enc['becados']."</td>";	
		$cata.="<td>".$enc['nombre']."</td>";	
		
	}
	$cata.="</table><br>";


	$catalogo = $_SESSION['detallebeca'];
	$cata.="<table class=tabla-cat id=tabla>";
	$cata.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Monto</th></tr>";
	foreach($catalogo as $cat)
	{
		$cata.="<tr>";	
		$cata.="<td>".$cat['cedula']."</td>";	
		$cata.="<td>".$cat['nombre']."</td>";	
		$cata.="<td>".$cat['apellido']."</td>";	
		$cata.="<td> <input type='text' readonly id='b".$cat['id']."' name='pago".$cat['id']."'  value=".$cat['monto']."></td>";	
		
		



		
		$cata.="</tr>";	
	}
	$cata.='<br>';
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