<?php

require_once APPPATH.'controllers/BaseController.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Game
 *
 * @author popina
 */
class Game extends BaseController {
    //put your code here
    
     public function __construct() {
        parent::__construct("Takmicar");
    }
    
    public function index() {
        // Used when the user accidently closes the window.
        //
        if ($this->session->gameStarted)
            $this->Redirect(['view'=>'Game']);
        else {
            $this->Redirect(['view'=>'GameChoice']);
        }
        
    }
    
    // Returns true/false if old game exists.
    //
    public function checkOldGame() {
        // Protect from unauthorized access.
        //
        $secret = $this->input->post('secret');
        if (!$secret)
            Redirect();
        
        $username = $this->userName;
        
        
        // Dragana's part. of checking.
        //
        $this->load->model('proxies/Model');
        if ($igra = $this->Model->existsUnfinishedIgra(['username' <= $this->session->username] ) ) {
                   $this->session->oldIgra = $igra;
                   $return['dataExists'] = true ;
        }
        else  {
            $return['dataExists'] = false;
        }
        echo json_encode($return);
    }
    
    public function newGame() {
        // From ajax is Passed existsOld.
        //
        if ($this->input->post->btNew) {
            $this->load->model('proxies/Model');
            if ($this->session->oldIgra) {
                $this->load->model('proxies/Model');
                $this->Model->finishUnfinishedIgra(['igra' <= $this->session->oldIgra]);
                $this->session->unset_userdata('oldIgra');
            }
            // Redirect on LevelChoice page.
            //
            $this->Redirect(['view'=>'LevelChoice', 'redirect'=>true]);
        }
        else {
            Redirect();
        }
       
    }
    
    // Redirects to mapp of appropriate level.
    //
    public function levelChoice() {
            $this->load->model('proxies/Model');
            // Redirect on LevelChoice page.
            //

            if ($this->input->post('beba')) {
                $this->session->level = 'beba';
            } else if ($this->input->post('knjiga')) {
                $this->session->level = 'Skolarac';
            }
            else if ($this->input->post('kofer')) { 
                $this->session->level = 'Svetski putnik';
            }
            else {
                $this->Redirect();
            }
            $this->session->gameStarted = true;
            
            $this->Redirect(['view'=>'game', 'redirect'=>true]);
    }
    
    public function oldGame() {
        // Protect from unauthorized access.
        //
        if ($this->input->post('btOld')) {
            // Ucitaj mapu na osnovu potrebnih podataka. Moracu Jelici da prosledim php kojim se 
            // azurirati potrebne stvari na mapi.
            //
            $this->sesion->gameStarted = true;
            $this->Redirect('view' <='game', 'redirect' <= true);
        }
        else {
            Redirect();
        }
       
    }
    
    public function conquered() {
        console_log('to');
    }
    
    // When this function is called for the second time, it will only generate pass on the next question.
    // In session it will be remembered on which question user stopped.
    // 
    public function getAnswer() {
        $secret = $this->input->post('secret');
        if (!$secret)
            Redirect();
    }
    
    // It will only set appropriate fields which are going to be used in jquery for setting parts of form.
    // If the user is not authorized to attack the appropriate area, it will return user a warning.
    //
    public function getQuestion() {
        $secret = $this->input->post('secret');
        if (!$secret)
            Redirect();
        $country = $this->input->post('country');
        $this->load->model('proxies/ModelOblast');
        
        $this->ModelRegKorisnik->exists(['name'<=$country]);
        
        
        // pass the $level, $
    }
}
