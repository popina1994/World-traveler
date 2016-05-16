<?php
require_once(APPPATH."models/entities/NivoTezine.php");
require_once(APPPATH."models/entities/VrediPutnika.php");

class Model extends CI_Model {
	 
	/**
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	 
	public function __construct() {

		parent::__construct();
		$this->em = $this->doctrine->em;
	}
	 
	
	function createModerator($data){
		
		$user = $data['username'];
		$users =  $this->em->getRepository('RegKorisnik')->findBy(array('username' => $user ));
		if($users!=null) return false;
		
		$korisnik = new RegKorisnik();
		$korisnik->setUsername($data['username']);
		$korisnik->setPassword($data['password']);
		$mod = new Moderator();
		$mod->setIdkor($korisnik);
		
		try {
			//save to database
			$this->em->persist($korisnik);
			$this->em->flush();
			$this->em->persist($mod);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
		
	}
	
	function createTakmicar($data){
	
		$user = $data['username'];
		$users =  $this->em->getRepository('RegKorisnik')->findBy(array('username' => $user ));
		if($users!=null) return false;
	
		$korisnik = new RegKorisnik();
		$korisnik->setUsername($data['username']);
		$korisnik->setPassword($data['password']);
		$tak = new Takmicar();
		$tak->setIdkor($korisnik);
		$tak->setIme($data['ime']);
		$tak->setPrezime($data['prezime']);
		
		//ovde dolazi postavljanje slike ako nije null
	
		try {
			//save to database
			$this->em->persist($korisnik);
			$this->em->flush();
			$this->em->persist($tak);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
	
	}
	
	function createAdministrator($data){
	
		$user = $data['username'];
		$users =  $this->em->getRepository('RegKorisnik')->findBy(array('username' => $user ));
		if($users!=null) return false;
	
		$korisnik = new RegKorisnik();
		$korisnik->setUsername($data['username']);
		$korisnik->setPassword($data['password']);
		$admin = new Administrator();
		$admin->setIdkor($korisnik);
	
		try {
			//save to database
			$this->em->persist($korisnik);
			$this->em->flush();
			$this->em->persist($admin);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
	
	}
	
	function createVrediPutnika($data){
		$oblast = $data['idobl'];
		$nivo = $data['idniv'];
		
		$vp = new VrediPutnika();
		$vp->setIdobl($oblast);
		$vp->setIdniv($nivo);
		$vp->setBrplus($data['brplus']);
		$vp->setBrminus($data['brminus']);
		
		try {
			//save to database
			$this->em->persist($vp);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
		
	}
	
	function createSeGraniciSa($data){
		$obl1 = $data['idobl1'];
		$obl2 = $data['idobl2'];
		
		$obl1->addIdobl2($obl2);
		$obl2->addIdobl2($obl1);
		
		try {
			//save to database
			$this->em->persist($obl1);
			$this->em->flush();
			$this->em->persist($obl2);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
	}
	
	function createNivoTezine($data)
	{
		$naziv = $data['naziv'];
		
		$nivo =  $this->em->getRepository('NivoTezine')->findBy(array('naziv' => $naziv));
		if($nivo!=null) return false;
		
		$nivo = new NivoTezine();
		$nivo->setNaziv($naziv);
		 
		try {
			//save to database
			$this->em->persist($nivo);
			$this->em->flush();
		}
		catch(Exception $err){
			 
			die($err->getMessage());
		}
		return true;
	}
	
	function createOblast($data)
	{
		$naziv = $data['naziv'];
	
		$obl =  $this->em->getRepository('Oblast')->findBy(array('naziv' => $naziv));
		if($obl!=null) return false;
	
		$obl = new Oblast();
		$obl->setNaziv($naziv);
			
		try {
			//save to database
			$this->em->persist($obl);
			$this->em->flush();
		}
		catch(Exception $err){
	
			die($err->getMessage());
		}
		return true;
	}
}