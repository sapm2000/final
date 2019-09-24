function monto () {
    xx=document.getElementById('becas').value;
    if (xx=='on') {
        document.getElementById('x').style.display= 'block';
        document.getElementById('becas').value ='5'
    }
    if (xx!='on') {
        document.getElementById('x').style.display = 'none';
        document.getElementById('becas').value = 'on'
    }
}