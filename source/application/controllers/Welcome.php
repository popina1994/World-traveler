<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once  APPPATH.'models/entities/NivoTezine.php';
include_once APPPATH.'models/entities/Moderator.php';
include_once APPPATH.'models/entities/Administrator.php';
include_once APPPATH.'models/entities/RegKorisnik.php';

include_once APPPATH.'models/entities/Igra.php';
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
		$this->load->model('proxies/Model');
		
		
		/*
		$igra = $this->doctrine->em->find("Igra", 1);

		
		$osv = $igra->getIdosv();
		foreach($osv as $osvajanje)
			echo $osvajanje->getStatus();
			
		*/
		
		//opcija1 za INSERT - napravila gotove funkcije
		
		/*
		$data = Array('username'=>'žćčđ', 'password'=>'d123' );
		$this->Model->createModerator($data);
		*/
		
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
		
		
		
		//echo $this->doctrine->em->find("TekstPitanje", 1)->getIdpit()->getIdkor()->getIdkor()->getUsername();
		//$slika = $this->doctrine->em->find("SlikaPitanje", 1)->getSlika();
		//echo "<img src=$slika />";
		
		//pretraga po ID
		//echo $this->doctrine->em->find("RegKorisnik", 2)->getUsername();
		
		//specificne pretrage
		
		/*
		$users =  $this->doctrine->em->getRepository('RegKorisnik')->findBy(array('username' => 'dragana'));
		foreach($users as $user) echo $user->getPassword();
		*/
	}
	
	
}
