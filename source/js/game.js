/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */






$(document).ready(function(){   
    $('.areaMap').click( function(event) {

        alert("Trazi pitanje iz baze");
        event.preventDefault();
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
                alert('Podaci stigli');
                if (data.canAttack) {
                    alert('Sad sledi pitanje');
                    alert(data.country);
                    // Load the question.
                    //
                }
                else {
                    alert('Ne mozes da napadnes');
                }
            },
             error:function(data){alert(data);}
           

        }); 
    });
}); 




$(document).ready(function(){   
    $('#btnNextText').click( function(event) {
        
        alert("Proverava da li je dobar odgovor");
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
                // Set appropriate question answer.
                //
                if (data.correct) {
                
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



