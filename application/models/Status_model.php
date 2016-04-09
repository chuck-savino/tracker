<?php defined('BASEPATH') or exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Status_model extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all_statuses()
    {
        $query = $this->db->get('statuses');
        return $query->result_array();
    }
  
    public function get_all_status_values()
    {
        $this->db->select('status');
        $this->db->order_by('status');
        $query = $this->db->get('statuses');
        
        $q = $query->result_array();
        
        $stat_list = [];
        foreach($q as $key => $value)
        {
            $stat_list[$value['status']]=$value['status'];
            
        }        
        
        return $stat_list;
        
    }        
    
    public function delete_status($status)
    {
        $this->db->delete('statuses',array('status'=>$status));
        $chk =  $this->db->affected_rows();
        return $chk == 0  ? false : true;
        
    }        
    
    public function add_new_status($data)
    {
        $this->db->set('created_at','NOW()',FALSE);
        $this->db->insert('statuses',$data);
        $chk =  $this->db->affected_rows();
        return $chk == 0  ? false : true;
    }        
    
}

