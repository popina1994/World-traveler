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
}
