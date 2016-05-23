/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




$('.clear').bind('click', clear_click);

function clear_click()  {
  alert(this.id);
}

$(document).ready(function(){   
    $('.areaMap').click( function(event) {

        alert("Trazi pitanje iz baze");
        $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/game/getQuestion/",

            data : {
                    country : this.id,
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                //$("#ime").text.html(data);
                if (data.canAttack) {
                    alert('Sad sledi pitanje');
                    // Load the question.
                    //
                }
                else {
                    alert('Ne mozes da napadnes');
                }
                alert('Podaci primljeni');
            }

        }); 
    });
}); 

$(document).ready(function(){   
    $('#btnClick').click( function(event) {
        
        alert("Proverava da li su dobri podaci");
        $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/game/getAnswer/",

            data : {
                    letter : $('input[name=radioText]:checked').val(), 
                    secret : true
                    // first time will be set user answer
                    //
                },

            dataType: "json", 
            success:function(data){
                //$("#ime").text.html(data);
                alert('Podaci primljeni');
                // Set appropriate question answer.
                //
                if (data.answer) {
                
                }
                else {
                    // Appear picture question.
                    //
                }
            }

        }); 
    });
}); 

// Same for the picture question as for textual.



