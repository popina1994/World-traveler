
<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

/**
 *
 * @author Dragana Milovancevic 2013/0048
 *
 */
class DodajGranice extends CI_Controller {

	public function index() {


		$this->load->library ( 'doctrine' );

		?>
<!DOCTYPE html>
<html>
<body>
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>
		method="post" enctype="multipart/form-data">
		
		Oblast1:
		<select name="obl1">
		<option value="">Izaberi obl1</option>
		<?php
		$obl =  $this->doctrine->em->getRepository('Oblast')->findAll();
		foreach($obl as $row){
			$naziv = $row->getNaziv();
			echo "<option value='".$naziv."'>$naziv</option>";
		}
		?>
		</select>
		<br/>
		Oblast2:
		<select name="obl2">
		<option value="">Izaberi obl2</option>
		<?php
		$obl =  $this->doctrine->em->getRepository('Oblast')->findAll();
		foreach($obl as $row){
			$naziv = $row->getNaziv();
			echo "<option value='".$naziv."'>$naziv</option>";
		}
		?>
		</select>
		<br/>
		
		<input type="submit" value="Dodaj granice" name="submit">
	</form>

</body>
</html>
		

<?php
		
		
		if (isset ( $_POST ["submit"] )) {
		
			$this->load->model ( 'proxies/Model' );
			
			$obl1 = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $_POST['obl1']))[0];
			$obl2 = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $_POST['obl2']))[0];
			
			$data = Array (
					'idobl1' => $obl1,
					'idobl2' => $obl2,
					
			);
			
			$this->Model->createSeGraniciSa ( $data );
			echo "Dodato!";
		}
	}
}
	