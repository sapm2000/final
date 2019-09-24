function prueba () {
    var var1=document.getElementById('hola').value;
    var var2=document.getElementById('adios').value;
    if (var1=='admin' && var2=='12345') {

       document.getElementById('enviar').style.display='block'
        
        
    }
    if (var1!='admin' || var2!='12345') {

        document.getElementById('enviar').style.display='none'
         
         
     }



    
}

function ocultar () {
    document.getElementById('enviar').style.display = 'none';

}
