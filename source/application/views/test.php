<html>
<head>
        <script  src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); 
            ?>js/Svetski_putnik.js"></script>
        <script>
        $(document).ready(function(){   

            $("#btOkLogIn").click(function()
            { 
                search = "Mama";
                $.ajax({
                  type: "POST",
                  url: "<?php echo site_url();?>/main/validation/",
                  data : {nameLogin : $("#nameLogin1").val()},
                  dataType: "json", 
                 success:function(data){
                    //$("#ime").text.html(data);
                    alert("To" + data.userName);
                  }

                });
                 return false;
         });
 });
    
        </script>
            
  <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/Svetski_putnik.css">
    
	<title>Svetski putnik</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
                            <div class="control-group">
				<table>
					<tr >
						<td colspan="2">
							<p class="naslov1">PRIJAVA</p>
						</td>	
				</tr>
                                        
                                        <tr >   <td> 
                                                    
                                               </td>
                                        </tr>
					<tr>
                                            <td>    <div id = "ime" >
         STAGE
      </div>
						</td>
						<td>
                                                    <div class="controls">
							<input type="text" name="nameLogin" id="nameLogin1"  >
                                                        <p class="help-block"></p>
                                                    </div>
						</td>
						
					</tr>
					<tr>
						<td>
							<label class="control-label">Lozinka</label>
						</td>
						<td>
                                                    <div class="controls">
                                                    <input type="password" name="passLogin" id="passLogin1" >
                                                        <p class="help-block"></p>
                                                    </div>
                                                </td>
						
					</tr>
					<tr>
						<td colspan="2">
							<div id="dugmici">
								<button class="button2" id ="btOkLogIn" >OK</button>
								<button class="button2" ">OTKAŽI</button>
							</div>
							
						</td>
					</tr>
				</table>
                            </div>
