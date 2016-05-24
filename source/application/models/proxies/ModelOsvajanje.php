<?php

class ModelOsvajanje extends CI_Model {
	
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	
	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
	}
	
	//kad se napadne oblast
	function createOsvajanje($data){
	
		$osvajanje = new Osvajanje();
		$osvajanje->setStatus('z'); //zapoceto osvajanje
	
		$igra = $data['idigr'];
		$oblast = $data['idobl'];
	
		$osvajanje->setIdigr($igra);
		$osvajanje->setIdobl($oblast);
	
		$igra->addIdosv($osvajanje);
		try {
			//save to database
			$this->em->persist($osvajanje);
			$this->em->flush();
			$this->em->persist($igra);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
	
	}
	
	//nakon osvajanja oblasti
	function updateOsvajanje($osvajanje){
	
		$osvajanje->setStatus('o'); //osvojena
	
		try {
			//save to database
			$this->em->persist($osvajanje);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
	
	}
	
	// Vraca zapoceto osvajanje u okkviru zadate igre ako postoji 
	public function existsOsvajanje($data) {
		$osvajanja = $data['igra']->getIdosv();
		foreach ($osvajanja as $osv){
			if($osv->getStatus()=='z')
				return $osv;
		}
		return null;
	}
	
}