<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

include APPPATH . 'models/entities/NivoTezine.php';
include APPPATH . 'models/entities/Moderator.php';
class DodajTekstPitanje extends CI_Controller {
	
	
	public function index() {
		

		$this->load->library ( 'doctrine' );
		
		?>
<!DOCTYPE html>
<html>
<body>
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>
		method="post" enctype="multipart/form-data">
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
		
		<input type="submit" value="Dodaj pitanje" name="submit">
	</form>

</body>
</html>
		

<?php
		
		
		if (isset ( $_POST ["submit"] )) {
		
			
			$this->load->library ( 'doctrine' );
			$this->load->model ( 'proxies/Model' );
			
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
			
			$this->Model->createTekstPitanje ( $data );
			echo "Dodato!";
		}
	}
}
	