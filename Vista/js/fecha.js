
function hoyfechas(){
    var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth()+1;
        var yyyy = hoy.getFullYear();
        
        dd = addZero(dd);
        mm = addZero(mm);
      
        var var2= yyyy+'-'+mm+'-'+dd;
        var var3=document.getElementById('fnac').value;

        if (var3>=var2) {
            alert('La fecha ingresada no puede ser superior a la actual');
            document.getElementById('fnac').value='';
        }
        
}


function valFechasfiltro()
{   
	f1 = document.getElementById('fecha1').value;
	f2 = document.getElementById('fecha2').value;
    

	if(f1 > f2)
	{

        /*alert("La fecha DESDE debe ser menor a la fecha de HASTA " + f1 +" / " + f2);*/
		document.getElementById('fecha2').value=""
		document.formvalidado.fecha1.value="";
	    document.formvalidado.fecha2.value="";
    }
}


function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
}

