<html>
<head>
	<title>Svetski putnik</title>
		<link rel="stylesheet" type="text/css" href="<<?php echo base_url(); ?>css/Svetski_putnik.css">

	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>
	<div id="poruka">
            <?php
            echo validation_errors();
             $attrubutes = array('name'=>'registracija', 'class'=>'form-horizontal');
             echo form_open('main/index', $attrubutes); ?>
		<button>Vrati</button> 
              <?php echo form_close(); ?>
	</div>
</body>
</html>