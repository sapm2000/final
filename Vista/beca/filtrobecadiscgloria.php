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
$disciplina1 = "<select name='tercer' required>";
$disciplina1.= "<option>Seleccione una disciplina</option> required";

foreach ($todosala as $tb) {
	$disciplina1.= "<option value=".$tb['disciplina'].">".$tb['disciplina']."</option>";	
}
$disciplina1.= "</select>";


$perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];
$_SESSION['titulo']='Reporte de Becas por Disciplinas para Atletas Gloriosos';
$form='';
$cata='';
$boton='';
$form.='<form name="atleta" method="post" action="../../Controlador/BecaController.php?accion=filtroespecificodisciplinagloria">';
$form.='<table>';
$form.='<tr>';
$form.='<td>Ingrese el rango de fecha a buscar:</td>';
$form.='</tr>';
$form.='</table>';
$form.='<table align=center>';
$form.='<tr>';
$form.='<td>Desde:<input  type="date" class="date" name="primer" id="fecha1"   value="2019-11-01" onblur="valFechasfiltro()" required></td>';
$form.='<td>Hasta:<input  type="date" class="date"  name="segundo" id="fecha2"  value="'.date("Y-m-d").'" onblur="valFechasfiltro()"  required></td>';

$form.='<td> <input type="submit" class="botonmodal" value="Buscar"> </td>';
$form.='</tr>';
$form.='</table>';
$form.='<table aling=center>';
$form.='<tr>';
$form.='<td>Disciplina</td>';
$form.='<td>'.$disciplina1.'</td>';
$form.='</tr>';
$form.='</table>';
$form.='</form>';






$diccionario = array 
(
	'PERFIL' => $perfil,
	'TITULO'=>'Filtrar Becas Gloriosas por Fecha y Disciplina',
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
