<?php

error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class UserController extends CI_Controller {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('pagination');
        $this->load->helper(array('url'));
        $this->load->model('user_model');
        $this->load->model('Common_model');
        $this->lang->load('message', 'english');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->helper(array('security', 'string', 'file', 'commons_helper'));

        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if ($this->session->userdata('logged_in') != true) {

            $userdata = array('url' => $actual_link);
            $this->session->set_userdata($userdata);
            redirect(base_url());
        }

        if ($this->session->userdata('is_admin') == 1)
            redirect('/admin');
        $st = $this->user_model->check_user_status($this->session->userdata('user_id'));

        if ($st) {

            $userdata = array(
                'user_name' => (string) $st->firstname . ' ' . (string) $st->lastname,
                'member_type' => (string) $st->member_type,
                'parent_user_id' => $st->parent_user_id
            );
            $this->session->set_userdata($userdata);
        } else {
            $this->logout();
        }
    }

    /**
     * Dashboard function.
     * 
     * @access public
     * @return void
     */
    public function index() {
  
        $data['active'] = "dashboard";
        $data['title'] = "Dashboard";
        $userdata = $this->session->userdata();
        $member_type = $userdata['member_type'];
        if ($member_type == 'Employee') {
            $data['userscount'] = $this->user_model->get_all_patient_by_employeeid($userdata['user_id']);
            $data['repeat'] = $this->user_model->get_all_managedrepeat_by_employeeid($userdata['user_id']);
            $data['collection'] = $this->user_model->get_all_collection_by_employeeid($userdata['user_id']);
            $data['delivery'] = $this->user_model->get_all_delivery_by_employeeid($userdata['user_id']);
        }
        if ($member_type == 'Patient') {
            $all_cond = array('patient_id' => $userdata['user_id']);
            $delivery_cond = array('patient_id' => $userdata['user_id'], 'shipping_method' => 1);
            $collection_cond = array('patient_id' => $userdata['user_id'], 'shipping_method' => 2);

            $data['all'] = $this->Common_model->select_count_where('medication', $all_cond);
            $data['delivery'] = $this->Common_model->select_count_where('medication', $delivery_cond);
            $data['collection'] = $this->Common_model->select_count_where('medication', $collection_cond);
        }
        $this->load->view('front/include/header', $data);
        $this->load->view('front/dashboard', $data);
        $this->load->view('front/include/footer');
    }

    /**
     * check email function.
     * 
     * @access public
     * @return void
     */
    public function email_check($str, $id) {

        $user_id = $this->user_model->get_user_id_from_email($str);

        if ($user_id != '' && $user_id != $id) {

            $this->form_validation->set_message('email_check', $this->lang->line('account_creation_duplicate_email'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * update user profile function.
     * 
     * @access public
     * @return void
     */
    public function updateprofile() {

        $data['active'] = ($this->uri->segment(2) != '') ? "updateusers" : "profile";
        $data['title'] = "Update Profile";

        $data['user_info'] = $this->user_model->get_user($this->session->userdata('user_id'));

        $user_id = ($this->uri->segment(2) != '') ? $this->uri->segment(2) : $this->session->userdata('user_id');
        $data['user_info'] = $this->user_model->get_user($user_id);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $password = $data['user_info']->password;
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            $this->form_validation->set_rules('firstname', 'Fristname', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
            $this->form_validation->set_rules('nhs_number', 'NHS Number', 'trim|required|xss_clean');
            if ($this->input->post('password') != '') {
                $this->form_validation->set_rules('password', 'New Password', 'required|matches[cpassword]');
                $this->form_validation->set_rules('cpassword', 'New Password Confirmation', 'required');
                $password = trim($this->hash_password($this->input->post('password')));
            }

            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|matches[cemail]|callback_email_check[' . $data['user_info']->id . ']');
            $this->form_validation->set_message('is_unique', 'Email ID already exist please use another email id');
            $this->form_validation->set_rules('cemail', 'Confirmation Email', 'trim|required|valid_email');


            $this->form_validation->set_rules('rood', 'rood', 'trim|required');
            $this->form_validation->set_rules('number', 'number', 'trim|required');
            $this->form_validation->set_rules('zip', 'zip', 'trim|required');
            $this->form_validation->set_rules('place', 'place', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            //$this->form_validation->set_rules('fax', 'fax', 'trim|required');
            $user_id = ($this->uri->segment(2) != '') ? $this->uri->segment(2) : $this->session->userdata('user_id');
            $data['user_info'] = $this->user_model->get_user($user_id);

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('front/include/header', $data);
//                $data['nav'] = $this->load->view('front/include/nav', $data, true);
                $this->load->view('front/updateprofile', $data);
                $this->load->view('front/include/footer');
            } else {

//                print_r( $_FILES['avatar']);die;
                $img = $_FILES['avatar'];
                $image = $this->uploadImage($img, 'avatar');
// print_r($image);die;
                $data = array(
                    'gender' => trim($this->input->post('gender')),
                    'firstname' => trim($this->input->post('firstname')),
                    'lastname' => trim($this->input->post('lastname')),
                    'nhs_number' => trim($this->input->post('nhs_number')),
                    'password' => $password,
                    'email' => $this->input->post('email'),
                    'rood' => trim($this->input->post('rood')),
                    'number' => trim($this->input->post('number')),
                    'zip' => trim($this->input->post('zip')),
                    'place' => trim($this->input->post('place')),
                    'phone' => intval($this->input->post('phone')),
                    'fax' => trim($this->input->post('fax')),
                    'is_admin' => 0,
                    'is_confirmed' => 1,
                    'is_deleted' => 0,
                    'created_at' => date("Y-m-d H:i:s"),
                );

                if (!empty($image)) {
                    $data['avatar'] = $image;
                }

                //$result = $this->Common_model->insert('users',$data);
                $conditions = array(
                    'id' => $user_id,
                );

                $result = $this->Common_model->update("users", $data, $conditions);

                if ($result > 0) {

                    $this->session->set_flashdata('profile_success_message', $this->lang->line('profile_update_success'));
                    @redirect(base_url() . "updateprofile/" . $user_id);
                } else {
                    $this->session->set_flashdata('error_message', $this->lang->line('common_error'));
                    $user_id = ($this->uri->segment(2) != '') ? $this->uri->segment(2) : '';
                    @redirect(base_url() . "updateprofile/" . $user_id);
                }
            }
        } else {
            $this->load->view('front/include/header', $data);
//            $data['nav'] = $this->load->view('front/include/nav', $data, true);
            $this->load->view('front/updateprofile', $data);
            $this->load->view('front/include/footer');
        }
    }

    /**
     * upload image function.
     * 
     * @access public
     * @return void
     */
    public function uploadImage($image, $img_name) {

        if ($image['size'] > 0) {
            $image_type = strtolower($image['type']);
            $ext_arr = explode(".", $image['name']);
            if ($image_type != "image/gif" && $image_type != "image/jpeg" && $image_type != "image/jpg" && $image_type != "image/png") {
                //$this->session->set_flashdata('err_msg','Please select valid extension image');                       
                // redirect(base_url() . "admin/adduser");
                echo "Please select valid extension image";
                exit;
            }
            $original_upload_path = './assets/images/users/original/';
            $resize_upload_path = './assets/images/users/resize/';
            $tmp_name = $image['tmp_name'];
            $idstr = substr(md5(rand()), 0, 7);

            $upload_data = upload_image($idstr, $img_name, $original_upload_path);
            $img_size = array('137x76', '136x136', '400x400', '222x222', '70x70', '600x600', '172x130');
            foreach ($img_size as $key => $value) {
                $size = explode("x", $value);
                $file_name = $idstr . "_" . $ext_arr[0] . "_" . $value . "." . $ext_arr[1];
                $upload_resize_data = upload_thumbnail_image($file_name, $tmp_name, $resize_upload_path, $size[1], $size[0]);
            }

            if (!empty($upload_data)) {
                $image = $upload_data . "." . $ext_arr[1];
            }
            return $image;
        }
    }

    /**
     * upload logo function.
     * 
     * @access public
     * @return void
     */
    public function uploadDoc($image, $img_name) {

        if ($image['size'] > 0) {
            $image_type = strtolower($image['type']);
            $ext_arr = explode(".", $image['name']);

            $original_upload_path = './assets/images/logos/';
            $tmp_name = $image['tmp_name'];
            $idstr = substr(md5(rand()), 0, 7);

            $upload_data = upload_doc($idstr, $img_name, $original_upload_path);

            if (!empty($upload_data)) {
                $image = $upload_data . "." . $ext_arr[1];
            }
            return $image;
        }
    }

    /**
     * ajax requerst for delete the user function.
     * 
     * @access public
     * @return void
     */
    public function deleteuseraccount() {

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $conditions = array(
            'id' => $this->session->userdata('user_id')
        );

        $data = array("status" => 0, 'updated_at' => date("Y-m-d H:i:s"));
        $result = $this->Common_model->update("users", $data, $conditions);

        if ($result > 0) {

            if ($this->session->userdata('logged_in') === true) {
                // remove session datas
                foreach ($this->session->userdata as $key => $value) {

                    $this->session->unset_userdata($key);
                }

                echo true;
            }
        } else {

            echo false;
        }
    }

    /**
     * logout function.
     * 
     * @access public
     * @return void
     */
    public function logout() {

        // create the data object
        $data = new stdClass();

        if ($this->session->userdata('logged_in') === true) {
            // remove session datas
            foreach ($this->session->userdata as $key => $value) {

                $this->session->unset_userdata($key);
            }

            redirect(base_url());
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

    public function patients() {
        // send error to the view
        $data['active'] = "patients";
        $data['title'] = "Patient list";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];

        $data['status'] = $this->input->get('status');

        if ($data['status'] == '')
            $conditions = array('is_admin' => 0, 'is_deleted' => 0, 'parent_user_id' => $data['user_id']);
        else
            $conditions = array('is_admin' => 0, 'is_deleted' => 0, 'status' => $data['status'], 'parent_user_id' => $data['user_id']);

        $data['user_list'] = $this->Common_model->select_all_where('users', $conditions);

        $this->load->view('front/include/header', $data);
        $this->load->view('front/patients', $data);
        $this->load->view('front/include/footer');
    }

    public function addpatients() {

        $data['active'] = "addpatients";
        $data['title'] = "Add new Patient";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
            $this->form_validation->set_rules('firstname', 'Fristname', 'trim|required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean');
            $this->form_validation->set_rules('nhs_number', 'NHS Number', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'New Password', 'required|matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'New Password Confirmation', 'required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('rood', 'rood', 'trim|required|xss_clean');
            $this->form_validation->set_rules('number', 'number', 'trim|required|xss_clean');
            $this->form_validation->set_rules('zip', 'zip', 'trim|required|xss_clean');
            $this->form_validation->set_rules('place', 'place', 'trim|required|xss_clean');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('front/include/header', $data);
//                $data['nav'] = $this->load->view('front/include/nav', $data, true);
                $this->load->view('front/addpatients', $data);
                $this->load->view('front/include/footer');
            } else {

                $img = $_FILES['avatar'];
                $image = $this->uploadImage($img, 'avatar', 'users');
                $userdata = $this->session->userdata();
                $parent_user_id = $userdata['user_id'];

                $data = array(
                    'gender' => trim($this->input->post('gender')),
                    'firstname' => trim($this->input->post('firstname')),
                    'nhs_number' => trim($this->input->post('nhs_number')),
                    'lastname' => trim($this->input->post('lastname')),
                    'password' => trim($this->hash_password($this->input->post('password'))),
                    'email' => $this->input->post('email'),
                    'parent_user_id' => $parent_user_id,
                    'rood' => trim($this->input->post('rood')),
                    'number' => trim($this->input->post('number')),
                    'zip' => trim($this->input->post('zip')),
                    'place' => trim($this->input->post('place')),
                    'phone' => intval($this->input->post('phone')),
                    'fax' => trim($this->input->post('fax')),
                    'member_type' => 'Patient',
                    'is_admin' => 0,
                    'is_confirmed' => 1,
                    'is_deleted' => 0,
                    'created_at' => date("Y-m-d H:i:s"),
                );


                if (!empty($image)) {
                    $data['avatar'] = $image;
                }

                $result = $this->Common_model->insert('users', $data);

                if ($result > 0) {
                    $mailContent = "";
                    $mailContent .='You have register with following details in Pharmacy';
                    $mailContent .='<br>';
                    $mailContent .='User email : ' . $this->input->post('email');
                    $mailContent .='<br>';
                    $mailContent .='Password : ' . $this->input->post('password');
                    $mailContent .='<br>';
                    $mailContent .='You can login from here Pharmacy Login';
                    $mailContent .='<br>';
                    $mailContent .='<br>';
                    $mailContent .='Best regards';
                    $mailContent .='<br>';
                    $mailContent .='Pharmacy';

                    $this->email->from(EMAIL, USERNAME);
                    $this->email->to($this->input->post('email'));
                    $this->email->set_mailtype("html");
                    $this->email->subject('User Registration');
                    $this->email->message($mailContent);
                    $response = $this->email->send();
                    $this->session->set_flashdata('success_message', 'Patient added successfully');
                    @redirect(base_url() . "addpatients");
                } else {
                    $this->session->set_flashdata('error_message', $this->lang->line('common_error'));
                    @redirect(base_url() . "addpatients");
                }
            }
        } else {
            $this->load->view('front/include/header', $data);
            $this->load->view('front/addpatients', $data);
            $this->load->view('front/include/footer');
        }
    }

    //delete user
    public function delete_record() {

        // send error to the view

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $conditions = array('id' => $id);
        $res = $this->Common_model->delete($table, $conditions);
        if ($res)
            echo true;
        else
            echo false;
    }

    //***********medication list***********//
    public function medication() {
        // send error to the view
        $data['active'] = "medication";
        $data['title'] = "Medication";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('user_id' => $userdata['user_id']);
        $data['medication_list'] = $this->Common_model->select_all_where('pharmacy_medication', $conditions);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/medication', $data);
        $this->load->view('front/include/footer');
    }

    /*     * *************add medication*********************** */

    public function addmedication() {
        $data['active'] = "addmedication";
        $data['title'] = "Add Medication";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];


        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('medication_name', 'Medication Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dosage', 'Dosage', 'trim|required|xss_clean');
            $this->form_validation->set_rules('use_of_direction', 'Use of direction', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('front/include/header', $data);
                $this->load->view('front/addmedication', $data);
                $this->load->view('front/include/footer');
            } else {
                $userdata = $this->session->userdata();
                $parent_user_id = $userdata['user_id'];
                $data = array(
                    'user_id' => trim($userdata['user_id']),
                    'medication_name' => trim($this->input->post('medication_name')),
                    'quantity' => trim($this->input->post('quantity')),
                    'dosage' => trim($this->input->post('dosage')),
                    'use_of_direction' => trim($this->input->post('use_of_direction')),
                    'create_date' => date("Y-m-d H:i:s"),
                );

                $result = $this->Common_model->insert('sb_pharmacy_medication', $data);
                if ($result > 0) {
                    $this->session->set_flashdata('success_message', 'Medication added successfully');
                    @redirect(base_url() . "addmedication");
                } else {
                    $this->session->set_flashdata('error_message', $this->lang->line('common_error'));
                    @redirect(base_url() . "addmedication");
                }
            }
        } else {
            $this->load->view('front/include/header', $data);
            $this->load->view('front/addmedication', $data);
            $this->load->view('front/include/footer');
        }
    }

    //***********medication list***********//
    public function mymedication() {
        // send error to the view
        $data['active'] = "mymedication";
        $data['title'] = "My Medication";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];

        $conditions = array('patient_id' => $data['user_id']);
        $managed_conditions = array('patient_id' => $data['user_id'], 'managed_repeat' => 1);
        $nonmanaged_conditions = array('patient_id' => $data['user_id'], 'managed_repeat' => 0);

        $data['medication_list'] = $this->user_model->get_patient_medication_by_id($data['user_id']);
        $data['managed_medication'] = $this->Common_model->select_all_where('medication', $managed_conditions);
        $data['nonmanaged_medication'] = $this->Common_model->select_all_where('medication', $nonmanaged_conditions);

        $this->load->view('front/include/header', $data);
        $this->load->view('front/mymedication', $data);
        $this->load->view('front/include/footer');
    }

    /*     * ********Drug Interaction************** */

    public function druginteraction() {
        $data['active'] = "druginteraction";
        $data['title'] = "Drug Interaction";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('id' => $data['user_id']);
        //$data['medication_list'] = $this->user_model->get_patient_medication_by_id($data['user_id']);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/druginteraction', $data);
        $this->load->view('front/include/footer');
    }

    /*     * ********Managed Repeat************** */

    public function managedrepeat() {
        $data['active'] = "managedrepeat";
        $data['title'] = "Managed Repeat";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('id' => $data['user_id']);
        $data['medication_list'] = $this->user_model->get_managed_repeat($data['user_id']);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/managedrepeat', $data);
        $this->load->view('front/include/footer');
    }

    /*     * *****Patient for collection****************** */

    public function patientforcollection() {
        $data['active'] = "patientforcollection";
        $data['title'] = "Patient For Collection";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $data['medication_list'] = $this->user_model->get_all_patient_for_collection($data['user_id']);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/patientforcollection', $data);
        $this->load->view('front/include/footer');
    }

    /*     * *****Patient for collection****************** */

    public function patientfordelivery() {
        $data['active'] = "patientfordelivery";
        $data['title'] = "Patient For Delivery";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $data['medication_list'] = $this->user_model->get_all_patient_for_delivery($data['user_id']);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/patientfordelivery', $data);
        $this->load->view('front/include/footer');
    }

    /*     * *****Diary***************** */

    public function diary() {
        $data['active'] = "diary";
        $data['title'] = "diary";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('id' => $data['user_id']);
        //$data['medication_list'] = $this->user_model->get_patient_medication_by_id($data['user_id']);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/diary', $data);
        $this->load->view('front/include/footer');
    }

    /*     * *****views***************** */

    public function views() {
        $data['active'] = "views";
        $data['title'] = "Views";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('id' => $data['user_id']);
        //$data['medication_list'] = $this->user_model->get_patient_medication_by_id($data['user_id']);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/views', $data);
        $this->load->view('front/include/footer');
    }

    /*     * *****Contact book***************** */

    public function contactbook() {
        $data['active'] = "contactbook";
        $data['title'] = "Contact book";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('is_admin' => 0, 'is_deleted' => 0, 'status' => 1, 'parent_user_id' => $data['user_id']);
        $data['user_list'] = $this->Common_model->select_all_where('users', $conditions);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/contactbook', $data);
        $this->load->view('front/include/footer');
    }

    /*     * *****History***************** */

    public function history() {
        $data['active'] = "history";
        $data['title'] = "History";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('id' => $data['user_id']);
        //$data['medication_list'] = $this->user_model->get_patient_medication_by_id($data['user_id']);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/contactbook', $data);
        $this->load->view('front/include/footer');
    }

    /*     * ************add medication*********************** */

    public function addmymedication() {
        $data['active'] = "addmymedication";
        $data['title'] = "Add My Medication";
        $userdata = $this->session->userdata();
        //print_r($userdata);die;
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('is_admin' => 0, 'is_deleted' => 0, 'status' => 1, 'parent_user_id' => $data['user_id']);
        $data['user_list'] = $this->Common_model->select_all_where('users', $conditions);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('medication_patient', 'Medication', 'trim|required|xss_clean');
            $this->form_validation->set_rules('medication_name', 'Medication Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dosage', 'Dosage', 'trim|required|xss_clean');
            $this->form_validation->set_rules('timeduration', 'Time Duration', 'trim|required|xss_clean');
            $this->form_validation->set_rules('use_of_direction', 'Use of direction', 'trim|required|xss_clean');
            $this->form_validation->set_rules('shipping_method', 'Shipping Method', 'trim|required|xss_clean');
            if ($this->input->post('shipping_method') == '1') {
                $this->form_validation->set_rules('pickup_date', 'Pickup date', 'trim|required|xss_clean');
            }

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('front/include/header', $data);
                $this->load->view('front/addmymedication', $data);
                $this->load->view('front/include/footer');
            } else {
                $userdata = $this->session->userdata();
                $parent_user_id = $userdata['user_id'];
                $pickup_date = $this->input->post('pickup_date');
                $format_pickup_date = date("Y-m-d H:i:s", strtotime($pickup_date));

                $data = array(
                    'medication_name' => trim($this->input->post('medication_name')),
                    'patient_id' => trim($this->input->post('medication_patient')),
                    'quantity' => trim($this->input->post('quantity')),
                    'dosage' => trim($this->input->post('dosage')),
                    'time_duration' => trim($this->input->post('timeduration')),
                    'use_of_direction' => trim($this->input->post('use_of_direction')),
                    'shipping_method' => trim($this->input->post('shipping_method')),
                    'pickup_date' => $format_pickup_date,
                    'is_deliever_soon' => trim($this->input->post('is_deliever_soon')),
                    'create_date' => date("Y-m-d H:i:s"),
                );

                $result = $this->Common_model->insert('sb_medication', $data);
                if ($result > 0) {
                    if ($userdata['parent_user_id']) {
                        $pharmacy_condition = array('id' => $userdata['parent_user_id'], 'is_deleted' => 0, 'is_admin' => 0);
                        $pharmacy_result = $this->Common_model->select_where('users', $pharmacy_condition);
                        $pharmacy_email = $pharmacy_result['email'];
                    } else {
                        $pharmacy_email = "";
                    }

                    if (trim($this->input->post('shipping_method')) == 1) {
                        $shipping_method = "Delivery";
                    } else {
                        $shipping_method = "Collect";
                    }
                    $mailContent = "";
                    $mailContent .='Hello';
                    $mailContent .='<br>';
                    $mailContent .='You have just Submitted following Medication';
                    $mailContent .='<br>';
                    $mailContent .='Medication Name : ' . $this->input->post('medication_name');
                    $mailContent .='<br>';
                    $mailContent .='Quantity : ' . $this->input->post('quantity');
                    $mailContent .='<br>';
                    $mailContent .='Dosage : ' . $this->input->post('dosage');
                    $mailContent .='<br>';
                    $mailContent .='Time Duration : ' . $this->input->post('timeduration');
                    $mailContent .='<br>';
                    $mailContent .='Use Of direction : ' . $this->input->post('use_of_direction');
                    $mailContent .='<br>';
                    $mailContent .='Shipping Method : ' . $shipping_method;
                    $mailContent .='<br>';
                    if (trim($this->input->post('shipping_method')) == 1) {
                        $mailContent .='Pickup Date : ' . $format_pickup_date;
                        $mailContent .='<br>';
                    }
                    $mailContent .='<br>';
                    $mailContent .='<br>';
                    $mailContent .='<br>';
                    $mailContent .='Best regards';
                    $mailContent .='<br>';
                    $mailContent .='Pharmacy';
                    $this->email->from(EMAIL, USERNAME);
                    $this->email->to($userdata['email']);
                    $this->email->cc($pharmacy_email);
                    $this->email->set_mailtype("html");
                    $this->email->subject('Submitted Medication Detail');
                    $this->email->message($mailContent);
                    $response = $this->email->send();
                    $this->session->set_flashdata('success_message', 'Medication added successfully');
                    @redirect(base_url() . "addmymedication");
                } else {
                    $this->session->set_flashdata('error_message', $this->lang->line('common_error'));
                    @redirect(base_url() . "addmymedication");
                }
            }
        } else {
            $this->load->view('front/include/header', $data);
            $this->load->view('front/addmymedication', $data);
            $this->load->view('front/include/footer');
        }
    }

    /*     * *******update user medication*********************** */

    public function updatemymedication() {
        $data['active'] = ($this->uri->segment(2) != '') ? "updatemymedication" : "update Medication";
        $data['title'] = "Update Medication";
        $medication_id = $this->uri->segment(2);
        $medication_conditions = array(
            'id' => $medication_id,
        );
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $data['medication'] = $this->Common_model->select_where('medication', $medication_conditions);
        $user_conditions = array('is_admin' => 0, 'is_deleted' => 0, 'status' => 1, 'parent_user_id' => $data['user_id']);
        $data['user_list'] = $this->Common_model->select_all_where('users', $user_conditions);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('medication_patient', 'Medication', 'trim|required|xss_clean');
            $this->form_validation->set_rules('medication_name', 'Medication Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dosage', 'Dosage', 'trim|required|xss_clean');
            $this->form_validation->set_rules('timeduration', 'Time Duration', 'trim|required|xss_clean');
            $this->form_validation->set_rules('use_of_direction', 'Use of direction', 'trim|required|xss_clean');
            $this->form_validation->set_rules('shipping_method', 'Shipping Method', 'trim|required|xss_clean');
            if ($this->input->post('shipping_method') == '1') {
                $this->form_validation->set_rules('pickup_date', 'Pickup date', 'trim|required|xss_clean');
            }
            $user_id = ($this->uri->segment(2) != '') ? $this->uri->segment(2) : $this->session->userdata('user_id');
            $data['medication'] = $this->user_model->get_user($user_id);

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('front/include/header', $data);
                $this->load->view('front/updatemymedication', $data);
                $this->load->view('front/include/footer');
            } else {
                $pickup_date = $this->input->post('pickup_date');
                $format_pickup_date = date("Y-m-d H:i:s", strtotime($pickup_date));
                $data = array(
                    'medication_name' => trim($this->input->post('medication_name')),
                    'patient_id' => trim($this->input->post('medication_patient')),
                    'quantity' => trim($this->input->post('quantity')),
                    'dosage' => trim($this->input->post('dosage')),
                    'time_duration' => trim($this->input->post('timeduration')),
                    'use_of_direction' => trim($this->input->post('use_of_direction')),
                    'shipping_method' => trim($this->input->post('shipping_method')),
                    'pickup_date' => $format_pickup_date,
                    'is_deliever_soon' => trim($this->input->post('is_deliever_soon')),
                );

                $conditions = array(
                    'id' => $medication_id,
                );

                $result = $this->Common_model->update("medication", $data, $conditions);

                if ($result > 0) {

                    $this->session->set_flashdata('success_message', "Medication updated successfully..!");
                    @redirect(base_url() . "updatemymedication/" . $medication_id);
                } else {
                    $this->session->set_flashdata('error_message', "Medication not updated successfully..!");
                    $user_id = ($this->uri->segment(2) != '') ? $this->uri->segment(2) : '';
                    @redirect(base_url() . "updatemymedication/" . $medication_id);
                }
            }
        } else {
            $this->load->view('front/include/header', $data);
            $this->load->view('front/updatemymedication', $data);
            $this->load->view('front/include/footer');
        }
    }

    /*     * *********update medication*********************** */

    public function updatemedication() {

        $data['active'] = ($this->uri->segment(2) != '') ? "updatemedication" : "update Medication";
        $data['title'] = "Update Medication";
        $medication_id = $this->uri->segment(2);
        $medication_conditions = array(
            'id' => $medication_id,
        );
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $data['medication'] = $this->Common_model->select_where('pharmacy_medication', $medication_conditions);

//        print_r($data['medication']);die;
        $user_conditions = array('is_admin' => 0, 'is_deleted' => 0, 'status' => 1, 'parent_user_id' => $data['user_id']);
        $data['user_list'] = $this->Common_model->select_all_where('users', $user_conditions);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('medication_name', 'Medication Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dosage', 'Dosage', 'trim|required|xss_clean');
            $this->form_validation->set_rules('use_of_direction', 'Use of direction', 'trim|required|xss_clean');
            $user_id = ($this->uri->segment(2) != '') ? $this->uri->segment(2) : $this->session->userdata('user_id');
            $data['medication'] = $this->user_model->get_user($user_id);

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('front/include/header', $data);
                $this->load->view('front/updatemedication', $data);
                $this->load->view('front/include/footer');
            } else {

                $data = array(
                    'user_id' => trim($userdata['user_id']),
                    'medication_name' => trim($this->input->post('medication_name')),
                    'quantity' => trim($this->input->post('quantity')),
                    'dosage' => trim($this->input->post('dosage')),
                    'use_of_direction' => trim($this->input->post('use_of_direction')),
                );

                $conditions = array(
                    'id' => $medication_id,
                );

                $result = $this->Common_model->update("pharmacy_medication", $data, $conditions);

                if ($result > 0) {

                    $this->session->set_flashdata('success_message', "Medication updated successfully..!");
                    @redirect(base_url() . "updatemedication/" . $medication_id);
                } else {
                    $this->session->set_flashdata('error_message', "Medication not saved");
                    $user_id = ($this->uri->segment(2) != '') ? $this->uri->segment(2) : '';
                    @redirect(base_url() . "updatemedication/" . $medication_id);
                }
            }
        } else {
            $this->load->view('front/include/header', $data);
            $this->load->view('front/updatemedication', $data);
            $this->load->view('front/include/footer');
        }
    }

    /*     * ******ajax  to update medication************ */

    public function updatemeditatus() {
        // send error to the view                
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post('pk');
        $value = $this->input->post('value');
        $data = array('medication_status' => $value);
        $conditions = array('id' => $id);
        $res = $this->Common_model->update("medication", $data, $conditions);

        if ($res)
            echo true;
        else
            echo false;
    }

    /*     * *******view medication*************** */

    public function viewmedication() {
        $data['active'] = ($this->uri->segment(2) != '') ? "viewmedication" : "View Medication";
        $data['title'] = "View Medication";
        $medication_id = $this->uri->segment(2);
        $medication_conditions = array(
            'id' => $medication_id,
        );
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $data['medication'] = $this->Common_model->select_where('medication', $medication_conditions);
        $user_conditions = array('is_admin' => 0, 'is_deleted' => 0, 'status' => 1, 'parent_user_id' => $data['user_id']);
        $data['user'] = $this->Common_model->select_where('users', $user_conditions);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/viewmedication', $data);
        $this->load->view('front/include/footer');
    }

    /*     * ******ajax  to update managed repeat************ */

    public function update_managed_repeat() {
        // send error to the view                
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post('id');
        $value = $this->input->post('status');
        $data = array('managed_repeat' => $value);
        $conditions = array('id' => $id);
        $res = $this->Common_model->update("medication", $data, $conditions);
        if ($res)
            echo true;
        else
            echo false;
    }

    /*     * *********get search result*************** */

    public function getsearchuser() {
        $data['active'] = "patients";
        $data['title'] = "Patient list";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $name = trim($this->input->post('username'));
        $address = trim($this->input->post('address'));
        $city = trim($this->input->post('city'));
        $orconditions = array();
        $conditions = array();
        $data['status'] = 1;
        /*  if($_POST['usr_addr_condition']=='and'){
          $conditions = array('is_admin' => 0,
          'is_deleted' => 0,
          'status' => $data['status'],
          'parent_user_id' => $data['user_id'],
          'firstname'=>$name,
          'rood'=>$address
          );
          }else{
          $orconditions = array('is_admin' => 0,
          'is_deleted' => 0,
          'status' => $data['status'],
          'parent_user_id' => $data['user_id'],
          'firstname'=>$name,
          'rood'=>$address
          );
          }
          if($_POST['addr_city_condition']=='and'){
          $conditions  = array('is_admin' => 0,
          'is_deleted' => 0,
          'status' => $data['status'],
          'parent_user_id' => $data['user_id'],
          'place'=>$city
          );
          }else{
          $orconditions = array('is_admin' => 0,
          'is_deleted' => 0,
          'status' => $data['status'],
          'parent_user_id' => $data['user_id'],
          'place'=>$city
          );
          } */
        //$data['user_list'] = $this->Common_model->select_all_orwhere('users',$conditions,$orconditions);
        $new_condtion = array();
        $new_or_condition = array();
        if ($_POST['usr_addr_condition'] == 'and' && $address !== "") {
            $new_condtion = array('firstname' => $name, 'rood' => $address);
        } else {
            $new_or_condition = array('firstname' => $name, 'rood' => $address);
        }

        if ($_POST['addr_city_condition'] == 'and' && $city !== "") {
            $new_condtion = array('firstname' => $name, 'rood' => $address, 'place' => $city);
        } else {
            $new_or_condition = array('firstname' => $name, 'rood' => $address, 'place' => $city);
        }

        $data['user_list'] = $this->Common_model->select_all_user_by_search('users', $new_condtion, $new_or_condition);

        $this->load->view('front/include/header', $data);
        $this->load->view('front/patients', $data);
        $this->load->view('front/include/footer');
    }

    /*     * **********My medication for collection***************** */

    public function medicationforcollect() {
        // send error to the view
        $data['active'] = "collection";
        $data['title'] = "Medication for Collect";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('patient_id' => $data['user_id'], 'shipping_method' => 2);
        $data['medication_list'] = $this->Common_model->select_all_where('medication', $conditions);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/medicationforcollect', $data);
        $this->load->view('front/include/footer');
    }

    /*     * **********My medication for Delivery***************** */

    public function medicationfordelivery() {
        // send error to the view
        $data['active'] = "delivery";
        $data['title'] = "Medication for Delivery";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('patient_id' => $data['user_id'], 'shipping_method' => 1);
        $data['medication_list'] = $this->Common_model->select_all_where('medication', $conditions);
        $this->load->view('front/include/header', $data);
        $this->load->view('front/medicationfordelivery', $data);
        $this->load->view('front/include/footer');
    }

}
