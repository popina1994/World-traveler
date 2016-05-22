<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelOblast
 *
 * @author popina
 */
class ModelOblast extends CI_Model{
    var $em;
	
	public function __construct() {
		parent::__construct ();
		$this->em = $this->doctrine->em;
	}
        
        function getCountry($data) {
		$name = $data ['name'];
		$countries = $this->doctrine->em->getRepository ( 'Oblast' )->findBy ( array (
				'Naziv' => $name,
		) );
		if (count ( $countries ) == 1)
			return $this->doctrine->em->find ( "Oblast", $countries [0]->getIdkor () );
		else
			return null;
	}
}
