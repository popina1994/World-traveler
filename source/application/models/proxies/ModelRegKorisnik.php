<?php
require_once(APPPATH."models/entities/RegKorisnik.php");

class ModelRegKorisnik extends CI_Model {
	 
	/**
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	 
	public function __construct() {

		parent::__construct();
		$this->em = $this->doctrine->em;
	}
	
	function createUser($data){
	
		$user = $data['username'];
		$users =  $this->em->getRepository('RegKorisnik')->findBy(array('username' => $user ));
		if($users!=null) return false;
	
		$korisnik = new RegKorisnik();
		$korisnik->setUsername($data['username']);
		$korisnik->setPassword($data['password']);
		$tak = new Takmicar();
		$tak->setIdkor($korisnik);
		$tak->setIme($data['ime']);
		$tak->setPrezime($data['prezime']);
		
		//ovde dolazi postavljanje slike ako nije null
	
		try {
			//save to database
			$this->em->persist($korisnik);
			$this->em->flush();
			$this->em->persist($tak);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		return true;
	
	}
        
        function canLogIn($data) {
            $username = $data['user'];
            $password = $data['pass'];
             $users = $this->doctrine->em->getRepository('RegKorisnik')->findBy(array('username' => $username));
             foreach($users as $user) { 
                 if ($user->getPassword() == $password)
                    return true;
             }
             return false;
            
        }
	
}