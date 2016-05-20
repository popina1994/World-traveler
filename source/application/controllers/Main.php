<?php
 include APPPATH.'models/entities/RegKorisnik.php';
 include APPPATH.'models/entities/Administrator.php';
 include APPPATH.'models/entities/Moderator.php';    
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
         $this->form_validation->set_rules('passLogin', 'Password', 'required|md5|callback_loginValidationPHP');		
         if ($this->form_validation->run() == FALSE) {
             // In case JS is disableed.
             //
            $this->load->view('WrongLogIn'); 
            
         } 
         else {
             // redirect to appropriate page
             //
        
            $username = $this->input->post('nameLogin');
            $password = $this->input->post("passLogin");
             $this->load->model('proxies/ModelAdministrator');
             $this->load->model('proxies/ModelModerator');
             if ($this->ModelAdministrator->canLogIn($data = array('username'=>$username, 'password'=>$password)))
             {
                 $this->load->view('Admin');
             }
         else if ($this->ModelModerator->canLogIn($data = array('username'=>$username, 'password'=>$password))) {
             $this->load->view('Moderator');
         }
         else {
             $this->load->view('Game');
         }
         }
             
// Ovde mora redirect, da bi se ocistio url i prebacilo na odgovarajuci kontroler.
             //

    }
    
    public function register() {
        
    }
    
    public function loginValidationPHP() {
    if (!isset($_POST['nameLogin'])) {
            die();
    }
        
        $username = $this->input->post('nameLogin');
        $password = $this->input->post("passLogin");
        $this->load->model('proxies/ModelRegKorisnik');
        if ($this->ModelRegKorisnik->canLogIn($data = array('username'=>$username, 'password'=>$password))) 
                   return true;
        return false;
    }
    
    public function loginValidation() {
        // This should not happen.
        //
         if (!isset($_POST['nameLogin']))
            return false;
        
        $username = $this->input->post('nameLogin');
        $password = $this->input->post("passLogin");
        $this->load->model('proxies/ModelRegKorisnik');
        if ($this->ModelRegKorisnik->canLogIn($data = array('username'=>$username, 'password'=>$password))) {
                   $return['userExists'] = true ;
        }
             else  {
                 $return['userExists'] = false;
             }
        echo json_encode($return);
    }
    
    
    public function WrongLogin() {
        $this->load->view('WrongLogin');
    }
    
    public function test() {
        $this->load->view('test');
        
    }
}
?>

