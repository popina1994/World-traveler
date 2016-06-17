<?php

/* 
/*
* Djordje Zivanovic 0033/2013
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BaseController extends CI_Controller {
    public function index() {
        $this->load->view('test');
    }
}