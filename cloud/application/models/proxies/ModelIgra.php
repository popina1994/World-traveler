<?php

/**
 *
 * @author Dragana Milovancevic 2013/0048
 *
 */
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
		$igra->setStatus('t'); //tekuca igra, igra u toku 

		$user =  $this->doctrine->em->getRepository('RegKorisnik')->findBy(array('username' => $data['username']))[0];
		$user =  $this->doctrine->em->find("Takmicar", $user->getIdkor());
		$igra->setIdkor($user);
		
		$nivo =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $data['naziv']))[0];
		$igra->setIdniv($nivo);
		if (array_key_exists ( 'putnici', $data ))
			$igra->setPutnici($data['putnici']); //zadat pocetni broj
		else {
			$nivo=$nivo->getIdniv();
			if($nivo==1) $igra->setPutnici(9);
			else if($nivo==2) $igra->setPutnici(6);
			else if($nivo==3) $igra->setPutnici(4);
		}
		try {
			//save to database
			$this->em->persist($igra);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return $igra->getIdigr();
	
	}
	
	//Zavrsava igru $data['igra'];
	function finishUnfinishedIgra($data){
		$igraID = $data['igraID'];
                $igra = $this->doctrine->em->getRepository('Igra')->find($igraID);
		$igra->setStatus('u'); //unfinished, unistena
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
	
	//proverava da li je dozvoljen napad
	function canAttack($data){
                $return = array();
                $return['success']= true;
                
		$igra = $this->doctrine->em->getRepository('Igra')->find($data['igraID']);
		$osvajanja = $igra->getIdosv();
	 	if(count($osvajanja)==0) goto exitFun;
		
                $oblast = $this->doctrine->em->getRepository ( 'Oblast' )->findBy ( array (
				'naziv' => $data['oblast']) )[0];
		
		$osvojene = array();
		foreach($osvajanja as $osv)
			array_push($osvojene,$osv->getIdobl());
		
		if (in_array($oblast, $osvojene))  {
                    $return['success'] = false;
                    $return['error'] = "Vec osvojena oblast ".$data['oblast'];
                    goto exitFun;
                }
		$granice = $oblast->getIdobl2();
		foreach($granice as $obl1){
			if (in_array($obl1, $osvojene))
				goto exitFun;
		}
		
                $return['error'] = $data['oblast']." ne granici se ni sa jednom od osvojenih teritorija";
                $return['success'] = false;
                
                exitFun:
                    return $return;
		
	}
	
	function getPoeni($data){
		return $this->doctrine->em->getRepository('Igra')->find($data['igraID'])->getPoeni();
	}
	function getPutnici($data){
		return $this->doctrine->em->getRepository('Igra')->find($data['igraID'])->getPutnici();
	}
	
	//t tekuca
	//i izgubljena
	//o osvojena
	//u unistena
	function getStatus($data){
		return $this->doctrine->em->getRepository('Igra')->find($data['igraID'])->getStatus();
	}
	
	//vraca rang listu za dati nivo(ID)
	function getScores($nivo){
		$res = $this->doctrine->em->getRepository('Igra')
		->findBy(
				array('idniv' => $nivo),
				array('poeni' => 'DESC')
		);
		$scores = array();
		$data;
		$i=1;
		foreach ($res as $r){
			$data['rank']=$i++;
			$data['user']=$r->getIdkor()->getIdkor()->getUsername();
			$data['poeni']=$r->getPoeni();
			array_push($scores, $data);
		}
		return $scores;
	}
}