<?php
session_start();


$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$form='';
$cata='';
$boton='';
$select='';
$estadocivil='';
$sexo='';
$tipo='';
if($_GET['accion']=='ver_detalles') {


$datos = $_SESSION['modilogro'];
foreach($datos as $d)
{
		$id=$d['id'];
		$tip=$d['tipo'];
		$pai=$d['pais'];
		$est=$d['estado'];
		$ciu=$d['ciudad'];
		$dis=$d['disciplina'];
		$des=$d['descripcion'];
		$res=$d['resultado'];
		$obs=$d['observacion'];

}

$todos = $_SESSION['tipologro'];
$tipo = "<select name='tipo' required>";
$tipo.= "<option value=''>Seleccione un tipo de logro</option>";
foreach($todos as $td)
{
	if ($tip==$td['tipo_logro']) {
		$tipo.= "<option selected>".$td['tipo_logro']."</option>";	
	}
	else {
		$tipo.= "<option>".$td['tipo_logro']."</option>";	
	}
}
$tipo.= "</select>";

$x = $_SESSION['disciplinas'];
$disciplina = "<select name='disciplina' required>";
$disciplina.= "<option value=''>Seleccione una disciplina</option>";
foreach($x as $td)
{
	if ($dis==$td['disciplina']) {
		$disciplina.= "<option selected>".$td['disciplina']."</option>";	
	}

	else {
		$disciplina.= "<option>".$td['disciplina']."</option>";	
	}
}
$disciplina.= "</select>";





$form.="<form name='modiform' method='post' action='../../Controlador/LogroController.php?accion=modificar&id=".$id."'>";
$form.='<table>';
$form.='<tr>';
$form.='<td>&nbsp;</td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Tipo de Logro:</td>';
$form.='<td>'.$tipo.'</td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Pais:</td>';
$form.='<td><input id="letra" type="text" class="cajasdetexto" value="'.$pai.'" onkeypress="return soloLetras(event)" name="pais" onpaste="return false" pattern="[A-Z a-z Ññ/s]{2,15}" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Estado:</td>';
$form.='<td><input id="letras" type="text" name="estado" class="cajasdetexto" value="'.$est.'" maxlenght="9" onkeypress="return soloLetras(event)" onpaste="return false" pattern="[A-Z a-z Ññ/s]{2,15}" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Ciudad:</td>';
$form.='<td><input type="text" name="ciudad" class="cajasdetexto" onkeypress="return soloLetras(event)" value="'.$ciu.'" onpaste="return false" pattern="[A-Z a-z Ññ/s]{2,15}" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Disciplina:</td>';
$form.='<td>'.$disciplina.'</td>';
$form.='</tr>';
$form.='<tr>';
$form.='<tr>';
$form.='<td>Resultado:</td>';
$form.='<td><input id="letras" type="text" value="'.$res.'" name="resultado" size="3" class="cajasdetexto" onkeypress="return solonumeros(event)" onpaste="return false" required></td>';
$form.='</tr>';
$form.='<td>Descripción:</td>';
$form.='<td><input id="letras" type="text" value="'.$des.'" name="descripcion" class="cajasdetexto" required></td>';
$form.='</tr>';
$form.='<tr>';
$form.='<td>Observaciones:</td>';
$form.='<td><input id="letras" type="text" value="'.$obs.'" name="observacion" class="cajasdetexto" onpaste="return false" required></td>';
$form.='</tr>';
$form.='</table>';
$form.='<table align="center">';
$form.='<tr>';
$form.='<td> <input type="submit" value="Registrar" id="submit" name="BtModificar"> </td>';
$form.='</tr>';
$form.='</table>';
$form.="</form>";
$form.="</div>";
}
















$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Logro',
	'CATALOGO'=>'',
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