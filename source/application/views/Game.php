<html lang="en">
    <head>
        <title>Game</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            var BASE_URL = '<?= base_url(); ?>';
        </script>
        
        
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

        <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/game.js"></script>

        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/Game.css">
    </head>
    <body>

        <div id="mapa">
            <?php
            $image_properties = array(
                'src' => 'img/mapasaoblastima.jpg',
                'id' => 'mapa',
                'usemap' => '#Map',
                'position' => 'absolute',
            );

            echo img($image_properties);
            ?>
            <map name="Map" id="Map">


                <area class="areaMap" id="Severna Afrika"  data-toggle="modal"alt="" title="Severna Afrika" href="#" shape="poly" coords="628,317,625,339,622,354,628,363,647,371,669,373,680,385,678,403,672,423,652,434,644,453,636,467,616,465,604,451,553,445,534,446,521,431,505,399,511,370,529,342,543,324,570,307,603,302,631,302" />
                <area class="areaMap" id="Egipat"  data-toggle="modal"alt="" title="Egipat" href="#" shape="poly" coords="635,323,632,329,627,337,627,352,631,361,649,369,664,369,674,374,679,384,685,382,701,374,735,369,733,342,723,332,672,322" />
                <area class="areaMap" id="Kongo" data-toggle="modal"alt="" title="Kongo" href="#" shape="poly" coords="676,428,667,434,652,437,648,453,641,466,632,469,616,468,610,474,625,492,644,497,662,500,668,513,683,520,698,522,699,501,707,472,706,453,715,457,722,455,718,466,711,471,708,473" />
                <area class="areaMap" id="Istočna Afrika" data-toggle="modal"alt="" title="Istočna Afrika" href="#" shape="poly" coords="692,380,685,390,683,407,683,426,694,435,701,443,711,450,723,455,729,459,718,470,707,483,707,501,711,512,714,524,726,516,747,514,748,481,777,465,792,453,796,425,740,374" />
                <area class="areaMap" id="Južna Afrika" data-toggle="modal"alt="" title="Južna Afrika" href="#" shape="poly" coords="628,499,627,513,619,540,628,580,634,612,670,608,692,593,705,566,731,540,738,523" />
                <area class="areaMap" id="Madagaskar" data-toggle="modal"alt="" title="Madagaskar" href="#" shape="poly" coords="793,529,779,538,768,539,766,556,761,567,766,576,782,551,792,542" />
                <area class="areaMap" id="Bliski Istok" data-toggle="modal"alt="" title="Bliski istok" href="#" shape="poly" coords="702,268,696,285,703,307,728,304,746,302,738,324,736,330,744,358,757,377,780,414,817,400,848,369,859,357,864,343,858,325,857,307,835,296,769,277" />
                <area class="areaMap" id="Indija" data-toggle="modal"alt="" title="Indija" href="#" shape="poly" coords="998,327,985,337,964,334,943,327,929,319,933,303,915,296,882,294,858,306,860,326,865,343,866,355,881,358,895,367,901,374,905,393,918,418,923,428,988,366,999,360,1009,330,1012,326" />
                <area class="areaMap" id="Kazahstan"  data-toggle="modal"alt="" title="Kazahstan" href="#" shape="poly" coords="869,191,886,194,902,200,931,222,942,236,933,250,924,262,901,271,911,291,900,299,886,290,861,302,843,297,826,293,818,270,815,254,798,247,789,230,810,216" />
                <area class="areaMap" id="Kina"  data-toggle="modal"alt="" title="Kina" href="#" shape="poly" coords="950,238,933,249,924,262,902,270,913,294,931,300,930,316,946,327,979,337,1001,324,1016,328,1025,335,1025,344,1041,337,1058,339,1078,338,1108,321,1118,304,1104,283,1095,266,1072,255" />
                <area class="areaMap" id="Tajland" data-toggle="modal"alt="" title="Tajland" href="#" shape="poly" coords="1016,327,1027,343,1035,342,1052,338,1045,352,1060,370,1047,384,1032,413,1015,392,1008,376,996,362" />
                <area class="areaMap" id="Ural"  data-toggle="modal"alt="" title="Ural" href="#" shape="poly" coords="879,96,871,110,858,127,858,153,863,181,877,194,894,191,922,210,944,231,965,239,998,248,982,212" />
                <area class="areaMap" id="Sibir" data-toggle="modal"alt="" title="Sibir" href="#" shape="poly" coords="902,105,914,129,925,141,942,174,964,197,982,210,995,243,1057,255,1031,206,1029,178,1051,159,1033,121,1059,122,1074,109,1072,95,1040,89,1024,79,990,68,961,50" />
                <area class="areaMap" id="Jakutsk" data-toggle="modal"alt="" title="Jakutsk" href="#" shape="poly" coords="1071,92,1069,111,1063,122,1036,125,1048,135,1046,148,1052,166,1076,156,1106,153,1125,163,1138,157,1161,139,1183,144,1196,136,1189,123,1209,113,1211,100,1119,77" />
                <area class="areaMap" id="Irkutsk"  data-toggle="modal"alt="" title="Irkutsk" href="#" shape="poly" coords="1126,165,1100,156,1080,157,1061,165,1037,172,1029,183,1026,205,1045,214,1078,215,1092,217,1119,194" />
                <area class="areaMap" id="Mongolija"  data-toggle="modal"alt="" title="Mongolija" href="#" shape="poly" coords="1125,195,1103,195,1099,208,1086,218,1051,217,1034,214,1036,232,1051,251,1095,259,1119,261,1145,280,1153,241,1165,225" />
                <area class="areaMap" id="Japan"  data-toggle="modal"alt="" title="Japan" href="#" shape="poly" coords="1176,191,1188,223,1186,243,1182,262,1166,270,1160,294,1184,275,1199,271,1201,235" />
                <area class="areaMap" id="Kamčatka" data-toggle="modal"alt="" title="Kamčatka" href="#" shape="poly" coords="1162,188,1167,220,1141,210,1124,196,1131,172,1149,151,1169,142,1190,144,1193,120,1218,110,1255,107,1301,108,1319,123,1237,167,1232,198" />
                <area class="areaMap" id="Filipini" data-toggle="modal"alt="" title="Filipini" href="#" shape="poly" coords="1148,346,1133,380,1128,387,1153,388,1162,377" />
                <area class="areaMap" id="Indonezija"  data-toggle="modal"alt="" title="Indonezija" href="#" shape="poly" coords="995,421,1023,457,1076,465,1110,463,1130,458,1121,432,1086,412" />
                <area class="areaMap" id="Nova Gvineja"  data-toggle="modal"alt="" title="Nova Gvineja" href="#" shape="poly" coords="1165,439,1200,466,1233,468,1260,447" />
                <area class="areaMap" id="Istočna Australija"  data-toggle="modal"alt="" title="Istočna Australija" href="#" shape="poly" coords="1093,499,1101,537,1149,534,1150,589,1174,604,1197,580,1213,547,1207,535,1164,497,1112,488,1160,488,1172,499,1105,489" />
                <area class="areaMap" id="Zapadna Australija"  data-toggle="modal"alt="" title="Zapadna Australija" href="#" shape="poly" coords="1092,498,1099,536,1152,541,1152,585,1086,566,1052,571,1025,570,1017,541,1025,525" />
                <area class="areaMap" id="Novi Zeland"  data-toggle="modal"alt="" title="Novi Zeland" href="#" shape="poly" coords="1270,514,1252,551,1230,570,1254,584,1275,554,1299,526" />
                <area class="areaMap" id="Brazil"  data-toggle="modal"alt="" title="Brazil" href="#" shape="poly" coords="404,385,383,393,353,397,346,388,326,399,301,396,301,414,279,420,281,440,298,442,325,441,341,454,368,469,378,489,393,508,382,520,393,530,413,515,443,489,465,467,476,446,491,420" />
                <area class="areaMap" id="Kolumbija" data-toggle="modal"alt="" title="Kolumbija" href="#" shape="poly" coords="315,397,301,398,302,416,276,409,258,398,254,383,262,371,282,358,299,355,320,360,337,360,356,365,377,375,396,383,372,396" />
                <area class="areaMap" id="Peru"  data-toggle="modal"alt="" title="Peru" href="#" shape="poly" coords="276,434,289,446,317,443,342,453,363,465,377,486,379,501,370,505,329,491,296,475,274,462,257,444,239,420,253,401,274,409,288,416" />
                <area class="areaMap" id="Patagonija"  data-toggle="modal"alt="" title="Patagonija" href="#" shape="poly" coords="394,534,372,516,360,499,333,490,316,488,300,482,297,558,297,592,324,621,355,628" />
                <area class="areaMap" id="Kvebek"  data-toggle="modal"alt="" title="Kvebek" href="#" shape="poly" coords="369,214,396,215,430,216,440,225,486,213,476,189,454,160,391,141" />
                <area class="areaMap" id="Ontario"  data-toggle="modal"alt="" title="Ontario" href="#" shape="poly" coords="279,155,314,158,360,190,366,222,279,207" />
                <area class="areaMap" id="Grenland"  data-toggle="modal"alt="" title="Grenland" href="#" shape="poly" coords="492,172,558,126,601,110,628,41,550,25,462,28,396,24,383,44,371,34,355,30,354,34,350,35,342,45" />
                <area class="areaMap" id="Severozapadne teritorije" data-toggle="modal"alt="" title="Severozapadne teritorije" href="#" shape="poly" coords="136,104,140,147,306,149,419,141,383,97,353,45,261,65" />
                <area class="areaMap" id="Aljaska" data-toggle="modal"alt="" title="Aljaska" href="#" shape="poly" coords="135,103,69,96,40,101,31,127,29,145,31,174,121,149,155,160,162,182,147,169" />
                <area class="areaMap" id="Alberta"  data-toggle="modal"alt="" title="Alberta" href="#" shape="poly" coords="152,147,278,153,275,201,174,201" />
                <area class="areaMap" id="Zapad-SAD"  data-toggle="modal"alt="" title="Zapad (SAD)" href="#" shape="poly" coords="181,204,309,205,299,244,253,284,192,270,178,237" />
                <area class="areaMap" id="Istok-SAD"  data-toggle="modal"alt="" title="Istok (SAD)" href="#" shape="poly" coords="306,209,349,228,415,218,387,240,365,258,348,300,333,295,300,276,263,285,251,273" />
                <area class="areaMap" id="Meksiko"  data-toggle="modal"alt="" title="Meksiko" href="#" shape="poly" coords="194,273,257,291,399,320,283,358" />
                <area class="areaMap" id="Skandinavija"  data-toggle="modal"alt="" title="Skandinavija" href="#" shape="poly" coords="709,104,713,123,715,144,710,161,678,164,690,130,668,137,653,186,640,192,627,175,607,152,644,115,663,97,689,86,709,93" />
                <area class="areaMap" id="Istočna Evropa"  data-toggle="modal"alt="" title="Istočna Evropa" href="#" shape="poly" coords="761,108,716,92,706,110,714,154,699,172,680,184,683,203,688,225,703,237,713,249,759,253,766,273,797,284,793,220,826,215,865,212,866,187,856,159,860,127,865,114,843,104" />
                <area class="areaMap" id="Island"  data-toggle="modal"alt="" title="Island" href="#" shape="poly" coords="549,137,550,148,586,151,590,146,591,142" />
                <area class="areaMap" id="Velika Britanija" data-toggle="modal"alt="" title="Velika Britanija" href="#" shape="poly" coords="587,178,594,222,570,230,545,220,554,192,570,177" />
                <area class="areaMap" id="Centralna Evropa"  data-toggle="modal"alt="" title="Centralna Evropa" href="#" shape="poly" coords="624,185,639,203,671,197,685,210,685,227,677,239,661,247,646,234,634,244,616,240,601,223" />
                <area class="areaMap" id="Južna Evropa"  data-toggle="modal"alt="" title="Južna Evropa" href="#" shape="poly" coords="647,235,657,235,662,248,682,241,690,228,699,237,708,256,697,276,691,290,694,310,664,285,654,299,638,276,619,261,613,246,615,238" /> 
                <area class="areaMap" id="Zapadna Evropa"  data-toggle="modal"alt="" title="Zapadna Evropa" href="#" shape="poly" coords="604,226,616,240,614,261,596,270,588,293,567,303,540,297,547,281,550,263,571,240" />
            </map>

        </div>
        <?php 
            $attrubutesRegister = ['name'=>'logOutForm', 'id'=>'logOutForm', 'class'=>'form-horizontal'];
            echo form_open('main/logOut', $attrubutesRegister); ?>
        <button  class="btn btn-default btn-sm" id ="btnLogOut" name="btnLogOut">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
    <?php echo form_close(); ?>
        <div id="sidebar">
            <?php
            $image_properties = array(
                'src' => 'img/256.png',
                'id' => 'user',
                'width' => '70px',
                'height' => '70px'
            );

            echo img($image_properties);
            ?>
            <p id="userName"> <?php echo $username ?></p>
            <input type="text" id="poeni" size="3" value="453" >
            <p >Poeni</p>
            <button id="settings"><?php
            $image_properties = array(
                'src' => 'img/sett.png',
                'id' => 'user',
                'width' => '40px',
                'height' => '40px'
            );

            echo img($image_properties);
            ?></button>
            <button id="rang"><?php
                $image_properties = array(
                    'src' => 'img/pehar.png',
                    'id' => 'user',
                    'width' => '40px',
                    'height' => '40px'
                );

                echo img($image_properties);
                ?></button>
        </div>


        <div class="container">
            <!-- Modal text-->
            <div class="modal fade" id="modalText" role="dialog"  data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">                  
                            <h4 class="textQuestion"  id ="textQuestion">Tekstualno pitanje</h4>
                        </div>

                        <div class="modal-body">
                            <?php
                            $attrubutesRegister = ['name' => 'textQuestion', 'id' => 'textQuestion', 'class' => 'form-horizontal'];
                            echo form_open('game/conquered', $attrubutesRegister);
                            ?>
                            <p id="naslov"><label for="text"></label></p>

                            <label for="markTextA"></label> <input type="radio" name = "radioText"class="radioText" value="a"/> <label for="answerTextA"></label>  <br/>
                            <label for="markTextB"></label> <input type="radio" name = "radioText"class="radioText" value="b"/> <label for="answerTextB"></label> <br/> 
                            <label for="markTextC"></label> <input type="radio" name = "radioText"class="radioText" value="c"/> <label for="answerTextC"></label> <br/>
                            <label for="markTextD"></label> <input type="radio" name = "radioText"class="radioText" value="d"/> <label for="answerTextD"></label>  <br/>
                            <label for="noteText"></label>
                        <?php echo form_close(); ?>

                            <button type="button" class="next"  id = "btnNextText" name="btnNextText">
                        <?php
                        $image_properties = array(
                            'src' => 'img/next.png',
                            'id' => 'next',
                            'width' => '40px',
                            'height' => '40px',
                        );

                        echo img($image_properties);
                        ?></button>

                        </div>

                    </div>

                </div>
            </div>

            <!-- Modal Picture -->
            <div class="modal fade" id="modalPicture" role="dialog"data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">                  
                            <h4 class="pictureQuestion"  id ="pictureQuestion">Slikovno pitanje</h4>
                        </div>

                        <div class="modal-body">
                                <?php
                                $image_properties = array(
                                    'src' => 'img/user.png',
                                    'id' => 'picturePictureQuestion',
                                    'width' => '100px',
                                    'height' => '100px',
                                );

                                echo img($image_properties);
                                ?>
                            <?php
                            $attrubutesRegister = ['name' => 'PictureQuestion', 'id' => 'PictureQuestion', 'class' => 'form-horizontal'];
                            echo form_open('game/conquered', $attrubutesRegister);
                            ?>
                            <p id="naslov"><label for="Picture"></label></p>

                            <label for="markPictureA"></label> <input type="radio" name = "radioPicture"class="radioPicture" value="a"/> <label for="answerPictureA"></label>  <br/>
                            <label for="markPictureB"></label> <input type="radio" name = "radioPicture"class="radioPicture" value="b"/> <label for="answerPictureB"></label> <br/> 
                            <label for="markPictureC"></label> <input type="radio" name = "radioPicture"class="radioPicture" value="c"/> <label for="answerPictureC"></label> <br/>
                            <label for="markPictureD"></label> <input type="radio" name = "radioPicture"class="radioPicture" value="d"/> <label for="answerPictureD"></label>  <br/>
                            <label for="notePicture"></label>
                            <?php echo form_close(); ?>

                            <button type="button" class="next"  id = "btnNextPicture" name="btnNextPicture">
                                <?php
                                $image_properties = array(
                                    'src' => 'img/next.png',
                                    'id' => 'next',
                                    'width' => '40px',
                                    'height' => '40px',
                                );

                                echo img($image_properties);
                                ?></button>

                        </div>

                    </div>

                </div>
            </div>
            
            
              <div class="modal fade" id="modalEnigma" role="dialog"data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">                  
                            <h4 class="enigmaQuestion"  id ="enigmaQuestion">Zagonetna licnost</h4>
                        </div>

                        <div class="modal-body">
                                <?php
                                $image_properties = array(
                                    'src' => 'img/user.png',
                                    'id' => 'pictureEnigmaQuestion',
                                    'width' => '100px',
                                    'height' => '100px',
                                );

                                echo img($image_properties);
                                ?>
                            <?php
                            $attrubutesRegister = ['name' => 'EnigmaQuestion', 'id' => 'EnigmaQuestion', 'class' => 'form-horizontal'];
                            echo form_open('game/conquered', $attrubutesRegister);
                            ?>
                            <p id="naslov"><label for="Enigma"></label></p>

                            <label for="markEnigma1">1   </label>  <label for="answerEnigma1"></label>  <br/>
                            <label for="markEnigma2">2   </label>  <label for="answerEnigma2"></label> <br/> 
                            <label for="markEnigma3">3   </label>  <label for="answerEnigma3"></label> <br/>
                            <label for="markEnigma4">4   </label> <label for="answerEnigma4"></label>  <br/>
                            <label for="markEnigma5">5.  </label> <label for="answerEnigma5"></label>  <br/>
                            <label for="markEnigma6">6.  </label> <label for="answerEnigma6"></label>  <br/>
                            <label for="Broj pokusaja">Broj pokusaja  </label> <label for="numTries"></label>  <br/>
                            <input type="text" maxlength="1" minlength="1" name="letter" id="letter" placeholder="Guess a letter" /> <br/>
                            <label for="Finish"></label>  <br/>
                            
                            <label for="noteEnigma"></label>
                            <?php echo form_close(); ?>

                            <button type="button" class="next"  id = "btnNextEnigma" name="btnNextEnigma">
                                <?php
                                $image_properties = array(
                                    'src' => 'img/next.png',
                                    'id' => 'next',
                                    'width' => '40px',
                                    'height' => '40px',
                                );

                                echo img($image_properties);
                                ?></button>
                            
                            <button type="button" class="next"  id = "btnSend" name="btnSend">
                                <?php
                                $image_properties = array(
                                    'src' => 'img/pariz.jpg',
                                    'id' => 'next',
                                    'width' => '40px',
                                    'height' => '40px',
                                );

                                echo img($image_properties);
                                ?></button>

                        </div>

                    </div>

                </div>
            </div>
            
            
            <div class="modal" id="myModalprofil" role="dialog" data-backdrop=""   tabindex="-1">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header" id="rangheader">
                            <button type="button" class="close" id="zatvaram">&times;</button>
                            <h4> Uredjivanje profila </h4>
                        </div>
                        <div class="modal-body">
                            <table id="t2">

                                <tr>
                                    <td rowspan="3"  align="center"> <?php
                                $image_properties = array(
                                    'src' => 'img/256.png',
                                    'id' => 'next',
                                    'width' => '150px',
                                    'height' => '150px',
                                );

                                echo img($image_properties);
                                ?>
                                    </td>
                                    <td>
                                        Ime:
                                        <br>
                                        <input type="text" id="nameRegister" name="nameRegister">
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Prezime:
                                        <br>
                                        <input type="text" id ="surNameRegister" name ="surNameRegister" >
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Korisničko ime:
                                        <br>
                                        <input type="text" id ="userNameRegister" name ="userNameRegister">
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="bottom" align="center">

                                        <button disabled>Promeni sliku</button>
                                    </td>
                                    <td>
                                        Loznika:
                                        <br>
                                        <input type="password" id ="passRegister" name = "passRegister">
                                    </td>

                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
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

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="myModalrang" role="dialog" data-backdrop=""   tabindex="-1">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header" id="rangheader">
                            <button type="button"  class="close"id="zatvaramrang">&times;</button>
                            <h4> Rang Lista </h4>
                        </div>
                        <div class="modal-body" id="scroll">
                            <font color="red" size="20px">RANG LISTA</font>
                            <!--ovde ide php za ubacivanje korisnika iz baze-->
                        </div>
                    </div>
                </div>
            </div>

        </div> <!--kraj-->

     
    </body>
</html>