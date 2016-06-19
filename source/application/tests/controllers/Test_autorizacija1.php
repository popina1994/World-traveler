<?php

/**
 * Created by PhpStorm.
 * User: Jelica
 * Date: 6/19/2016
 * Time: 8:05 PM
 */


class Test_autorizacija1 extends TestCase
{
    public function test_svipodaci(){
        $output = $this->request('GET', ['Welcome', 'index']);
        $this->assertContains('<title>Welcome to CodeIgniter</title>', $output);
    }

}

