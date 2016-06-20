<?php

/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 6/19/2016
 * Time: 5:21 PM
 */
class MainTest extends TestCase
{

    public function setUp()
    {
        $this->resetInstance();
    }


    public function test_validation(){
        $output = $this->request("POST", "Main/registerValidation",['secret'=>true,'userNameRegister'=>'usernametest', 'passRegister'=>'passtest1234!A', 'nameRegister'=>'Dragana', 'surNameRegister'=>'Dragana', 'repeatPass'=>'passtest2']);
        $this->assertContains("error\":\"Ne poklapaju se sifre", $output);

    }
    
    public function test_index() {
       $output = $this->request("POST", "Main/register",['userNameRegister'=>'usernametest', 'passRegister'=>'passtest', 'nameRegister'=>'Dragana', 'surNameRegister'=>'Dragana']);
        $this->assertContains("PRIJAVA", $output);
    }


}
