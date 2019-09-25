function campodoble () {
	var var1=document.getElementById('contra1').value;
	var var2=document.getElementById('contra2').value;

    

    if (var1!=var2) {
        document.getElementById('contra1').style.color="red";
        document.getElementById('contra2').style.color="red";
    }
    if (var1==var2) {
        document.getElementById('contra1').style.color="green";
        document.getElementById('contra2').style.color="green";
    }

}