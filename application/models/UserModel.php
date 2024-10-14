<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mendaftar akun baru
    public function register($data) {
        return $this->db->insert('Userv', $data);
    }

    public function update_token($user_id, $new_token) {
        $data = array(
            'token' => $new_token
        );
        $this->db->where('id_user', $user_id);
        $this->db->update('userv', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    // Fungsi untuk memeriksa keberadaan username dalam database
    public function check_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('Userv');
        if ($query->num_rows() > 0) {
            return $query->row_array();  // Kembalikan baris pertama sebagai array
        }
        return false;
    }

    public function check_secure($jawaban) {
        $this->db->where('jawaban', $jawaban);
        $query = $this->db->get('Userv');
        if ($query->num_rows() > 0) {
            return $query->row_array();  // Kembalikan baris pertama sebagai array
        }
        return false;
    }

    public function check_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('Userv');
        if ($query->num_rows() > 0) {
            return $query->row_array();  // Kembalikan baris pertama sebagai array
        }
        return false;
    }

    public function get_security_question($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('Userv');
        if ($query->num_rows() > 0) {
            return $query->row()->pertanyaan;
        }
        return false;  // Jika tidak ada pertanyaan yang ditemukan
    }
       

    // Fungsi untuk melakukan autentikasi pengguna
    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('Userv');
        return $query->row_array();
    }

    // Fungsi untuk mendapatkan semua data voters
    public function get_all_users() {
        $query = $this->db->get('Userv');
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan data pengguna berdasarkan ID
    public function get_user_by_id($id) {
        $this->db->where('id_user', $id);
        $query = $this->db->get('Userv');
        return $query->row_array();
    }

    // Fungsi untuk menambahkan token pada akun pengguna
    public function add_token($id_user, $token) {
        $this->db->set('token', 'token+'.$token, FALSE);
        $this->db->where('id_user', $id_user);
        return $this->db->update('Userv');
    }

    // Fungsi untuk mengurangi token pada akun pengguna setelah melakukan voting
    public function deduct_token($id_user, $token) {
        $this->db->set('token', 'token-'.$token, FALSE);
        $this->db->where('id_user', $id_user);
        return $this->db->update('Userv');
    }

    public function get_token_count($id_user) {
        $this->db->select_sum('token');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('Userv');
        return $query->row()->token;
    }

    // Fungsi untuk mengupdate password pengguna
    public function update_password($id_user, $new_password) {
    $data = array(
        'password' => $new_password  // Asumsikan bahwa password telah di-hash sebelumnya jika perlu
    );
    $this->db->where('id_user', $id_user);
    $this->db->update('Userv', $data);
    $new_password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);

    return ($this->db->affected_rows() > 0) ? true : false;
    }
    

  
  
}