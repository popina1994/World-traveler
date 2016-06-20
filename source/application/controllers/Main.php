
<?php

/*
* Djordje Zivanovic 0033/2013
*/
 //include APPPATH.'models/entities/RegKorisnik.php';
 //include APPPATH.'models/entities/Administrator.php';
 //include APPPATH.'models/entities/Moderator.php';    
 //include APPPATH.'models/entities/Takmicar.php';

 
 require_once APPPATH.'controllers/BaseController.php';

class Main extends BaseController {
    
    public function __construct() {
        parent::__construct("Main");
    }
    public function index() {
        // If the user is logged in.
        // You always need to add $this because the load->view cannot find who is calling, and it'll be one
        // from base class, and it'll make some errors.
        
       //$this->session->sess_destroy();

       $this->Redirect(['view'=>'Main']);
         //$this->Redirect(['view'=>'Game']);
        //$this->Redirect(['view'=>'LevelChoice']);
       //$this->Redirect(['view'=>'GameChoice']);
        //$this->Redirect(['view'=>'Administrator']);
        //$this->Redirect(['view'=>'Moderator']);
        
     
    }
    
    public function  startUnregistered() {
        $this->session->username = "guest";
        $this->Redirect(['view'=>'Main']);
        
    }
    // Bad code, but for now I've not seen better solution, maybe some arguments, etc.
    // But for now I'll leave it like this.
    //
    private function loginValidationPHP() {
        
        $username = $this->input->post('nameLogin');
        $password = $this->input->post("passLogin");
        
        if ($this->ModelRegKorisnik->canLogIn($data = ['username'=>$username, 'password'=>$password])) 
                   return true;
        return false;
    }
    
    
    public function login() {			
			
        /* Set validation rule for name field in the form */ 	
        
        if ( !$this->loginValidationPHP()) {
            // Should pass some kind of error to view.
            //
           $this->Redirect(['pageView' => 'login']);

        } 
        else {
            // redirect to appropriate page
            //

            $username = $this->input->post('nameLogin');
            $password = $this->input->post("passLogin");
            
            $this->session->set_userdata('username', $username);
            
            Redirect();
        }
    }
    
    public function register() {
        $this->load->model('proxies/ModelTakmicar');
        
        $username = $this->input->post('userNameRegister');
        $password = $this->input->post("passRegister");
        $ime = $this->input->post("nameRegister");
        $prezime = $this->input->post("surNameRegister");
        if ($username) {
            $this->ModelTakmicar->createTakmicar($data = [ 'username' =>$username, 'password' =>$password,
                'ime' =>$ime, 'prezime'=>$prezime]);
            // In future there should be centralized login.
            // But for now it is solved sloppy.
            //
            $this->Redirect(['view'=>'login']);
        }
        else {
            Redirect();
        }
    }
    
    public function registerValidation() {
        
        // Protect from unauthorized access.
        //
        $secret = $this->input->post('secret');
        if (!$secret)
            Redirect();
        
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
        else if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,16}$/', $password)) {
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
    
 
    
    public function loginValidation() {
                
        // Protect from unauthorized access.
        //
        $secret = $this->input->post('secret');
        if (!$secret)
            Redirect();
        
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
    
    public function logOut() {
        $this->session->sess_destroy();
        $this->Redirect();
    }
    
    public function test() {
        console_log('Izlogovan');
        $this->load->view('test');
        
    }
}
?>

