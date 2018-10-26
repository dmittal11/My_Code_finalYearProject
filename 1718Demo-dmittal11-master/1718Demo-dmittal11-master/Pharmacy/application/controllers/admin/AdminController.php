<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class AdminController extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		if ($this->session->userdata('logged_in') === true) {  redirect('/admin/dashboard'); }		
	}
	
	/**
	 * index function.
	 * 
	 * @access public
	 * @return void
	 */

	public function index() {		

		
	}

		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {

        $data['email']  = '';
        $data['password']  = '';
        $data['rememberme']  = 0;

		if( isset($_COOKIE["adminschulterblick"]) ) {
         
	        parse_str($_COOKIE["adminschulterblick"]);

	        $data['email'] = $usr;
	        $data['password'] = $hash;
	        $data['rememberme'] = 1;

		}

        if($this->input->server('REQUEST_METHOD') == 'POST'){ 
		
			// set validation rules
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		    $this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() == false) {  
	            	
				// validation not ok, send validation errors to the view
				$this->load->view('admin/login',$data);
				
			} else {			
				// set variables from the form
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				
				if ($this->user_model->resolve_admin_login($email, $password)) {
					
					$user_id = $this->user_model->get_user_id_from_email($email);
					$user    = $this->user_model->get_user($user_id);

					$userdata = array(
			        'user_id'  => (int)$user->id,
			        'email'     => (string)$user->email,
			        'user_name'  => (string)$user->firstname. ' ' .(string)$user->lastname,
			        'logged_in'     => (bool)true,
			        'is_confirmed'  => (bool)$user->is_confirmed,
			        'is_admin'     => (bool)$user->is_admin,
			        'avatar'     => (string)$user->avatar			        
			        );

	                $this->session->set_userdata($userdata);


	                if($this->input->post('rememberme') == 1){

	                    $cookie_name = "adminschulterblick";
						//expiriry time. 86400 = 1 day (86400*30 = 1 month)
						$expiry = time() + (86400 * 30);
						//setting cookie variable
						setcookie ($cookie_name, 'usr='.$email.'&hash='.$password, $expiry);
	                }else{

	                	  setcookie("adminschulterblick", "", time() - 3600);
	                }  

	               if($this->session->userdata('url')!='')redirect($this->session->userdata('url'));
	               else redirect('admin/dashboard');
					
				} else {		
					
					// login failed
					$data['error'] = $this->lang->line('login_wrong_user_password');				
					// send error to the view
					$this->load->view('admin/login',$data);
					
				}
				
			} 

	    }else{

           $this->load->view('admin/login',$data);

	     }
		
	}	

	
	
}
