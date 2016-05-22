<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript">
    var BASE_URL = '<?= base_url(); ?>'
    </script>
      <link rel = "stylesheet" type = "text/css" 
    href = "<?php echo base_url(); ?>css/Svetski_putnik.css">
    
      

      
      
    <title>Administrator</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
</head>
<body>

<p>Game </p>
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
