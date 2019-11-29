<?php
session_start();
//echo $_SESSION['cliar'];
$file = fopen("/home/metodologos/Escritorio/".$_SESSION['nombres'].".txt", "c") or die ("No se pudo crear el archivo");
fwrite($file, "1000436501750071690071178501".$_SESSION['fechas'].$_SESSION['cantidad']."00".$_SESSION['total']."00");
fwrite($file, "\r\n");
fwrite($file, $_SESSION['cliar']);
fclose($file);

