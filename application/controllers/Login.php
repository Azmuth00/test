<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Login');
    }

    public function index() {
        $this->load->view('login');
    }

    public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->M_Login->check_login($username, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            $response = array('status' => 'success');
        } else {
            $response = array('status' => 'error');
        }

        echo json_encode($response);
    }

}
?>
