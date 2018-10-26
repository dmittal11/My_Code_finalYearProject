<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class DashboardController extends CI_Controller {

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
        $this->load->library('form_validation', 'image_lib');
        $this->load->model('Common_model');
        $this->load->helper(array('security', 'string', 'file', 'commons_helper'));
        $this->lang->load('message', 'english');
        $this->load->library('email');

        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if ($this->session->userdata('logged_in') != true) {

            $userdata = array('url' => $actual_link);
            $this->session->set_userdata($userdata);
            redirect('/admin');
        }

        if ($this->session->userdata('is_admin') == 0)
            redirect('./');
    }

    /**
     * index function load dashboard.
     * 
     * @access public
     * @return void
     */
    public function index() {

        $data['page_title'] = "Dashboard";
        $data['active_menu'] = "dashboard";

        // send error to the view
        $conditions = array('is_deleted' => 0);

        $conditions = array('is_admin' => 0, 'is_deleted' => 0);
        $data['userscount'] = $this->Common_model->select_count_where('users', $conditions);

        $delivery_cond = array('shipping_method' => 1);
        $collection_cond = array('shipping_method' => 2);
        $staff_cond = array('member_type' => 'employee');
        $data['staff'] = $this->Common_model->select_count_where('users', $staff_cond);
        $data['all'] = $this->Common_model->select_count('medication');
        $data['delivery'] = $this->Common_model->select_count_where('medication', $delivery_cond);
        $data['collection'] = $this->Common_model->select_count_where('medication', $collection_cond);

        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/include/footer');
    }

    /**
     * user list function.
     * 
     * @access public
     * @return void
     */
    public function userlist() {

        // send error to the view
        $data['page_title'] = "User List";
        $data['active_menu'] = "userlist";

        $data['usertype'] = $this->input->get('usertype');
        if ($data['usertype']) {
            $data['usertype'] = $this->input->get('usertype');
        } else {
            $data['usertype'] = "";
        }

        if ($data['usertype'] == '')
            $conditions = array('is_admin' => 0, 'is_deleted' => 0);
        else
            $conditions = array('is_admin' => 0, 'is_deleted' => 0, 'member_type' => $data['usertype']);

        $data['user_list'] = $this->Common_model->select_all_where('users', $conditions);


        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/userlist', $data);
        $this->load->view('admin/include/footer');
    }

    /**
     * ajax delete records function.
     * 
     * @access public
     * @return void
     */
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

    /**
     * ajax change status function.
     * 
     * @access public
     * @return void
     */
    public function soft_delete_record() {

        // send error to the view
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $conditions = array('id' => $id);
        $data = array('is_deleted' => 1);
        $res = $this->Common_model->update($table, $data, $conditions);
        if ($res)
            echo true;
        else
            echo false;
    }

    /**
     * ajax change status function.
     * 
     * @access public
     * @return void
     */
    public function update_status() {

        // send error to the view
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $status = $this->input->post('status');
        $conditions = array('id' => $id);
        $data = array('status' => $status);
        $res = $this->Common_model->update($table, $data, $conditions);
        if ($res)
            echo true;
        else
            echo false;
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

        $res = $this->Common_model->select_where("users", array("email" => $email));

        if ($res)
            echo 1;
        else
            echo 0;
    }

    /**
     * ajax change order status function.
     * 
     * @access public
     * @return void
     */
    public function change_member_type() {

        // send error to the view

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $this->input->post('user_id');
        $member_type = $this->input->post('member_type');
        $conditions = array('id' => $id);
        $data = array('member_type' => $member_type);
        $res = $this->Common_model->update("users", $data, $conditions);
        if ($res)
            echo true;
        else
            echo false;
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

            redirect('/admin');
        } else {

            // there user was not logged in, we cannot logged him out,
            // redirect him to site root
            redirect('/admin/dashboard');
        }
    }

    /**
     * check email  function.
     * 
     * @access public
     * @return void
     */
    //pravin.m@cisinlabs111.com

    public function email_check($str, $id) {

        $user_id = $this->user_model->get_user_id_from_email($str);

        //print_r($user_id);die;

        if ($user_id != '' && $user_id != $id) {

            $this->form_validation->set_message('email_check', $this->lang->line('account_creation_duplicate_email'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * update profile function.
     * 
     * @access public
     * @return void
     */
    public function updateprofile() {

        //print_r(pathinfo("/home/ramki/ramki 1.pdf",PATHINFO_FILENAME));die;
        $data['active_menu'] = ($this->uri->segment(3) != '') ? "updateusers" : "profile";
        $data['page_title'] = "Profile";

        $user_id = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : $this->session->userdata('user_id');
        $data['user_info'] = $this->user_model->get_user($user_id);


        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $password = $data['user_info']->password;
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            $this->form_validation->set_rules('firstname', 'Fristname', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');

            if ($this->input->post('password') != '') {
                $this->form_validation->set_rules('password', 'New Password', 'required|matches[cpassword]');
                $this->form_validation->set_rules('cpassword', 'New Password Confirmation', 'required');
                $password = trim($this->hash_password($this->input->post('password')));
            }

            $is_admin = 1;

            if ($data['user_info']->is_admin == '0') {
                $this->form_validation->set_rules('member_type', 'Member type', 'trim|required');
                $is_admin = 0;
            }
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|matches[cemail]|callback_email_check[' . $data['user_info']->id . ']');
            $this->form_validation->set_rules('cemail', 'Confirmation Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('rood', 'rood', 'trim|required');
            $this->form_validation->set_rules('number', 'number', 'trim|required');
            $this->form_validation->set_rules('zip', 'zip', 'trim|required');
            $this->form_validation->set_rules('place', 'place', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('admin/include/header', $data);
                $this->load->view('admin/updateprofile', $data);
                $this->load->view('admin/include/footer');
            } else {

                $img = $_FILES['avatar'];
                $image = $this->uploadImage($img, 'avatar', 'users');

                $data = array(
                    'gender' => trim($this->input->post('gender')),
                    'firstname' => trim($this->input->post('firstname')),
                    'lastname' => trim($this->input->post('lastname')),
                    'password' => $password,
                    'email' => $this->input->post('email'),
                    'rood' => trim($this->input->post('rood')),
                    'number' => trim($this->input->post('number')),
                    'zip' => trim($this->input->post('zip')),
                    'place' => trim($this->input->post('place')),
                    'phone' => intval($this->input->post('phone')),
                    'fax' => trim($this->input->post('fax')),
                    'updated_at' => date("Y-m-d H:i:s"),
                );

                if (!empty($image)) {

                    $data['avatar'] = $image;

                    if ($is_admin == '1') {
                        $userdata = array('avatar' => (string) $image);
                        $this->session->set_userdata($userdata);
                    }
                }

                if ($is_admin == '0') {

                    $data['member_type'] = $this->input->post('member_type');
                } else {

                    $userdata = array('user_name' => (string) $this->input->post('firstname') . ' ' . (string) $this->input->post('lastname'));
                    $this->session->set_userdata($userdata);
                }

                $conditions = array(
                    'id' => $user_id
                );

                $result = $this->Common_model->update("users", $data, $conditions);

                if ($result > 0) {

                    $this->session->set_flashdata('success_message', $this->lang->line('profile_update_success'));
                    $user_id = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : '';

                    @redirect(base_url() . "admin/updateprofile/" . $user_id);
                } else {
                    $this->session->set_flashdata('error_message', $this->lang->line('common_error'));
                    $user_id = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : '';
                    @redirect(base_url() . "admin/updateprofile/" . $user_id);
                }
            }
        } else {
            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/updateprofile', $data);
            $this->load->view('admin/include/footer');
        }
    }

    /**
     * add user function.
     * 
     * @access public
     * @return void
     */
    public function adduser() {

        $data['page_title'] = "Add New User";
        $data['active_menu'] = "adduser";
        $conditions = array('status' => 1, 'is_deleted' => 0);
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
            $this->form_validation->set_rules('firstname', 'Fristname', 'trim|required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'New Password', 'required|matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'New Password Confirmation', 'required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('rood', 'rood', 'trim|required|xss_clean');
            $this->form_validation->set_rules('number', 'number', 'trim|required|xss_clean');
            $this->form_validation->set_rules('zip', 'zip', 'trim|required|xss_clean');
            $this->form_validation->set_rules('place', 'place', 'trim|required|xss_clean');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
            $this->form_validation->set_rules('member_type', 'Member type', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                // send error to the view
                $this->load->view('admin/include/header', $data);
                $this->load->view('admin/adduser');
                $this->load->view('admin/include/footer');
            } else {

                $img = $_FILES['avatar'];
                $image = $this->uploadImage($img, 'avatar', 'users');

                $data = array(
                    'gender' => trim($this->input->post('gender')),
                    'firstname' => trim($this->input->post('firstname')),
                    'lastname' => trim($this->input->post('lastname')),
                    'password' => trim($this->hash_password($this->input->post('password'))),
                    'email' => $this->input->post('email'),
                    'rood' => trim($this->input->post('rood')),
                    'number' => trim($this->input->post('number')),
                    'zip' => trim($this->input->post('zip')),
                    'place' => trim($this->input->post('place')),
                    'phone' => intval($this->input->post('phone')),
                    'fax' => trim($this->input->post('fax')),
                    'member_type' => $this->input->post('member_type'),
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
                    $this->email->subject('Pharmacy Registration');
                    $this->email->message($mailContent);
                    $response = $this->email->send();
                    mail($this->input->post('email'), "Pharmacy Registration", $mailContent);
                    $this->session->set_flashdata('success_message', $this->lang->line('users_insert_success'));
                    @redirect(base_url() . "admin/userlist");
                } else {
                    $this->session->set_flashdata('error_message', $this->lang->line('common_error'));
                    @redirect(base_url() . "admin/adduser");
                }
            }
        } else {

            // send error to the view
            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/adduser');
            $this->load->view('admin/include/footer');
        }
    }

    /**
     * upload image function.
     * 
     * @access public
     * @return void
     */
    public function uploadImage($image, $img_name, $folder) {

        if ($image['size'] > 0) {
            $image_type = strtolower($image['type']);
            $ext_arr = explode(".", $image['name']);
            if ($image_type != "image/gif" && $image_type != "image/jpeg" && $image_type != "image/jpg" && $image_type != "image/png") {
                /* $this->session->set_flashdata('error_message',$this->lang->line('image_validation_error'));                       
                  redirect(base_url() . "admin/adduser"); */
                echo "Please select valid extension image";
                exit;
            }
            $original_upload_path = './assets/images/' . $folder . '/original/';
            $resize_upload_path = './assets/images/' . $folder . '/resize/';
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
     * hash_password function.
     * 
     * @access private
     * @param mixed $password
     * @return string|bool could be a string on success, or bool false on failure
     */
    private function hash_password($password) {

        return password_hash($password, PASSWORD_BCRYPT);
    }

    /*     * *********get search result*************** */

    public function getsearchuser() {
        $data['page_title'] = "User List";
        $data['active_menu'] = "userlist";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $name = trim($this->input->post('username'));
        $address = trim($this->input->post('address'));
        $city = trim($this->input->post('city'));
        $orconditions = array();
        $conditions = array();
        $data['status'] = 1;
        if ($_POST) {
            $data['usertype'] = "";
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

            //$data['user_list'] = $this->Common_model->select_all_orwhere('users',$conditions,$orconditions);
            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/userlist', $data);
            $this->load->view('admin/include/footer', $data);
        } else {
            $data['usertype'] = $this->input->get('usertype');
            if ($data['usertype']) {
                $data['usertype'] = $this->input->get('usertype');
            } else {
                $data['usertype'] = "";
            }

            if ($data['usertype'] == '')
                $conditions = array('is_admin' => 0, 'is_deleted' => 0);
            else
                $conditions = array('is_admin' => 0, 'is_deleted' => 0, 'member_type' => $data['usertype']);

            $data['user_list'] = $this->Common_model->select_all_where('users', $conditions);
            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/userlist', $data);
            $this->load->view('admin/include/footer', $data);
        }
    }

    /*     * ********Managed Repeat************** */

    public function managedrepeat() {
        $data['active_menu'] = "managedrepeat";
        $data['page_title'] = "Managed Repeat";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $option = array(
            'select' => 'users.*,medication.*',
            'table' => 'users',
            'join' => array('medication' => 'medication.patient_id = users.id'),
            'where' => array('managed_repeat' => '1')
        );
        $data['medication_list'] = $this->Common_model->commonGet($option);
        $conditions = array('managed_repeat' => 1);
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/managedrepeat', $data);
        $this->load->view('admin/include/footer');
    }

    /*     * *****Patient for collection****************** */

    public function patientforcollection() {
        $data['active_menu'] = "patientforcollection";
        $data['page_title'] = "Patient For Collection";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];

        $option = array(
            'select' => 'users.*,medication.*',
            'table' => 'users',
            'join' => array('medication' => 'medication.patient_id = users.id'),
            'where' => array('shipping_method' => '2')
        );
        $data['medication_list'] = $this->Common_model->commonGet($option);
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/patientforcollection', $data);
        $this->load->view('admin/include/footer');
    }

    /*     * *****Patient for collection****************** */

    public function patientfordelivery() {
        $data['active_menu'] = "patientfordelivery";
        $data['page_title'] = "Patient For Delivery";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $option = array(
            'select' => 'users.*,medication.*',
            'table' => 'users',
            'join' => array('medication' => 'medication.patient_id = users.id'),
            'where' => array('shipping_method' => '1')
        );
        $data['medication_list'] = $this->Common_model->commonGet($option);
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/patientfordelivery', $data);
        $this->load->view('admin/include/footer');
    }

    /*     * *****Contact book***************** */

    public function contactbook() {
        $data['active_menu'] = "contactbook";
        $data['page_title'] = "Contact book";
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $conditions = array('is_admin' => 0, 'is_deleted' => 0, 'status' => 1);
        $data['user_list'] = $this->Common_model->select_all_where('users', $conditions);
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/contactbook', $data);
        $this->load->view('admin/include/footer');
    }

    /*     * *******view medication*************** */

    public function viewmedication() {
        $data['active_menu'] = ($this->uri->segment(3) != '') ? "viewmedication" : "View Medication";
        $data['page_title'] = "View Medication";
        $medication_id = $this->uri->segment(3);
        $medication_conditions = array(
            'id' => $medication_id,
        );
        $userdata = $this->session->userdata();
        $data['user_id'] = $userdata['user_id'];
        $data['medication'] = $this->Common_model->select_where('medication', $medication_conditions);
        $user_conditions = array('is_admin' => 0, 'is_deleted' => 0, 'status' => 1, 'parent_user_id' => $data['user_id']);
        $data['user'] = $this->Common_model->select_where('users', $user_conditions);
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/viewmedication', $data);
        $this->load->view('admin/include/footer');
    }

}
