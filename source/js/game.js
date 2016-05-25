/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */





$(document).ready(function(){   
    $('.areaMap').click( function(event) {
        
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
                if (data.canAttack) {
                    $('label[for=text').html(data.text);
                    $('label[for=a]').html(data.a);
                    $('label[for=b]').html(data.b);
                    $('label[for=c]').html(data.c);
                    $('label[for=d]').html(data.d);
                    $("#myModal").modal("show");
                }
                else {
                    if (data.unfinished)
                        alert('Niste zavrsili napad na:' + data.country);
                    else 
                        alert('Vec ste osvojili ovu zemlju');
                }
            },
             error:function(data){alert(data);}
           

        }); 
    });
}); 




$(document).ready(function(){   
    var clicks = 0;
    $('#btnNextText').click( function(event) {
        
        
        // first click
        //
        if (clicks % 2 == 0) {

            var val = $("input[class=radioText]:checked").val();
            $.ajax({

                type: "POST",
                url: BASE_URL + "index.php/game/getAnswer/",

                data : {
                        letter : val, 
                        secret : true
                        // first time will be set user answer
                        //
                    },

                dataType: "json", 
                success:function(data){
                    // Set appropriate question answer.
                    //
                    if (data.correct) {
                        $('label[for=note]').html("Tacan odgovor");
                    }
                    else {
                        $('label[for=note').html("Netacan odgovor");
                    }
                     $('label[for=answerA]').html('&#10007');
                    $('label[for=answerB]').html('&#10007');
                    $('label[for=answerC]').html('&#10007');
                    $('label[for=answerD]').html('&#10007');
                    $('label[for=answer'+data.letter + ']').html('&#10004');
                    
                    
                }

            }); 
        }
        else {
            $('label[for=answerB]').html('&#10004');
            $("#myModal").modal("hide");
        }
        clicks++;
    });
}); 

// Same for the picture question as for textual.



