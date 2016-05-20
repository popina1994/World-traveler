
<html>
<head>
	<title>Svetski putnik</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/Svetski_putnik.css">
	<script src="<?php echo base_url(); ?>js/Svetski_putnik.js"></script>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

</head>
<body>
	<div id="wrapper">
		
		<div id="d1" >
			<form class="form-horizontal">
				<div class="control-group">
					 <table>
		                    <tr >
		                        <td colspan="2">
		                            <p class="naslov1">PRIJAVA</p>
		                        </td>
		                    </tr>
		                    
		                    <tr>
		                        <td>
		                            <label class="control-label">Korisnicko ime</label>
		                        </td>
		                        <td>
		                       <div class="controls">
		                            <input  type="text" name="username" id="username1" required>
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
		                            <input type="password" name="password" id="password1" required >
		                          <p class="help-block"></p>
		                         </div>
		                        </td>
		                        
		                    </tr>
		                  
		                    <tr>
		                        <td colspan="2">
		                            <div id="dugmici">
		                                <button class="button2"  id="saljem">OK</button>
		                                <button class="button2" onclick="close1();">OTKAŽI</button>
		                            </div>
		                            
		                        </td>
		                    </tr>
							
		                </table>
		               </div>
		                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> <!-- or use local jquery -->
					    <script src="/js/jqBootstrapValidation.js"></script>
					    <script>

					        $(function() {
					            $("input,select,textarea, button").not("[type=submit]").jqBootstrapValidation();
					        });

					    </script>
					    <!-- Bootstrap Core JavaScript -->
					    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	        </form>
			
		</div>
		
	</div>
</body>
</html>