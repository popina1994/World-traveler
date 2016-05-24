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
            $this->Redirect();
        
        $return['dataExists'] = false;
        $return['name'] = $this->session->username;
        
        $igra = $this->ModelIgra->existsUnfinishedIgra($data = ['userName' => $this->session->username] );
        if ($igra) {
            $this->session->set_userdata('oldIgraId', $igra->getIdigr());
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $oldIgraId = $this->session->oldIgraId;
            if ($oldIgraId)  {
                $this->ModelIgra->finishUnfinishedIgra(['igraID' => $oldIgraId]);
                $this->session->unset_userdata('oldIgraId');
            }

            $this->Redirect(['view'=>'levelChoice']);
        }
        else {
            $this->Redirect();
        }
       
    }
    
    
    // Redirects to mapp of appropriate level.
    //
    public function levelChoice() {
            $this->load->model('proxies/Model');
            // Redirect on LevelChoice page.
            //
            if (isset($_POST['beba'])) {
                $this->session->set_userdata('level', 'Beba');
            } else if (isset($_POST['knjiga'])) {
                $this->session->set_userdata('level', 'Školarac');
            }
            else if (isset($_POST['kofer'])) { 
                 $this->session->set_userdata('level', 'Svetstki putnik');
            }
            else {
                $this->Redirect();
            }
            $this->session->set_userdata('gameStarted', true);
            
            $this->ModelIgra->createIgra(['username'=> $this->session->username, 'naziv'=>$this->session->level]);
            $this->session->set_userdata('curGame', $this->session->oldIgraId);
            $this->Redirect(['view'=>'game', 'redirect' =>true]);
    }
    
    public function oldGame() {
        // Protect from unauthorized access.
        // Ajax will only submit this method.
        //
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ucitaj mapu na osnovu potrebnih podataka. Moracu Jelici da prosledim php kojim se 
            // azurirati potrebne stvari na mapi.
            //
            $this->session->set_userdata('gameStarted', true);
            $this->session->set_userdata('curGame', $this->session->oldIgraId);
            $this->Redirect(['view'=>'game','redirect'=>true]);
            
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
            $this->Redirect();
    }
    
    // It will only set appropriate fields which are going to be used in jquery for setting parts of form.
    // If the user is not authorized to attack the appropriate area, it will return user a warning.
    //
    public function getQuestion() {
        $secret = $this->input->post('secret');
        if (!$secret)
           $this->Redirect();
        
        $country = $this->input->post('country');
        
        $return['country'] = $country;
        $return['canAttack'] = true;
        
        echo json_encode($return);
        
        
        // pass the $level, $
    }
}
