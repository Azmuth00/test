<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function check_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); 
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
?>
