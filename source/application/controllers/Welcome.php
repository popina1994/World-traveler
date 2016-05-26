<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'models/entities/NivoTezine.php';
include APPPATH.'models/entities/Moderator.php';
include APPPATH.'models/entities/Administrator.php';
include APPPATH.'models/entities/RegKorisnik.php';
class Welcome extends CI_Controller {

	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	

	//primeri koriscenja modela
	//pregaziti ovo kad se shvati kako funkcionise
	public function index()
	{
		
		$this->load->library('doctrine');
		
		foreach ($this->ModelPitanje->getPitanja() as $p) {
			echo $p->getIdobl()->getNaziv();
		}
                
                /*$data = Array('username'=>'user', 'password'=>'pass' );
                $this->ModelAdministrator->createAdministrator($data);*/
		
		//opcija1 za INSERT - napravila gotove funkcije
		//$data = Array('username'=>'Djordje', 'password'=>'Dj1234' );
		//$this->Model->createModerator($data);
		
		//opcija2 za INSERT - rucno
		/*
		
		$nivo = new NivoTezine();
		$nivo->setNaziv("nivonekii");
		try {
			//save to database
			$this->em->persist($nivo);
			$this->em->flush();
		}
		catch(Exception $err){
			die($err->getMessage());
		}
		 */
		

		//pretraga po ID
		//echo $this->doctrine->em->find("RegKorisnik", 2)->getUsername();
		
		//specificne pretrage
		
		/*
		$users =  $this->doctrine->em->getRepository('RegKorisnik')->findBy(array('username' => 'dragana'));
		foreach($users as $user) echo $user->getPassword();
		*/
		
	}
	
}
