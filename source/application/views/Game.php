<html lang="en">
<head>
  <title>Game</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <script type = 'text/javascript' src = "<?php echo base_url();?>js/game.js"></script>
        
   <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/Game.css">
</head>
<body>
    
    <?php
            $image_properties = array(
                'src' => 'img/mapasaoblastima.jpg',
                'id' => 'mapa',
                'usemap' => '#Map',
                'position'=>'absolute',

                
            );
       
          echo  img($image_properties); ?>
             <map name="Map" id="Map">
                        <area  id="area" data-target="#myModal" data-toggle="modal" title="kina" 
                               href="#" shape="poly" coords="1121,389,1109,406,1100,418,1087,431,1073,438,1067,444,1077,463,1082,478,1089,482,1096,490,1104,490,1104,501,1101,518,1106,525,1116,530,1153,551,1171,548,1182,537,1195,529,1203,534,1211,535,1216,542,1214,553,1213,560,1234,552,1243,547,1248,553,1258,560,1267,558,1304,538,1322,495,1314,471,1308,459,1322,451,1300,438,1292,425" />
     
                 </map>

<div class="container">
  
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tekstualno pitanje</h4>
        </div>
        <div class="modal-body">
          <?php $attrubutesRegister = ['name'=>'textQuestion', 'id'=>'textQuestion', 'class'=>'form-horizontal'];
            echo form_open('game/conquered', $attrubutesRegister); ?>
           <p id="naslov">PITANJE</p>
           
           <input type="radio" name="radioText" id="a">Prvo<br/><input type="text" id="answer1" hidden><br/>
           <input type="radio" name="radioText" id="b">Drugo<br/><input type="text" id="answer2" hidden><br/>
           <input type="radio" name="radioText" id="c">Trece<br/><input type="text" id="answer3" hidden><br/>
           <input type="radio" name="radioText" id="d">Cetvrto<br/><input type="text" id="answer4" hidden><br/>
           <?php echo form_close(); ?>
           
           <button type="button" class="btn btn-default" data-dismiss="modal"><?php
            $image_properties = array(
                'src' => 'img/next.png',
                'id' => 'next',
                'width' => '40px',
                'height'=>'40px',
                
            );
       
          echo  img($image_properties); ?></button>

        </div>
       
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>