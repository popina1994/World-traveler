<?php

/**
 * Created by PhpStorm.
 * User: popina
 * Date: 20.06.2016.
 * Time: 0:11
 */
class TestSlavko extends TestCase
{
    public function setUp() {
        $_SESSION['username'] = 'guest';

    }
    public function test_DateExist() {
        $output = $this->request("POST", "Game/checkOldGame", ['secret'=>true]);
        $this->assertContains("dataExists\":false", $output);
    }

    public function test_Move() {
        $_SESSION['correctAnswer'] = 1;
        $output = $this->request("POST", "Game/getTextAnswer", ['secret'=>true, 'letter'=>'a']);
        $this->assertContains("correct", $output);
    }



}
