
/*function show3(){
	document.getElementById("d1").style.display='inline-block';
	document.getElementById("b11").disabled=true;

}

function close3(){
	document.getElementById("d1").style.display='none';
	document.getElementById("b11").disabled=false;

}*/

$(document).ready(function(){ 
    $("#b11").click(function(){
        $('#myModaldodaj').modal('show');
        
        document.getElementById("b11").disabled=true;
        document.getElementById("b12").disabled=true;
    });
    $("#b12").click(function(){
        $('#myModalizmena').modal('show');
        
        document.getElementById("b11").disabled=true;
        document.getElementById("b12").disabled=true;
    });
     $("#dod2").click(function(){
         var pitanje=$('input[name=vrsta]:checked', '#myModaldodaj').val(); 
         if(pitanje==="Tekstualno"){
             $('#myModaldodaj').modal('hide');
            $('#myModalforma').modal('show');
            document.getElementById("b11").disabled=true;
            document.getElementById("b12").disabled=true;
         }
         else
         alert("Morate uneti koje pitanje zelite");
       
    });
    $("#zatvaram").click(function(){
        $('#myModaldodaj').modal('hide');
        //$('#vrsta')[0].reset();
        document.getElementById("b11").disabled=false;
        document.getElementById("b12").disabled=false;
    });
    $("#zatform").click(function(){
        $('#myModalizmena').modal('hide');
        //$('#vrsta')[0].reset();
        document.getElementById("b11").disabled=false;
        document.getElementById("b12").disabled=false;
    });
    $("#zatvoriformu").click(function(){
        $('#myModalforma').modal('hide');
        //$('#vrsta')[0].reset();
        document.getElementById("b11").disabled=false;
        document.getElementById("b12").disabled=false;
    });
   
});



/*function fja(){
    $('myModal4').modal('show');
}*/