<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeratorController
 *
 * @author popina
 */
class ModeratorController extends BaseController {
    //put your code here
    
     public function __construct() {
        parent::__construct("Moderator");
    }
    
    public function index() {
        //$this->load->view('Administrator');
        $this->Redirect(['view'=>'Moderator']);
    }
}
