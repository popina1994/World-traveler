<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

/**
 * Description of BaseController
 *
 * @author popina
 */
class BaseController extends CI_Controller{
    //put your code here
    
    private $type = "BaseController";
    
    public function __construct($type) {
        parent::__construct();
        $this->type = $type;
    }
    
    // LoadView denotes that view should be loaded.
    //
    protected function Redirect($data) {
        
        $this->load->model('proxies/ModelRegKorisnik');
        $pageView = $data['view'];
        $typeCookie = $this->ModelRegKorisnik->checkType(['username'=>$this->session->username]);
        
        console_log('pageView '. $pageView);
        console_log('typeCookie '. $typeCookie);
        console_log('ThisType '. $this->type);
        if ($typeCookie) { 
            // If user tries to access main page, he will be redirected to the appropriate page.

             if ($pageView && ( ($typeCookie === $this->type))) {
                $this->load->view($pageView, $data);
            }
            else {
                switch ($typeCookie) {
                    case "Moderator":
                        redirect('Moderator');
                        break;
                    case "Administrator":
                        redirect('AdministratorController');
                        break;
                    case "Takmicar" :
                        redirect('Game');
                        
                        break;
                    // Not registered.
                    //
                    default:
                        // User is deleted in meanwhile. in future to test.
                        //
                        $this->session->sess_destroy();
                        redirect('Main');
                        break;
                }
            }
        }
        else {
            // There is no session. There is only accessing to appropriate page.
            // In future there should be added Unregister game, for this.
            //
            if ($pageView && ($this->type == 'Main') )
                $this->load->view($pageView);
            else
                // The unauthorized access is tried.
                //
               redirect('main');
             
        }
    }
}