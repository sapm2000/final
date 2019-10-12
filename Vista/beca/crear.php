<?php
	session_start();
	
        if($_GET['accion']=="actualizar"||empty($_REQUEST['accion']))
    {
        header("Location: ../../Controlador/BecaController.php?accion=buscatodos2");
    }
    $perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];

        $cata = '';
        $catalogo = $_SESSION['catabeca5'];
		$cata.= 'Buscar: <input type="text" name="buscar" id="buscar" class="input"> ';
		$cata.= '<a href="generar.php" target="_blank"><button id="descargar" class="bt-nuevo">Generar TXT</button></a><br><br>';
		$cata.="<table class=tabla-cat id=tabla>";
	    $cata.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Monto</th></tr>";
	    foreach($catalogo as $cat)
	    {
            $cata.="<tr>";	
            $data.= '20';
            $data.= $cat['nac'];
            $cata.="<td>".$cat['cedula']."</td>";	
            $numeroConCeros = str_pad($cat['ced'], 9, "0", STR_PAD_LEFT);
            $data.= $numeroConCeros;
            $cata.="<td>".$cat['nombre']."</td>";	
            $data.= $cat['numeroc'];
            $cata.="<td>".$cat['apellido']."</td>";	
            $data.= '00000';


            
            
            
            $cata.="<td> <input type='text' id='b".$cat['id']."' name='pago".$cat['id']."' value='".$cat['monto']."' onkeypress='return solonumeros(event)' pattern='([1-9]{1})([0-9]{3,})' title='ej: 25000' class='cajasdetexto' onpaste='return false'></td>";            
            $data.= $cat['monto'];
            $data.= '00'."\n";





		
	    	$cata.="</tr>";	
    }
    

		$_SESSION['cliar'] = $data;
		$cata.= '</tbody>';
        $cata.= '</table>';
        
        $diccionario = array 
        (
            'PERFIL' => $perfil,
            'TITULO'=>'Becas',
            'CATALOGO'=>$cata,
            'BOTONREG'=>'',
            'FORMULARIO'=>'',
            'MENU'=>$_SESSION['menu']
        );
        $template = file_get_contents('../Plantilla/ventanamodal.html');
        foreach ($diccionario as $clave=>$valor)
        {
            $template = str_replace("{".$clave."}", $valor, $template);
        }
        print $template;    




?>