<?php
session_start();
//echo $_SESSION['cliar'];
$file = fopen("/home/maryo/Escritorio/".$_SESSION['nombres'].'BICENTENARIO'.".txt", "c") or die ("No se pudo crear el archivo");
fwrite($file, "1000436501750071690071178501".$_SESSION['fechas'].$_SESSION['cantidadbice']."00".$_SESSION['totalbice']);
fwrite($file, "\r\n");
fwrite($file, $_SESSION['bicen']);
fclose($file);


