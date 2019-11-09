<?php
session_start();
if(empty($_SESSION['nombre']))
{
	header('Location: ../Persona/InicioSesion.php');
}



if(empty($_REQUEST['accion']))
{
	header("Location: ../menuv/menuv.php?accion=validado");
}


$todosala = $_SESSION['disciplin'];
$disciplina1 = "<select name='primer' required>";
$disciplina1.= "<option>Seleccione una disciplina</option> required";

foreach ($todosala as $tb) {
	$disciplina1.= "<option value=".$tb['id'].">".$tb['disciplina']."</option>";	
}
$disciplina1.= "</select>";


$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$_SESSION['titulo']='Reporte de Atletas Filtrado por Modalidad';
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/AtletaController.php?accion=filtrodisciplinas">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese la disciplina a buscar</td>';
$form.='<td>'.$disciplina1.'</td>';
$form.='<td> <input type="submit" class="botonmodal" value="Buscar"> </td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';






$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Filtrar Disciplina',
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
