<!DOCTYPE html>
<html>
<head>
	<title>Game</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript">
    var BASE_URL = '<?= base_url(); ?>'
    </script>
      <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/Svetski_putnik.css">
    
      

      
      
    <title>Svetski putnik</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>

<body>
    <?php
    $i=0;
    foreach($moderators as $p){
        echo "$p"."      ";
       
        $pod=array('name'=> 'button',
                    'id'=> 'button'.$i,
                    'value'=>'true',
                    'type'=>'reset',
                    'content'=>'Obriši',
                    'action'=>"administratorcontroller/deleteModerator/$i"
            );
        
         
            $attrubutesRegister = ['name'=>'obrisiDugme'.$i, 'id'=>'obrisiDugme'.$i, 'class'=>'form-horizontal'];
            echo form_open("administratorcontroller/deleteModerator/$i", $attrubutesRegister); 
          echo "<button class="."'button2'"."  id="."'button'.$i".">OBRIŠI</button>";
       // echo form_button($pod);
         echo "</br>";
         
         echo form_close(); 
          $i++;
    }
    
    
    ?>
    
    <button class="button1" id="b11" data-toggle="modal" data-target="#myModal3">KREIRAJ MODERATORA</button>
    
    
    <div class="modal" id="myModal3" role="dialog" data-backdrop=""   tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>  NOVI MODERATOR</h4>
        </div>
        <div class="modal-body">
        <?php 
            $attrubutesRegister = ['name'=>'registerFormModerator', 'id'=>'registerFormModerator', 'class'=>'form-horizontal'];
            echo form_open('administratorcontroller/register', $attrubutesRegister); ?>
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
    </div>


    
    
    
    
    
<p>Gameeeeeeeeeeeeeeeeeeeeeeeeeee </p>
<p>Log-out icon on a button:
        <?php 
            $attrubutesRegister = ['name'=>'logOutForm', 'id'=>'logOutForm', 'class'=>'form-horizontal'];
            echo form_open('main/logOut', $attrubutesRegister); ?>
        <button  class="btn btn-default btn-sm" id ="btnLogOut" name="btnLogOut">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
    <?php echo form_close(); ?>
      </p>
</body>
</html>
