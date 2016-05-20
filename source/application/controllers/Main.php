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
         $this->form_validation->set_rules('nameLogin', 'Name', 'required|callback_loginValidation'); 
         $this->form_validation->set_rules('passLogin', 'Password', 'required|md5');		
         if ($this->form_validation->run() == FALSE) {
            $this->load->view('WrongLogin.php'); 
         } 
         else {
             redirect('Welcome');
         }
             
// Ovde mora redirect, da bi se ocistio url i prebacilo na odgovarajuci kontroler.
             //

    }
    
    public function register() {
        
    }
    
    public function loginValidation() {
        $username = $this->input->post("nameLogin");
        $password = $this->input->post("passLogin");
        $this->load->model('proxies/ModelRegKorisnik');
        if ($this->ModelRegKorisnik->canLogIn($data = array('user'=>$username, 'pass'=>$password)))
                    return true;
             else  {
                 $this->form_validation->set_message('loginValidation', 'Neispravno korisnicko ime');
                 return false;
             }
    }
    
    public function validation() {
        if (!isset($_POST['nameLogin']))
            $return["userName"]  = "Hvala kurcu";
        else {
            $return["userName"] = $_POST['nameLogin'];
        }    
        echo json_encode($return);
        
    }
    
    public function test() {
        $this->load->view('test');
        
    }
}
?>

