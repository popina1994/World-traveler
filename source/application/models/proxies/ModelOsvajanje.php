<?php

define("POENI", 10);

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
	//dobija id igre i naziv oblasti
	function uspehOsvajanje($data){
		
		$igra = $this->doctrine->em->find("Igra", $data['idigr']);
		$oblast = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv'=>$data['oblast']))[0];
		
		$osvajanje = $this->doctrine->em->getRepository('Osvajanje')->findBy(array('idigr'=>$igra->getIdigr(), 'idobl'=>$oblast->getIdobl()))[0];
		
		$osvajanje->setStatus('o'); //osvojena
		$vp = $this->doctrine->em->getRepository('VrediPutnika')->findBy(array('idniv'=>$igra->getIdniv()->getIdniv(), 'idobl'=>$oblast->getIdobl()))[0];
		$igra->setPutnici($igra->getPutnici()+$vp->getBrplus());
		$igra->setPoeni($igra->getPoeni()+$vp->getBrplus()*POENI);
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
	
	// Vraca zapoceto osvajanje u okkviru zadate igre ako postoji 
	function existsOsvajanje($data) {
		$osvajanja = $data['igra']->getIdosv();
		foreach ($osvajanja as $osv){
			if($osv->getStatus()=='z')
				return $osv;
		}
		return null;
	}
	
}