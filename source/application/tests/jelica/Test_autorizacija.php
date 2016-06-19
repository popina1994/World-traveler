<?php

/**
 * Created by PhpStorm.
 * User: Jelica
 * Date: 6/19/2016
 * Time: 2:07 PM
 */
class Test_autorizacija extends TestCase
{
    public function testSubmitValidData()
    {
        $_POST["nameLogin"] = 'jelica1';
        $_POST["passLogin"] = 'jelica123';

        $this->CI->login();
    }
}
