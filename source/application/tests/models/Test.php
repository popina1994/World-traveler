<?php

/**
 * Created by PhpStorm.
 * User: popina
 * Date: 19.06.2016.
 * Time: 19:37
 */


class Test extends TestCase
{


    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model("modeltekstpitanje");
        $this->objTxt = $this->CI->modeltekstpitanje;
    }


    public function test_InputValidation()
    {
       $this->request("POST", "ModeratorController/test", ['secret'=>false]);
        //$this->assertContains('error');
    }

}