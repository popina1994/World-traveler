/*
 * * Djordje Zivanovic 0033/2013
 */

$(document).ready(function(){   
    $('#registerForm').submit( function(event) {

        var form = this;
        event.preventDefault();
        alertify.log("Proverava da li su dobri podaci");
        $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/main/registerValidation/",

            data : {
                    userNameRegister : $("#userNameRegister").val(),
                    passRegister : $("#passRegister").val(),
                    repeatPass : $("#repeatPass").val(),
                    nameRegister : $("#nameRegister").val(),
                    surNameRegister : $("#surNameRegister").val(),
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                //$("#ime").text.html(data);
                alertify.log('Podaci primljeni');

                if (data.registerSucc === true) {

                    alertify.success("Uspesno registrovanje, sad cete biti preusmereni na stranicu za prijavljivanje");
                    form.submit();
                }
                else {
                    alertify.error(data.error );
                }
            }

        }); 
    });
}); 