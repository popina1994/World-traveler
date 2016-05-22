<?php

require_once APPPATH.'controllers/BaseController.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Game
 *
 * @author popina
 */
class Game extends BaseController {
    //put your code here
    
     public function __construct() {
        parent::__construct("Takmicar");
    }
    
    public function index() {
        $this->Redirect(['view'=>'Game']);
    }
    
    // Redirects to mapp of appropriate level.
    //
    public function gameChice() {
    
    }
    public function conquered() {
        console_log('to');
    }
}
