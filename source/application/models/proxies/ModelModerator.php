<?php
require_once (APPPATH . "models/entities/Moderator.php");

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
		if ($users != null)
			return false;
		
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
        function allModeratorsUserName(){
            $users=$this->doctrine->em->getRepository ( 'RegKorisnik')->findAll();
            $i=0; 
            foreach($users as $user){
                if($this->doctrine->em->find("Moderator", $user->getIdkor())){
                  $usernames[$i]= $user->getUsername(); $i++;  
                }
            }
          
            return $usernames;
            }
	
          
        function deleteModerator($data){
            $username=$data['username'];
            
            $users = $this->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $username 
		) );
	    //if ($users != null)
		//	return false;
            $user1=$users[0];
            $user2=$this->doctrine->em->find("Moderator", $user1->getIdkor());
            $ID=$users[0]->getIdkor();
            
            try{
                  $entity = $this->em->getPartialReference("Moderator", $ID);
                  $this->em->remove($entity);
                  $entity = $this->em->getPartialReference("RegKorisnik", $ID);
                  $this->em->remove($entity);
                  $this->em->flush();
                  return true;
            }
            catch(Exception $err)
            {
                  return false;
            }
                                  
            return true;
        }            
}