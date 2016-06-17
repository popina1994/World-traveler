<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

include APPPATH . 'models/entities/NivoTezine.php';

include APPPATH . 'models/entities/Moderator.php';

class DodajLicnostPitanje extends CI_Controller {
	

	public function index() {
		

		$this->load->library ( 'doctrine' );
		
		?>
<!DOCTYPE html>
<html>
<body>

    <form action="moderatorcontroller/createlicnostpitanje" 
		method="post" enctype="multipart/form-data" name='userfile'>
		
		Stavka1: <input type="text" name="s1" id="s1"><br />
		Stavka2: <input type="text" name="s2" id="s2"><br />
		Stavka3: <input type="text" name="s3" id="s3"><br />
		Stavka4: <input type="text" name="s4" id="s4"><br />
                Stavka5: <input type="text" name="s5" id="s5"><br />
                Stavka6: <input type="text" name="s6" id="s6"><br />
                Licnost: <input type="text" name="licnost" id="licnost"><br />
		
		
		<br/>
		Nivo tezine:
		<select name="nivo">
		<option value="">Izaberi nivo</option>
		<?php
		$nivo =  $this->doctrine->em->getRepository('NivoTezine')->findAll();
		foreach($nivo as $row){
			$naziv = $row->getNaziv();
			echo "<option value='".$naziv."'>$naziv</option>";
		}
		?>
		</select>
		<br/>
		Oblast:
		<select name="oblast">
		<option value="">Izaberi oblast</option>
		<?php
		$oblast = $this->doctrine->em->getRepository('Oblast')->findAll();
		foreach($oblast as $row){
			$naziv = $row->getNaziv();
			echo "<option value='".$naziv."'>$naziv</option>";
		}
		?>
		</select>
		<br/>
                
                
		
		Slika:<input type="file" name="userfile" id="userfile"><br /><br/>
		
		<input type="submit" value="Dodaj pitanje" name="submit">
               
	</form>

</body>
</html>
<?php
}
}
?>