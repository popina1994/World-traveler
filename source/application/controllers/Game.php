<?php

require_once APPPATH.'controllers/BaseController.php';
 /*
* To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*** Djordje Zivanovic 0033/2013
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
        if ($this->session->gameStarted) {
            if ($this->session->username === 'guest') {
                $points = $this->session->points = 0;
                $passengers = $this->session->passengers = 3;
            }
            else {
                $points = $this->ModelIgra->getPoeni(['igraID'=>$this->session->curGame]);
                $passengers = $this->ModelIgra->getPutnici(['igraID'=>$this->session->curGame]);
            }
            $this->Redirect(['view'=>'Game', 'username'=>$this->session->username, 
        'points' => $points, 'passengers' => $passengers]);
            
        }
        
        else {
            if ( ($this->session->username === 'guest') && ($this->session->gameFinished) )
                $this->Redirect(['redirect'=>true, 'view' =>'main/logout']);
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
        if ($this->session->username === 'guest') {
            goto exitFun;
        }
        
        // Check unregistered. Return false.
        //
        
        $igra = $this->ModelIgra->existsUnfinishedIgra($data = ['userName' => $this->session->username] );
        if ($igra) {
            $this->session->set_userdata('oldIgraId', $igra->getIdigr());
            
            $nivo = $igra->getIdniv()->getNaziv();
            $this->session->set_userData('level', $nivo);
            $return['dataExists'] = true ;
        }
        else  {
            $return['dataExists'] = false;
        }
         
        exitFun:
        echo json_encode($return);
    }
    
    public function newGame() {
        // In ajax existsOld is set.
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
    
    
    // Redirects to map of appropriate level.
    //
    public function levelChoice() {
            // Redirect on LevelChoice page.
            //
            if (isset($_POST['beba'])) {
                $this->session->set_userdata('level', 'Beba');
            } else if (isset($_POST['knjiga'])) {
                $this->session->set_userdata('level', 'Školarac');
            }
            else if (isset($_POST['kofer'])) { 
                 $this->session->set_userdata('level', 'Svetski putnik');
            }
            else {
                $this->Redirect();
            }
            $this->session->set_userdata('gameStarted', true);
            $this->session->set_userdata('gameFinished', false);
            $this->session->set_userdata('gameResult', true);
            
            // Unregistered user.
            //
            if ($this->session->username !== 'guest') {
                $idIgra = $this->ModelIgra->createIgra(['username'=> $this->session->username, 'naziv'=>$this->session->level]);
                $this->session->set_userdata('curGame', $idIgra);
            }
            $this->Redirect(['view'=>'game', 'redirect' =>true]);
    }
    
    public function oldGame() {
        // Protect from unauthorized access.
        // Ajax will only submit this method.
        //
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
            $krajIgre = $this->ModelOsvajanje->uspehOsvajanje(['idigr' => $this->session->curGame, 'oblast'=>$this->session->country ]);
            if ($krajIgre === true) {
                $this->session->gameFinished = true;
                $this->session->gameResult = true;
            }
        }
        else {
            $krajIgre = $this->ModelOsvajanje->neuspehOsvajanje(['idigr'=> $this->session->curGame, 'oblast'=>$this->session->country ]);
            if ($krajIgre === true) {
                $this->session->gameFinished = true;
                $this->session->gameResult = false;
            }
            
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
        
        
        // Dragana's function  which will check status of game.
        //
        if ($this->session->username === 'guest') {
            if (!$this->session->gameStarted) {
                $return['error'] = 'Nemate vise prava da igrate kliknite logout da biste bili prebaceni na stanicu za logovanje';
                goto exitFun;
            }
            
        }
        else {
            $status = $this->ModelIgra->getStatus(['igraID'=>$this->session->curGame]);
            if ($status === 'o') { 
                $return['canAttack'] = false;
                $return['error'] = "Igra je zavrsena";
                $return['error'] .= ' jer ste pobedili, krenite novu refresh-ovanjem stranice';
                $this->session->gameStarted = false;
                goto exitFun;
            }
            else if ($status === 'i') {
                $return['canAttack'] = false;
                $return['error'] = "Igra je zavrsena";
                $return['error'] .= ' jer ste izgubili, krenite novu refresh-ovanjme stranice';
                $this->session->gameStarted = false;
                goto exitFun;
            }
        }
        
        $idIgra = $this->session->curGame;
        $country = $this->input->post('country');
        
        if ($this->session->username !== 'guest') {
            $osv = $this->ModelOsvajanje->existsOsvajanje(['idigr' => $idIgra]);

            // In case of unfinished attack;
            //
            if ($osv != null) {
                if ($osv->getIdobl()->getNaziv() != $country) {
                    $return['error'] = "Morate da zavrsite napad na ".$osv->getIdobl()->getNaziv()." oblast";
                    goto exitFun;
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
        }
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
            if ($this->session->username !== 'guest') {
                
                $this->finishedConquering(['success'=>false]);
                $return['correct'] = false;
                $return['points'] = $this->ModelIgra->getPoeni(['igraID'=>$this->session->curGame]);
                $return['passengers'] = $this->ModelIgra->getPutnici(['igraID'=>$this->session->curGame]);
            }
            else {
                $return['passengers'] = 0;
                $this->session->set_userdata('gameFinished', true);
                $this->session->gameStarted = false;
            }
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
        
        $return['little'] = false;
        if ($answer == $this->session->correctAnswer) {
            if ( ($this->session->username === 'guest') && ($this->session->level === 'Beba')) {
                $return['passengers'] = 6;
                $return['points'] = 30;
                $this->session->set_userdata('gameFinished', true);
                $this->session->gameStarted = false;
                $return['little'] = true;
            }
            else {
                
                if ( ($this->session->level === 'Beba')) {
                    $this->finishedConquering(['success'=>true]);
                    $return['little'] = true;
                }
            }
            $return['correct'] = true;
        }
        else {
            if ($this->session->username === 'guest') {
                $return['passengers'] = 0;
                $return['points'] = 0;
                $this->session->set_userdata('gameFinished', true);
                $this->session->gameStarted = false;
            }
            else {
                $this->finishedConquering(['success'=>false]);
            }
            $return['correct'] = false;
        }
        
        if ($this->session->username !== 'guest') {
            $return['points'] = $this->ModelIgra->getPoeni(['igraID'=>$this->session->curGame]);
            $return['passengers'] = $this->ModelIgra->getPutnici(['igraID'=>$this->session->curGame]);
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
            
            if ($this->session->level === 'Svetski putnik' ) {
                $numTries = 2;
            }
            else { 
                $numTries = 4;
            }
            
            $this->session->set_userdata('numTries', $numTries);
            // Setting zagonetna string.
            //
            $zagonetna = "";
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
        $return['numTries'] = $this->session->numTries;
        $return['next'] = $this->session->cntPod;
        
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
        for($idx=0; $idx < strlen($correctAnswer); $idx++) {
            // Converting to uppercase.
            //
            if ( ( ord($letter) <= ord('z') ) && (ord($letter) >= ord('a')   ) ) {
                $letter = chr(ord($letter) - ord('a') + ord('A'));
            }
            $corLetter = $correctAnswer[$idx];
            if (  (ord($corLetter) <=ord('z') ) && (ord($corLetter) >= ord('a')) )  {
                $corLetter = chr(ord($corLetter) - ord('a') + ord('A'));
            }

            if ($letter === $corLetter) {
                $return['letterExists'] = true;
                $zagonetna[$idx] = $correctAnswer[$idx];
            }
        }
        
        // Denotes, that user cannot guess anymore.
        //
        $return['failiure'] = false;
        if (!$return['letterExists']) {
            $this->session->numTries = $this->session->numTries  - 1;
            $return['numTries'] = $this->session->numTries;
            if ($this->session->numTries === 0) {
                // He didn't succeed
                //
                $return['faliure'] = true;
                $zagonetna = $this->session->correctAnswer;
                if ($this->session->username !== 'guest') {
                    $this->finishedConquering(['success'=>false]);

                    // Update points.
                    //
                    $return['points'] = $this->ModelIgra->getPoeni(['igraID'=>$this->session->curGame]);
                    $return['passengers'] = $this->ModelIgra->getPutnici(['igraID'=>$this->session->curGame]);
                }
                else {
                    $return['passengers'] = 0;
                    $return['points'] = 0;
                    $this->session->set_userdata('gameFinished', true);
                    $this->session->gameStarted = false;
                }
                goto exitFun;
                
            }
        }    
        $this->session->zagonetna = $zagonetna;
        
            
         // Check if user guesed enigma.
         //
        $return['success'] = true;
        for($idx=0; $idx < count($zagonetna); $idx++)  {
           if ($zagonetna[$idx] === '*')
               $return['success'] = false;
               
        }
        
        
        if ($return['success'] === true) {
            if ($this->session->username === 'guest') {
                $return['passengers'] = 6;
                $return['points'] = 30;
                $this->session->set_userdata('gameFinished', true);
                $this->session->gameStarted = false;
            }
            else {
                $this->finishedConquering(['success' =>true]);
                $return['points'] = $this->ModelIgra->getPoeni(['igraID'=>$this->session->curGame]);
                $return['passengers'] = $this->ModelIgra->getPutnici(['igraID'=>$this->session->curGame]);
            }
            
        }
 exitFun:
        $return['text'] = $zagonetna;  
        echo json_encode($return);
    }
    
    public function getRangList(){
        
        $secret = $this->input->post('secret');
        if (!$secret)
        $this->Redirect();
        
        
        
        $igre= $this->doctrine->em->getRepository('Igra')->findAll();
        $max=0;
        $res=array();
        $sol; $k=0;
        foreach($igre as $igra){
            $idkor=$igra->getIdkor()->getIdkor()->getIdkor();
            echo $idkor;
            if($idkor>$max){$max=$idkor;}
            $poeni=$igra->getPoeni();
            if(count($res)<$poeni){$res[$idkor]=0;}
            if($res[$idkor]<=$poeni){
                $res[$idkor]=$poeni;
            }
        }
       reset($res);
       while(list($id, $poeni)=each($res)){
           $username= $this->doctrine->em->find ( "RegKorisnik", $id )->getUsername();
           $sol[$username]=$poeni;
       }
       arsort($sol);
        
        while(list($username, $poeni)=each($sol)){
           $ret[$k]['nivo']=$username;
           $ret[$k]['oblast']=$poeni;   
           $ret[$k]['idPitanja']=$poeni; 
           $k++;
        }
        //return $ret;
        $return['podaci'] = $ret;  
        echo json_encode($return);
        
    }
    
    public function getProfil(){
        $secret = $this->input->post('secret');
        if (!$secret)
        $this->Redirect();
        $username=$this->input->post('username');
        
        $users=$this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $username
		) );
        $idkor= $users[0]->getIdkor();
        $user= $this->doctrine->em->find ( "Takmicar", $idkor );
        
        
        $return['ime']=$user->getIme();
        $return['prezime']=$user->getPrezime();
        $return['username']=$username;
        $return['password']=$users[0]->getPassword();
        
        
        echo json_encode($return);
        
    }
    
    public function updateProfil(){
        $secret = $this->input->post('secret');
        if (!$secret)
        $this->Redirect();
        
        
        $oldusername=$this->input->post('oldusername');
        $ime=$this->input->post('ime');
        $prezime=$this->input->post('prezime');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $reppassword=$this->input->post('reppassword');
        
        $m=false;
        $return['error'] = "";
        $return['updateSucc'] = false;
        if ($ime == '') {
            $return['error'] = 'Ime nednostaje';
        }
        else if ($prezime == '') {
            $return['error'] = 'Prezime nedostaje';
        }
        else if ($username == '') {
            $return['error'] = 'Nepravilno korisnickko ime';
        }
        else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/', $password)) {
            $return['error'] = 'Neispravan obrazac sifre';
        }
        else if ($password != $reppassword) {
            $return['error'] = 'Ne poklapaju se sifre';
        }
        else if ($username!=$oldusername && $this->ModelRegKorisnik->exists($data=['username'=>$username])){
            $return['error'] = "Korisnicko ime $username vec postoji";
        }
        else {
            $return['updateSucc'] = true;
            $m=true;
        }
        if($m==true){//update Profil u bazu
            
        $this->load->model('proxies/ModelTakmicar');
        $this->load->model('proxies/ModelRegKorisnik');
        
        $this->ModelTakmicar->updateTakmicar([
                            'oldusername'=> $oldusername,
                            'ime'=> $ime,
                            'prezime'=> $prezime,
                            'username'=> $username,
                            'password'=> $password
 
            ]);   
        }
        
       echo json_encode($return); 
    }
}
