/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




$(document).ready(function(){  
    //var form=$("obrisiDugme");
        // $('.button3').click( function(event) {
         $('button[name=brojmoj]').click( function(event) {

            var form=$('#obrisiDugme');
          // var formData= $('#obrisiDugme').serialize() + '&brojmoj=' + $(this).val();
         //  formData.push({name: this.name, value: this.value});
        /*  var len=formData.length;
           var podaci={};
           for(i=0;i<len;i++){
               podaci[formData[i].name]=formData[i].value;
           }
             var val=$(this).val();
             
             */
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
