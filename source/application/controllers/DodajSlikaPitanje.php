<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

include APPPATH . 'models/entities/NivoTezine.php';

include APPPATH . 'models/entities/Moderator.php';

class DodajSlikaPitanje extends CI_Controller {
	

	public function index() {
		

		$this->load->library ( 'doctrine' );
		
		?>
<!DOCTYPE html>
<html>
<body>

    <form action="moderatorcontroller/createslikapitanje" 
		method="post" enctype="multipart/form-data" name='userfile'>
		Postavka:<br/><textarea name="postavka" id="postavka" cols="50"></textarea><br />
		Odgovor1: <input type="text" name="o1" id="o1"><br />
		Odgovor2: <input type="text" name="o2" id="o2"><br />
		Odgovor3: <input type="text" name="o3" id="o3"><br />
		Odgovor4: <input type="text" name="o4" id="o4"><br />
		Tacan odgovor:  
		<select name="tacan">
		<option value="">
		<?php
		for($i = 1; $i <= 4; $i++)
		echo "<option value='".$i."'>$i</option>";
		?>
		</select>
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
                
                
		
		Slika:<input type="file" name="userfile" id="slikaMoja"><br /><br/>
		
		<input type="submit" value="Dodaj pitanje" name="submit">
               
	</form>

</body>
</html>

<?php
		
		
		if (isset ( $_POST ["submit"] )) {
			$check = getimagesize ( $_FILES ["fileToUpload"] ["tmp_name"] );
			if ($check !== false) $uploadOk = 1;
			else $uploadOk = 0;
			
			$target_dir = "img/";
			$target_file = $target_dir . basename ( $_FILES ["fileToUpload"] ["name"] );
			$uploadOk = 1;
			$imageFileType = pathinfo ( $target_file, PATHINFO_EXTENSION );
			
			// Check if file already exists
			if (file_exists ( $target_file )) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES ["fileToUpload"] ["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			
			if (($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "gif" && $imageFileType != "GIF")) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file ( $_FILES ["fileToUpload"] ["tmp_name"], $target_file )) {
					echo "The file " . basename ( $_FILES ["fileToUpload"] ["name"] ) . " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
					return;
				}
			}
			
			
			$this->load->model ( 'proxies/ModelSlikaPitanje' );
			
			$nivo =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $_POST['nivo']))[0];
			$oblast = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $_POST['oblast']))[0];
			
			$autor = $this->doctrine->em->find ( "Moderator", 1 );
			
			$tacan = $_POST['tacan'];
			$p = $_POST['postavka'];
			$o1 = $_POST['o1'];
			$o2 = $_POST['o2'];
			$o3 = $_POST['o3'];
			$o4 = $_POST['o4'];
			$data = Array (
					'slika' => basename ( $_FILES ["fileToUpload"] ["name"] ),
					'idniv' => $nivo,
					'idobl' => $oblast,
					'idkor' => $autor,
					'postavka' => $p,
					'odgovor1' => $o1,
					'odgovor2' => $o2,
					'odgovor3' => $o3,
					'odgovor4' => $o4,
					'tacan' => $tacan 
			);
			
			$this->ModelSlikaPitanje->createSlikaPitanje ( $data );
			echo "Dodato";
		
		}
	}
}
	