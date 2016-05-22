<?php
 include APPPATH.'models/entities/RegKorisnik.php';
 include APPPATH.'models/entities/Administrator.php';
 include APPPATH.'models/entities/Moderator.php';    
 include APPPATH.'models/entities/Takmicar.php';
 
require_once APPPATH.'controllers/BaseController.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author popina
 */
class AdministratorController extends BaseController {
    //put your code here
    
     public function __construct() {
        parent::__construct("Administrator");
    }
    
    public function index() {
        //$this->load->view('Administrator');
        $this->Redirect(['view'=>'Administrator']);
    }
}
