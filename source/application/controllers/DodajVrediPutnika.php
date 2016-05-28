<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class DodajVrediPutnika extends CI_Controller {

	public function index() {


		$this->load->library ( 'doctrine' );

		$obl =  $this->doctrine->em->getRepository('Oblast')->findAll();
		$nivo =  $this->doctrine->em->getRepository('NivoTezine')->findAll();
		
		foreach($obl as $o){
			foreach($nivo as $n){
				if($n->getIdniv()==1) { $brplus = rand ( 3 , 8 ); $brminus = rand ( 1 , 4 );}
				if($n->getIdniv()==2) { $brplus = rand ( 2 , 5 ); $brminus = rand ( 3 , 5 );}
				if($n->getIdniv()==3) { $brplus = rand ( 1 , 3 ); $brminus = rand ( 3 , 6 );}
				
			$data = Array (
					'idobl' => $o,
					'idniv' => $n,
					'brplus' => $brplus,
					'brminus' => $brminus,
					
			);
			
			$this->Model->createVrediPutnika ( $data );
			}
		}
	}
}
	