<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->database();
    }

    /**
     * create_user function.
     * 
     * @access public
     * @param mixed $username
     * @param mixed $email
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function create_user($username, $email, $password) {

        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $this->hash_password($password),
            'created_at' => date('Y-m-j H:i:s'),
        );

        return $this->db->insert('users', $data);
    }

    /**
     * resolve_user_login function.
     * 
     * @access public
     * @param mixed $username
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function resolve_user_login($email, $password) {

        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('is_admin', 0);
        $this->db->where('is_deleted', 0);
        $hash = $this->db->get()->row('password');

        return $this->verify_password_hash($password, $hash);
    }

    /**
     * resolve_user_login function.
     * 
     * @access public
     * @param mixed $username
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function resolve_admin_login($email, $password) {

        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('is_admin', 1);
        $hash = $this->db->get()->row('password');

        return $this->verify_password_hash($password, $hash);
    }

    /**
     * get_user_id_from_username function.
     * 
     * @access public
     * @param mixed $username
     * @return int the user id
     */
    public function get_user_id_from_email($email) {

        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('status', 1);
        $this->db->where('email', $email);

        return $this->db->get()->row('id');
    }

    /**
     * get_user function.
     * 
     * @access public
     * @param mixed $user_id
     * @return object the user object
     */
    public function get_user($user_id) {

        $this->db->from('users');
        $this->db->where('id', $user_id);
        return $this->db->get()->row();
    }

    /**
     * get_user function.
     * 
     * @access public
     * @param mixed $user_id
     * @return object the user object
     */
    public function check_user_status($user_id) {

        $this->db->from('users');
        $this->db->where('id', $user_id);
        $this->db->where('status', 1);
        return $this->db->get()->row();
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
     * verify_password_hash function.
     * 
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
    private function verify_password_hash($password, $hash) {

        return password_verify($password, $hash);
    }


    /*     * ***********get medication list************* */

    public function get_patient_medication($login_user_id) {
        $this->db->select('m.*,u.firstname,u.lastname,', FALSE);
        $this->db->from('medication m');
        $this->db->join('users u', 'u.id = m.patient_id');
        return $this->db->get()->result_array();
    }
    /*     * ***********get medication according to login user************* */
    public function get_patient_medication_by_id($login_user_id) {
        $this->db->select('m.*,u.firstname,u.lastname,', FALSE);
        $this->db->from('medication m');
        $this->db->join('users u', 'u.id = m.patient_id');
        $this->db->where('m.patient_id', $login_user_id);
        return $this->db->get()->result_array();
    }

 
    /*******Patient for medicine delivery*******/
     public function get_all_patient_for_delivery($user_id) {
        $this->db->select('m.*,u.firstname,u.lastname,', FALSE);
        $this->db->from('medication m');
        $this->db->join('users u', 'u.id = m.patient_id');
        $this->db->where('m.shipping_method', 1);
         $this->db->where('u.parent_user_id',$user_id);
        return $this->db->get()->result_array();
    }
       /******patient for medicine collection *********/
 public function get_all_patient_for_collection($user_id) {
        $this->db->select('m.*,u.firstname,u.lastname,', FALSE);
        $this->db->from('medication m');
        $this->db->join('users u', 'u.id = m.patient_id');
        $this->db->where('m.shipping_method', 2);
         $this->db->where('u.parent_user_id',$user_id);
        return $this->db->get()->result_array();
    }
    
    /********get managed repeat*********/
    public function get_managed_repeat($user_id){
        $this->db->select('m.*,u.firstname,u.lastname,', FALSE);
        $this->db->from('medication m');
        $this->db->join('users u', 'u.id = m.patient_id');       
        $this->db->where('u.parent_user_id',$user_id);
        return $this->db->get()->result_array();
    }
    /******get all patient by employee************/
    
    public function get_all_patient_by_employeeid($user_id){
        $this->db->select("Count(id) AS totaluser");
        $this->db->from("users");
        $this->db->where('parent_user_id',$user_id);
        return $this->db->get()->row();
    }
    
     /*******Count Patient for medicine delivery*******/
     public function get_all_delivery_by_employeeid($user_id) {
        $this->db->select('Count(m.id) AS totalmedication', FALSE);
        $this->db->from('medication m');
        $this->db->join('users u', 'u.id = m.patient_id');
        $this->db->where('m.shipping_method', 1);
         $this->db->where('u.parent_user_id',$user_id);
       return $this->db->get()->row();
    }
       /******Count patient for medicine collection *********/
   public function get_all_collection_by_employeeid($user_id) {
        $this->db->select('Count(m.id) AS totalmedication,', FALSE);
        $this->db->from('medication m');
        $this->db->join('users u', 'u.id = m.patient_id');
        $this->db->where('m.shipping_method', 2);
         $this->db->where('u.parent_user_id',$user_id);
       return $this->db->get()->row();
    }
    
    /********Count get managed repeat*********/
    public function get_all_managedrepeat_by_employeeid($user_id){
        $this->db->select('Count(m.id) AS totalmedication,', FALSE);
        $this->db->from('medication m');
        $this->db->join('users u', 'u.id = m.patient_id');       
        $this->db->where('u.parent_user_id',$user_id);
        return $this->db->get()->row();
    }
}
