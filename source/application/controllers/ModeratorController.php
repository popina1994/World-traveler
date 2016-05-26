<?php

 include APPPATH.'models/entities/Pitanje.php';
  include APPPATH.'models/entities/RegKorisnik.php';
 include APPPATH.'models/entities/Oblast.php';
 include APPPATH.'models/entities/Moderator.php';    
 include APPPATH.'models/entities/Takmicar.php';
  include APPPATH.'models/entities/NivoTezine.php';
 
 
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
        $idniv=$this->input->post('nivo');
        $idobl=$this->input->post('oblast');
        $idkor=$this->session->get_userdata('username');
        $this->load->model('proxies/ModelModerator');
        
        $users=$this->doctrine->em->getRepository ( 'Moderator' )->findBy ( array (
				'username' => $idkor
		) );
        $idkor= $users[0]->getIdkor();
        
        
         
        $postavka = $this->input->post('postavka');
        $odgovor1=$this->input->post('o1');
        $odgovor2=$this->input->post('o2');
        $odgovor3=$this->input->post('o3');
        $odgovor4=$this->input->post('o4');
        $tacan=$this->input->post('tacan');
        
        $this->load->model('proxies/ModelPitanje');
        createTekstPitanje(['idniv' => 'idniv', 
                            'idobl' => 'idobl',
                            'idkor' => 'idkor',
                            'postavka' => 'postavka',
                            'odgovor1' => 'odgovor1',
                            'odgovor2' => 'odgovor2',
                            'odgovor3' => 'odgovor3',
                            'odgovor4' => 'odgovor4',
                            'tacan' => 'tacan'
            ]);
        
    }
    public function createSlikaPitanje(){
        
    }
    public function createLicnostPitanje(){
        
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
