$(document).ready(function(){   
    $('#newGameForm').submit( function(event) {

        var form = this;
        event.preventDefault();
        alert("Proverava da li postojii igra");
        $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/game/checkOldGame/",

            data : {
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                alert('Podaci primljeni');

                if (data.dataExists === true) {
                    var deleteOld = confirm('Zelite li da obrisete staru igru?');
                    if (!deleteOld) {
                        alert('Nista');
                    }
                    else {
                        alert('Nova igra pocinje');
                        form.submit();
                    }
                }
                else {
                    alert('Nova igra pocinje');
                    form.submit();
                }
            }

        }); 
    });
}); 


$(document).ready(function(){   
    $('#oldGameForm').submit( function(event) {

        var form = this;
        event.preventDefault();
        alert("Proverava da li postojii igra");
        $.ajax({

            type: "POST",
            url: BASE_URL + "index.php/game/checkOldGame/",

            data : {
                    secret : true
                },

            dataType: "json", 
            success:function(data){
                alert('Podaci primljeni');

                if (data.dataExists === true) {
                    alert('Igra se nastavlja');
                    form.submit();
                }
                else {
                    alert('Igra ne postoji');
                }
            }

        }); 
    });
}); 
