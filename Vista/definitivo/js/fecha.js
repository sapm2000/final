
function hoyfecha(){
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


function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
}

