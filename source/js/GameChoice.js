/*
 * * Djordje Zivanovic 0033/2013
 */
$(document).ready(function(){   
    $('#newGameForm').submit( function(event) {

        var form = this;
        event.preventDefault();
      
        alertify.log("Proverava da li postoji igra");
        $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/game/checkOldGame/",

            data : {
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                alertify.success('Podaci primljeni');
                
                if (data.dataExists === true) {
                    
                    alertify.confirm("Zelite li da obrisete staru igru?",function(e){
                        if(e) {
                           
                        alertify.success('Nova igra pocinje brisanje');
                        form.submit();
                        } else {
                             alertify.log('Nista');
                         
                        }

                    });
                    
                }
                else {
                    alertify.success('Nova igra pocinje');
                    form.submit();
                }
            }

        }); 
    });
}); 


$(document).ready(function(){   
    $('#oldGameForm').submit( function(event) {

        var form = this;
        event.preventDefault();
        alertify.log("Proverava da li postojii igra");
        $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/game/checkOldGame/",

            data : {
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                alertify.success('Podaci primljeni');

                if (data.dataExists === true) {
                    alertify.success('Igra se nastavlja');
                    form.submit();
                }
                else {
                    alertify.error('Igra ne postoji');
                }
            }

        }); 
    });
}); 
