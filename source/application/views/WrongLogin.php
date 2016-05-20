
<html>
<head>
	<title>Svetski putnik</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/Svetski_putnik.css">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

</head>
<body>
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
                          <label class="control-label">Korisnicko ime</label>
                      </td>
                      <td>
                     <div class="controls">
                          <input  type="text" name="nameLogin" id="nameLogin" required>
                      <p class="help-block"></p>
                     </div>
                      </td>

                  </tr>


                  <tr>
                      <td>
                         <label class="control-label">Lozinka</label>
                      </td>
                      <td>
                      <div class="controls">
                          <input type="password" name="passLogin" id="passLogin" required >
                        <p class="help-block"></p>
                       </div>
                      </td>

                  </tr>

                  <tr>
                      <td colspan="2">
                          <div id="dugmici">
                              <button class="button2"  id="saljem">OK</button>
                              <button class="button2" type ="button" onclick="close1();">OTKAŽI</button>
                          </div>

                      </td>
                  </tr>

              </table>
             
<?php echo form_close(); ?>			
</body>
</html>