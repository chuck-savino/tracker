<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class News_model_test extends TestCase
    {
        
        public function setUp()
        {
            $this->resetInstance();
            $this->CI->load->model('News_model');
            $this->obj = $this->CI->News_model;
        }   
        
        function test_show()
        {
            
            $id = 1;
            $news =  $this->obj->get_news($id);
            $data['title'] = $news['title'];
            $this->assertTrue($data['title'] == 'title 1');
        }
    }
