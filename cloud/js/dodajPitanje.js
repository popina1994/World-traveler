//Slavko Ivanovic 82/13

$(document).ready(function(){
                           
        $('button[name=submitt]').click( function(event) {
         var form=$('#dodajt');
         
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/moderatorcontroller/inputValidationTekstPitanje",
                data : {
                        nivo: $('#nivo').val(),
                        oblast: $('#oblast').val(),
                        postavka: $('#postavka').val(),
                        o1: $('#o1').val(),
                        o2: $('#o2').val(),
                        o3: $('#o3').val(),
                        o4: $('#o4').val(),
                        tacan: $('#tacan').val(),
                        secret : true},
                dataType: "json", 
                success:function(data){
                    //alertify.error( data.idniv );
                    if(data.succ === true){
                        alertify.success("Uspjesno dodato pitanje! ");
                        
                        form.submit();
                    }else{
                        
                        alertify.error( data.error );
                    }
                    
                }
                });
    });
    
    $('button[name=submits]').click( function(event) {
         var form=$('#dodajs');
         var mem=234;
      
        var filename = $("#userfile").val();
        
            var extension = filename.replace(/^.*\./, '');
               if (extension == filename) {
                extension = '';
            } else {
                extension = extension.toLowerCase();
            }
        
        mem=extension;

            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/moderatorcontroller/inputValidationSlikaPitanje",
                data : {id : $('#nivos2').val(),//ovdje je id nepotrebno
                        nivo: $('#nivos2').val(),
                        oblast: $('#oblasts2').val(),
                        postavka: $('#postavkas2').val(),
                        o1: $('#o1s2').val(),
                        o2: $('#o2s2').val(),
                        o3: $('#o3s2').val(),
                        o4: $('#o4s2').val(),
                        tacan: $('#tacans2').val(),
                        userfile: $('#userfile').val(),
                        memorija: mem,
                        secret : true},
                dataType: "json", 
                success:function(data){
                   // alertify.error( data.idniv );
                    if(data.succ === true){                    
                        alertify.success("Uspjesno dodato pitanje! ");
                        form.submit();
                    }else{
                        alertify.error( data.error );
                    }
                    
                }
                });
    });
    $('button[name=submitl]').click( function(event) {
         var form=$('#dodajl'); 
         var mem=234;
      
        var filename = $("#userfilel").val();
        
            var extension = filename.replace(/^.*\./, '');
               if (extension == filename) {
                extension = '';
            } else {
                extension = extension.toLowerCase();
            }
        
        mem=extension;

           
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/moderatorcontroller/inputValidationLicnostPitanje",
                data : {id : $('#nivol3').val(),//ne koristi se
                        nivo: $('#nivol3').val(),
                        oblast: $('#oblastl3').val(),
                        licnost: $('#licnostl3').val(),
                        s1: $('#s1l3').val(),
                        s2: $('#s2l3').val(),
                        s3: $('#s3l3').val(),
                        s4: $('#s4l3').val(),
                        s5: $('#s5l3').val(),
                        s6: $('#s6l3').val(),
                        userfile: $('#userfilel').val(),
                        memorija: mem,
                        secret : true},
                dataType: "json", 
                success:function(data){
                   // alertify.error( data.idniv );
                    if(data.succ === true){
                        alertify.success("Uspjesno dodato pitanje! ");
                        form.submit();
                    }else{
                        alertify.error( data.error );
                    }
                    
                }
                });
    });
    
    
    
    
    
});  