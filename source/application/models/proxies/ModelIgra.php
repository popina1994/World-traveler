<?php
require_once (APPPATH . "models/entities/Igra.php");
class ModelIgra extends CI_Model {
	
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	
	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
	}
	
	function createIgra($data){
	
		$igra = new Igra();
		$igra->setPoeni(0);
		$igra->setPutnici($data['putnici']); //zadat pocetni broj
		$igra->setStatus('t'); //tekuca igra, igra u toku 
	
		$igra->setIdkor($data['idkor']);
		$igra->setIdniv($data['idniv']);
	
		try {
			//save to database
			$this->em->persist($igra);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
	
	}
	
	//Zavrsava igru $data['igra'];
	function finishUnfinishedIgra($data){
		$igra = $data['igra'];
		$igra->setStatus('f'); 
		try {
			//save to database
			$this->em->persist($igra);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
	}
	
	//Vraca zapocetu igru korisnika ciji je username $data['userName']
	public function existsUnfinishedIgra($data){
                
                $user = $this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $data ['userName']
		) );
		if($user==null) return null;
		$igra = $this->doctrine->em->getRepository ( 'Igra' )->findBy ( array (
				'idkor' => $user[0]->getIdkor()
		) );
		if($igra==null) return null;
		foreach($igra as $i){
			if($i->getStatus()=='t')
				return $i;
		}
			
		return null;
		
	}
        
        public function test() {
            return null;
        }
        
	
}