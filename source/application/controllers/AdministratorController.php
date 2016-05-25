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
        $this->load->model('proxies/ModelModerator');
        $usernames=$this->ModelModerator->allModeratorsUserName();
        if($usernames==null)$usernames=array();
        $this->Redirect(['view'=>'Administrator', 'moderators'=>$usernames]);
    }
    
    public function register() {
        $this->load->model('proxies/ModelModerator');
        
        $username = $this->input->post('userNameRegister');
        $password = $this->input->post("passRegister");
        if ($username) {
            $this->ModelModerator->createModerator($data = [ 'username' =>$username, 'password' =>$password]);
            $this->Redirect();
        }
        else {
            Redirect();
        }
    }
    public function deleteModerator($i){
        $this->load->model('proxies/ModelModerator');
        $users=$this->ModelModerator->allModeratorsUserName();
        $username = $users[$i];
        if ($username) {
            $this->ModelModerator->deleteModerator($data = [ 'username' =>$username]);
            $this->Redirect();
        }
        else {
            Redirect();
        }
    }
    
    
    public function registerValidationModerator(){
        // Protect from unauthorized access by Zivan
        //
        $secret = $this->input->post('secret');
        if (!$secret)
            Redirect();
        
        $username = $this->input->post('userNameRegister');
        $password = $this->input->post('passRegister');
        $passCheck = $this->input->post('repeatPass');
        
        $this->load->model('proxies/ModelRegKorisnik');
        
        // In future regex will be used for pass creation.
        //
        $return['error'] = "";

        $return['registerSucc'] = false;
        if ($username == '') {
            $return['error'] = 'Nepravilno korisnickko ime';
        }
        else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
            $return['error'] = 'Neispravan obrazac sifre';
        }
        else if ($password != $passCheck) {
            $return['error'] = 'Ne poklapaju se sifre';
        }
        else if ($this->ModelRegKorisnik->exists($data=['username'=>$username])){
            $return['error'] = "Korisnicko ime $username vec postoji";
        }
        else {
            $return['registerSucc'] = true;
        }
        echo json_encode($return);
        
    }
    
}
