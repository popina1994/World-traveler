<?php

/**
 * Created by PhpStorm.
 * User: Jelica
 * Date: 6/19/2016
 * Time: 11:58 PM
 */
class TestAutorizacija extends TestCase
{
    public function test_bez(){
        $output = $this->request("POST", "main/loginValidation", ['secret'=>'true', 'nameLogin'=>'', "passLogin"=>""]);
        $this->assertContains("false", $output);
    }

    public function test_dobri(){
        $output = $this->request("POST", "main/loginValidation", ['secret'=>'true', 'nameLogin'=>'User', "passLogin"=>"Pass"]);
        $this->assertContains("true", $output);
    }
}
