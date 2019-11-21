function solonumeros(e){
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key);
	numeros="0123456789";
	especiales="8-17-37-38-46";
	teclado_especial=false;
	for(var n in especiales)
	{
	if(key==especiales[n])
	{
		teclado_especial=true;
	}
	
	}
	if(numeros.indexOf(teclado)==-1 && !teclado_especial)
	{
	return false;
	}
	}

	function solonumerosycoma(e){
		key=e.keyCode || e.which;
		teclado=String.fromCharCode(key);
		numeros="0123456789,";
		especiales="8-17-37-38-46";
		teclado_especial=false;
		for(var n in especiales)
		{
		if(key==especiales[n])
		{
			teclado_especial=true;
		}
		
		}
		if(numeros.indexOf(teclado)==-1 && !teclado_especial)
		{
		return false;
		}
		}
	
	function solonumerosypuntos(e){
		key=e.keyCode || e.which;
		teclado=String.fromCharCode(key);
		numeros="0123456789.";
		especiales="8-17-37-38-46";
		teclado_especial=false;
		for(var n in especiales)
		{
		if(key==especiales[n])
		{
			teclado_especial=true;
		}
		
		}
		if(numeros.indexOf(teclado)==-1 && !teclado_especial)
		{
		return false;
		}
		}

function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-17-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }

     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
}

function caracteres(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz1234567890";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }

     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
}
function caracteress(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz1234567890";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }

     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
}

function validateMail(id_Mail)
{
	//Creamos una variable 
	variable=document.getElementById(id_Mail);
	valueForm=variable.value;
    var1=valueForm.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/);
	// Patron para el correo
	if(var1==0)
	{
		//Mail correcto
		variable.style.color="#008000";
		return;
	}
	//Mail incorrecto
	alert("el correo es incorrecto");
	variable.value=''
}
function valFechas()
{   
	f1 = document.getElementById('fecha1').value;
	f2 = document.getElementById('fecha2').value;
	
	if(f1 > f2)
	{
		alert("La fecha inicial debe ser menor o igual a la fecha de cierre " + f1 +" " + f2);
		document.getElementById('fecha2').value=""
		document.formvalidado.fecha1.value="";
	    document.formvalidado.fecha2.value="";
	}
	
}

