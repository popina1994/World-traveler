<?php

/**
 *
 * @author Dragana Milovancevic 2013/0048
 * @author Slavko Ivanovic 2013/0082
 */
class ModelLicnostPitanje extends CI_Model{
	
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	
	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
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
                        $ID=$pit->getIdpit();
			$this->em->persist($lp);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return $ID;
	}
        
        
        
        public function updateLicnostPitanje($data){
            /*$users = $this->doctrine->em->getRepository ( 'Pitanje' )->findBy ( array (
				'idpit' => $data['$id']
		) );*/
            $users=  $this->doctrine->em->find ( "Pitanje", $data['id'] );
            $user= $this->doctrine->em->find ( "LicnostPitanje", $users->getIdpit() );
            $user->setLicnost($data['licnost']);
            $user->setPodatak1($data['podatak1']);
            $user->setPodatak2($data['podatak2']);
            $user->setPodatak3($data['podatak3']);
            $user->setPodatak4($data['podatak4']);
            $user->setPodatak5($data['podatak5']);
            $user->setPodatak6($data['podatak6']);
            $user->setSlika($data['slika']);
            $users->setIdniv($data['idniv']);
            $users->setIdobl($data['idobl']);
            $users->setIdkor($data['idkor']);
            $this->doctrine->em->flush();
        }  
        public function getLicnostPodaci($data){
            $id=$data['id'];
            $pit=  $this->doctrine->em->find ( "LicnostPitanje", $id );
            $pit2= $this->doctrine->em->find ( "Pitanje", $id );
           $pd['idniv']=$pit2->getIdniv()->getNaziv();
           $pd['idobl']=$pit2->getIdobl() ->getNaziv();
           $pd['podatak1']=$pit->getPodatak1();
           $pd['podatak2']=$pit->getPodatak2();
           $pd['podatak3']=$pit->getPodatak3();
           $pd['podatak4']=$pit->getPodatak4();
           $pd['podatak5']=$pit->getPodatak5();
           $pd['podatak6']=$pit->getPodatak6();
           $pd['licnost']=$pit->getLicnost();
           $pd['slika']=$pit->getSlika();
           $pd['id']=$id;
            
            return $pd;
        }
        
	
	function getLicnostPitanje($data) {

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
			$licnost=array();
			foreach ($q as $res){
				$lp = $this->doctrine->em->find ( "LicnostPitanje", $res->getIdpit () );
				if($lp)
					array_push($licnost,$lp);
			}
			if(count($licnost)!=0) 
				return $licnost[array_rand($licnost)];
		}
		
		$pit = new Pitanje();
		$pit->setBrnetacno(0);
		$pit->setBrtacno(0);
		$pit->setIdniv($nivo);
		$pit->setIdobl($oblast);
		
		$lp = new LicnostPitanje();
		$lp->setIdpit($pit);
		$lp->setLicnost("osoba");
		$lp->setSlika("user.png");
		
		$lp->setPodatak1('Bonus pitanje! Slova su u nastavku...');
		$lp->setPodatak2('o');
		$lp->setPodatak3('s');
		$lp->setPodatak4('o');
		$lp->setPodatak5('b');
		$lp->setPodatak6('a');
		return $lp;
		
	}
	
}