<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load database jika belum diload secara otomatis
        $this->load->database();
    }

    public function login($username_adm, $password) {
        $this->db->where('username_adm', $username_adm);
        $query = $this->db->get('User_admin');
    
        if ($query->num_rows() > 0) {
            $user_data = $query->row_array();
    
            // Periksa jika password hash cocok
            if (password_verify($password, $user_data['password'])) {
                return $user_data;  // Login sukses
            }
        }
        return false;  // Login gagal
    }
    
}
?>
