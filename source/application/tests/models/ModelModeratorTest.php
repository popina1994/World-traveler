<?php


class ModelModeratorTest extends TestCase{


    public function setUp() {
        $this->resetInstance();
        $this->CI->load->model("modelmoderator");
        $this->obj = $this->CI->modelmoderator;
    }

    public function test_getAllModerators() {
        $actual = $this->obj->allModeratorsUserName();
        $expected = "User";
        $this->assertEquals($expected, $actual[0]);
    }

    public function test_createModerator() {

        $username = 'username';
        $password = 'pass123';

        $actual = $this->obj->createModerator($data = [ 'username' =>$username, 'password' =>$password]);
        $actual = $this->obj->createModerator($data = [ 'username' =>$username, 'password' =>$password]);
        $this->assertFalse($actual);

    }

}
