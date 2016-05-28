
$(document).ready(function(){   
    $('#registerFormModerator').submit( function(event) {

        var form = this;
        event.preventDefault();
        alertify.log("Proverava da li su dobri podaci");
        $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/administratorcontroller/registerValidationModerator/",

            data : {
                    userNameRegister : $("#userNameRegister").val(),
                    passRegister : $("#passRegister").val(),
                    repeatPass : $("#repeatPass").val(),
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                //$("#ime").text.html(data);
                alertify.log('Podaci primljeni');

                if (data.registerSucc === true) {

                    alertify.success("Uspesno registrovanje novog moderatora");
                    form.submit();
                }
                else {
                    alertify.error(data.error );
                }
            }

        }); 
    });
}); 