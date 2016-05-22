
<html>
<head>
    <script  src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <script type="text/javascript">
    var BASE_URL = '<?= base_url(); ?>';
    </script>
    
      <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script type = 'text/javascript' src = "<?php echo base_url(); 
        ?>js/login.js"></script>
        
  
    
    <script type = 'text/javascript' src = "<?php echo base_url(); 
        ?>js/main.js"></script>
    
    <script type = 'text/javascript' src = "<?php echo base_url(); 
        ?>js/register.js"></script>

            
  <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/Svetski_putnik.css">
    
    <title>Svetski putnik</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
</head>
            
      
<body>

   <button class="button" onclick="f()">START</button>		
    <div>
   
            <button class="button1" id="b11" data-toggle="modal" data-target="#myModal">PRIJAVI SE</button>
            <button class="button1" data-toggle="modal" data-target="#myModal2" id="b12">REGISTRUJ SE</button>
          
    </div>
    
    <!--Modal old-->
   <div class="modal" id="myModal" role="dialog" data-backdrop=""  aria-labelledby="myModalLabel" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span>  PRIJAVA</h4>
        </div>
        <div class="modal-body">
        
           <?php 
                $attrubutes = array('name'=>'loginForm', 'class'=>'form-horizontal',
                    'id'=>'loginForm', 'method'=>'post');
                echo form_open('main/login', $attrubutes); ?>
                <div class="control-group">
                    <table>
                            

                            <tr>
                                    <td>
                                             
                                             <label class="control-label"><span class="glyphicon glyphicon-user"></span> Korisnicko ime: </label>
                                    </td>
                                    <td>
                                        <div class="controls">
                                            <input type="text" name="nameLogin" id="nameLogin" required  oninvalid="this.setCustomValidity('Morate uneti ovo polje')">

                                            <p class="help-block"></p>
                                        </div>
                                    </td>

                            </tr>
                            <tr>
                                    <td>
                                            <label class="control-label"><span class="glyphicon glyphicon-eye-open"></span> Lozinka: </label>
                                    </td>
                                    <td>
                                        <div class="controls">
                                            <input type="password" name="passLogin" id="passLogin" required oninvalid="this.setCustomValidity('Morate uneti ovo polje')" >
                                            <p class="help-block"></p>
                                        </div>
                                    </td>

                            </tr>
                            <tr>
                                    <td colspan="2">
                                            <div id="dugmici">

                                                <button class="button2" id ="btOkLogIn" >OK</button>
                                             
                                            </div>


                                    </td>
                            </tr>
                    </table>
                </div>


            <?php echo form_close(); ?>
       
        </div>
        
        </div>
    </div>
    </div>
    
    
    
 
  <!-- Modal 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
    </div>
  </div> 
</div>
    -->
    
    <div class="modal" id="myModal2" role="dialog" data-backdrop=""   tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>  REGISTRACIJA</h4>
        </div>
        <div class="modal-body">
        <?php 
            $attrubutesRegister = ['name'=>'registerForm', 'id'=>'registerForm', 'class'=>'form-horizontal'];
            echo form_open('main/register', $attrubutesRegister); ?>
            <table id="t2">
                  
                    <tr>
                        <td rowspan="3"  align="center"><?php echo img('img/256.png'); ?>
                            </td>
                            <td>
                                    Ime:
                                    <br>
                                    <input type="text" id="nameRegister" name="nameRegister">
                            </td>

                    </tr>
                    <tr>
                            <td>
                                    Prezime:
                                    <br>
                                    <input type="text" id ="surNameRegister" name ="surNameRegister" >
                            </td>

                    </tr>
                    <tr>
                            <td>
                                    Korisničko ime:
                                    <br>
                                    <input type="text" id ="userNameRegister" name ="userNameRegister">
                            </td>
                    </tr>
                    <tr>
                            <td valign="bottom" align="center">

                                    <button disabled>Dodaj sliku</button>
                            </td>
                            <td>
                                    Loznika:
                                    <br>
                                    <input type="password" id ="passRegister" name = "passRegister">
                            </td>

                    </tr>
                    <tr>
                            <td>&nbsp;</td>
                            <td>
                                    Potvrda lozinke:
                                    <br>
                                    <input type="password" id="repeatPass" name="repeatPass">
                            </td>
                    </tr>

                    <tr>
                            <td colspan="2">
                                    <div id="dugmici">
                                            <button class="button2"  id="dod2">OK</button>
                                            
                                    </div>

                            </td>
                    </tr>
            </table>
        <?php echo form_close(); ?>
      </div>
      </div>
    </div>
</body>
</html>