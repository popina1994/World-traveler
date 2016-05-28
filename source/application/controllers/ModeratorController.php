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
       
        $this->Redirect(['view'=>'Moderator', 'questions' => $questions]); 
        
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
        /*$idkor=$this->session->get_userdata('username');
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'Moderator' )->findBy ( array (
				'username' => $idkor
		) );
        $idkor= $users[0]->getIdkor();
        */
        $idkor=583;
        
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
    public function createSlikaPitanje(){
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
      //kod za dohvatanje id-a moderatora
        /*
        $idkor=$this->session->get_userdata('username');
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'Moderator' )->findBy ( array (
				'username' => $idkor
		) );
        $idkor= $users[0]->getIdkor();
        */
        $idkor= 583;//slaleM
        
        $postavka=$this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
        
        $idniv =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $idniv))[0];
        $idobl = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $idobl))[0];		
	$idkor = $this->doctrine->em->find ( "Moderator", $idkor );
        
        /*kod vezan za cuvanje slike*/
        $this->load->helper('form');
        $this->load->helper('html');
        

        $this->load->helper(array('form', 'url'));
        $image_path = realpath(APPPATH.'../img');
        
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
                //$config['encrypt_name'] = TRUE;
               // $config['file_name'] = '583';
		$this->load->library('upload', $config);
                
                $this->upload->do_upload();

       $upload_data = $this->upload->data(); 
        $slika =   $upload_data['file_name'];

        echo $slika;
 
        $slika =   $upload_data['file_name'];
        
        
        $this->load->model('proxies/ModelSlikaPitanje');
        $this->ModelSlikaPitanje->createSlikaPitanje(['idniv' => $idniv, 
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
          Redirect();
    }
    public function createLicnostPitanje(){
       $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
      //kod za dohvatanje id-a moderatora
        /*
        $idkor=$this->session->get_userdata('username');
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'Moderator' )->findBy ( array (
				'username' => $idkor
		) );
        $idkor= $users[0]->getIdkor();
        */
        $idkor= 583;//slaleM
        
        $postavka=$this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
        
        $idniv =  $this->doctrine->em->getRepository('NivoTezine')->findBy(array('naziv' => $idniv))[0];
        $idobl = $this->doctrine->em->getRepository('Oblast')->findBy(array('naziv' => $idobl))[0];		
	$idkor = $this->doctrine->em->find ( "Moderator", $idkor );
        
        /*kod vezan za cuvanje slike*/
        $this->load->helper('form');
        $this->load->helper('html');
        

        $this->load->helper(array('form', 'url'));
        $image_path = realpath(APPPATH.'../img');
        
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
                //$config['encrypt_name'] = TRUE;
               // $config['file_name'] = '583';
		$this->load->library('upload', $config);
                
                $this->upload->do_upload();

       $upload_data = $this->upload->data(); 
        $slika =   $upload_data['file_name'];

        echo $slika;
 
        $slika =   $upload_data['file_name'];
        
        
        $this->load->model('proxies/ModelSlikaPitanje');
        $this->ModelSlikaPitanje->createSlikaPitanje(['idniv' => $idniv, 
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
    
    
    public function TextValidation() {
        
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
         
}
