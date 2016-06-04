$(document).ready(function(){   
    var warning = 0;
    $('.areaMap').click( function(event) {
        
        event.preventDefault();
        $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/moderatorcontroller/izmeniTekstAutoFill/",

            data : {
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                if (data.canAttack) {
                    
                    $('h4.textQuestion').text(data.text);
                    $('label[for=answerTextA]').html(data.a);
                    $('label[for=answerTextB]').html(data.b);
                    $('label[for=answerTextC]').html(data.c);
                    $('label[for=answerTextD]').html(data.d);
                    $("#modalText").modal("show");
                    
                }
                else {
                    alertify.error(data.error);
                }
            },
             error:function(data){alertify.error(data);}
           

        }); 
    });
});
