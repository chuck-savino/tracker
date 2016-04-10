<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Issue_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * get_all_issues_summary()
     * 
     * just the columns needed to display an index of the issues
     * 
     * @return type
     */
    public function get_all_issues_summary()
    {
        $this->db->select('id, name, status, assigned_to, os, updated_at');
        $query = $this->db->get('issues');        
        return $query->result_array();
    }  
    
    public function get_issue_by_id($id)
    {
        //$this->db->select('id, name, status, assigned_to, os, updated_at');
        $query = $this->db->get_where('issues',array('id'=>$id));        
        return $query->result_array();
    }    
    
    public function delete_issue($id)
    {
        $this->db->delete('issues',array('id'=>$id));
        $chk =  $this->db->affected_rows();
        return $chk == 0  ? false : true;
    }
    
    public function update_issue($data)
    {
        $this->db->set('created_at','NOW()',FALSE);
        $this->db->insert('issues', $data);
        $chk =  $this->db->affected_rows();
        return $chk == 0  ? false : true;
        
    }        
            
}

