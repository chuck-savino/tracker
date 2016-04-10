<?php defined('BASEPATH') or exit('No direct scripts access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'bootstrap_auth/Base_controller.php';

class Statuses extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('status_model');
    }
    
    public function add_status()
    {
        $data['title'] = "New Status";
        $data['v'] = 'status_edit';
        $this->load->view('bootstrap_auth/template',$data);
    }
    
    public function show_all_statuses()
    {
        $data['title'] = "All Statuses";
        $data['statuses'] = $this->status_model->get_all_statuses();
        $data['v'] = 'statuses';
        $this->load->view('bootstrap_auth/template',$data);
    }
    
    public function delete_status($status = NULL)
    {
        try 
        {
            $chk = $this->status_model->delete_status($status);
            if($chk === false)
            {
                $data['message'] = '#20160408-1109: The status ' . $status . ' could not be deleted.';
                $data['msg_type'] = 'alert-danger';
            }
            else 
            {
                $data['message'] = 'The status ' . $status . ' was deleted successfully.';
                $data['msg_type'] = 'alert-success';
            }
            
            $data['statuses'] = $this->status_model->get_all_statuses();
            $data['v'] = 'statuses';
            $data['title'] = 'All Statuses';
            $this->load->view('bootstrap_auth/template',$data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
            
    }
    
    public function form_submit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status','Status','required');
        
        if($this->form_validation->run() === FALSE)
        {
            $data['v'] = 'status_edit';
            $data['title'] = 'New Status';
            $data['message'] = validation_errors();
            $data['msg_type'] = 'alert-danger';
            $this->load->view('bootstrap_auth/template',$data);
            return;
        }    
        
        $status = $this->input->post('status');
        
        $data = array(
            'status'=>$status
        );
        
        $chk = $this->status_model->add_new_status($data);
        
        if($chk === false)
        {
            $data['message'] = '#20160408-1409: The status ' . $status . ' could not be added.';
            $data['msg_type'] = 'alert-danger';
        }
        else 
        {
            $data['message'] = 'The status ' . $status . ' was successfully added.';
            $data['msg_type'] = 'alert-success';
        }
        
        $data['statuses'] = $this->status_model->get_all_statuses();
        $data['v'] = 'statuses';
        $data['title'] = 'All Statuses';
        $this->load->view('bootstrap_auth/template',$data);
    }        
}

