<?php

class ModelPitanje extends CI_Model {

	/**
	 *
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	var $em;

	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
	}

	function getPitanja(){
		return $this->doctrine->em->getRepository('Pitanje')->findBy(array());
		
	}
	
}