<?php
//Slavko Ivanovic 82/13
/*
 include APPPATH.'models/entities/Pitanje.php';
  include APPPATH.'models/entities/RegKorisnik.php';
 include APPPATH.'models/entities/Oblast.php';
 include APPPATH.'models/entities/Moderator.php';    
 include APPPATH.'models/entities/Takmicar.php';
  include APPPATH.'models/entities/NivoTezine.php';
  include APPPATH.'models/entities/SlikaPitanje.php';
    include APPPATH.'models/entities/TekstPitanje.php';
      include APPPATH.'models/entities/LicnostPitanje.php';
 */
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

        $this->load->model('proxies/ModelPitanje');
        $questions=$this->ModelPitanje->getPitanja();
 
        $this->Redirect(['view'=>'Moderator', 'pitanje' => $questions]); 
        

    }
    
    public function deletePitanje(){
        $secret = $this->input->post('secret');
        $id=$this->input->post('id');
        if (!$secret){
        $this->Redirect();
        }
        
        $this->load->model('proxies/ModelPitanje');
        $this->ModelPitanje->deletePitanje($id);
            $return['deleted']=$id;
            $return['succ']=true;
        

        echo json_encode($return);
    }
    //
    public function createTekstPitanje(){
        //dio pitanja koji ima svako pitanje
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
        //echo $idkor['username'];
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
        
        /*
        $idniv =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $idniv))[0];
        $idobl = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $idobl))[0];		
	$idkor = $this->doctrine->em->find ( "Moderator", $idkor );
        */
        
        
        
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
        Redirect();
    }
    
 
    public function createSlikaPitanje(){
        $idniv=$this->input->post('nivos2');
        $idobl=$this->input->post('oblasts2');
        $userfile=$this->input->post('userfile');
     
        
        $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
       // echo $idkor['username'];
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $idkor['username']
		) );
        $idkor= $users[0]->getIdkor();
        
       // $idkor= 583;//slaleM
        
        $postavka=$this->input->post('postavkas2');
        $odgovor1=$this->input->post('o1s2');
        $odgovor2=$this->input->post('o2s2');
        $odgovor3=$this->input->post('o3s2');
        $odgovor4=$this->input->post('o4s2');
        $tacan=$this->input->post('tacans2');
        

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
        $upload_data = $this->Uploader->uploadSlika($novoImeSlike,'userfile');
        $slika= $upload_data['file_name'];
         

        //echo $slika;
        
        
         $users = $this->doctrine->em->getRepository ( 'Pitanje' )->findBy ( array (
				'idpit' => $ID
		) );
         $user= $this->doctrine->em->find ( "SlikaPitanje", $users[0]->getIdpit() );
         
	    
            $user->setSlika($slika);
            $this->doctrine->em->flush();
        
          Redirect();  
          
          //popraviti povratnu adresu
          
    }
    
    public function createLicnostPitanje(){ 
        $idniv=$this->input->post('nivol3');
        $idobl=$this->input->post('oblastl3');
        $userfile=$this->input->post('userfilel');
        //OVO TREBA UNCOMMENTOVATI KADA SE NAPRAVI HTML
      //kod za dohvatanje id-a moderatora
        
         $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
       // echo $idkor['username'];
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $idkor['username']
		) );
        $idkor= $users[0]->getIdkor();
        
        
        
        
        
        //$idkor= 583;//slaleM
        
        $stavka1=$this->input->post('s1l3');
        $stavka2=$this->input->post('s2l3');
        $stavka3=$this->input->post('s3l3');
        $stavka4=$this->input->post('s4l3');
        $stavka5=$this->input->post('s5l3');
        $stavka6=$this->input->post('s6l3');
        $licnost=$this->input->post('licnostl3');
        
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
        $upload_data = $this->Uploader->uploadSlika($novoImeSlike,'userfilel');
        $slika= $upload_data['file_name'];


        //echo $slika;
        
        $users = $this->doctrine->em->getRepository ( 'Pitanje' )->findBy ( array (
				'idpit' => $ID
		) );
        $user= $this->doctrine->em->find ( "LicnostPitanje", $users[0]->getIdpit() );
         
	    
        $user->setSlika($slika);
        $this->doctrine->em->flush();

        Redirect();
    }
        
    public function izmeniTekstPitanje($id){
        /*$secret = $this->input->post('secret');
        //$id= $this->input->post('id');
        if (!$secret){
            Redirect();
        }
        */
        $idniv=$this->input->post('nivo1');
        $idobl=$this->input->post('oblast1');
        $postavka = $this->input->post('postavka1');
        $odgovor1=$this->input->post('o11');
        $odgovor2=$this->input->post('o21');
        $odgovor3=$this->input->post('o31');
        $odgovor4=$this->input->post('o41');
        $tacan=$this->input->post('tacan1');
        
                $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
        //echo $idkor['username'];
                
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
                            'id'=>$id,
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
        Redirect();
       // $return['id']=$id;
      // echo json_encode($return);
    }
        
    public function izmeniSlikaPitanje($id){
        //$secret = $this->input->post('secret');
       // $id= $this->input->post('id');
        //if (!$secret){
        //    Redirect();
        //}
        
        $idniv=$this->input->post('nivo2');

        $idobl=$this->input->post('oblast2');
        $userfile=$this->input->post('userfileus');
        $postavka=$this->input->post('postavka2');
        $odgovor1=$this->input->post('o12');
        $odgovor2=$this->input->post('o22');
        $odgovor3=$this->input->post('o32');
        $odgovor4=$this->input->post('o42');
        $tacan=$this->input->post('tacan2');
                
        $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
        //echo $idkor['username'];
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
        $upload_data = $this->Uploader->uploadSlika($novoImeSlike,'userfileus');
        $slika= $upload_data['file_name'];
        //$slika="dd";
      
        $this->load->model('proxies/ModelSlikaPitanje');
        $this->ModelSlikaPitanje->updateSlikaPitanje([
                            'id'=>$id,
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
        
      //$return['id']=$slika;
       //echo json_encode($return);     
        Redirect();
    }
    
    
     public function izmeniLicnostPitanje($id){

        $idniv=$this->input->post('nivo3');
        $idobl=$this->input->post('oblast3');
        $userfile=$this->input->post('userfileul');
        $stavka1=$this->input->post('s13');
        $stavka2=$this->input->post('s23');
        $stavka3=$this->input->post('s33');
        $stavka4=$this->input->post('s43');
        $stavka5=$this->input->post('s53');
        $stavka6=$this->input->post('s63');
        $licnost=$this->input->post('licnost3');
                
        $idkor=$this->session->all_userdata();
        //if(count($idkor)==0){echo "praznoo";}
        //echo $idkor['username'];
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
        $upload_data = $this->Uploader->uploadSlika($novoImeSlike,'userfileul');
        $slika= $upload_data['file_name'];
        
        
        $this->load->model('proxies/ModelLicnostPitanje');
        $this->ModelLicnostPitanje->updateLicnostPitanje([
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
           Redirect();
    }
    

    
    public function inputValidationTekstPitanje() {
        
        // Protect from unauthorized access.
        //
         
        $id= $this->input->post('id');
        $secret = $this->input->post('secret');
       
        if (!$secret){
            Redirect();
        }
        
        
        
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        
        $postavka = $this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
        
                       // $return['idniv']=$idniv;
                       
        
        //$this->load->model('proxies/ModelRegKorisnik');
        
        // In future regex will be used for pass creation.
        //
        $return['error'] = "";

        $return['succ'] = false;
        
        if ($odgovor1 == '' || $odgovor2 == '' || $odgovor3 == '' || $odgovor4 == '' || $tacan == '' || $postavka == '' || $idniv == '' || $idobl == '' ) {
            $return['error'] = 'Nisu sva polja popunjena';
        }
        else if ($tacan >4 || $tacan<1) {
            $return['error'] = 'Neodgovarajuci opseg tacnog odgovora';
        }
        else {
            $return['succ'] = true;
        }      
        
     
        $return['id']=$id;
        echo json_encode($return);     
}
    
    public function inputValidationSlikaPitanje() {
        
        // Protect from unauthorized access.
        //
        $id= $this->input->post('id');
        $secret = $this->input->post('secret');
        $return['userfile'] = $this->input->post('userfile');
        if (!$secret){
            Redirect();
        }
        
 
        $memorija=$this->input->post('memorija');
        $postavka=$this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        //$slika=$this->input->post('userfile');
   $return['idniv'] = $idniv;
   $return['memorija']=$memorija;
        
        $this->load->model('proxies/ModelRegKorisnik');
        
        // In future regex will be used for pass creation.
        //
        $return['error'] = "";
        
        $return['succ'] = false;
       if ($odgovor1 == '' || $odgovor2 == '' || $odgovor3 == '' || $odgovor4 == '' || $tacan == '' || $postavka == '' || $idniv == '' || $idobl == '' || $memorija=='') {
            $return['error'] = 'Nisu sva polja popunjena';
        }
        else if(!($memorija=='png' || $memorija=='jpg' || $memorija=='gif')){
            $return['error'] = 'Neispravna ekstenzija slike';
        }
        else {
            $return['succ'] = true;
        }
        $return['id']=$id;
        echo json_encode($return);
        
    }
    
    public function inputValidationLicnostPitanje() {
        
        // Protect from unauthorized access.
        //
        $id= $this->input->post('id');
        $secret = $this->input->post('secret');
        $return['userfile'] = $this->input->post('userfile');
        if (!$secret){
            Redirect();
        }
        
        
 
        $memorija=$this->input->post('memorija');
        $stavka1=$this->input->post('s1');
        $stavka2=$this->input->post('s2');
        $stavka3=$this->input->post('s3');
        $stavka4=$this->input->post('s4');
        $stavka5=$this->input->post('s5');
        $stavka6=$this->input->post('s6');
        $licnost=$this->input->post('licnost');
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
       // $slika=$this->input->post('userfile');
   $return['idniv']=$idniv;

        
        $this->load->model('proxies/ModelRegKorisnik');
        
        // In future regex will be used for pass creation.
        //
        $return['error'] = "";

        $return['succ'] = false;
       if ($stavka1 == '' || $stavka2 == '' || $stavka3 == '' || $stavka4 == '' ||$stavka5 == '' ||$stavka6 == '' || $licnost == '' || $idniv == '' || $idobl == '' || $memorija=='') {
            $return['error'] = 'Nisu sva polja popunjena';
        }
        else if(!($memorija=='png' || $memorija=='jpg' || $memorija=='gif')){
            $return['error'] = 'Neispravna ekstenzija slike';
        }
        else {
            $return['succ'] = true;
        }
         
         
        $return['id']=$id;
        echo json_encode($return);
        
    }
    
    public function izmeniAutoFill(){
        $secret = $this->input->post('secret');
        $id= $this->input->post('id');
        if (!$secret){
            Redirect();
        }
        $this->load->model('proxies/ModelPitanje');
        $pitanje = $this->doctrine->em->find ( "Pitanje", $id );
        $p1=$this->doctrine->em->find ( "TekstPitanje", $id );
        $p2=$this->doctrine->em->find ( "SlikaPitanje", $id );
        $p3=$this->doctrine->em->find ( "LicnostPitanje", $id );
       
         
        if($p1!=null){
                $this->load->model('proxies/ModelTekstPitanje');
                $data['id']=$id;
                $pd=$this->ModelTekstPitanje->getTekstPodaci($data);              
          
           $return['idniv']=$pd['idniv'];
           $return['idobl']=$pd['idobl'];
           $return['odgovor1']=$pd['odgovor1'];
           $return['odgovor2']=$pd['odgovor2'];
           $return['odgovor3']=$pd['odgovor3'];
           $return['odgovor4']=$pd['odgovor4'];
           $return['postavka']=$pd['postavka'];
           $return['tacan']=$pd['tacan'];
           $return['id']=$pd['id'];
           $return['tip']=1;
            

            
        }else if($p2!=null){
            $this->load->model('proxies/ModelSlikaPitanje');
            $data['id']=$id;
            $pd=$this->ModelSlikaPitanje->getSlikaPodaci($data);   
            
           $return['idniv']=$pd['idniv'];
           $return['idobl']=$pd['idobl'];
           $return['odgovor1']=$pd['odgovor1'];
           $return['odgovor2']=$pd['odgovor2'];
           $return['odgovor3']=$pd['odgovor3'];
           $return['odgovor4']=$pd['odgovor4'];
           $return['postavka']=$pd['postavka'];
           $return['tacan']=$pd['tacan'];
          // $return['slika']=$pd['slika'];
           $return['id']=$pd['id'];
           $return['tip']=2;
            
            
        }else if($p3!=null){
            $this->load->model('proxies/ModelLicnostPitanje');
            $data['id']=$id;
            $pd=$this->ModelLicnostPitanje->getLicnostPodaci($data);  
            
           $return['idniv']=$pd['idniv'];
           $return['idobl']=$pd['idobl'];
           $return['podatak1']=$pd['podatak1'];
           $return['podatak2']=$pd['podatak2'];
           $return['podatak3']=$pd['podatak3'];
           $return['podatak4']=$pd['podatak4'];
           $return['podatak5']=$pd['podatak5'];
           $return['podatak6']=$pd['podatak6'];
           $return['licnost']=$pd['licnost'];
           //$return['slika']=$pd['slika'];
           $return['id']=$pd['id'];
           $return['tip']=3;
            
        }

         echo json_encode($return);
    }
    
 
}
