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
                
                $igra = $this->doctrine->em->find("Igra", $data['idigr']);
		$oblast = $this->ModelOblast->getCountry($data);
	
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
	//vraca true ako je sve osvojeno
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
		
		$query = $this->em->createQuery('SELECT COUNT(o.idobl) FROM Oblast o');
		$countobl = $query->getSingleScalarResult();
		
		if($countobl == count($igra->getIdosv())) 
			return true;
		return false;
	
	}
	
	//nakon neuspesnog osvajanja oblasti
	//dobija id igre i naziv oblasti
	//vraca true ako je izgubljena igra -> putnici<=0
	function neuspehOsvajanje($data){
	
		$igra = $this->doctrine->em->find("Igra", $data['idigr']);
		$oblast = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv'=>$data['oblast']))[0];
	
		$osvajanje = $this->doctrine->em->getRepository('Osvajanje')->findBy(array('idigr'=>$igra->getIdigr(), 'idobl'=>$oblast->getIdobl()))[0];
	
	
		$vp = $this->doctrine->em->getRepository('VrediPutnika')->findBy(array('idniv'=>$igra->getIdniv()->getIdniv(), 'idobl'=>$oblast->getIdobl()))[0];
		$igra->setPutnici($igra->getPutnici()-$vp->getBrminus());
		$igra->removeIdosv($osvajanje);
		
		try {
			$this->em->persist($igra);
			$this->em->flush();
			
			$this->em->remove($osvajanje);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		if($igra->getPutnici()<=0)
			return true;
		return false;
	
	}
	
	// Vraca zapoceto osvajanje u okviru zadate igre ako postoji 
	function existsOsvajanje($data) {
		$igra = $this->doctrine->em->find("Igra", $data['idigr']);
		$osvajanja = $igra->getIdosv();
		foreach ($osvajanja as $osv){
			if($osv->getStatus()=='z')
				return $osv;
		}
		return null;
	}
	
}