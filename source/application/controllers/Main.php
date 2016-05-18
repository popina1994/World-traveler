<?php
 include APPPATH.'models/entities/RegKorisnik.php';
class Main extends CI_Controller {
    public function index() {
        $this->load->view('Main');
    }
    
    public function login() {
        $this->load->library('doctrine');
	//include APPPATH.'models/entities/NivoTezine.php';
        //include APPPATH.'models/entities/Moderator.php';
        //include APPPATH.'models/entities/Administrator.php';
       
		
       
        /* Load form helper */ 
			
			
         /* Set validation rule for name field in the form */ 
         $this->form_validation->set_rules('nameLogin', 'Name', 'required'); 
         $this->form_validation->set_rules('passLogin', 'Password', 'required');		
         if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('Main'); 
         } 
         else {
             $username = $this->input->post("nameLogin");
             $password = $this->input->post("passLogin");
             $users = $this->doctrine->em->getRepository('RegKorisnik')->findBy(array('username' => $username));
             foreach($users as $user) { 
                 if ($user->getPassword() == $password)
                    redirect('welcome');
             }
             $this->load->view('Main');
// Ovde mora redirect, da bi se ocistio url i prebacilo na odgovarajuci kontroler.
             //
             
         } 
    }
}
?>

