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
            
            $nivo = $igra->getIdniv()->getNaziv();
            $this->session->set_userData('level', $nivo);
            $return['dataExists'] = true ;
            $reutrn['nivo'] = $nivo;
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
        
    }
    
    
    // Unsets all data which is valid when user has mistaken question.
    // Or when he conquered area. And change status of conquering area in database.
    //
    private function failiureConquringArea() {
        
        
    }
    
    private function finishedConquering($data){
        if ($data['success']) {
            $this->ModelOsvajanje->uspehOsvajanje(['idigr' => $this->session->curGame, 'oblast'=>$this->session->country ]);
        }
        else {
            $this->ModelOsvajanje->neuspehOsvajanje(['idigr'=> $this->session->curGame, 'oblast'=>$this->session->country ]);
        }
        $this->session->unset_userdata('country');
        $this->session->unset_userdata('correctAnswer');
        
    }
    
    // It will only set appropriate fields which are going to be used in jquery for setting parts of form.
    // If the user is not authorized to attack the appropriate area, it will return user a warning.
    //
    public function getTextQuestion() {
        $secret = $this->input->post('secret');
        if (!$secret)
           $this->Redirect();
        
        $return['canAttack'] = false;
        // !!!! TO DO: !!!
        // Check if user can attack this teritory is needed.
        // $error not adjacent country.
        //
        
        $idIgra = $this->session->curGame;
        $country = $this->input->post('country');
        
        $osv = $this->ModelOsvajanje->existsOsvajanje(['idigr' => $idIgra]);
        if ($osv && $osv->getIdobl()->getNaziv() != $country) {
            $return['error'] = "Morate da napadnete $country oblast";
            // In case of unfinished attack;
            goto exitFun;
        }
        // Dragana's check.
        //
        if ($osv == null && true) {
            $this->ModelOsvajanje->createOsvajanje(['idigr'=>$idIgra, 'idobl'=> $country]);
            $osv = $this->ModelOsvajanje->existsOsvajanje(['idigr' => $idIgra]);
        }    
        else {
            
        }
        
        
        // !!! TO DO !!! 
        // I need to add that user is curently attacking this country in database.
        // This will help me in next question generation.
        //
        
        $textQuestion = $this->ModelTekstPitanje->getTekstPitanje(['nivo'=>$this->session->level, 'oblast'=> $country]);
        $return['a'] = $textQuestion->getOdgovor1();
        $return['b'] = $textQuestion->getOdgovor2();
        $return['c'] = $textQuestion->getOdgovor3();
        $return['d'] = $textQuestion->getOdgovor4();
        
        $this->session->set_userdata('correctAnswer', $textQuestion->getTacanodgovor());
        $this->session->set_userdata('country', $country);
        $return['text'] = $textQuestion->getPostavka();
        
        $return['canAttack'] = true;
     exitFun:
        echo json_encode($return);
    }
    
    public function getTextAnswer() {
        // TO DO: Unset oblast attack in case of wrong answer
        //  and all set session variables.
        //
        $secret = $this->input->post('secret');
        if (!$secret)
            $this->Redirect();
        
        $answer = ord($this->input->post('letter')) - ord('a') + 1;
        
        $return['letterCorrect'] = chr($this->session->correctAnswer - 1 + ord('A'));
        
        if ($answer == $this->session->correctAnswer) {
            $return['correct'] = true;
        }
        else {
            $this->finishedConquering(['success'=>false]);
            $return['correct'] = false;
        }
        
        
        echo json_encode($return);
    }
    
    
     public function getPictureQuestion() {
        $secret = $this->input->post('secret');
        if (!$secret)
           $this->Redirect();
        
        // !!!! TO DO: !!!
        // Check if user can attack this teritory is needed.
        //

        
        $country = $this->session->country;
        // !!! TO DO !!! 
        // I need to add that user is curently attacking this country in database.
        // This will help me in next question generation.
        //
        
        $pictureQuestion = $this->ModelSlikaPitanje->getSlikaPitanje(['nivo'=>$this->session->level, 'oblast'=> $country]);
        $return['a'] = $pictureQuestion->getOdgovor1();
        $return['b'] = $pictureQuestion->getOdgovor2();
        $return['c'] = $pictureQuestion->getOdgovor3();
        $return['d'] = $pictureQuestion->getOdgovor4();
        
        $this->session->set_userdata('correctAnswer', $pictureQuestion->getTacanodgovor());
        $this->session->set_userdata('country', $country);
        $return['text'] = $pictureQuestion->getPostavka();
        $return['picture'] = $pictureQuestion->getSlika();
        $return['canAttack'] = true;
        
        
        echo json_encode($return);
        
        
        // pass the $level, $
    }
    
    public function getPictureAnswer() {
        // TO DO: Unset oblast attack in case of wrong answer
        //  and all set session variables.
        //
        $this->getTextAnswer();
    }
}
