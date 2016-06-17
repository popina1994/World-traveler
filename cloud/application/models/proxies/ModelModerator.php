<?php

/**
 *
 * @author Dragana Milovancevic 2013/0048
 * @author Slavko Ivanovic 2013/0082
 */
class ModelModerator extends CI_Model {
	
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	
	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
	}
	
	function createModerator($data) {
		$user = $data ['username'];
		$users = $this->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $user 
		) );
		if ($users != null){
			return false;
                }
		$korisnik = new RegKorisnik ();
		$korisnik->setUsername ( $data ['username'] );
		$korisnik->setPassword ( $data ['password'] );
		$mod = new Moderator ();
		$mod->setIdkor ( $korisnik );
		
		try {
			// save to database
			$this->em->persist ( $korisnik );
			$this->em->flush ();
			$this->em->persist ( $mod );
			$this->em->flush ();
		} catch ( Exception $err ) {
			die ( $err->getMessage () );
		}
		return true;
	}
	
	function canLogIn($data) {
		$username = $data ['username'];
		$password = $data ['password'];
		$users = $this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $username,
				'password' => $password 
		) );
		if (count ( $users ) == 1) {
			$admin = $this->doctrine->em->find ( "Moderator", $users [0]->getIdkor () );
			if ($admin == null)
				return false;
			else
				return true;
		} else
			return false;
	}
	
	function getModerator($data) {
		$username = $data ['username'];
		$password = $data ['password'];
		$users = $this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $username,
				'password' => $password 
		) );
		if (count ( $users ) == 1)
			return $this->doctrine->em->find ( "Moderator", $users [0]->getIdkor () );
		else
			return null;
	}
        //Return usernames of all Moderators
        //BAD algorithm
        //PREVARA od funkcije, zapravo vraca samo on koji nisu banovani od strane admina.
        function allModeratorsUserName(){
            $users=$this->doctrine->em->getRepository ( 'RegKorisnik')->findAll();
            $i=0; $usernames=array();
            foreach($users as $user){
                $us=$this->doctrine->em->find("Moderator", $user->getIdkor());
                if($us){
                    if($user->getPassword()!="admindelete"){
                    $usernames[$i]= $user->getUsername(); $i++; 
                    }
                }
            }
            if(count($usernames)>0){
                
                return $usernames;       
            }
            return null;
            }
	
          //PREVARA od funkcije, ne brise moderatora, nego ga samo  onemogucuje da dalje radi
        function deleteModerator($data){
            $username=$data['username'];
            
            $users = $this->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $username 
		) );
	    
            $users[0]->setPassword('admindelete');
            $this->em->flush();
                     
            return true;
        }
}