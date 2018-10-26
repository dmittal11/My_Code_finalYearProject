<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Front extends CI_Controller {

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
		$this->load->model('Common_model');
		// Load facebook library
        $this->load->library('facebook');
        // load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->lang->load('message','english');
		$this->load->helper(array('security','string','file','commons_helper'));
        if ($this->session->userdata('logged_in') === true) {  redirect('/dashboard'); }   
		
	}

	/**
	 * index function.
	 * 
	 * @access public
	 * @return void
	 */
	public function index() {	
	
	
        $data['email']  = '';
        $data['password']  = '';
        $data['rememberme']  = 0;


		if( isset($_COOKIE["schulterblick"]) ) {
         
	         parse_str($_COOKIE["schulterblick"]);

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
				$this->load->view('front/login',$data);
				
			} else {		
			
				// set variables from the form
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				
				if ($this->user_model->resolve_user_login($email, $password)) {
					
					$user_id = $this->user_model->get_user_id_from_email($email);
					$user    = $this->user_model->get_user($user_id);
                   
	                if($user_id!='' && $user->status=='1'){

								$userdata = array(
						        'user_id'  => (int)$user->id,
						        'email'     => (string)$user->email,
						        'user_name'  => (string)$user->firstname. ' ' .(string)$user->lastname,
						        'logged_in'     => (bool)true,
						        'is_confirmed'  => (bool)$user->is_confirmed,
						        'is_admin'     => (bool)$user->is_admin	,
						        'member_type'     => (string)$user->member_type	        
						        );

				                $this->session->set_userdata($userdata);


				                if($this->input->post('rememberme') == 1){

				                    $cookie_name = "schulterblick";
									//expiriry time. 86400 = 1 day (86400*30 = 1 month)
									$expiry = time() + (86400 * 30);
									//setting cookie variable
									setcookie ($cookie_name, 'usr='.$email.'&hash='.$password, $expiry);
				                }else{

				                	  setcookie("schulterblick", "", time() - 3600);
				                }             

				                if($this->session->userdata('url')!='')redirect($this->session->userdata('url'));
	                            else redirect('/dashboard');

		            }else{	                 

	                    // login failed
						$data['error'] = $this->lang->line('login_unsuccessful_not_active');				
						// send error to the view
						$this->load->view('front/login',$data);
		            }
					
		    } else {		
					// login failed
					$data['error'] = $this->lang->line('login_wrong_user_password');				
					// send error to the view
					$this->load->view('front/login',$data);
					
				}
				
			} 

	    }else{

            $this->load->view('front/login',$data);

	    }

	}



	/**
	 * check valid email function.
	 * 
	 * @access public
	 * @return void
	 */
	public function email_check($str){

        $user_id = $this->user_model->get_user_id_from_email($str); 

        if($user_id=='' ||  $user_id == 0){
        
                $this->form_validation->set_message('email_check', $this->lang->line('email_check'));
                return FALSE;
        }else{
                return TRUE;
        }
    }

   	/**
	 * forgot password function.
	 * 
	 * @access public
	 * @return void
	 */
    public function forgot() {
          
        if($this->input->server('REQUEST_METHOD') == 'POST'){ 
		
			// set validation rules
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
			
			if ($this->form_validation->run() == false) {  
	            	
				// validation not ok, send validation errors to the view
				$this->load->view('front/forgot');
				
			} else {			
				    // set variables from the form
				    $email = $this->input->post('email');
				    $user_id = $this->user_model->get_user_id_from_email($email); 
				    $user  = $this->user_model->get_user($user_id); 

				    //generat unique string
		            $uniqidStr = md5(uniqid(mt_rand()));
		            
		            //update data with forgot pass code
		            $conditions = array(
		                'id' => $user_id
		            );
		            $data = array(
		                'forgot_pass_identity' => $uniqidStr
		            );

			        $this->Common_model->update("users",$data, $conditions);                       

	                $resetPassLink = base_url().'resetpassword?fp_code='.$uniqidStr;
					 
	                $mailContent = 'Dear '.$user->firstname.',<br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.   <br/>To reset your password, visit the following link: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>        <br/><br/>Regards,  <br/>schulterblick';


					$this->email->from(EMAIL, USERNAME);
					$this->email->to($email);
					/*$this->email->cc('another@another-example.com');
					$this->email->bcc('them@their-example.com');*/
					$this->email->set_mailtype("html");
					$this->email->subject( $this->lang->line('email_forgot_subject'));
					$this->email->message($mailContent);

					$response = $this->email->send();

					if($response){

					    redirect('/forgot_success');
					
					}else{
						// login failed
						$data['error'] = $this->lang->line('forgot_error');// 'Some problem occurred, please try again.';				
						// send error to the view
						$this->load->view('front/forgot',$data);

					}	
			} 

	    }else{

           $this->load->view('front/forgot');

	    }             
		
	}
   
   	/**
	 * forgot success function.
	 * 
	 * @access public
	 * @return void
	 */
   public function forgot_success() {      


           $this->load->view('front/forgot_success');          
		
	}
    
    /**
	 * check code function.
	 * 
	 * @access public
	 * @return void
	 */
	public function code_check($fp_code){

        $conditions = array(
                             'forgot_pass_identity' => $fp_code
                           );

        $response = $this->Common_model->select_where('users',$conditions); 

        if(!$response){
        
                $this->form_validation->set_message('code_check', $this->lang->line('error_code_check'));
                return FALSE;
        }else{
                return TRUE;
        }
    }


    	/**
	 * reset password function.
	 * 
	 * @access public
	 * @return void
	 */
	public function registration() {	    	            

          
        if($this->input->server('REQUEST_METHOD') == 'POST'){ 

			// set validation rules
		    $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'New Password', 'required|matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'New Password Confirmation', 'required'); 
			
				if ($this->form_validation->run() == false) {  
		            	
					// validation not ok, send validation errors to the view
					$this->load->view('front/registration');
					
				}else{	

		                $data=array(
	                	              'gender'=>'0',	                                 
		                              'firstname'=>'',
		                              'lastname'=>'',
		                              'password'=>trim($this->hash_password($this->input->post('password'))),
		                              'email'=>$this->input->post('email'),
		                              'company'=>'',
		                              'rood'=>'',
		                              'number'=>'',
		                              'zip'=>'',
		                              'place'=>'',
		                              'phone'=>'0',
		                              'fax'=>'0',
		                              'member_type'=>'Gold', 
		                              'is_admin'=>0, 
		                              'is_confirmed'=>1,
		                              'is_deleted'=>0,
		                              'created_at'=>date("Y-m-d H:i:s"),				                              
		                            );

		                	$result = $this->Common_model->insert('users',$data);					 
	                   
			                if($result > 0){ 

			                	$link = base_url();
					 
	                            $mailContent = 'Welcome Dear to Pharmacy <br/>
								<br/>below are your login details <br/> <br/>Username : '.$this->input->post('email').'
								<br/> Password : '.$this->input->post('password').'
								<br/>
								<br/>
								<br/> visit the following link to the login: <a href="'.$link.'">'.$link.'</a>
								<br/>
								<br/>Regards,
								<br/>Pharmacy';


									$this->email->from(EMAIL, USERNAME);
									$this->email->to($this->input->post('email'));								
									$this->email->set_mailtype("html");
									$this->email->subject($this->lang->line('account_creation_successful'));									
									$this->email->message($mailContent);

									$response = $this->email->send();


			                    $this->session->set_flashdata('success_message',$this->lang->line('account_creation_successful'));
			                    @redirect(base_url());

			                  
			                }else{
			                    $this->session->set_flashdata('error_message',$this->lang->line('common_error'));
			                    @redirect(base_url() . "registration"); 
			                }
           }

                			

	    }else{

            $this->load->view('front/registration');

	     }
             
		
    }



	/**
	 * reset password function.
	 * 
	 * @access public
	 * @return void
	 */
	public function resetpassword() {	    	            

          
        if($this->input->server('REQUEST_METHOD') == 'POST'){ 

    	    $data['fp_code'] = $this->input->post('fp_code');		
			// set validation rules
			$this->form_validation->set_rules('password', 'New Password', 'required|matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'New Password Confirmation', 'required'); 
            $this->form_validation->set_rules('fp_code', 'Confirmation Code', 'required|callback_code_check'); 
			
				if ($this->form_validation->run() == false) {  
		            	
					// validation not ok, send validation errors to the view
					$this->load->view('front/resetpassword',$data);
					
				}else{		
					 
					 //check whether identity code exists in the database
					$password = $this->input->post('password');
					$fp_code = $this->input->post('fp_code');

	       
	                //update data with new password
	                $conditions = array(
	                    'forgot_pass_identity' => $fp_code
	                );
	                $value = array(
	                    'password' => $this->hash_password($password)
	                );                

	                $update = $this->Common_model->update("users",$value, $conditions);

	                if($update){

	                    $response = $this->Common_model->select_where('users',$conditions);	                   
	                    $this->session->set_flashdata('success_message', $this->lang->line('success_msg_resetpassword') );
                        if($response['is_admin']==1)redirect(base_url().'admin'); else redirect(base_url());

	                }else{
	                   
	                    $data['error'] = $this->lang->line('forgot_error'); //'Some problem occurred, please try again.';
	                    $this->load->view('front/resetpassword',$data);
	                }

                } 				

	    }else{
	    	$data['fp_code'] = $this->input->get('fp_code');
            $this->load->view('front/resetpassword',$data);

	     }
             
		
    }

    /**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}

		 /**
	 * ajax change status function.
	 * 
	 * @access public
	 * @return void
	 */	
	public function ajax_check_email() {
		
        // send error to the view
        if (!$this->input->is_ajax_request()) {
          exit('No direct script access allowed');
         }

        $email = $this->input->get('email');

        $res = $this->Common_model->select_where("users",array("email"=>$email));  

        if($res) echo 1;
        else echo 0;		
	}

	
	
}
