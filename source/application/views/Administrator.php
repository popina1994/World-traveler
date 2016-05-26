<!DOCTYPE html>
<html>
<head>
	<title>Game</title>
          <script  src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

             <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

            <script type="text/javascript">
            var BASE_URL = '<?= base_url(); ?>';
            </script>
            
            <script type = 'text/javascript' src = "<?php echo base_url(); 
            ?>js/registermoderator.js"></script>

              <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/Administrator.css">

    <title>Svetski putnik</title>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
</head>

<body>
   
    <div>
        <button class="button1" id="b11" data-toggle="modal" data-target="#myModal3">KREIRAJ MODERATORA</button>
        <button class="button1" id="b11" data-toggle="modal" data-target="#myModal4">UKLONI MODERATORA</button>
    </div>
    <div class="modal" id="myModal3" role="dialog" data-backdrop=""  aria-labelledby="myModalLabel" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>  NOVI MODERATOR</h4>
        </div>
        <div class="modal-body" >
        <?php 
            $attrubutesRegister = ['name'=>'registerFormModerator', 'id'=>'registerFormModerator', 'class'=>'form-horizontal'];
            echo form_open('administratorcontroller/register', $attrubutesRegister); ?>
            <table id="t3" align="center">
                  
                    <tr>
                            <td >
                                    Korisničko ime:
                                    <br>
                                    <input type="text" id ="userNameRegister" name ="userNameRegister">
                            </td>
                    </tr>
                    <tr>
                         <td>
                                    Loznika:
                                    <br>
                                    <input type="password" id ="passRegister" name = "passRegister">
                            </td>

                    </tr>
                    <tr>
                            
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
    
    <!--Modal ukloni-->
    <div class="modal" id="myModal4" role="dialog" data-backdrop=""  aria-labelledby="myModalLabel" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>  UKLONI MODERATORA</h4>
        </div>
            <div class="modal-body"  id="scroll">
        
            <table id="t2">
                    <?php
                        if(count($moderators)==0){
                            echo "Nema moderatora";
                        }
                        else{
                        $i=0;
                        foreach($moderators as $p){?>
                            <tr>
                                <td>
                                    <?php
                                    
                                       $pr=$i+1;
                                       echo $str1="$pr."."&nbsp;&nbsp;"."$p"."&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
                                      
                                        
                                  
                                </td>
                                <td>
                                    <?php
                                            
                                                $attrubutesRegister = ['name'=>'obrisiDugme'."$i", 'id'=>'obrisiDugme'."$i", 'class'=>'form-horizontal'];
                                                
                                                echo form_open("administratorcontroller/deleteModerator/$i", $attrubutesRegister); 
                                                //$str='button'.$i;
                                                echo "<button class="."'button3'>OBRIŠI</button>";
                                              
                                                echo form_close(); 
                                                  $i++;
                        }
                                    ?>
                                </td>
                            </tr>       
                        <?php } ?>


                     
            </table>
        
      </div>
      </div>
    </div>
    </div>


    
    
    
    
    

<p> <br/><br/><br/><br/><br/><br/><br/>
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