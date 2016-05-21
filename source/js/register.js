

$(document).ready(function(){   
    $('#registerForm').submit( function(event) {

        var form = this;
        event.preventDefault();
        alert("Proverava da li su dobri podaci");
        $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/main/registerValidation/",

            data : {
                    userNameRegister : $("#userNameRegister").val(),
                    passRegister : $("#passRegister").val(),
                    repeatPass : $("#repeatPass").val(),
                    nameRegister : $("#nameRegister").val(),
                    surNameRegister : $("#surNameRegister").val()
                },

            dataType: "json", 
            success:function(data){
                //$("#ime").text.html(data);
                alert('Podaci primljeni');

                if (data.registerSucc === true) {

                    alert("Uspesno registrovanje, sad cete biti preusmereni na stranicu za prijavljivanje");
                    form.submit();
                }
                else {
                    alert(data.error );
                }
            }

        }); 
    });
}); 