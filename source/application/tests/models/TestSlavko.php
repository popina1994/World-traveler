<?php

/**
 * User: slavko
 * Date: 6/20/2016
 * Time: 12:48 AM

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
