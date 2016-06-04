<?php

/**
 *
 * @author Dragana Milovancevic 2013/0048
 *
 */
class Model extends CI_Model {
	 
	/**
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	 
	public function __construct() {

		parent::__construct();
		$this->em = $this->doctrine->em;
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
	
        
	
	/*
	  primer koriscenja:
	  $data = Array('nivo'=>'Beba');
	  $list = $this->Model->scores($data);
	  foreach($list as $res)
		  foreach($res as $r) echo $r;
	 */
	function scores($data){
		$nivo = $this->doctrine->em->getRepository ( 'NivoTezine' )->findBy ( array (
				'naziv' => $data ['nivo'] 
		) );
		if($nivo==null) return null;
		$res = array();
		$igre = $this->doctrine->em->getRepository ( 'Igra' )->findBy ( array (
				'idniv' => $nivo[0]->getIdniv()
		), array('poeni' => 'DESC'));
		
		foreach ($igre as $igra){
			$r = array('takmicar'=>$igra->getIdkor()->getIdkor()->getUsername(), 'poeni'=>$igra->getPoeni());
			array_push($res,$r);
		}
		
	
		return $res;
	}
}