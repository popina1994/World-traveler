
function f() {
    location.href = "Izaberi nivo.html";
};


$(document).ready(function(){ 
     $("#prijava").click(function(){
         document.getElementById("nameLogin").value="";
        document.getElementById("passLogin").value="";
        $('#myModal').modal('show');
        
        document.getElementById("prijava").disabled=true;
        document.getElementById("registracija").disabled=true;
        
    });
    $("#registracija").click(function(){
        document.getElementById("nameRegister").value="";
        document.getElementById("surNameRegister").value="";
        document.getElementById("userNameRegister").value="";
        document.getElementById("passRegister").value="";
        document.getElementById("repeatPass").value="";
        $('#myModal2').modal('show');
        
        document.getElementById("prijava").disabled=true;
        document.getElementById("registracija").disabled=true;
    });
     $("#zatv_prij").click(function(){
        $('#myModal').modal('hide');
        //$('#vrsta')[0].reset();
        document.getElementById("prijava").disabled=false;
        document.getElementById("registracija").disabled=false;
        
        //resetovanje forme
        document.getElementById("nameLogin").value="";
        document.getElementById("passLogin").value="";
    });
    $("#zatv_reg").click(function(){
        $('#myModal2').modal('hide');
        //$('#vrsta')[0].reset();
        document.getElementById("prijava").disabled=false;
        document.getElementById("registracija").disabled=false;
        document.getElementById("nameRegister").value="";
        document.getElementById("surNameRegister").value="";
        document.getElementById("userNameRegister").value="";
        document.getElementById("passRegister").value="";
        document.getElementById("repeatPass").value="";
    });
});



