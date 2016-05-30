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
        <div>
            <button class="button1" id="b11" >DODAJ PITANJE</button>
            <button class="button1" id="b12" >IZMENI/OBRISI PITANJE</button>
        </div>

        <p> <br/><br/><br/><br/><br/><br/><br/>
            <?php
            $attrubutesRegister = ['name' => 'logOutForm', 'id' => 'logOutForm', 'class' => 'form-horizontal'];
            echo form_open('main/logOut', $attrubutesRegister);
            ?>
            <button  class="btn btn-default btn-sm" id ="btnLogOut" name="btnLogOut">
                <span class="glyphicon glyphicon-log-out"></span> Log out
            </button>
<?php echo form_close(); ?>
        </p>



        <!--Modal ukloni-->


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

        <div class="modal" id="myModalformaText" role="dialog" data-backdrop=""   tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="zatvoriformuT" >&times;</button>
                        <h4> Forma za unos tekstualnog pitanja </h4>
                    </div>
                    <div class="modal-body">
                        <div id="formaa">
                            <form action="moderatorcontroller/createtekstpitanje"
                                  method="post" enctype="multipart/form-data">
                                <label class="control-label">Postavka:</label>
                                <div class="controls">
                                    <textarea name="postavka" id="postavka" cols="50"></textarea>
                                    <p class="help-block"></p><br/>
                                </div>

                                <div class="controls">
                                    <label class="control-label">Odgovor1:</label>
                                    <input type="text" name="o1" id="o1">
                                    <p class="help-block"></p>
                                </div>
                                <div class="controls">
                                    <label class="control-label">Odgovor2:</label>
                                    <input type="text" name="o2" id="o2">
                                    <p class="help-block"></p>
                                </div>
                                <div class="controls">
                                    <label class="control-label">Odgovor3:</label>
                                    <input type="text" name="o3" id="o3">
                                    <p class="help-block"></p>
                                </div>
                                <div class="controls">
                                    <label class="control-label">Odgovor4:</label>
                                    <input type="text" name="o4" id="o4">
                                    <p class="help-block"></p><br/>
                                </div>
                                <div class="controls">
                                    <label class="control-label">Tacan odgovor</label>
                                    <select name="tacan">
                                        <option value="">
                                            <?php
                                            for ($i = 1; $i <= 4; $i++)
                                                echo "<option value='" . $i . "'>$i</option>";
                                            ?>
                                    </select>
                                    <p class="help-block"></p><br/>
                                </div>
                                <div class="controls">
                                    <label class="control-label">Nivo</label>
                                    <select name="nivo">
                                        <option value="">Izaberi nivo</option>
                                        <?php
                                        $nivo = $this->doctrine->em->getRepository('NivoTezine')->findAll();
                                        foreach ($nivo as $row) {
                                            $naziv = $row->getNaziv();
                                            echo "<option value='" . $naziv . "'>$naziv</option>";
                                        }
                                        ?>
                                    </select>
                                    <p class="help-block"></p><br/>
                                </div>
                                <div class="controls">
                                    <label class="control-label">Oblast</label>
                                    <select name="oblast">
                                        <option value="">Izaberi oblast</option>
                                        <?php
                                        $oblast = $this->doctrine->em->getRepository('Oblast')->findAll();
                                        foreach ($oblast as $row) {
                                            $naziv = $row->getNaziv();
                                            echo "<option value='" . $naziv . "'>$naziv</option>";
                                        }
                                        ?>
                                    </select>
                                    <p class="help-block"></p><br/>
                                </div>
                                <input type="submit" value="Dodaj pitanje" name="submit" class="button2">
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>


                                <!--Modal slika-->

                                <div class="modal" id="myModalformaPic" role="dialog" data-backdrop=""   tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" id="zatvoriformuP" >&times;</button>
                                                <h4> Forma za unos slikovnog pitanja </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="formaa">
                                                    <form action="moderatorcontroller/createslikapitanje" 
                                                          method="post" enctype="multipart/form-data" name='userfile'>
                                                        <label class="control-label">Postavka:</label>
                                                        <div class="controls">
                                                            <textarea name="postavka" id="postavka" cols="50"></textarea>
                                                            <p class="help-block"></p><br/>
                                                        </div>

                                                        <div class="controls">
                                                            <label class="control-label">Odgovor1:</label>
                                                            <input type="text" name="o1" id="o1">
                                                            <p class="help-block"></p>
                                                        </div>
                                                        <div class="controls">
                                                            <label class="control-label">Odgovor2:</label>
                                                            <input type="text" name="o2" id="o2">
                                                            <p class="help-block"></p>
                                                        </div>
                                                        <div class="controls">
                                                            <label class="control-label">Odgovor3:</label>
                                                            <input type="text" name="o3" id="o3">
                                                            <p class="help-block"></p>
                                                        </div>
                                                        <div class="controls">
                                                            <label class="control-label">Odgovor4:</label>
                                                            <input type="text" name="o4" id="o4">
                                                            <p class="help-block"></p><br/>
                                                        </div>
                                                        <div class="controls">
                                                            <label class="control-label">Tacan odgovor</label>
                                                            <select name="tacan">
                                                                <option value="">
                                                                    <?php
                                                                    for ($i = 1; $i <= 4; $i++)
                                                                        echo "<option value='" . $i . "'>$i</option>";
                                                                    ?>
                                                            </select>
                                                            <p class="help-block"></p><br/>
                                                        </div>
                                                        <div class="controls">
                                                            <label class="control-label">Nivo</label>
                                                            <select name="nivo">
                                                                <option value="">Izaberi nivo</option>
                                                                <?php
                                                                $nivo = $this->doctrine->em->getRepository('NivoTezine')->findAll();
                                                                foreach ($nivo as $row) {
                                                                    $naziv = $row->getNaziv();
                                                                    echo "<option value='" . $naziv . "'>$naziv</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <p class="help-block"></p><br/>
                                                        </div>
                                                        <div class="controls">
                                                            <label class="control-label">Oblast</label>
                                                            <select name="oblast">
                                                                <option value="">Izaberi oblast</option>
                                                                <?php
                                                                $oblast = $this->doctrine->em->getRepository('Oblast')->findAll();
                                                                foreach ($oblast as $row) {
                                                                    $naziv = $row->getNaziv();
                                                                    echo "<option value='" . $naziv . "'>$naziv</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <p class="help-block"></p><br/>
                                                        </div>
                                                        Slika:<input type="file" name="userfile" id="userfile"><br /><br/>
                                                        <input type="submit" value="Dodaj pitanje" name="submit" class="button2">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Modal licnost-->

                                    <div class="modal" id="myModalformaEnig" role="dialog" data-backdrop=""   tabindex="-1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" id="zatvoriformuL" >&times;</button>
                                                    <h4> Forma za unos licnosti </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="formaa">
                                                        <form action="moderatorcontroller/createlicnostpitanje" 
                                                              method="post" enctype="multipart/form-data" name='userfile'>

                                                            <div class="controls">
                                                                Stavka broj 1: <input type="text" name="s1" id="s1"><br />
                                                                Stavka broj 2: <input type="text" name="s2" id="s2"><br />
                                                                Stavka broj 3: <input type="text" name="s3" id="s3"><br />
                                                                Stavka broj 4: <input type="text" name="s4" id="s4"><br />
                                                                Stavka broj 5: <input type="text" name="s5" id="s5"><br />
                                                                Stavka broj 6: <input type="text" name="s6" id="s6"><br />
                                                                Ime Licnosti:&nbsp;&nbsp; <input type="text" name="licnost" id="licnost"><br /><br/>
                                                            </div>
                                                            <div class="controls">
                                                                <label class="control-label">Nivo</label>
                                                                <select name="nivo">
                                                                    <option value="">Izaberi nivo</option>
                                                                    <?php
                                                                    $nivo = $this->doctrine->em->getRepository('NivoTezine')->findAll();
                                                                    foreach ($nivo as $row) {
                                                                        $naziv = $row->getNaziv();
                                                                        echo "<option value='" . $naziv . "'>$naziv</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <p class="help-block"></p><br/>
                                                            </div>
                                                            <div class="controls">
                                                                <label class="control-label">Oblast</label>
                                                                <select name="oblast">
                                                                    <option value="">Izaberi oblast</option>
                                                                    <?php
                                                                    $oblast = $this->doctrine->em->getRepository('Oblast')->findAll();
                                                                    foreach ($oblast as $row) {
                                                                        $naziv = $row->getNaziv();
                                                                        echo "<option value='" . $naziv . "'>$naziv</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <p class="help-block"></p><br/>
                                                            </div>
                                                            Slika:<input type="file" name="userfile" id="userfile"><br /><br/>
                                                            <input type="submit" value="Dodaj pitanje" name="submit" class="button2">
                                                            </div>
                                                        </form>
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
                                                            $attrubutesRegister = ['name' => 'izmeniDugme', 'id' => 'izmeniDugme', 'class' => 'form-horizontal'];

                                                            echo form_open("moderatorcontroller/izmeniPitanje/", $attrubutesRegister);

                                                            echo "<button class=" . "'button3'" . "  id=" . "'button'" . ">IZMENI</button>";

                                                            echo form_close();
                                                            ?>
                                                            <?php
                                                            if ($questions == null) {
                                                                echo "Nema pitanja";
                                                            } else if (count($questions) == 0) {
                                                                echo "Nema pitanja";
                                                            } else {
                                                                echo "IMA pitanja";
                                                                ?>
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
                                                                <?php $i = 0;
                                                                foreach ($questions as $p) {
                                                                    ?>
                                                                    <tr>
                                                                        <td>

                                                                        <?php echo $p['nivo']; ?><td>
                                                                        <td><?php echo $p['oblast']; ?></td>
                                                                        <td><?php echo $p['idPitanja']; ?></td>
                                                                        <td><?php
                                                                            $attrubutesRegister = ['name' => 'izmeniDugme' . $p['idPitanja'], 'id' => 'izmeniDugme' . $p['idPitanja'], 'class' => 'form-horizontal'];


                                                                            echo form_open("moderatorcontroller/izmeniPitanje/" . $p['idPitanja'], $attrubutesRegister);
                                                                            $strp = $p['idPitanja'];
                                                                            echo "<button class=" . "'button3'" . "  id=" . "'button'.$strp" . ">IZMENI</button>";

                                                                            echo form_open("administratorcontroller/izmeniPitanje/" . $p['idPitanja'], $attrubutesRegister);
                                                                            $strp = $p['idPitanja'];
                                                                            echo "<button class=" . "'button2'" . "  id=" . "'button'.$strp" . ">IZMENI</button>";


                                                                            echo form_close();
                                                                            ?></td> <td><?php
                                                                            $attrubutesRegister = ['name' => 'brisiDugme' . $p['idPitanja'], 'id' => 'brisiDugme' . $p['idPitanja'], 'class' => 'form-horizontal'];

                                                                            echo form_open("moderatorcontroller/deletePitanje/" . $p['idPitanja'], $attrubutesRegister);
                                                                            $strp = $p['idPitanja'];
                                                                            echo "<button class=" . "'button3'" . "  id=" . "$strp.'button'" . ">BRIŠI</button>";

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
