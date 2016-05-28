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
            $this->Redirect(['view'=>'Game', 'username'=>$this->session->username]);
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
            
            $idIgra = $this->ModelIgra->createIgra(['username'=> $this->session->username, 'naziv'=>$this->session->level]);
            $this->session->set_userdata('curGame', $idIgra);
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
    
        // In case of refresh of a page.
    //
    private function unSetPodaci() {
        $this->session->unset_userdata('podatak2');
        $this->session->unset_userdata('podatak3');
        $this->session->unset_userdata('podatak4');
        $this->session->unset_userdata('podatak5');
        $this->session->unset_userdata('podatak6');
        $this->session->unset_userdata('cntPod');
        $this->session->unset_userdata('correctAnswer');
        $this->session->unset_userdata('numTries');
        $this->session->unset_userdata('zagonetna');
    }
    

    private function finishedConquering($data){
        if ($data['success'] == true) {
            $this->ModelOsvajanje->uspehOsvajanje(['idigr' => $this->session->curGame, 'oblast'=>$this->session->country ]);
        }
        else {
            $this->ModelOsvajanje->neuspehOsvajanje(['idigr'=> $this->session->curGame, 'oblast'=>$this->session->country ]);
        }
        $this->session->unset_userdata('country');
        $this->session->unset_userdata('correctAnswer');
        $this->unSetPodaci();
        
    }
    
    // It will only set appropriate fields which are going to be used in jquery for setting parts of form.
    // If the user is not authorized to attack the appropriate area, it will return user a warning.
    //
    public function getTextQuestion() {
        $secret = $this->input->post('secret');
        if (!$secret)
           $this->Redirect();
        
        $return['canAttack'] = false;
        $this->unSetPodaci();
        
        $idIgra = $this->session->curGame;
        $country = $this->input->post('country');
        
        $osv = $this->ModelOsvajanje->existsOsvajanje(['idigr' => $idIgra]);
        
        // In case of unfinished attack;
        //
        if ($osv != null) {
            if ($osv->getIdobl()->getNaziv() != $country) {
                $return['error'] = "Morate da napadnete ".$osv->getIdobl()->getNaziv()." oblast";
                goto exitFun;
            }
            else { // good}}
            }
        }
        else{
            $canAttack = $this->ModelIgra->canAttack(['igraID' => $this->session->curGame, 'oblast' => $country]);
            if ($canAttack['success'] === true) {
                $this->ModelOsvajanje->createOsvajanje(['idigr'=>$idIgra, 'idobl'=> $country]);
            }
            else {
                $return['error'] = $canAttack['error'];
                goto exitFun;
            }
            $osv = $this->ModelOsvajanje->existsOsvajanje(['idigr' => $idIgra]);

         }
        $textQuestion = $this->ModelTekstPitanje->getTekstPitanje(['nivo'=>$this->session->level, 'oblast'=> $country]);
        if ($textQuestion == null) 
        {
            $return['error'] = 'Moderatori nisu dodali pitanja za ovu bazu';
            goto exitFun;
            
        }
        
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
        
        $country = $this->session->country;
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
    }
    

    
    public function getPictureAnswer() {
        // TO DO: Unset oblast attack in case of wrong answer
        //  and all set session variables.
        //
        $secret = $this->input->post('secret');
        if (!$secret)
            $this->Redirect();
        
        $answer = ord($this->input->post('letter')) - ord('a') + 1;
        
        $return['letterCorrect'] = chr($this->session->correctAnswer - 1 + ord('A'));
        
        if ($answer == $this->session->correctAnswer) {
        // TO DO: beba i skolarac ovde zavrsvaju
        // 
//$this->finishedConquering(['success'=>true]);
            $return['correct'] = true;
        }
        else {
            $this->finishedConquering(['success'=>false]);
            $return['correct'] = false;
        }
        echo json_encode($return);
    }
    
    public function getEnigmaQuestion() {
        $secret = $this->input->post('secret');
        if (!$secret)
           $this->Redirect();
        
        $country = $this->session->country;
        
        // In future there should be some type on which user is.
        //
        
        $return['canAttack'] = true;
        if ($this->session->cntPod == null) {
            $enigmaQuestion = $this->ModelLicnostPitanje->getLicnostPitanje(['nivo'=>$this->session->level, 'oblast'=> $country]);
            $return['podatak'] = $enigmaQuestion->getPodatak1();
            $return['text'] = "Ko je licnost na slici?";
            $return['picture'] = $enigmaQuestion->getSlika();
            
            
            $this->session->set_userdata('cntPod', 1);
            
            $this->session->set_userdata('podatak2', $enigmaQuestion->getPodatak2());        
            $this->session->set_userdata('podatak3', $enigmaQuestion->getPodatak3());
            $this->session->set_userdata('podatak4', $enigmaQuestion->getPodatak4());
            $this->session->set_userdata('podatak5', $enigmaQuestion->getPodatak5());
            $this->session->set_userdata('podatak6', $enigmaQuestion->getPodatak6());
            $this->session->set_userdata('podatak6', $enigmaQuestion->getPodatak6());
            $this->session->set_userdata('correctAnswer', $enigmaQuestion->getLicnost());
            
            // In future from level dependence.
            //
            $numTries = 3;
            $this->session->set_userdata('numTries', $numTries);
            $zagonetna = "";
            $return['duzina'] = strlen($enigmaQuestion->getLicnost());
            for($idx=0; $idx < strlen($enigmaQuestion->getLicnost()); $idx++)
                $zagonetna[$idx] = '*';
            $this->session->set_userdata('zagonetna', $zagonetna);
            
            
            $return['zagonetna'] = $this->session->zagonetna;
            
        }
        else {
            switch ($this->session->cntPod) {
                case 1:
                    $return['podatak'] = $this->session->podatak2;
                    break;
                case 2:
                    $return['podatak'] = $this->session->podatak3;
                    break;
                case 3:
                    $return['podatak'] = $this->session->podatak4;
                    break;
                case 4:
                    $return['podatak'] = $this->session->podatak5;
                    break;
                case 5: 
                    $return['podatak'] = $this->session->podatak6;
                    break;
                default:
                    $return['canAttack'] = false;
            }
            $this->session->cntPod = $this->session->cntPod + 1;
        }
        $return['val'] = $this->session->cntPod;
        $return['numTries'] = $this->session->numTries;
        
        echo json_encode($return);
    }
    
    public function getEnigmaAnswer() {
        $secret = $this->input->post('secret');
         if (!$secret)
           $this->Redirect();
        
        
        $correctAnswer = $this->session->correctAnswer;
        $zagonetna = $this->session->zagonetna;
        $letter = $this->input->post('letter');
        
        $return['letterExists'] = false;
        // Add warning if letter does not exists.
        //
        for($idx=0; $idx < strlen($correctAnswer); $idx++) 
            if ($letter === $correctAnswer[$idx]) {
                $return['letterExists'] = true;
                $zagonetna[$idx] = $letter;
            }
        
        if (!$return['letterExists']) {
            $this->session->numTries = $this->session->numTries  - 1;
            if ($this->session->numTries === 0) {
                $return['faliure'] = true;
                $this->finishedConquering( ['success' =>'false']);
                }
        }    
            
         // Check if user guesed.
         //
        $return['success'] = true;
        for($idx=0; $idx < count($zagonetna); $idx++)  {
           if ($zagonetna[$idx] === '*')
               $return['success'] = false;
               
        }
        $this->session->zagonetna = $zagonetna;
        $return['text'] = $zagonetna;
        
        if ($return['success'] == true) {
            $this->finishedConquering(['success' =>'true']);
            goto exitFun;
        }
        
        $return['failiure'] = false;    

            
        
        
        $return['numTries'] = $this->session->numTries;
 exitFun:
          
        echo json_encode($return);
    }
}
