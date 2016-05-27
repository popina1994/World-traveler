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
            url: BASE_URL + "index.php/game/getTextQuestion/",

            data : {
                    country : this.id,
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
     $("#settings").click(function(){
        $('#myModalprofil').modal('show');
        
        document.getElementById("settings").disabled=true;
        document.getElementById("rang").disabled=true;
    });
    $("#zatvaram").click(function(){
        $('#myModalprofil').modal('hide');
        
        document.getElementById("settings").disabled=false;
        document.getElementById("rang").disabled=false;
    });
     $("#rang").click(function(){
        $('#myModalrang').modal('show');
        
        document.getElementById("settings").disabled=true;
        document.getElementById("rang").disabled=true;
    });
    $("#zatvaramrang").click(function(){
        $('#myModalrang').modal('hide');
        
        document.getElementById("settings").disabled=false;
        document.getElementById("rang").disabled=false;
    });
}); 




$(document).ready(function(){   
    var clicksText = 0;
    var correct = false;
    $('#btnNextText').click( function(event) {
        
        
        // first click
        //
        if (clicksText % 2 == 0) {

            var val = $("input[class=radioText]:checked").val();
            $.ajax({

                type: "POST",
                url: BASE_URL + "index.php/game/getTextAnswer/",

                data : {
                        letter : val, 
                        secret : true
                        // first time will be set user answerText
                        //
                    },

                dataType: "json", 
                success:function(data){
                    // Set appropriate question answerText.
                    //
                    correct = data.correct;
                    if (data.correct) {
                        $('label[for=noteText]').html("Tacan odgovor");
                    }
                    else {
                        $('label[for=noteText').html("Netacan odgovor");
                    }
                     $('label[for=markTextA]').html('&#10007');
                    $('label[for=markTextB]').html('&#10007');
                    $('label[for=markTextC]').html('&#10007');
                    $('label[for=markTextD]').html('&#10007');
                    $('label[for=markText'+data.letterCorrect.toUpperCase() + ']').html('&#10004');
                    
                    
                }

            }); 
        }
        else {
            // clear modal text
            //
            $('label[for=markTextA]').html('');
            $('label[for=markTextB]').html('');
            $('label[for=markTextC]').html('');
            $('label[for=markTextD]').html('');
            $('label[for=noteText]').html("");
            $("#modalText").modal("hide");
            $('input[class=radioText]').prop('checked', false);
            if (correct) {
                $.ajax({

                type: "POST",
                url: BASE_URL + "index.php/game/getPictureQuestion/",

                data : {
                        secret : true
                    },

                dataType: "json", 
                success:function(data){
                    if (data.canAttack) {
                        $('h4.pictureQuestion').text(data.text);
                        $('label[for=answerPictureA]').html(data.a);
                        $('label[for=answerPictureB]').html(data.b);
                        $('label[for=answerPictureC]').html(data.c);
                        $('label[for=answerPictureD]').html(data.d);
                        $('#picturePictureQuestion').attr('src',BASE_URL + '/img/' + data.picture);
                        $("#modalPicture").modal("show");
                    }
                },
                 error:function(data){
                     
                     alertify.error(data);}


            }); 
            }
    }
        clicksText++;
    });
}); 

// Same for the picture question as for textual.


$(document).ready(function(){   
    var clicksPicture = 0;
    $('#btnNextPicture').click( function(event) {
        
        
        // first click
        //
        if (clicksPicture % 2 == 0) {

            var val = $("input[class=radioPicture]:checked").val();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/game/getPictureAnswer/",

                data : {
                        letter : val, 
                        secret : true
                        // first time will be set user answerPicture
                        //
                    },

                dataType: "json", 
                success:function(data){
                    // Set appropriate question answerPicture.
                    //
                    if (data.correct) {
                        $('label[for=notePicture]').html("Tacan odgovor");
                    }
                    else {
                        $('label[for=notePicture').html("Netacan odgovor");
                    }
                     $('label[for=markPictureA]').html('&#10007');
                    $('label[for=markPictureB]').html('&#10007');
                    $('label[for=markPictureC]').html('&#10007');
                    $('label[for=markPictureD]').html('&#10007');
                    $('label[for=markPicture'+data.letterCorrect.toUpperCase() + ']').html('&#10004');
                    
                    
                }

            }); 
        }
        else {
            $('label[for=markPictureA]').html('');
            $('label[for=markPictureB]').html('');
            $('label[for=markPictureC]').html('');
            $('label[for=markPictureD]').html('');
            $('label[for=notePicture]').html("");
            $("#modalPicture").modal("hide");
            $('input[class=radioPicture]').prop('checked', false);
            $("#modalEnigma").modal("show");
        }
        clicksPicture++;
    });
}); 

// Same for the picture question as for pictureual.






