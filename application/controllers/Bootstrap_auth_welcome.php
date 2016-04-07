<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include 'Base_Controller.php';

class Bootstrap_auth_welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
         public function __construct()
        {
            
            parent::__construct();
            $this->load->config('ion_auth', TRUE);
            $this->load->library(array('bootstrap_auth/ion_auth'));
            
        }
        
	public function index()
	{
                
            $data['v'] = 'welcome_message';
            $this->load->view('bootstrap_auth/template',$data);
                 
	}
        
        public function demo()
        {
            echo 'this is the demo function';
        }        
}
