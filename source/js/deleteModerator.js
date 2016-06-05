/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){  
         $('button[name=brojmoj]').click( function(event) {

            var form=$('#obrisiDugme');

            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/administratorcontroller/deletevalidation/",
                data : {brojmoj : $(this).val(),
                        //pipi : $.name(formData),
                        secret : true},
                dataType: "json", 
                success:function(data){
                   //$("#ime").text.html(data);
                  alertify.log("Podaci primljeni");
                   if (data.userExists === true) {

                      alertify.success("Obrisan moderator: " +data.deleted); 
                      form.submit();
                      
                   }
                   else {
                     alertify.error("Neuspesno brisanje");
                   }
                }

            }); 
                   
            
        });
       
 
});
