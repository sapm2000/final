<?php
	session_start();
    
    if(empty($_SESSION['nombre']))
	{
		header('Location: ../Persona/InicioSesion.php');
	}
        if($_GET['accion']=="actualizar"||empty($_REQUEST['accion']))
    {
        header("Location: ../../Controlador/BecaController.php?accion=buscatodos2");
    }
    if($_GET['accion']=="actualizar1")
    {
        header("Location: ../../Controlador/BecaController.php?accion=buscatodos22");
    }


    $perfil = $_SESSION['nombre']." ".$_SESSION['apellido'];

        $cata = '';
        $catalogo = $_SESSION['catabeca5'];
        $cata.= '<table>';
        $cata.= '<tr>';
        $cata.= '<td>Buscar: <input type="text" name="buscar" id="buscar" class="cajasdetexto"></td>';
        $cata.= '</tr>';
        $cata.= '<tr>';
        $cata.= '<td><a href="generar.php" target="_blank"><button id="descargar" class="botonmodal">Generar TXT general</button></a></td>';
        $cata.= '</tr>';
        $cata.= '<tr>';
        $cata.= '<td><a href="generarbice.php" target="_blank"><button id="descargar" class="botonmodal">Generar TXT bicentenario</button></a></td>';
        $cata.= '</tr>';
        $cata.= '</table>';

		$cata.="<table class=tabla-cat id=tabla>";
        $cata.="<tr><th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Monto</th></tr>";
        $data = '';
        $bice='';
	    foreach($catalogo as $cat)
	    {

            if (strncmp($cat['numeroc'],'0175',4)===0) {
                $bice.= '20';
                $bice.= $cat['nac'];
                $numeroConCeros = str_pad($cat['ced'], 9, "0", STR_PAD_LEFT);
                $bice.= $numeroConCeros;
                $bice.= $cat['numeroc'];
                $bice.= '00000';
                $numeroConCeros1 = str_pad($cat['monto'], 8, "0", STR_PAD_LEFT);
                $bice.= $numeroConCeros1;
                $bice.= '00'."\r\n";



            }
            else {
                $data.= '20';
                $data.= $cat['nac'];
                $numeroConCeros = str_pad($cat['ced'], 9, "0", STR_PAD_LEFT);
                $data.= $numeroConCeros;
                $data.= $cat['numeroc'];
                $data.= '00000';
                $numeroConCeros1 = str_pad($cat['monto'], 8, "0", STR_PAD_LEFT);
                $data.= $numeroConCeros1;
    
                $data.= '00'."\r\n";


            }
            $cata.="<tr>";	
            $cata.="<td>".$cat['cedula']."</td>";	
            $cata.="<td>".$cat['nombre']."</td>";	
            $cata.="<td>".$cat['apellido']."</td>";
            $cata.="<td>".$cat['disc']."</td>";	
	


            
            
            
            $cata.="<td> <input type='text' id='b".$cat['id']."' readonly name='pago".$cat['id']."' value='".$cat['monto']."' onkeypress='return solonumeros(event)' pattern='([1-9]{1})([0-9]{3,})' title='ej: 25000' class='cajasdetexto' onpaste='return false'></td>";            
           





		
	    	$cata.="</tr>";	
    }
    

        $_SESSION['cliar'] = $data;
        $_SESSION['bicen'] = $bice;

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