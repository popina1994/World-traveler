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
         $this->form_validation->set_rules('passLogin', 'Password', 'required|md5|callback_loginValidation');		
         if ($this->form_validation->run() == FALSE) {
             // In case JS is disableed.
             //
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
         if (!isset($_POST['nameLogin']))
            return false;
        
        $username = $this->input->post('nameLogin');
        $password = $this->input->post("passLogin");
        $this->load->model('proxies/ModelRegKorisnik');
        if ($this->ModelRegKorisnik->canLogIn($data = array('user'=>$username, 'pass'=>$password)))
                   $return['userExists'] = true ;
             else  {
                 $return['userExists'] = false;
             }
        echo json_encode($return);
        return true;
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

