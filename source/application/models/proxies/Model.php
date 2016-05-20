<?php
require_once(APPPATH."models/entities/NivoTezine.php");
require_once(APPPATH."models/entities/VrediPutnika.php");
require_once(APPPATH."models/entities/SlikaPitanje.php");
require_once(APPPATH."models/entities/TekstPitanje.php");
require_once(APPPATH."models/entities/Pitanje.php");
require_once(APPPATH."models/entities/LicnostPitanje.php");
require_once(APPPATH."models/entities/Igra.php");

class Model extends CI_Model {
	 
	/**
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	 
	public function __construct() {

		parent::__construct();
		$this->em = $this->doctrine->em;
	}
	 
	function createIgra($data){
	
		$igra = new Igra();
		$igra->setPoeni(0);
		$igra->setPutnici($data['putnici']); //zadat pocetni broj
		$igra->setStatus('n'); //nova igra, igra u toku
		
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
	
	function createTekstPitanje($data){
	
		$pit = new Pitanje();
		$pit->setBrnetacno(0);
		$pit->setBrtacno(0);
		$pit->setIdniv($data['idniv']);
		$pit->setIdobl($data['idobl']);
		$pit->setIdkor($data['idkor']);
	
		$tp = new TekstPitanje();
		$tp->setIdpit($pit);
		$tp->setOdgovor1($data['odgovor1']);
		$tp->setOdgovor2($data['odgovor2']);
		$tp->setOdgovor3($data['odgovor3']);
		$tp->setOdgovor4($data['odgovor4']);
		$tp->setPostavka($data['postavka']);
		$tp->setTacanodgovor($data['tacan']);
	
		try {
			//save to database
			$this->em->persist($pit);
			$this->em->flush();
			$this->em->persist($tp);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
	}
	
	function createSlikaPitanje($data){
	
		$pit = new Pitanje();
		$pit->setBrnetacno(0);
		$pit->setBrtacno(0);
		$pit->setIdniv($data['idniv']);
		$pit->setIdobl($data['idobl']);
		$pit->setIdkor($data['idkor']);
	
		$sp = new SlikaPitanje();
		$sp->setIdpit($pit);
		$sp->setOdgovor1($data['odgovor1']);
		$sp->setOdgovor2($data['odgovor2']);
		$sp->setOdgovor3($data['odgovor3']);
		$sp->setOdgovor4($data['odgovor4']);
		$sp->setPostavka($data['postavka']);
		$sp->setSlika($data['slika']);
		$sp->setTacanodgovor($data['tacan']);
	
		try {
			//save to database
			$this->em->persist($pit);
			$this->em->flush();
			$this->em->persist($sp);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
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
}