/**
 *
 * @author Jelica Cincović 640/13
 *
 */
function show3(){
	document.getElementById("d1").style.display='inline-block';
	document.getElementById("b11").disabled=true;

}

function close3(){
	document.getElementById("d1").style.display='none';
	document.getElementById("b11").disabled=false;

}

$(document).ready(function(){ 
    $("#ukloni").click(function(){
        $('#myModal4').modal('show');
        document.getElementById("ukloni").disabled=true;
        document.getElementById("kreiraj").disabled=true;
    });
    $("#zatvaram2").click(function(){
        $('#myModal4').modal('hide');
       document.getElementById("ukloni").disabled=false;
        document.getElementById("kreiraj").disabled=false;
    });
    $("#kreiraj").click(function(){
        $('#myModal3').modal('show');
        document.getElementById("ukloni").disabled=true;
        document.getElementById("kreiraj").disabled=true;
    });
    $("#zatvaram1").click(function(){
        $('#myModal3').modal('hide');
       document.getElementById("ukloni").disabled=false;
        document.getElementById("kreiraj").disabled=false;
    });
   
});



/*function fja(){
    $('myModal4').modal('show');
}*/