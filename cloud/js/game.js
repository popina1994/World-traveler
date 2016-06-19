/* 
 * Djordje Zivanovic 0033/2013
 * 
 *
 * Jelica Cincović 640/13
 *
 *
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */





$(document).ready(function(){   
    var warning = 0;
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
     $("#settings").click(function(event){
         
         event.preventDefault();
          
                  $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/game/getProfil/",

            data : {
                    username : $("#settings").val(),
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                
              

                    //$("#lista")=data.podaci;
                    alertify.error(data.ime);
                    $('#nameRegister').val( data.ime);
                    $('#surNameRegister').val( data.prezime);
                    $('#userNameRegister').val( data.username);
                    $('#passRegister').val( data.password);
                    $('#repeatPass').val( data.password);
                    
                //potrebno odraditi i za sliku
                
            },
           

        });
         
         
         
        $('#myModalprofil').modal('show');
        
        document.getElementById("settings").disabled=true;
        document.getElementById("rang").disabled=true;
    });
    $("#zatvaram").click(function(){
        $('#myModalprofil').modal('hide');
        
        document.getElementById("settings").disabled=false;
        document.getElementById("rang").disabled=false;
    });
     $("#rang").click(function(event){
         
         event.preventDefault();
          
                  $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/game/getRangList/",

            data : {
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                
              //alertify.error(data.r1);
              
              document.getElementById("u1").innerHTML=data.user1;
              document.getElementById("r1").innerHTML=data.rank1;
               document.getElementById("p1").innerHTML=data.poeni1;
               
               document.getElementById("u2").innerHTML=data.user2;
              document.getElementById("r2").innerHTML=data.rank2;
               document.getElementById("p2").innerHTML=data.poeni2;
               
               document.getElementById("u3").innerHTML=data.user3;
              document.getElementById("r3").innerHTML=data.rank3;
               document.getElementById("p3").innerHTML=data.poeni3;
               
               document.getElementById("u4").innerHTML=data.user4;
              document.getElementById("r4").innerHTML=data.rank4;
               document.getElementById("p4").innerHTML=data.poeni4;
               
               document.getElementById("u5").innerHTML=data.user5;
              document.getElementById("r5").innerHTML=data.rank5;
               document.getElementById("p5").innerHTML=data.poeni5;
               
               document.getElementById("u6").innerHTML=data.user6;
              document.getElementById("r6").innerHTML=data.rank6;
               document.getElementById("p6").innerHTML=data.poeni6;
               
               document.getElementById("u7").innerHTML=data.user7;
              document.getElementById("r7").innerHTML=data.rank7;
               document.getElementById("p7").innerHTML=data.poeni7;
                    //$("#lista")=data.podaci;
                    //alertify.error(data.r2);
  
            },
           

        }); 
        $('#myModalrang').modal('show');
        document.getElementById("settings").disabled=true;
        document.getElementById("rang").disabled=true;
    });
    $("#zatvaramrang").click(function(){
        $('#myModalrang').modal('hide');
        
        document.getElementById("settings").disabled=false;
        document.getElementById("rang").disabled=false;
    });
    $("#promeni").click(function(event){
        
         event.preventDefault();     
                  $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/game/updateProfil/",

            data : {
                    oldusername : $("#settings").val(),
                    ime : $("#nameRegister").val(),
                    prezime : $("#surNameRegister").val(),
                    username : $("#userNameRegister").val(),
                    password : $("#passRegister").val(),
                    reppassword : $("#repeatPass").val(),
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                   //$("#ime").text.html(data);
                  alertify.log("Provera da li su dobro ime i sifra");
                   if (data.updateSucc === true) {
                     
                      alertify.success("Uspesno promenjen profil"); 
                      $('#myModalprofil').modal('hide');
                      document.getElementById("settings").disabled=false;
                      document.getElementById("rang").disabled=false;
                   }
                   else {
                     alertify.error(data.error);
                   }
                }
           

        });
        
        
        
    }); 
}); 




