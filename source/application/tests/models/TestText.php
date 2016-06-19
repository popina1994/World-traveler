<?php

/**
 * Created by PhpStorm.
 * User: popina
 * Date: 19.06.2016.
 * Time: 19:37
 */


class TestText extends TestCase
{


    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model("modeltekstpitanje");
        $this->objTxt = $this->CI->modeltekstpitanje;
    }


    public function test_InputValidation()
    {
        $output = $this->request("POST", "ModeratorController/inputValidationTekstPitanje", ['secret'=>true, 'o1'=>'Slavko', 'o2'=>'Dragana', 'o3' =>'Dorde', 'o4'=>'Jelica',
            'tacan'=>'1', 'postavka'=>'konj', 'nivo' => 'Beba1', 'oblast'=>'1', 'id' =>'3']);
        $this->assertContains("error\":\"\"", $output);
        $output = $this->request("POST", "ModeratorController/inputValidationTekstPitanje", ['secret'=>true, 'o1'=>'Slavko', 'o2'=>'Dragana', 'o3' =>'Dorde', 'o4'=>'Jelica',
            'tacan'=>'1', 'postavka'=>'konj', 'nivo' => '', 'oblast'=>'1', 'id' =>'3']);
        $this->assertContains("error\":\"\"", $output);
    }

}