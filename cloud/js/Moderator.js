/**
 *
 * @author Jelica Cincović 640/13
 *
 */
/*function show3(){
	document.getElementById("d1").style.display='inline-block';
	document.getElementById("b11").disabled=true;

}

function close3(){
	document.getElementById("d1").style.display='none';
	document.getElementById("b11").disabled=false;

}*/

function t(){
    $('#myModalizmena').modal('hide');
            
            $('#myModalformaText').modal('show');
            document.getElementById("b11").disabled=true;
            document.getElementById("b12").disabled=true;
}

    function s(){
        $('#myModalizmena').modal('hide');
            
            $('#myModalformaPic').modal('show');
            document.getElementById("b11").disabled=true;
            document.getElementById("b12").disabled=true;
    }
    
    function l(){
        $('#myModalizmena').modal('hide');
            
            $('#myModalformaEnig').modal('show');
            document.getElementById("b11").disabled=true;
            document.getElementById("b12").disabled=true;
    }

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
             $('input[name=vrsta]').prop('checked', false);
            $('#myModalformaText').modal('show');
            document.getElementById("postavka").value="";
            document.getElementById("o1").value="";
            document.getElementById("o2").value="";
            document.getElementById("o3").value="";
            document.getElementById("o4").value="";
            document.getElementById("nivo").value="";
            document.getElementById("tacan").value="";
            document.getElementById("oblast").value="";
            document.getElementById("b11").disabled=true;
            document.getElementById("b12").disabled=true;
         }
         else if(pitanje==="Slika"){
              $('#myModaldodaj').modal('hide');
              $('input[name=vrsta]').prop('checked', false);
            $('#myModalformaPic').modal('show');
            document.getElementById("postavkas2").value="";
            document.getElementById("o1s2").value="";
            document.getElementById("o2s2").value="";
            document.getElementById("o3s2").value="";
            document.getElementById("o4s2").value="";
            document.getElementById("nivos2").value="";
            document.getElementById("tacans2").value="";
            document.getElementById("oblasts2").value="";
            document.getElementById("b11").disabled=true;
            document.getElementById("b12").disabled=true;
         }
         else if(pitanje==="Licnost"){
               $('#myModaldodaj').modal('hide');
               $('input[name=vrsta]').prop('checked', false);
            $('#myModalformaEnig').modal('show');
            document.getElementById("s1l3").value="";
            document.getElementById("s2l3").value="";
            document.getElementById("s3l3").value="";
            document.getElementById("s4l3").value="";
            document.getElementById("s5l3").value="";
            document.getElementById("s6l3").value="";
            document.getElementById("licnostl3").value="";
            document.getElementById("nivol3").value="";
            document.getElementById("oblastl3").value="";
            document.getElementById("b11").disabled=true;
            document.getElementById("b12").disabled=true;
         }
          else   alert("Morate uneti koje pitanje zelite");
       
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
    $("#zatvoriformuT").click(function(){
        $('#myModalformaText').modal('hide');
        //$('#vrsta')[0].reset();
        document.getElementById("b11").disabled=false;
        document.getElementById("b12").disabled=false;
    });
     $("#zatvoriformuP").click(function(){
        $('#myModalformaPic').modal('hide');
        //$('#vrsta')[0].reset();
        document.getElementById("b11").disabled=false;
        document.getElementById("b12").disabled=false;
    });
    $("#zatvoriformuL").click(function(){
        $('#myModalformaEnig').modal('hide');
        //$('#vrsta')[0].reset();
        document.getElementById("b11").disabled=false;
        document.getElementById("b12").disabled=false;
    });

   
});


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */





/*function fja(){
    $('myModal4').modal('show');
}*/