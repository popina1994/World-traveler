<!-- 

/*
* Djordje Zivanovic 0033/2013
*/
-->
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
        ?>js/alertify.min.js"></script>
        
        <script type = 'text/javascript' src = "<?php echo base_url(); 
        ?>js/alertify.js"></script>
        


  <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/alertify.bootstrap.css">
  <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/alertify.core.css">
    <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/alertify.default.css">

  
  
    
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
    <?php 
                $attrubutes = array('name'=>'startForm', 
                    'id'=>'startForm', 'method'=>'post');
                echo form_open('main/startUnregistered', $attrubutes); ?>
   <button class="button">START</button>	
   <?php echo form_close(); ?>
   <div id="dugmici123">
   
            <button class="button1" id="prijava" >PRIJAVI SE</button>
            <button class="button1" id="registracija">REGISTRUJ SE</button>
          
    </div>
    
    <!--Modal old-->
   <div class="modal" id="myModal" role="dialog" data-backdrop=""  aria-labelledby="myModalLabel" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
            <button type="button" class="close" id="zatv_prij">&times;</button>
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
                                        <!--<div class="controls">-->
                                            <input type="text" name="nameLogin" id="nameLogin"   oninvalid="this.setCustomValidity('Morate uneti ovo polje')">

                                           <!-- <p class="help-block"></p>-->
                                       <!-- </div>-->
                                    </td>

                            </tr>
                            <tr>
                                    <td>
                                            <label class="control-label"><span class="glyphicon glyphicon-eye-open"></span> Lozinka: </label>
                                    </td>
                                    <td>
                                        <!--<div class="controls"> -->
                                            <input type="password" name="passLogin" id="passLogin"  oninvalid="this.setCustomValidity('Morate uneti ovo polje')" >
                                            <!-- <p class="help-block"></p> -->
                                         <!--</div> -->
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
    
    
    <div class="modal" id="myModal2" role="dialog" data-backdrop=""   tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
            <button type="button" class="close" id="zatv_reg">&times;</button>
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