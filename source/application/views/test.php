<html>
<head>
    <script type="text/javascript">
  var baseURL = "<?php echo base_url(); ?>";
</script>
        <script  src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>     
            <script type = 'text/javascript' src = "<?php echo base_url(); 
            ?>js/Main.js"></script>       
  <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/Svetski_putnik.css">
    
	<title>Svetski putnik</title>
   <script>
        $(document).ready(function(){   
                 $('#loginForm').submit( function(event) {
                    var form = this;
                    event.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url();?>/main/loginValidation/",
                        data : {nameLogin : $("#nameLogin").val(),
                                passLogin : $("#passLogin").val()},
                        dataType: "json", 
                     success:function(data){
                        //$("#ime").text.html(data);
                        alert("proslo");
                        if (data.userExists === true) {

                            alert("Dobar");
                            form.submit();
                        }
                        else {
                            alert("los");
                        }
                    }

                    }); 
                });
        });
        </script>
<?php
    function build_table($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . $key . '</th>';
        }
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . $value2 . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}

    $array = array(
    array('first'=>$view, 'email'=>$id));

echo build_table($array);    
?>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
                         <?php 
                            $attrubutes = array('name'=>'loginForm', 'class'=>'form-horizontal', 'id'=>'loginForm');
                            echo form_open('main/test', $attrubutes); ?>
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
							<input type="text" name="nameLogin" id="nameLogin"  >
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
                                                    <input type="password" name="passLogin" id="passLogin" >
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
<?php echo form_close(); ?>
