<?php
 include APPPATH.'models/entities/RegKorisnik.php';
 include APPPATH.'models/entities/Administrator.php';
 include APPPATH.'models/entities/Moderator.php';    
class Main extends CI_Controller {
    public function index() {
        $this->load->view('Main');
    }
    
    public function login() {
			
			
        /* Set validation rule for name field in the form */ 
        $this->form_validation->set_rules('nameLogin', 'Name', 'required'); 
        $this->form_validation->set_rules('passLogin', 'Password', 'required|md5|callback_loginValidationPHP');		
        if ($this->form_validation->run() == FALSE) {
            // In case JS is disableed.
            // But in future I won't mind about this.
            //
           $this->load->view('Login'); 

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
    }
    
    public function register() {
        $this->load->model('proxies/ModelTakmicar');
        $username = $this->input->post('userNameRegister');
        $password = $this->input->post("passRegister");
        $ime = $this->input->post("nameRegister");
        $prezime = $this->input->post("surNameRegister");
        $this->ModelTakmicar->createTakmicar($data = [ 'username' =>$username, 'password' =>$password,
            'ime' =>$ime, 'prezime'=>$prezime]);
        $this->load->view('login');
    }
    
    public function registerValidation() {
        $return['registerSucc'] = true;
        $username = $this->input->post('userNameRegister');
        $password = $this->input->post('passRegister');
        $passCheck = $this->input->post('repeatPass');
        
        $this->load->model('proxies/ModelRegKorisnik');
        
        // In future regex will be used for pass creation.
        //
        $return['error'] = "";
        
        if ( ($password == $passCheck)  && (!$this->ModelRegKorisnik->exists($data=['username'=>$username])) ) {
                $return['registerSucc'] = true;
        }
        else {

            $return['registerSucc'] = false;
            if ($password != $passCheck) {
                $return['error'] = 'Ne poklapaju se sifre';
            }
            else {
                $return['error'] = "Korisnicko ime $username vec postoji";
            }
        }
        echo json_encode($return);
        
    }
    
    // Bad code, but for now I've not seen better solution, maybe some arguments, etc.
    // But for now I'll leave it like this.
    //
    public function loginValidationPHP() {
    if (!isset($_POST['nameLogin'])) {
            die();
    }
        
        $username = $this->input->post('nameLogin');
        $password = $this->input->post("passLogin");
        $this->load->model('proxies/ModelRegKorisnik');
        if ($this->ModelRegKorisnik->canLogIn($data = ['username'=>$username, 'password'=>$password])) 
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
    
    public function test() {
        $this->load->view('test');
        
    }
}
?>

