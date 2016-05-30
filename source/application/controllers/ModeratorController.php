<?php

 include APPPATH.'models/entities/Pitanje.php';
  include APPPATH.'models/entities/RegKorisnik.php';
 include APPPATH.'models/entities/Oblast.php';
 include APPPATH.'models/entities/Moderator.php';    
 include APPPATH.'models/entities/Takmicar.php';
  include APPPATH.'models/entities/NivoTezine.php';
  include APPPATH.'models/entities/SlikaPitanje.php';
    include APPPATH.'models/entities/TekstPitanje.php';
      include APPPATH.'models/entities/LicnostPitanje.php';
 
 //include_once (dirname(__FILE__) . "/uploader.php");
 require_once APPPATH.'controllers/BaseController.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeratorController
 *
 * @author popina
 */
class ModeratorController extends BaseController {
    //put your code here
    
     public function __construct() {
        parent::__construct("Moderator");
    }

    public function index() {
        //$this->load->view('Administrator');
        $this->load->model('proxies/ModelPitanje');
        $questions=$this->ModelPitanje->getPitanja();
       
        $this->Redirect(['view'=>'Moderator', 'pitanje' => $questions]); 
        
       // $this->Redirect(['view'=>'Moderator']);
    }
    
    public function deletePitanje($id){
        $this->load->model('proxies/ModelPitanje');
        $this->ModelPitanje->deletePitanje($id);
        //$this->Redirect(['view'=>'Moderator']);
        Redirect();
        
    }


