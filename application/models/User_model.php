<?php defined('BASEPATH') or 'No direct script access allowed';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all_users_list()
    {
        $this->db->select('users.id, users.first_name, users.last_name');
        $this->db->order_by('first_name, last_name');
        
        $query = $this->db->get('users');
        foreach($query->result_array() as $key => $value)
        {
            $users_list [$value['id']] = $value['first_name'] . ' ' . $value['last_name'];
        };
                
        return $users_list;
    }
        
}
