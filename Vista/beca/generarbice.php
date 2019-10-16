<?php
session_start();
//echo $_SESSION['cliar'];
$file = fopen($_SESSION['nombres'].'BICENTENARIO', "c") or die ("No se pudo crear el archivo");
fwrite($file, "1000436501750071690071178501".$_SESSION['fechas'].$_SESSION['cantidadbice']."00".$_SESSION['totalbice']);
fwrite($file, "\r\n");
fwrite($file, $_SESSION['bicen']);
fclose($file);

$archivo = fopen($_SESSION['nombres'].'BICENTENARIO', "r") or die ("No se pudo abrir archivo");
//si quiero agregar texto al archivo ya existente
while(!feof($archivo))
{
	$traer = fgets($archivo);
	$salto = nl2br($traer);
	echo $salto;
}