$(document).ready(function(){   
    var clicksText = 0;
    var correct = false;
    $('#btnNextText').click( function(event) {
        event.preventDefault();
        
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
                        $('label[for=points]').html(data.points);
                        $('label[for=passengers]').html(data.passengers.toString());
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
    var correct = false;
    var little = false;
    $('#btnNextPicture').click( function(event) {
        
        event.preventDefault();
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
                    correct = data.correct;
                    little = data.little;
                    if (data.correct) {
                        $('label[for=notePicture]').html("Tacan odgovor");
                        $('label[for=points]').html(data.points);
                        $('label[for=passengers]').html(data.passengers);
                    }
                    else {
                        
                        $('label[for=points]').html(data.points);
                        $('label[for=passengers]').html(data.passengers);
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
            if (correct && !little) {
                $.ajax({

                type: "POST",
                url: BASE_URL + "index.php/game/getEnigmaQuestion/",

                data : {
                        secret : true
                    },

                dataType: "json", 
                success:function(data){
                    if (data.canAttack) {
                        $('label[for=numTries]').html(data.numTries);
                        $('h4.enigmaQuestion').text(data.text);
                        $('label[for=answerEnigma1]').html(data.podatak);
                        $('#pictureEnigmaQuestion').attr('src',BASE_URL + '/img/' + data.picture);
                        $('label[for=noteEnigma]').html(data.zagonetna);
                        $('#btnNextEnigma').prop('disabled', false);
                        $("#modalEnigma").modal("show");
                    }
                },
                 error:function(data){
                     
                     }


            }); 
            }
            
        }
        clicksPicture++;
    });
}); 

// Same for the picture question as for pictureual.



$(document).ready(function(){   
    $('#btnNextEnigma').click( function(event) {
        event.preventDefault();
        
        // first click
        //
        $.ajax({
            type: "POST",
            url: BASE_URL + "index.php/game/getEnigmaQuestion/",

            data : { 
                    secret : true
                    // first time will be set user answerEnigma
                    //
                },

            dataType: "json", 
            success:function(data){
                // Set appropriate question answerEnigma.
                //
                if (data.canAttack) {
                    $('label[for=answerEnigma' + data.next + ']').html(data.podatak);
                }


            }

        }); 

        
        
    });
}); 


$(document).ready(function(){   
    var finished = false;
    $('#btnSend').click( function(event) {
        
        event.preventDefault();
        // first click
        //
        var val = $('#letter').val();
        if (finished === false) {
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/game/getEnigmaAnswer/",

                data : { 
                        secret : true,
                        letter : val
                        // first time will be set user answerEnigma
                        //
                    },

                dataType: "json", 
                success:function(data){
                    // Set appropriate question answerEnigma.
                    //
                    if (data.success) {
                         $('label[for=Finish]').html('Pogodili ste, bravo!');
                                                 
                        $('label[for=points]').html(data.points);
                        $('label[for=passengers]').html(data.passengers);
                        $('#btnNextEnigma').prop('disabled', true);
                         finished = true;
                    }
                    $('label[for=numTries]').html(data.numTries);
                    if (data.letterExists) {
                        $('label[for=noteEnigma]').html(data.text);
                    }
                    
                    if (data.faliure) {
                        $('#btnNextEnigma').prop('disabled', true);
                        $('label[for=noteEnigma]').html(data.text);
                        finished = true;
                         $('label[for=Finish    ]').html('Nemate vise pokusaja!');
                                                 
                        $('label[for=points]').html(data.points);
                        $('label[for=passengers]').html(data.passengers);
                    }
                }
            });   
        } 
        else {
            finished = false;
            $('label[for=answerEnigma1]').html('');
            $('label[for=answerEnigma2]').html('');
            $('label[for=answerEnigma3]').html('');
            $('label[for=answerEnigma4]').html('');
            $('label[for=answerEnigma5]').html('');
            $('label[for=answerEnigma6]').html('');
            $('label[for=Finish    ]').html('');
            $('label[for=noteEnigma]').html('');
            $("#modalEnigma").modal("hide");
            
        }
    });
}); 






