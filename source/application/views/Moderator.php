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
    href = "<?php echo base_url(); ?>css/Moderator.css">
        
        <script type = 'text/javascript' src = "<?php echo base_url(); 
            ?>js/Moderator.js"></script>

    <title>Svetski putnik</title>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
</head>
<body>
    <div>
        <button class="button1" id="b11" >DODAJ PITANJE</button>
        <button class="button1" id="b12" >IZMENI/OBRISI PITANJE</button>
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

    
    <div class="modal" id="myModaldodaj" role="dialog" data-backdrop=""   tabindex="-1">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="zatvaram">&times;</button>
                  <h4> Izaberite tip pitanja </h4>
                </div>
                <div class="modal-body">
                    <div id="izbor">
                        
                        <input type="radio"  name="vrsta" id="vrsta1" value="Tekstualno">Tekstualno</input><br/>


                        <input type="radio"  name="vrsta" id="vrsta2" value="Slika">Slika</input><br/>


                        <input type="radio"  name="vrsta"id="vrsta3" value="Licnost">Licnost</input><br/><br/>
                                
                        <button class="button2"  id="dod2">OK</button>
                                
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
      
    <div class="modal" id="myModalforma" role="dialog" data-backdrop=""   tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="zatvoriformu" >&times;</button>
                  <h4> Forma za unos tekstualnog pitanja </h4>
                </div>
                <div class="modal-body">
                    <div id="formaa">
                    <label class="control-label">Postavka:</label>
				<div class="controls">
		            <textarea required name="pitanje" id="pitanje" rows="3" cols="40"></textarea>
		            <p class="help-block"></p><br/>
		        </div>
		        
				<div class="controls">
					<label class="control-label">Odgovor1:</label>
		            <input  type="text" name="postavka" id="odg1" required>
		            <p class="help-block"></p>
		        </div>
		        <div class="controls">
					<label class="control-label">Odgovor2:</label>
		            <input  type="text" name="postavka" id="odg2" required>
		            <p class="help-block"></p>
		        </div>
		        <div class="controls">
					<label class="control-label">Odgovor3:</label>
		            <input  type="text" name="postavka" id="odg3" required>
		            <p class="help-block"></p>
		        </div>
		        <div class="controls">
					<label class="control-label">Odgovor4:</label>
		            <input  type="text" name="postavka" id="odg4" required>
		            <p class="help-block"></p><br/>
		        </div>
		        <div class="controls">
					<label class="control-label">Tacan odgovor</label>
		            <select required name="tacan">
		            	<option>1</option>
		            	<option>2</option>
		            	<option>3</option>
		            	<option>4</option>
		            </select>
		            <p class="help-block"></p><br/>
		        </div>
		         <div class="controls">
					<label class="control-label">Nivo</label>
		            <select required name="nivo">
		            	<option>Beba</option>
		            	<option>Skolarac</option>
		            	<option>Svetski putnik</option>
		            	
		            </select>
		            <p class="help-block"></p><br/>
		        </div>
		         <div class="controls">
					<label class="control-label">Oblast</label>
		            <select required name="oblast">
		            	<option>BlaBla1</option>
		            	<option>BlaBla2</option>
		            	<option>BlaBla3</option>
		            	
		            </select>
		            <p class="help-block"></p><br/>
		        </div>
                    <button class="button2">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
        
        <!--Modal ukloni-->
    <div class="modal" id="myModalizmena" role="dialog" data-backdrop=""  aria-labelledby="myModalLabel" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" >
            <button type="button" class="close" id="zatform">&times;</button>
          <h4> Izmena/Brisanje pitanja </h4>
        </div>
        <div class="modal-body">
        
            <table id="t2">
                
                <!--
                        U ovu tabelu treba ubaciti kolone za tezinu pitnaja, oblast pitanja  i id pitanja
                        I pored tih kolona treba da stoje buttoni IZMENI i BRISI
                         Nivo     Teritorija     ID pitanja      ________    ________
                         pocetni   SAD            354            |IZMENI|    |OBRISI|
                         teski     kina           132            |IZMENI|    |OBRISI|
                                        
                -->
                
                
                    <?php
                        if(count($questions)==0){
                            echo "Nema pitanja";
                        }
                        else{ echo "IMA pitanja";?>
                <tr>
                    <td>
                        Nivo
                    </td>
                    <td>
                        Teritorija
                    </td>
                    <td>
                        IdPitanja
                    </td>
                </tr>
                   <?php      $i=0;
                        foreach($questions as $p){?>
                            <tr>
                                <td>
                                    <!--
                                        OVDE TREBA DA NAPISES ELEMENT LISTE I DUGME, ovde kaze
                                        da ne zna sta je moderators
                                        -->
                                  
                                  
                                      <?php echo $p['nivo']; ?><td>
                                      <td><?php         echo $p['oblast']; ?></td>
                                       <td><?php       echo $p['idPitanja']; ?></td>
                                        <td><?php    
                                               

                                                $attrubutesRegister = ['name'=>'izmeniDugme'.$p['idPitanja'], 'id'=>'izmeniDugme'.$p['idPitanja'], 'class'=>'form-horizontal'];
                                                
                                                echo form_open("administratorcontroller/izmeniPitanje/".$p['idPitanja'], $attrubutesRegister); 
                                                 $strp=$p['idPitanja'];
                                                echo "<button class="."'button2'"."  id="."'button'.$strp".">IZMENI</button>";
                                              
                                                echo form_close(); ?></td> <td><?php
                                                $attrubutesRegister = ['name'=>'brisiDugme'.$p['idPitanja'], 'id'=>'brisiDugme'.$p['idPitanja'], 'class'=>'form-horizontal'];

                                                echo form_open("administratorcontroller/deletePitanje/".$p['idPitanja'], $attrubutesRegister); 
                                                $strp=$p['idPitanja'];
                                                echo "<button class="."'button2'"."  id="."$strp.'button'".">BRIŠI</button>";
                                              
                                                echo form_close(); 
                                                
                                                
                                                  $i++;
                                            }
                        }                   
                                      ?>
                                  
                                </td>
                            </tr>       
                        


                     
            </table>
        
      </div>
      </div>
    </div>
    </div>

    



</body>
</html>
