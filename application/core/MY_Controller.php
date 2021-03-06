<?php defined ('BASEPATH') or exit('No direct scripts acces allowed');

/**
 * The only reason MY_Controller exists is to serve as a base class for Base_Controller
 * Any classes in MY_Controller.php will get autoloaded.
 */
class MY_Controller extends CI_Controller
{
   public function __construct() {
        parent::__construct();
    }
    
}

class Base_controller extends MY_Controller 
{
    
    protected $_logged_in;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->config('ion_auth', TRUE);
        $this->load->library(array('bootstrap_auth/ion_auth','form_validation'));
        $this->load->helper(array('url','language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        
        if (!$this->ion_auth->logged_in())
        {
            redirect('', 'refresh');
            $this->_logged_in = false;
        }
        else
        {
            $this->_logged_in = true;
        }
    }
    
    public function index()
    {
        
    }
    
    public function show_error($msg)
    {
        $data['message'] = $msg;
        $data['heading'] = $this->config->item('site_title','ion_auth') . " Error";
        $data['v'] = 'errors/html/error_general';
        $this->load->view('bootstrap_auth/template', $data);
    }
}