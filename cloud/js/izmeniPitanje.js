//Slavko Ivanovic 82/13
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $('button[name=izmeni]').click( function(event) {

            var form=$('#glavnaForma');
           
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/moderatorcontroller/izmeniAutoFill/",
                data : {id : $(this).val(),
                        secret : true},
                dataType: "json", 
                success:function(data){
                   //$("#ime").text.html(data);
                  alertify.log("Podaci primljeni");
                 // alertify.success("Pocinjemoo: " + data.tip); 
                   if (data.tip === 1) {
                       $('#postavka1').val( data.postavka);
                       $('#o11').val( data.odgovor1);
                       $('#o21').val( data.odgovor2);
                       $('#o31').val( data.odgovor3);
                       $('#o41').val( data.odgovor4);
                       $('#tacan1').val( data.tacan);
                       $('#nivo1').val( data.idniv);
                       $('#oblast1').val( data.idobl);
                       $('#submit1').val( data.id);
                       
                       $('#myModalizmena').modal('hide');
                       $('#Textizmena').modal('show');
                       $('#Picizmena').modal('hide');
                        
                        document.getElementById("b11").disabled=true;
                        document.getElementById("b12").disabled=true;
                     // alertify.success("Obrisan moderator: " +data.idniv); 
                     
                     
                      
                   }else if(data.tip === 2){
                      // alertify.success("Slika forma"); 
                       $('#postavka2').val( data.postavka);
                       $('#o12').val( data.odgovor1);
                       $('#o22').val( data.odgovor2);
                       $('#o32').val( data.odgovor3);
                       $('#o42').val( data.odgovor4);
                       $('#tacan2').val( data.tacan);
                       $('#nivo2').val( data.idniv);
                       $('#oblast2').val( data.idobl);
                       $('#submit2').val( data.id);
                       
                        $('#myModalizmena').modal('hide');
                        $('#Picizmena').modal('show');
                        
                        document.getElementById("b11").disabled=true;
                        document.getElementById("b12").disabled=true;
                       // alertify.success("Zatvorewna forma 2 "); 
                   }else if(data.tip === 3){
                       $('#s13').val( data.podatak1);
                       $('#s23').val( data.podatak2);
                       $('#s33').val( data.podatak3);
                       $('#s43').val( data.podatak4);
                       $('#s53').val( data.podatak5);
                       $('#s63').val( data.podatak6);
                       $('#licnost3').val( data.licnost);
                       $('#tacan3').val( data.tacan);
                       $('#nivo3').val( data.idniv);
                       $('#oblast3').val( data.idobl);
                       $('#submit3').val( data.id);
                       
                       $('#myModalizmena').modal('hide');
                        $('#Enigizmena').modal('show');
                        
                        document.getElementById("b11").disabled=true;
                        document.getElementById("b12").disabled=true;
                      //  alertify.success("Zatvorena forma 3 "); 
                       
                   }
                   //alertify.success("KRAJ If-a: "); 
                }

            }); 
            
        });
    /*$("#zatvoriformuTi").click(function(){
        $('#Textizmena').modal('hide');
        //$('#Picizmena').modal('hide');
        document.getElementById("b11").disabled=false;
        document.getElementById("b12").disabled=false;
    });*/
    $("#zatvoriformuPi").click(function(){
        $('#Picizmena').modal('hide');
        document.getElementById("b11").disabled=false;
        document.getElementById("b12").disabled=false;
    });
    $("#zatvoriformuLi").click(function(){
        $('#Enigizmena').modal('hide');
        document.getElementById("b11").disabled=false;
        document.getElementById("b12").disabled=false;
    });
    $("#zatvoriformuTi").click(function(){
      $('#Textizmena').modal('hide');
      //$('#Picizmena').modal('hide');
      document.getElementById("b11").disabled=false;
      document.getElementById("b12").disabled=false;
      });
              //tekst forma
    $('button[name=submit1]').click( function(event) {
         var form=$('#izmenaForma1');
         
           
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/moderatorcontroller/inputValidationTekstPitanje/",
                data : {id : $(this).val(),
                        nivo: $('#nivo1').val(),
                        oblast: $('#oblast1').val(),
                        postavka: $('#postavka1').val(),
                        o1: $('#o11').val(),
                        o2: $('#o21').val(),
                        o3: $('#o31').val(),
                        o4: $('#o41').val(),
                        tacan: $('#tacan1').val(),
                        secret : true},
                dataType: "json", 
                success:function(data){
               
                    if(data.succ === true){
                         alertify.success("Uspjesno izmenjeno pitanje: " + data.id);
                         $('#izmenaForma1').attr('action', 'ModeratorController/izmeniTekstPitanje/'+data.id);
                        form.submit();
                    }else{
                        alertify.error( data.error );
                    }
                    
                }
                });
    });
    //slika pitanje
    $('button[name=submit2]').click( function(event) {
         var form=$('#izmenaForma2');
        var mem=234;
      
        var filename = $("#userfileus").val();
        
            var extension = filename.replace(/^.*\./, '');
               if (extension == filename) {
                extension = '';
            } else {
                extension = extension.toLowerCase();
            }
        
        mem=extension;
           
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/moderatorcontroller/inputValidationSlikaPitanje/",
                data : {id : $(this).val(),
                        nivo: $('#nivo2').val(),
                        oblast: $('#oblast2').val(),
                        postavka: $('#postavka2').val(),
                        o1: $('#o12').val(),
                        o2: $('#o22').val(),
                        o3: $('#o32').val(),
                        o4: $('#o42').val(),
                        tacan: $('#tacan2').val(),
                        userfile: $('#userfile').val(),
                        memorija: mem,
                        secret : true},
                dataType: "json", 
                success:function(data){
               
                    if(data.succ === true){
                         alertify.success("Uspjesno izmenjeno pitanje: " + data.id);
                         $('#izmenaForma2').attr('action', 'ModeratorController/izmeniSlikaPitanje/'+data.id);
                        form.submit();
                    }else{
                        alertify.error( data.error );
                    }
                    
                }
                });
    });
    //licnost pitanje
        $('button[name=submit3]').click( function(event) {
        var form=$('#izmenaForma3');
        var mem=234;
      
        var filename = $("#userfileul").val();
        
            var extension = filename.replace(/^.*\./, '');
               if (extension == filename) {
                extension = '';
            } else {
                extension = extension.toLowerCase();
            }
        
        mem=extension;
           
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/moderatorcontroller/inputValidationLicnostPitanje/",
                data : {id : $(this).val(),
                        nivo: $('#nivo3').val(),
                        oblast: $('#oblast3').val(),
                        licnost: $('#licnost3').val(),
                        s1: $('#s13').val(),
                        s2: $('#s23').val(),
                        s3: $('#s33').val(),
                        s4: $('#s43').val(),
                        s5: $('#s53').val(),
                        s6: $('#s63').val(),
                        memorija: mem,
                       // tacan: $('#tacan3').val(),
                        //userfile: $('#userfile').val(),
                        secret : true},
                dataType: "json", 
                success:function(data){
                   // alertify.error( data.idniv );
                    if(data.succ === true){
                        alertify.success("Uspjesno izmenjeno pitanje: " + data.id);
                        $('#izmenaForma3').attr('action', 'ModeratorController/izmeniLicnostPitanje/'+data.id);
                        form.submit();
                    }else{
                        alertify.error( data.error );
                    }
                    
                }
                });
    });
                                            
});