<?php

/**
 *
 * @author Dragana Milovancevic 2013/0048
 * @author Slavko Ivanovic 2013/0082
 */
class ModelSlikaPitanje extends CI_Model {
	
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	
	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
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
                        $ID=$pit->getIdpit();
			$this->em->persist($sp);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return $ID;
	}
        
        
        public function updateSlikaPitanje($data){
            
            $users=  $this->doctrine->em->find ( "Pitanje", $data['id'] );
            $user= $this->doctrine->em->find ( "SlikaPitanje", $users->getIdpit() );
            $user->setPostavka($data['postavka']);
            $user->setOdgovor1($data['odgovor1']);
            $user->setOdgovor2($data['odgovor2']);
            $user->setOdgovor3($data['odgovor3']);
            $user->setOdgovor4($data['odgovor4']);
            $user->setTacanodgovor($data['tacan']);
            $user->setSlika($data['slika']);
            $users->setIdniv($data['idniv']);
            $users->setIdobl($data['idobl']);
            $users->setIdkor($data['idkor']);
            $this->doctrine->em->flush();
        }
        
        
     
        public function getSlikaPodaci($data){
            $id=$data['id'];
            $pit=  $this->doctrine->em->find ( "SlikaPitanje", $id );
            $pit2= $this->doctrine->em->find ( "Pitanje", $id );
           $pd['idniv']=$pit2->getIdniv()->getNaziv();
           $pd['idobl']=$pit2->getIdobl() ->getNaziv();
           $pd['odgovor1']=$pit->getOdgovor1();
           $pd['odgovor2']=$pit->getOdgovor2();
           $pd['odgovor3']=$pit->getOdgovor3();
           $pd['odgovor4']=$pit->getOdgovor4();
           $pd['postavka']=$pit->getPostavka();
           $pd['tacan']=$pit->getTacanodgovor();
           //$pd['slika']=$pit->getSlika();
           $pd['id']=$id;
            
            return $pd;
        }
        
  
        
        
        
	
	function getSlikaPitanje($data) {

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

		if (count ( $q ) != 0) {
			$slika=array();
			foreach ($q as $res){
				$sp = $this->doctrine->em->find ( "SlikaPitanje", $res->getIdpit () );
				if($sp)
					array_push($slika,$sp);
			}
			if(count($slika)!=0) 
				return $slika[array_rand($slika)];
		}
		
		$pit = new Pitanje();
		$pit->setBrnetacno(0);
		$pit->setBrtacno(0);
		$pit->setIdniv($nivo);
		$pit->setIdobl($oblast);
			
		$sp = new SlikaPitanje();
		$sp->setIdpit($pit);
		$sp->setSlika("pehar.png");
		$sp->setOdgovor1('Netačan odgovor');
		$sp->setOdgovor2("Netačan odgovor");
		$sp->setOdgovor3("Tačan odgovor");
		$sp->setOdgovor4("Netačan odgovor");
		$sp->setPostavka('Bonus pitanje! Odabirom tačnog odgovora uspešno se nastavlja osvajanje!');
		$sp->setTacanodgovor(3);
		return $sp;
			
	}
	
}