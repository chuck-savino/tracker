<?php defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'bootstrap_auth/Base_controller.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Issues extends Base_controller 
{
     public function __construct()
    {
        parent::__construct();
        $this->load->model('issue_model');
        $this->load->model('status_model');
        $this->load->model('user_model');
       
    }
    
    public function index()
    {
         $data['v'] = 'issue_edit';
         $data['title'] = 'New Issue';
         $data = $this->get_list_options($data);
         $this->load->view('bootstrap_auth/template',$data);
    }        
    
    public function show_all_issues()
    {
        $data['title'] = "All Issues";
        $data['issues'] = $this->issue_model->get_all_issues_summary();
        $data['v'] = 'issues';
        $data = $this->get_list_options($data);
        $this->load->view('bootstrap_auth/template',$data);
    }
    
    public function get_issue($id=NULL)
    {
        $data['title'] = "Issue";
        $data['issue'] = $this->issue_model->get_issue_by_id($id);
        $data['v'] = 'issue';
        $this->load->view('bootstrap_auth/template',$data);
    }
    
    public function show_all_issues2()
    {
        $data['title'] = "All Issues";
        $data['issues'] = $this->issue_model->get_all_issues_summary();
        $data['v'] = 'issues';
        $this->load->view('bootstrap_auth/template',$data);
    }
    
    public function show_all_issues_json()
    {
        $i = $this->issue_model->get_all_issues_summary();
        $data['data']=$i;
        echo json_encode($data);
    }
    
    public function delete_issue($id = NULL)
    {
        try 
        {
            $chk = $this->issue_model->delete_issue($id);
            if($chk === false)
            {
                $data['message'] = '#20160408-1409: The issue id ' . $id . ' could not be deleted.';
                $data['msg_type'] = 'alert-danger';
            }
            else 
            {
                $data['message'] = 'The issue id ' . $id . ' was deleted successfully.';
                $data['msg_type'] = 'alert-success';
            }
            
            $data['issues'] = $this->issue_model->get_all_issues_summary();
            $data['v'] = 'issues';
            $data['title'] = 'All Issues';
            $this->load->view('bootstrap_auth/template',$data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
            
    } 
    
    public function update_issue($id = NULL)
    {
        $data['v'] = 'issue_edit';
        $data = $this->get_list_options($data);
        
        if($id === NULL)
        {
            $data['v'] = 'issue_edit';
            $data['title'] = 'New Issue';
            if(!empty(validation_errors()))
            {    
                $data['message'] = validation_errors();
                $data['msg_type'] = 'alert-danger';
            }    
            $this->load->view('bootstrap_auth/template',$data);
            return;
        }
        else 
        {
            $data['issue'] = $this->issue_model->get_issue_by_id($id);
        }
                
        //setup validation
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('name','Title','required');
        $this->form_validation->set_rules('status','Status','required|callback_dropdown_check');
        $this->form_validation->set_rules('assigned_to','Assigned To','required|callback_dropdown_check');
        $this->form_validation->set_rules('os','OS','required');
        $this->form_validation->set_rules('url','URL','required');
        $this->form_validation->set_rules('authenticated','Authenticated','required');
        $this->form_validation->set_rules('error_msg','Error Message','required');
        $this->form_validation->set_rules('expected_output','Expected Output','required');
       
        if($this->form_validation->run() == FALSE)
        {
            $data['v'] = 'issue_edit';
            $data['title'] = 'Edit Issue';
            if(!empty(validation_errors()))
            {    
                $data['message'] = validation_errors();
                $data['msg_type'] = 'alert-danger';
            }    
            $this->load->view('bootstrap_auth/template',$data);
            return;
        }
        else 
        {
            $issue = array(
                'name' => $this->input->post('name'),
                'status' => $this->input->post('status'),
                'assigned_to' => $this->input->post('assigned_to'),
                'os' => $this->input->post('os'),
                'url' => $this->input->post('url'),
                'authenticated' => $this->input->post('authenticated'),
                'error_msg' => $this->input->post('error_msg'),
                'expected_output' => $this->input->post('expected_output'),
                'notes' => $this->input->post('notes')
            );
            
            $chk = $this->issue_model->update_issue($id,$issue);
            
            $data['message'] = 'Issue updated';
            $data['msg_type'] = 'alert-success';
            $data['issues'] = $this->issue_model->get_all_issues_summary();
            $data['v'] = 'issues';
            $data['title'] = 'All Issues';
            $this->load->view('bootstrap_auth/template',$data);
        }
        
    } 
    
    public function dropdown_check($str)
    {
        if($str == '0')
        {
            $this->form_validation->set_message('dropdown_check','The %s field is required.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }    
    }   
    
    private function get_list_options($data)
    {
        $data['statuses'] = $this->status_model->get_all_status_values();
        $data['users'] = $this->user_model->get_all_users_list();
        
        return $data;
    }        
}

