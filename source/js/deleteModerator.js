/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




$(document).ready(function(){   
         $('#obrisiDugme').submit( function(event) {

            var form = this;
                                            
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/administratorcontroller/deletevalidation/",
                data : {//nameLogin : $("#nameLogin").val(),
                        //passLogin : $("#passLogin").val(),
                        secret : true},
                dataType: "json", 
                success:function(data){
                   //$("#ime").text.html(data);
                  alertify.log("Provera da li su dobro ime i sifra");
                   if (data.userExists === true) {
                     
                      alertify.success("Uspesno obrisan moderator"); 
                      form.submit();
                   }
                   else {
                     alertify.error("Neuspesno brisanje");
                   }
                }

            }); 
                   
            
        });
});