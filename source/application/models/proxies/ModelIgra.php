<?php

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
		if (array_key_exists ( 'putnici', $data ))
			$igra->setPutnici($data['putnici']); //zadat pocetni broj
		else $igra->setPutnici(0);
		$igra->setStatus('t'); //tekuca igra, igra u toku 

		$user =  $this->doctrine->em->getRepository('RegKorisnik')->findBy(array('username' => $data['username']))[0];
		$user =  $this->doctrine->em->find("Takmicar", $user->getIdkor());
		$igra->setIdkor($user);
		
		$nivo =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $data['nivo']))[0];
		$igra->setIdniv($nivo);
	
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
	function existsUnfinishedIgra($data){
		$user = $data['userName'];
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
	
}