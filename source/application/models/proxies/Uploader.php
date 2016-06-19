<?php


class Uploader extends CI_Model {
    
        public function uploadSlika($novoImeSlike, $image){
                /*Cuvanje slike:*/
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('path');
        $this->load->helper(array('form', 'url'));
       // $image_path = realpath(APPPATH.'img/');
        
        $image_path =  APPPATH;
        $pom=strpos($image_path,"application");
        $image_path=substr($image_path, 0, $pom);
        $image_path=$image_path."img";
        //echo  $image_path;
        
		$config['upload_path'] = "".$image_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '10000';
		$config['max_height']  = '10000';
                //$config['encrypt_name'] = TRUE;
                $config['file_name'] = $novoImeSlike;
		$this->load->library('upload', $config);
                
                //$this->upload->do_upload();
                $this->upload->do_upload($image);

       $upload_data = $this->upload->data(); 
       return $upload_data;
        
    }
    
}



	