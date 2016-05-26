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
        function deletePitanje($id){
            try{
                
                
                $entity = $this->em->getPartialReference("Pitanje", $id);
                $this->em->remove($entity);
                $this->em->flush();
                $entity2 = $this->em->getPartialReference("LicnostPitanje", $id);
                $this->em->remove($entity2);
                $this->em->flush();
                $entity3 = $this->em->getPartialReference("SlikaPitanje", $id);
                $this->em->remove($entity3);
                $this->em->flush();
                $entity4 = $this->em->getPartialReference("TekstPitanje", $id);
                $this->em->remove($entity4);
                
                
                
                $this->em->flush();
                return true;
            } catch (Exception $err) {
                return false;
            }
            
        }
        
       
}
        
        
        
        
        
        
        
        
        
        
	
