function dis() {
	var var1=document.getElementById('disciplina').value;

    if (var1=='beisbol') {
        document.getElementById('cfu').style.display = 'none';
        document.getElementById('cbe').style.display = 'block';
    }
    if (var1=='futbol') {
        document.getElementById('cfu').style.display = 'block';
        document.getElementById('cbe').style.display = 'none';
    }

}


