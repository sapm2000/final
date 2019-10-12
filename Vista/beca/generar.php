<?php
session_start();
//echo $_SESSION['cliar'];
$file = fopen("ejemplo".date('his'), "c") or die ("No se pudo crear el archivo");
fwrite($file, "ENCABEZADO PARA MODIFICAR.......");
fwrite($file, "\r\n");
fwrite($file, $_SESSION['cliar']);
fclose($file);

$archivo = fopen("ejemplo".date('his'), "r") or die ("No se pudo abrir archivo");
//si quiero agregar texto al archivo ya existente
while(!feof($archivo))
{
	$traer = fgets($archivo);
	$salto = nl2br($traer);
	echo $salto;
}