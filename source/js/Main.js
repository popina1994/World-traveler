
$(document).ready(function(){   
         $('#loginForm').submit( function(event) {

            var form = this;
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: BASE_URL + "index.php/main/loginValidation/",
                data : {nameLogin : $("#nameLogin").val(),
                        passLogin : $("#passLogin").val()},
                dataType: "json", 
             success:function(data){
                //$("#ime").text.html(data);
                alert("Provera da li su dobro ime i sifra");
                if (data.userExists === true) {

                    alert("Uspesno logovanje");
                    form.submit();
                }
                else {
                    alert("Neuspesno logovanje");
                }
            }

            }); 
        });
});
            


function f() {
    location.href = "Izaberi nivo.html";
};


function show1(){
	document.getElementById("d1").style.display='inline-block';
	document.getElementById("b11").disabled=true;
	document.getElementById("b12").disabled=true;

}

function show2(){
	document.getElementById("d2").style.display='inline-block';
	document.getElementById("b11").disabled=true;
	document.getElementById("b12").disabled=true;

}

function close1(){
	document.getElementById("d1").style.display='none';
	document.getElementById("b11").disabled=false;
	document.getElementById("b12").disabled=false;
}

function close2(){
	document.getElementById("d2").style.display='none';
	document.getElementById("b11").disabled=false;
	document.getElementById("b12").disabled=false;
}

function alertf1(){
	alert("Proverava se da li je uspesna prijava");
}

function alertf2(){
	alert("Proverava se da li je uspesna registracija");
}


