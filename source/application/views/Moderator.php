<html>
<head>
    <title>Moderator</title>
          <script  src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

             <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

            <script type="text/javascript">
            var BASE_URL = '<?= base_url(); ?>';
            </script>

              <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/Administrator.css">

    <title>Svetski putnik</title>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
</head>
<body>

<p>Moderator </p>



    <!--Modal ukloni
    <div class="modal" id="myModal4" role="dialog" data-backdrop=""  aria-labelledby="myModalLabel" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4> Baza pitanja </h4>
        </div>
        <div class="modal-body">
        -->
            <table id="t2">
                <!--
                        U ovu tabelu treba ubaciti kolone za tezinu pitnaja, oblast pitanja  i id pitanja
                        I pored tih kolona treba da stoje buttoni IZMENI i BRISI
                         Nivo     Teritorija     ID pitanja      ________    ________
                         pocetni   SAD            354            |IZMENI|    |OBRISI|
                         teski     kina           132            |IZMENI|    |OBRISI|
                                        
                -->
                
                sjsssssssssssssssssssssss
                
                
                <button class="button1" id="b23" data-toggle="modal" data-target="#myModal">Dodaj Pitanje</button>
                <div>
                    <select id="pitanje">
                         <option value="tekst">Tekstualno</option>
                         <option value="licnost">Licnost</option>
                         <option value="slika">Slikovno</option>
            
                    </select>
                    <?php 
                    echo form_open("moderatorcontroller/dodajpitanje/")
                    
                    ?>
                     <button class="button1" id="dalje" data-toggle="modal" data-target="#myModal">Dalje</button>
                    
                     <button class="button1" id="prekini" data-toggle="modal" data-target="#myModal">Prekini</button>

                </div>
                
                <?php  
                $attrubutesRegister = ['name'=>'izmeniDugme', 'id'=>'izmeniDugme', 'class'=>'form-horizontal'];
                                                
                    echo form_open("moderatorcontroller/izmeniPitanje/", $attrubutesRegister); 
                   
                    echo "<button class="."'button3'"."  id="."'button'".">IZMENI</button>";
                                              
                    echo form_close();
                
                ?>
                    <?php
                        if($questions==null){
                            echo "Nema pitanja";
                        }
                        else if(count($questions)==0){
                            echo "Nema pitanja";
                        }
                        else{ echo "IMA pitanja";
                        foreach($questions as $p){?>
                            <tr>
                                <td>
                                    <!--
                                        OVDE TREBA DA NAPISES ELEMENT LISTE I DUGME, ovde kaze
                                        da ne zna sta je moderators
                                        
                                    -->
                                  
                                      <?php echo $p['nivo']; 
                                            echo $p['oblast']; 
                                            echo $p['idPitanja']; 
                                           
                                                $i=0;

                                                $attrubutesRegister = ['name'=>'izmeniDugme'.$p['idPitanja'], 'id'=>'izmeniDugme'.$p['idPitanja'], 'class'=>'form-horizontal'];
                                                
                                                echo form_open("moderatorcontroller/izmeniPitanje/".$p['idPitanja'], $attrubutesRegister); 
                                                $strp=$p['idPitanja'];
                                                echo "<button class="."'button3'"."  id="."'button'.$strp".">IZMENI</button>";
                                              
                                                echo form_close(); 
                                                $attrubutesRegister = ['name'=>'brisiDugme'.$p['idPitanja'], 'id'=>'brisiDugme'.$p['idPitanja'], 'class'=>'form-horizontal'];

                                                echo form_open("moderatorcontroller/deletePitanje/".$p['idPitanja'], $attrubutesRegister); 
                                                $strp=$p['idPitanja'];
                                                echo "<button class="."'button3'"."  id="."$strp.'button'".">BRIŠI</button>";
                                              
                                                echo form_close(); 
                                                
                                                
                                                  $i++;
                                            }
                        }                   
                                      ?>
                                  
                                </td>
                            </tr>       
                        


                     
            </table>
        <!--
      </div>
      </div>
    </div>
    </div>
-->





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
