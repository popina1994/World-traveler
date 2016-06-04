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
                   $tip= $this->em->getRepository('TekstPitanje')->findBy(array('idpit' => $q->getIdpit() ));
                   if(count($tip)==1){
                       $tip="tekst";
                   }else{
                       $tip= $this->em->getRepository('SlikaPitanje')->findBy(array('idpit' => $q->getIdpit() ));
                       if(count($tip)==1){
                           $tip="slika";
                       }else{
                           $tip= "licnost";
                       }
                           
                   }
                   $strings[$i]=array(
                       'idPitanja' => $q->getIdpit(),
                       'nivo'=> $q->getIdniv()->getNaziv(),
                       'oblast' => $q->getIdobl()->getNaziv() ,
                       'tip' => $tip
                    );
                   $i++;
               }
               return $strings;
	}
        function deletePitanje($id){
            try{
                
                
               // $entity = $this->em->getPartialReference("Pitanje", $id);
                $entity= $this->doctrine->em->find ( "Pitanje", $id );
                $this->em->remove($entity);
                //$this->em->flush();
                
                $entity2= $this->doctrine->em->find ( "LicnostPitanje", $id );
             //   $entity2 = $this->em->getPartialReference("LicnostPitanje", $id);
                if($entity2!=null){$this->em->remove($entity2);
               // $this->em->flush();
                }
                $entity3= $this->doctrine->em->find ( "SlikaPitanje", $id );
               // $entity3 = $this->em->getPartialReference("SlikaPitanje", $id);
                if($entity3!=null){$this->em->remove($entity3);
               // $this->em->flush();
                
                }
                $entity4= $this->doctrine->em->find ( "TekstPitanje", $id );
   
                if($entity4!=null){$this->em->remove($entity4);

                //$this->em->flush();}
                }
                $this->em->flush();
                return true;
            } catch (Exception $err) {
                return false;
            }
            
        }
        
       
}
        
        
        
        
        
        
        
        
        
        
	