    //
    public function createTekstPitanje(){
        //dio pitanja koji ima svako pitanje
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
        echo $idkor['username'];
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $idkor['username']
		) );
        $idkor= $users[0]->getIdkor();
        
        
         //dio pitanja specifican za tip pitanja
        $postavka = $this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
        
        
        $idniv =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $idniv))[0];
        $idobl = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $idobl))[0];		
	$idkor = $this->doctrine->em->find ( "Moderator", $idkor );
        
        
        
        
        $this->load->model('proxies/ModelPitanje');
        $this->load->model('proxies/ModelTekstPitanje');
        
        $this->ModelTekstPitanje->createTekstPitanje(['idniv' => $idniv, 
                            'idobl' => $idobl,
                            'idkor' => $idkor,
                            'postavka' => $postavka,
                            'odgovor1' => $odgovor1,
                            'odgovor2' => $odgovor2,
                            'odgovor3' => $odgovor3,
                            'odgovor4' => $odgovor4,
                            'tacan' => $tacan
            ]);
        
    }
    
    //potrebno ograniciti fino velicinu slike..
    //potrebno napraviti js fajlove za proveru unetih podataka
    //potrebno dodati ekstenziju na ime slike, mozda
    public function createSlikaPitanje(){
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        //OVO TREBA UNCOMMENTOVATI KADA SE NAPRAVI HTML
      //kod za dohvatanje id-a moderatora
        
        $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
        echo $idkor['username'];
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $idkor['username']
		) );
        $idkor= $users[0]->getIdkor();
        
       // $idkor= 583;//slaleM
        
        $postavka=$this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
        

        $idniv =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $idniv))[0];
        $idobl = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $idobl))[0];
	$idkor = $this->doctrine->em->find ( "Moderator", $idkor );
        
        
        
        $this->load->model('proxies/ModelSlikaPitanje');
        $ID=$this->ModelSlikaPitanje->createSlikaPitanje(['idniv' => $idniv, 
                            'idobl' => $idobl,
                            'idkor' => $idkor,
                            'slika' => "",
                            'postavka' => $postavka,
                            'odgovor1' => $odgovor1,
                            'odgovor2' => $odgovor2,
                            'odgovor3' => $odgovor3,
                            'odgovor4' => $odgovor4,
                            'tacan' => $tacan
            ]);
        
        //Dohvatanje ID-a tek sacuvanog pitanja:
        $novoImeSlike=$ID;
        

        $this->load->model('proxies/Uploader');
        $upload_data = $this->Uploader->uploadSlika($novoImeSlike);
        $slika= $upload_data['file_name'];
         

        //echo $slika;
        
        
         $users = $this->doctrine->em->getRepository ( 'Pitanje' )->findBy ( array (
				'idpit' => $ID
		) );
         $user= $this->doctrine->em->find ( "SlikaPitanje", $users[0]->getIdpit() );
         
	    
            $user->setSlika($novoImeSlike);
            $this->doctrine->em->flush();
        
          Redirect();  
          
          //popraviti povratnu adresu
    }
    
    public function createLicnostPitanje(){ 
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        //OVO TREBA UNCOMMENTOVATI KADA SE NAPRAVI HTML
      //kod za dohvatanje id-a moderatora
        
         $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
        echo $idkor['username'];
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $idkor['username']
		) );
        $idkor= $users[0]->getIdkor();
        
        
        
        
        
        //$idkor= 583;//slaleM
        
        $stavka1=$this->input->post('s1');
        $stavka2=$this->input->post('s2');
        $stavka3=$this->input->post('s3');
        $stavka4=$this->input->post('s4');
        $stavka5=$this->input->post('s5');
        $stavka6=$this->input->post('s6');
        $licnost=$this->input->post('licnost');
        
        $idniv =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $idniv))[0];
        $idobl = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $idobl))[0];		
	$idkor = $this->doctrine->em->find ( "Moderator", $idkor );
        
        $this->load->model('proxies/ModelLicnostPitanje');
        $ID=$this->ModelLicnostPitanje->createLicnostPitanje(['idniv' => $idniv, 
                            'idobl' => $idobl,
                            'idkor' => $idkor,
                            'slika' => "",
                            'licnost' => $licnost,
                            'podatak1' => $stavka1,
                            'podatak2' => $stavka2,
                            'podatak3' => $stavka3,
                            'podatak4' => $stavka4,
                            'podatak5' => $stavka5,
                            'podatak6' => $stavka6
            
            ]);
        //Dohvatanje ID-a tek sacuvanog pitanja:
        $novoImeSlike=$ID;
        
        $this->load->model('proxies/Uploader');
        $upload_data = $this->Uploader->uploadSlika($novoImeSlike);
        $slika= $upload_data['file_name'];


        //echo $slika;
        
        $users = $this->doctrine->em->getRepository ( 'Pitanje' )->findBy ( array (
				'idpit' => $ID
		) );
        $user= $this->doctrine->em->find ( "LicnostPitanje", $users[0]->getIdpit() );
         
	    
        $user->setSlika($novoImeSlike);
        $this->doctrine->em->flush();

        Redirect();
    }
        
    public function izmeniTekstPitanje($id){
        
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        $postavka = $this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
                $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
        echo $idkor['username'];
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $idkor['username']
		) );
        $idkor= $users[0]->getIdkor();
        
        $idniv =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $idniv))[0];
        $idobl = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $idobl))[0];		
	$idkor = $this->doctrine->em->find ( "Moderator", $idkor );
        
       $this->load->model('proxies/ModelTekstPitanje');
       $this->ModelTekstPitanje->updateTekstPitanje([
 /*id pitanja za izmenu*/   'id'=>$id,
                            'idniv' => $idniv, 
                            'idobl' => $idobl,
                            'idkor' => $idkor,
                            'postavka' => $postavka,
                            'odgovor1' => $odgovor1,
                            'odgovor2' => $odgovor2,
                            'odgovor3' => $odgovor3,
                            'odgovor4' => $odgovor4,
                            'tacan' => $tacan
            ]);
        
        //vidi posle gdje treba da vrati ovaj controller  
    }    
        
    public function izmeniSlikaPitanje($id){

        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        $postavka=$this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
                
        $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
        echo $idkor['username'];
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $idkor['username']
		) );
        $idkor= $users[0]->getIdkor();
        

        $idniv =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $idniv))[0];
        $idobl = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $idobl))[0];
	$idkor = $this->doctrine->em->find ( "Moderator", $idkor );
        
        
        $novoImeSlike=$id;
        

        $this->load->model('proxies/Uploader');
        $upload_data = $this->Uploader->uploadSlika($novoImeSlike);
        $slika= $upload_data['file_name'];
        
        
        $this->load->model('proxies/ModelSlikaPitanje');
        $this->ModelSlikaPitanje->createSlikaPitanje([
 /*id pitanja za izmenu*/   'id'=>$id,
                            'idniv' => $idniv, 
                            'idobl' => $idobl,
                            'idkor' => $idkor,
                            'slika' => $slika,
                            'postavka' => $postavka,
                            'odgovor1' => $odgovor1,
                            'odgovor2' => $odgovor2,
                            'odgovor3' => $odgovor3,
                            'odgovor4' => $odgovor4,
                            'tacan' => $tacan
            ]);
        
           
    }
    
    
     public function izmeniLicnostPitanje($id){

        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        $stavka1=$this->input->post('s1');
        $stavka2=$this->input->post('s2');
        $stavka3=$this->input->post('s3');
        $stavka4=$this->input->post('s4');
        $stavka5=$this->input->post('s5');
        $stavka6=$this->input->post('s6');
        $licnost=$this->input->post('licnost');
                
        $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
        echo $idkor['username'];
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $idkor['username']
		) );
        $idkor= $users[0]->getIdkor();
        

        $idniv =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $idniv))[0];
        $idobl = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $idobl))[0];
	$idkor = $this->doctrine->em->find ( "Moderator", $idkor );
        
        
        $novoImeSlike=$id;
        

        $this->load->model('proxies/Uploader');
        $upload_data = $this->Uploader->uploadSlika($novoImeSlike);
        $slika= $upload_data['file_name'];
        
        
        $this->load->model('proxies/ModelLicnostPitanje');
        $this->ModelLicnostPitanje->createLicnostPitanje([
 /*id pitanja za izmenu*/   'id'=>$id,
                            'idniv' => $idniv, 
                            'idobl' => $idobl,
                            'idkor' => $idkor,
                            'slika' => $slika,
                            'licnost' => $licnost,
                            'podatak1' => $stavka1,
                            'podatak2' => $stavka2,
                            'podatak3' => $stavka3,
                            'podatak4' => $stavka4,
                            'podatak5' => $stavka5,
                            'podatak6' => $stavka6
            ]);
        //gdje vraca....
           
    }
    
    
    
    public function inputValidationTekstPitanje() {
        
        // Protect from unauthorized access.
        //
        $secret = $this->input->post('secret');
        if (!$secret)
            Redirect();
        
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        
        $postavka = $this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
        
        
        //$this->load->model('proxies/ModelRegKorisnik');
        
        // In future regex will be used for pass creation.
        //
        $return['error'] = "";

        $return['registerSucc'] = false;
        
        if ($odgovor1 == '' || $odgovor2 == '' || $odgovor3 == '' || $odgovor4 == '' || $tacan == '' || $postavka == '' || $idniv == '' || $idobl == '' ) {
            $return['error'] = 'Nisu sva polja popunjena';
        }
        else if ($tacan >4 || $tacan<1) {
            $return['error'] = 'Neodgovarajuci opseg tacnog odgovora';
        }
        else {
            $return['registerSucc'] = true;
        }
        echo json_encode($return);
        
    }
    
    public function inputValidationSlikaPitanje() {
        
        // Protect from unauthorized access.
        //
        $secret = $this->input->post('secret');
        if (!$secret)
            Redirect();
        
 
        
        $postavka=$this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        $slika=$this->input->post('userfile');
   

        
        $this->load->model('proxies/ModelRegKorisnik');
        
        // In future regex will be used for pass creation.
        //
        $return['error'] = "";

        $return['registerSucc'] = false;
       if ($odgovor1 == '' || $odgovor2 == '' || $odgovor3 == '' || $odgovor4 == '' || $tacan == '' || $postavka == '' || $idniv == '' || $idobl == ''  ||$slika=='') {
            $return['error'] = 'Nisu sva polja popunjena';
        }
        else {
            $return['registerSucc'] = true;
        }
        echo json_encode($return);
        
    }
    
    public function inputValidationLicnostPitanje() {
        
        // Protect from unauthorized access.
        //
        $secret = $this->input->post('secret');
        if (!$secret)
            Redirect();
        
 
        
        $stavka1=$this->input->post('s1');
        $stavka2=$this->input->post('s2');
        $stavka3=$this->input->post('s3');
        $stavka4=$this->input->post('s4');
        $stavka5=$this->input->post('s5');
        $stavka6=$this->input->post('s6');
        $licnost=$this->input->post('licnost');
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        $slika=$this->input->post('userfile');
   

        
        $this->load->model('proxies/ModelRegKorisnik');
        
        // In future regex will be used for pass creation.
        //
        $return['error'] = "";

        $return['registerSucc'] = false;
       if ($odgovor1 == '' || $odgovor2 == '' || $odgovor3 == '' || $odgovor4 == '' || $tacan == '' || $postavka == '' || $idniv == '' || $idobl == ''  ||$slika=='') {
            $return['error'] = 'Nisu sva polja popunjena';
        }
        else {
            $return['registerSucc'] = true;
        }
        echo json_encode($return);
        
    }     
    
    
    
    
    
}
