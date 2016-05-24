<?php
require_once (APPPATH . "models/entities/LicnostPitanje.php");
class ModelLicnostPitanje extends CI_Model{
	
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	
	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
	}
	
	function createLicnostPitanje($data){
	
		$pit = new Pitanje();
		$pit->setBrnetacno(0);
		$pit->setBrtacno(0);
		$pit->setIdniv($data['idniv']);
		$pit->setIdobl($data['idobl']);
		$pit->setIdkor($data['idkor']);
	
		$lp = new LicnostPitanje();
		$lp->setIdpit($pit);
		$lp->setLicnost($data['licnost']);
		$lp->setSlika($data['slika']);
	
		$lp->setPodatak1($data['podatak1']);
		$lp->setPodatak2($data['podatak2']);
		$lp->setPodatak3($data['podatak3']);
		$lp->setPodatak4($data['podatak4']);
		$lp->setPodatak5($data['podatak5']);
		$lp->setPodatak6($data['podatak6']);
	
		try {
			//save to database
			$this->em->persist($pit);
			$this->em->flush();
			$this->em->persist($lp);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
	}
	
	function getLicnostPitanje($data) {

		$nivo = $this->doctrine->em->getRepository ( 'NivoTezine' )->findBy ( array (
				'naziv' => $data ['nivo'] 
		) );
		if (count ( $nivo ) == 0) return null;
		$nivo=$nivo[0];
		$oblast = $this->doctrine->em->getRepository ( 'Oblast' )->findBy ( array (
				'naziv' => $data ['oblast'] 
		) );
		if (count ( $oblast ) == 0) return null;
		$oblast=$oblast[0];
		
		$q = $this->doctrine->em->getRepository ( 'Pitanje' )->findBy ( array (
				'idobl' => $oblast->getIdobl(),
				'idniv' => $nivo->getIdniv() 
		) );

		if (count ( $q ) == 0) return null;
		$licnost=array();
		foreach ($q as $res){
			$lp = $this->doctrine->em->find ( "LicnostPitanje", $res->getIdpit () );
			if($lp)
				array_push($liscnost,$lp);
		}
		if(count($licnost)==0) return null;
		return $licnost[array_rand($licnost)];
			
	}
	
}