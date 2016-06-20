<?php

/**
 *
 * @author Dragana Milovancevic 2013/0048
 * @author Slavko Ivanovic 2013/0082
 */
class ModelTekstPitanje extends CI_Model {
	
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	
	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
	}
	
	public function createTekstPitanje($data){
            
        $idniv =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $data['idniv']))[0];
        $idobl = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $data['idobl']))[0];		
	$idkor = $this->doctrine->em->find ( "Moderator", $data['idkor'] );
            
            
	
		$pit = new Pitanje();
		$pit->setBrnetacno(0);
		$pit->setBrtacno(0);
		$pit->setIdniv($idniv);
		$pit->setIdobl($idobl);
		$pit->setIdkor($idkor);
	
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
        
        public function getTekstPodaci($data){
            $id=$data['id'];
            $pit=  $this->doctrine->em->find ( "TekstPitanje", $id );
            $pit2= $this->doctrine->em->find ( "Pitanje", $id );
           $pd['idniv']=$pit2->getIdniv()->getNaziv();
           $pd['idobl']=$pit2->getIdobl() ->getNaziv();
           $pd['odgovor1']=$pit->getOdgovor1();
           $pd['odgovor2']=$pit->getOdgovor2();
           $pd['odgovor3']=$pit->getOdgovor3();
           $pd['odgovor4']=$pit->getOdgovor4();
           $pd['postavka']=$pit->getPostavka();
           $pd['tacan']=$pit->getTacanodgovor();
           $pd['id']=$id;
            
            return $pd;
        }

        
        public function updateTekstPitanje($data){
            /*$users = $this->doctrine->em->getRepository ( 'Pitanje' )->findBy ( array (
				'idpit' => $data['id']
		) );*/
            $users=  $this->doctrine->em->find ( "Pitanje", $data['id'] );
            $user= $this->doctrine->em->find ( "TekstPitanje", $users->getIdpit() );
            $user->setPostavka($data['postavka']);
            $user->setOdgovor1($data['odgovor1']);
            $user->setOdgovor2($data['odgovor2']);
            $user->setOdgovor3($data['odgovor3']);
            $user->setOdgovor4($data['odgovor4']);
            $user->setTacanodgovor($data['tacan']);
            $users->setIdniv($data['idniv']);
            $users->setIdobl($data['idobl']);
            $users->setIdkor($data['idkor']);
            $this->doctrine->em->flush();
        }
	
	function getTekstPitanje($data) {

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
			$tekst=array();
			foreach ($q as $res){
				$tp = $this->doctrine->em->find ( "TekstPitanje", $res->getIdpit () );
				if($tp)
					array_push($tekst,$tp);
			}
			if(count($tekst)!=0)
			return $tekst[array_rand($tekst)];
		}
		
		$pit = new Pitanje();
		$pit->setBrnetacno(0);
		$pit->setBrtacno(0);
		$pit->setIdniv($nivo);
		$pit->setIdobl($oblast);
			
		$tp = new TekstPitanje();
		$tp->setIdpit($pit);
		$tp->setOdgovor1('Netačan odgovor');
		$tp->setOdgovor2("Netačan odgovor");
		$tp->setOdgovor3("Tačan odgovor");
		$tp->setOdgovor4("Netačan odgovor");
		$tp->setPostavka('Bonus pitanje! Odabirom tačnog odgovora uspešno se nastavlja osvajanje!');
		$tp->setTacanodgovor(3);
		return $tp;
			
	}
	
}