
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
        
        document.getElementById("b11").disabled=true;
    });
    $("#zatvaram").click(function(){
        $('#myModal4').modal('hide');
       
        document.getElementById("b11").disabled=false;
    });
   
});



/*function fja(){
    $('myModal4').modal('show');
}*/