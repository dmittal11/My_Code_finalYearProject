<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');


class MyCustom404Ctrl extends CI_Controller  {
    public function __construct() {
        parent::__construct();
		$this->load->helper(array('url'));

    }

    public function index(){

        $this->output->set_status_header('404');

        // Make sure you actually have some view file named 404.php
        $this->load->view('front/404');
    }

}
?>