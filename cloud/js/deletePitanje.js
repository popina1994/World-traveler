//Slavko Ivanovic 82/13

$(document).ready(function(){ 
            $('button[name=obrisi]').click( function(event) {

            var form=$('#glavnaForma');
           
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/moderatorcontroller/deletePitanje/",
                data : {id : $(this).val(),
                        secret : true},
                dataType: "json", 
                success:function(data){
                   //$("#ime").text.html(data);
                  alertify.log("Podaci primljeni");
                   if (data.succ === true) {

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