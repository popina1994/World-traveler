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
		$questions= $this->doctrine->em->getRepository('Pitanje')->findAll();
		 $i=0; $strings=array();
               foreach($questions as $q){
                   $strings[$i]=array(
                       'idPitanja' => $q->getIdpit(),
                       'nivo'=> $q->getIdniv()->getNaziv(),
                       'oblast' => $q->getIdobl()->getNaziv() 
                    );
                   $i++;
               }
               return $strings;
                
	}
	
}