<?php
require_once (APPPATH . "models/entities/RegKorisnik.php");
class ModelRegKorisnik extends CI_Model {
	
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;
	
	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
	}
	
	function canLogIn($data) {
		$username = $data ['username'];
		$password = $data ['password'];
		$users = $this->doctrine->em->getRepository ( 'RegKorisnik' )->findBy ( array (
				'username' => $username,
				'password' => $password 
		) );
		if (count ( $users ) == 1)
			return true;
		else
			return false;
	}
	
}