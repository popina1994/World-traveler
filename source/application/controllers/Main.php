<?php
 include APPPATH.'models/entities/RegKorisnik.php';
 include APPPATH.'models/entities/Administrator.php';
 include APPPATH.'models/entities/Moderator.php';    
 include APPPATH.'models/entities/Takmicar.php';
 
 function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

class Main extends CI_Controller {
    public function index() {
        // If the user is logged in.
        //
        $this->load->model('proxies/ModelRegKorisnik');
        if ($this->session->username) {
            $type = $this->ModelRegKorisnik->checkType(['username'=>$this->session->username]);
            switch ($type) {
                case "Moderator":
                    $this->load->view('Moderator');
                    break;
                case "Administrator":
                    $this->load->view('Admin');
                    break;
                case "Takmicar" :
                    $this->load->view('GameChoice');
                    break;
                default:
                    // User is deleted in meanwhile.
                    //
                    $this->load->view('Main');
                    break;
            }
        }
        else {
            $this->load->view('Main');
        }
        
    }
    
    public function login() {			
			
        /* Set validation rule for name field in the form */ 
        $this->form_validation->set_rules('nameLogin', 'Name', 'required'); 
        $this->form_validation->set_rules('passLogin', 'Password', 'required|callback_loginValidationPHP');		
        
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
            
            $this->session->username = $username;
            
            $this->load->model('proxies/ModelAdministrator');
            $this->load->model('proxies/ModelModerator');
            
            console_log(['username'=>$username, 'password'=>$password]);
            
            if ($this->ModelAdministrator->canLogIn(['username'=>$username, 'password'=>$password]))
            {
                $this->load->view('Admin');
            }
            else if ($this->ModelModerator->canLogIn($data = array('username'=>$username, 'password'=>$password))) 
             {
                $this->load->view('Moderator');
            }
            else {
                $this->load->view('GameChoice');
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
        $username = $this->input->post('userNameRegister');
        $password = $this->input->post('passRegister');
        $name = $this->input->post('nameRegister');
        $surName = $this->input->post('surNameRegister');
        $passCheck = $this->input->post('repeatPass');
        
        $this->load->model('proxies/ModelRegKorisnik');
        
        // In future regex will be used for pass creation.
        //
        $return['error'] = "";

        $return['registerSucc'] = false;
        if ($name == '') {
            $return['error'] = 'Ime nednostaje';
        }
        else if ($surName == '') {
            $return['error'] = 'Prezime nedostaje';
        }
        else if ($username == '') {
            $return['error'] = 'Nepravilno korisnickko ime';
        }
        else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
            $return['error'] = 'Neispravan obrazac sifre';
        }
        else if ($password != $passCheck) {
            $return['error'] = 'Ne poklapaju se sifre';
        }
        else if ($this->ModelRegKorisnik->exists($data=['username'=>$username])){
            $return['error'] = "Korisnicko ime $username vec postoji";
        }
        else {
            $return['registerSucc'] = true;
        }
        echo json_encode($return);
        
    }
    
    // Bad code, but for now I've not seen better solution, maybe some arguments, etc.
    // But for now I'll leave it like this.
    //
    public function loginValidationPHP() {
        
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

