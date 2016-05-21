
<html>
<head>
    <script  src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <script type="text/javascript">
    var BASE_URL = '<?= base_url(); ?>'
    </script>
    
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
</head>
            
      
<body>

    <button class="button" onclick="f()">START</button>		
    <div>
            <button class="button1" onclick="show1();"id="b11">PRIJAVI SE</button>
            <button class="button1" onclick="show2();" id="b12">REGISTRUJ SE</button>
    </div>
    <div id="d1" >
        <?php 
            $attrubutes = array('name'=>'loginForm', 'class'=>'form-horizontal',
                'id'=>'loginForm', 'method'=>'post');
            echo form_open('main/login', $attrubutes); ?>
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
                                <td>
                                         <label class="control-label">Korisnicko ime</label>
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
                                            <button class="button2" id ="btOkLogIn" onclick="show1()" >OK</button>
                                                <button class="button2" type="button" onclick="close1();">OTKAŽI</button>
                                        </div>

                                </td>
                        </tr>
                </table>
            </div>

        <?php echo form_close(); ?>
    </div>
    <div id="d2" >
        <?php 
            $attrubutesRegister = ['name'=>'registerForm', 'id'=>'registerForm', 'class'=>'form-horizontal'];
            echo form_open('main/register', $attrubutesRegister); ?>
            <table id="t2">
                    <tr >
                            <td colspan="2">
                                    <p class="naslov1" id="dod">REGISTRACIJA</p>
                            </td>
                    </tr>
                    <tr>
                        <td rowspan="3"  align="center"><?php echo img('img/user.png'); ?>
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
                                            <button class="button2"type="button" onclick="close2();" id="dod2">OTKAŽI</button>
                                    </div>

                            </td>
                    </tr>
            </table>
        <?php echo form_close(); ?>
    </div>
</body>
</html>