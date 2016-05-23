
$(document).ready(function(){   
    $('#registerFormModerator').submit( function(event) {

        var form = this;
        event.preventDefault();
        alert("Proverava da li su dobri podaci");
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
                alert('Podaci primljeni');

                if (data.registerSucc === true) {

                    alert("Uspesno registrovanje novog moderatora");
                    form.submit();
                }
                else {
                    alert(data.error );
                }
            }

        }); 
    });
}); 