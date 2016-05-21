
function f() {
    location.href = "Izaberi nivo.html";
};


function show1(){
	document.getElementById("d1").style.display='inline-block';
	document.getElementById("b11").disabled=true;
	document.getElementById("b12").disabled=true;

}

function show2(){
	document.getElementById("d2").style.display='inline-block';
	document.getElementById("b11").disabled=true;
	document.getElementById("b12").disabled=true;

}

function close1(){
	document.getElementById("d1").style.display='none';
	document.getElementById("b11").disabled=false;
	document.getElementById("b12").disabled=false;
}

function close2(){
	document.getElementById("d2").style.display='none';
	document.getElementById("b11").disabled=false;
	document.getElementById("b12").disabled=false;
}



