<?php

/**
 *
 * @author Dragana Milovancevic 2013/0048
 *
 */
class ModelAdministrator extends CI_Model {
	
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	
	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
	}
	
	function createAdministrator($data) {
		$user = $data ['username'];
		$users = $this->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $user 
		) );
		if ($users != null)
			return false;
		
		$korisnik = new RegKorisnik ();
		$korisnik->setUsername ( $data ['username'] );
		$korisnik->setPassword ( $data ['password'] );
		$admin = new Administrator ();
		$admin->setIdkor ( $korisnik );
		
		try {
			// save to database
			$this->em->persist ( $korisnik );
			$this->em->flush ();
			$this->em->persist ( $admin );
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
			$admin = $this->doctrine->em->find ( "Administrator", $users [0]->getIdkor () );
			if ($admin == null)
				return false;
			else
				return true;
		} else
			return false;
	}
	
	function getAdministrator($data) {
		$username = $data ['username'];
		$password = $data ['password'];
		$users = $this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $username,
				'password' => $password 
		) );
		if (count ( $users ) == 1)
			return $this->doctrine->em->find ( "Administrator", $users [0]->getIdkor () );
		else
			return null;
	}
	
}