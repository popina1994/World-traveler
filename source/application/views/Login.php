
<html>
<head>
	<title>Svetski putnik</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/Svetski_putnik.css">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        
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
        
</head>
<body>
    <div id="mainwrapper">
    <div id="prijava_forma">
        <?php 
          $attrubutes = array('name'=>'loginForm', 'class'=>'form-horizontal',
              'id'=>'loginForm', 'mehtod'=>'post');
          echo form_open('main/login', $attrubutes); ?>
                       <table>
                  <tr >
                      <td colspan="2">
                          <p class="naslov1">PRIJAVA</p>
                      </td>
                  </tr>

                  <tr>
                      <td>
                          <label class="control-label">Korisničko ime</label>
                      </td>
                      <td>
                     <div class="controls">
                          <input  type="text" name="nameLogin" id="nameLogin" >
                      <p class="help-block"></p>
                     </div>
                      </td>

                  </tr>


                  <tr>
                      <td>
                         <label class="control-label">Lozinka</label>
                      </td>
                      <td>
                      <br/>
                          <input type="password" name="passLogin" id="passLogin"  >
                        
                       
                      </td>

                  </tr>

                  <tr>
                      <td colspan="2" align="center">
                         <br/> 
                              <button class="button4"  id="saljem">OK</button>
                              
                         

                      </td>
                  </tr>

              </table>
            
<?php echo form_close(); ?>
        </div>
        </div> 
</body>
</html>