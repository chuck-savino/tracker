<?php defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'bootstrap_auth/Base_controller.php';

/* 
 * Base_controller ensures that no methods can be executed unless the user is logged in
 * 
 */

Class Issues extends Base_controller 
{
     public function __construct()
    {
        parent::__construct();
        $this->load->model('issue_model');
        $this->load->model('status_model');
        $this->load->model('user_model');
        $this->load->library('ssp');
    }
    
    public function index()
    {        
        $data=[];
        $data = $this->prep_data_for_all_issues($data);
        $this->load->view('bootstrap_auth/template',$data);
    }
    
    public function show_issues_server_side()
    {        
        $data['title'] = "All Issues (server-side)";
        $data['v'] = 'issues_server_side';      
        $this->load->view('bootstrap_auth/template',$data);
    }

    public function get_all_issues_json()
    {        
     
        // DB table to use
        $table = 'issues2';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'name',  'dt' => 1 ),
            array( 'db' => 'status',   'dt' => 2 ),
            array( 'db' => 'fullname',     'dt' => 3 ),
            array( 'db' => 'os',     'dt' => 4 ),
            array(
                'db'        => 'updated_at',
                'dt'        => 5,
                'formatter' => function( $d, $row ) {
                    return date( 'm/d/Y h:i:s a', strtotime($d));
                }
            ),
            array( 'db'=>'os',     'dt' => 6 )        
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );

        $data = ssp::simple( $_GET, $sql_details, $table, $primaryKey, $columns );
        $options = $this->get_list_options($data);
       
        echo json_encode($data);

    }
    
    public function get_issue($id=NULL)
    {
        $data['title'] = "Issue";
        $data['issue'] = $this->issue_model->get_issue_by_id($id);
        $data = $this->get_list_options($data);
        $data['v'] = 'issue';        
        $this->load->view('bootstrap_auth/template',$data);
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
            
            $data = $this->prep_data_for_all_issues($data);
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
            $data['title'] = 'New Issue';
        }
        else 
        {
            $data['title'] = 'Edit Issue';
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
            if($chk === true)
            {    
                $data['message'] = "Issue $id updated";
                $data['msg_type'] = 'alert-success';
            }
            else 
            {
                $data['message'] = "Issue $id not updated updated";
                $data['msg_type'] = 'alert-danger';
            }
            $data = $this->prep_data_for_all_issues($data);
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
    
    private function prep_data_for_all_issues($data)
    {
        $data['title'] = "All Issues (client-side)";
        $data['issues'] = $this->issue_model->get_all_issues_summary();
        $data['v'] = 'issues';
        $data = $this->get_list_options($data);
        return $data;
    }
    
}