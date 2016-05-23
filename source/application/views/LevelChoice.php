
<html>
<head>
	<title>Izaberi nivo</title>
	 <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/LevelChoice.css">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>
	<div id="wrapper">
                       <?php 
                $attrubutes = array('name'=>'levelChoiceForm', 'class'=>'form-horizontal',
                    'id'=>'levelChoiceForm', 'method'=>'post');
                    echo form_open('game/levelChoice', $attrubutes); ?>
                    <table>
                            <tr >
                                    <td colspan="3">
                                            <p id="naslov">Izaberi nivo</p>
                                    </td>
                            </tr>
                            <tr>
                                    <td>
                                        <button id="beba" class="button"><?php
                                                    $image_properties = array(
                                                        'src' => 'img/beba.jpg',
                                                        'id' => 'beba',
                                                       'width'=>'130px',
                                                        'height'=>'100px',
                                                        'padding'=>'3px',
                                                        'border-radius'=>'10px',
                                                        'border'=>'3px solid black'

                                                    );

                                                    echo  img($image_properties); ?></button><br>
                                            <p>BEBA</p>
                                    </td>
                                    <td>
                                        <button id="knjiga" class="button"><?php
                                                    $image_properties = array(
                                                        'src' => 'img/knjiga.jpg',
                                                        'id' => 'knjiga',
                                                       'width'=>'130px',
                                                        'height'=>'100px',
                                                        'padding'=>'3px',
                                                        'border-radius'=>'10px',
                                                        'border'=>'3px solid black'

                                                    );

                                                    echo  img($image_properties); ?></button><br>
                                            <p>ŠKOLARAC</p>
                                    </td>
                                    <td>
                                        <button id="kofer" class="button"><?php
                                                    $image_properties = array(
                                                        'src' => 'img/kofer.jpg',
                                                        'id' => 'kofer',
                                                       'width'=>'130px',
                                                        'height'=>'100px',
                                                        'padding'=>'3px',
                                                        'border-radius'=>'10px',
                                                        'border'=>'3px solid black'

                                                    );

                                                    echo  img($image_properties); ?></button><br>
                                            <p>SVETSKI PUTNIK</p>
                                    </td>
                            </tr>
		</table>
            
            <?php echo form_close(); ?>
	</div>
</body>
</html>