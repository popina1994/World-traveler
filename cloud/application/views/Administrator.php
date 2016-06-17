<!--/**
 *
 * @author Jelica Cincović 640/13
 *
 */-->

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
            
            <script type = 'text/javascript' src = "<?php echo base_url(); 
            ?>js/deleteModerator.js"></script>
            
            <script type = 'text/javascript' src = "<?php echo base_url(); 
            ?>js/Administrator.js"></script>

              <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/Administrator.css">
        
         <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/alertify.bootstrap.css">
  <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/alertify.core.css">
    <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/alertify.default.css">
    

 
  <script type = 'text/javascript' src = "<?php echo base_url(); 
        ?>js/alertify.min.js"></script>
        
        <script type = 'text/javascript' src = "<?php echo base_url(); 
        ?>js/alertify.js"></script>

    <title>Svetski putnik</title>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
</head>

<body id="bodyadmin">
   
    <div id="dugmici123">
        <button class="button1" id="kreiraj" >KREIRAJ MODERATORA</button>
        <button class="button1" id="ukloni" >UKLONI MODERATORA</button>
    </div>
    <div class="modal" id="myModal3" role="dialog" data-backdrop=""  aria-labelledby="myModalLabel" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
            <button type="button" class="close" id="zatvaram1">&times;</button>
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
    <div class="modal" id="myModal4" role="dialog"  data-backdrop=""  data-keyboard="false" aria-labelledby="myModalLabel" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
            <button type="button" class="close" id="zatvaram2">&times;</button>
          <h4>  UKLONI MODERATORA</h4>
        </div>
            <div class="modal-body"  id="scroll">
        
            <table id="t2" >
                    <?php
                        if(count($moderators)==0){
                            echo "Nema moderatora";
                        }
                        else{
                        $i=0;
                        $attrubutesRegister = ['name'=>'obrisiDugme', 'id'=>'obrisiDugme', 'class'=>'form-horizontal'];
                                                
                        echo form_open('administratorcontroller/', $attrubutesRegister);
                        foreach($moderators as $p){?>
                            <tr>
                               
                                
                                <td>
                                    <?php
                                    
                                       $pr=$i+1;
                                       echo $str1="$pr."."&nbsp;&nbsp;"."$p"."&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
                                      
                                        
                                  
                                </td>
                                <td>
                                    <?php
                                            
                                                
                                                //$str='button'.$i;
                                                $k=$p;
                                                $str=$i;
                                                $str="$str";
                                          
                                                echo "<button class="."'button3', type="."'submit'".", name='brojmoj',"."  value="."'$str'".",  id="."'$str'"." >OBRIŠI</button>";
                                           
                                                
                                                  $i++;
                        
                                    ?>
                                </td>
                            </tr>     
                        <?php }
                        echo form_close(); 
                        }
                        ?>


                     
            </table>
        
      </div>
      </div>
    </div>
    </div>


    
    
    
    
    

<p> <br/><br/>
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