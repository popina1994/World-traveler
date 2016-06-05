
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
                   if (data.tip == 1) {
                       $('#postavka1').val( data.postavka);
                       $('#o11').val( data.odgovor1);
                       $('#o21').val( data.odgovor2);
                       $('#o31').val( data.odgovor3);
                       $('#o41').val( data.odgovor4);
                       $('#tacan1').val( data.tacan);
                       $('#nivo1').val( data.idniv);
                       $('#oblast1').val( data.idobl);
                       
                        $('#myModalformaTextizmena').modal('show');
                        $('#myModalizmena').modal('hide');
                        document.getElementById("b11").disabled=true;
                        document.getElementById("b12").disabled=true;
                      alertify.success("Obrisan moderator: " +data.idniv); 
                      //form.submit();
                      
                   }
                   else if(data.tip==2){
                     alertify.error("Neuspesno brisanje");
                   }else if(data.tip==3){
                       
                   }
                }

            }); 
            
        });
    $("#zatvoriformuTi").click(function(){
        $('#myModalformaTextizmena').modal('hide');
        //$('#vrsta')[0].reset();
        document.getElementById("b11").disabled=false;
        document.getElementById("b12").disabled=false;
    });
});