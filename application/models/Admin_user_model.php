<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load database
        $this->load->database();
    }

    // Method untuk mendapatkan semua pengguna admin
    public function get_all_admin_users() {
        return $this->db->get('user_admin')->result_array();
    }

    // Method untuk menambahkan pengguna admin baru
    public function register($data) {
        return $this->db->insert('user_admin', $data);
    }

    // Method untuk menghapus pengguna admin
    public function delete($id_admin) {
        $this->db->where('id_admin', $id_admin);
        return $this->db->delete('user_admin');
    }
}