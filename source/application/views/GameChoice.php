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
    href = "<?php echo base_url(); ?>css/GameChoice.css">
    
      

      
      
    <title>Svetski putnik</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
</head>
<body>
<div id="wrapper">
                <?php 
                $attrubutes = array('name'=>'newGameForm', 'class'=>'form-horizontal',
                    'id'=>'newGameForm', 'method'=>'post');
                echo form_open('game/newGame', $attrubutes); ?>
    
		<button class="b1" id ="btNew" name = "btNew">NOVA IGRA</button>
                
                <?php echo form_close('game/newGame'); ?>
                
                
		<?php 
                $attrubutes = array('name'=>'oldGameForm', 'class'=>'form-horizontal',
                    'id'=>'oldGameForm', 'method'=>'post');
                echo form_open('game/oldGame', $attrubutes); ?>
    
		<button class="b1" id ="btNew" name = "btNew">NOVA IGRA</button>
                
                <?php echo form_close('game/newGame'); ?>
                
	</div>
    <div id="footer">
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <?php 
            $attrubutesRegister = ['name'=>'logOutForm', 'id'=>'logOutForm', 'class'=>'form-horizontal'];
            echo form_open('main/logOut', $attrubutesRegister); ?>
        <button  class="btn btn-default btn-sm" id ="btnLogOut" name="btnLogOut">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
    <?php echo form_close(); ?>
      </div>
</body>
</html>
