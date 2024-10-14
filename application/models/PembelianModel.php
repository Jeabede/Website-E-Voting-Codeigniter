<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembelianModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk melakukan pembelian token
    public function beli_token($data) {
        return $this->db->insert('Pembelian', $data);
    }

    // Fungsi untuk mendapatkan data pembelian berdasarkan ID pembelian
    public function get_pembelian_by_id($id) {
        $this->db->where('id_pembelian', $id);
        $query = $this->db->get('Pembelian');
        return $query->row_array();
    }

    // Fungsi untuk memperbarui status validasi pembelian
    public function update_status_validasi($id, $status) {
        $this->db->set('notifikasi', 1);
        $this->db->set('status_validasi', $status);
        $this->db->where('id_pembelian', $id);
        return $this->db->update('Pembelian');
    }

    public function update_status_validasi_hilang($id_user) {
        $this->db->set('notifikasi', 0);
        $this->db->where('id_user', $id_user);
        return $this->db->update('Pembelian');
    }

    // Method untuk mendapatkan daftar pembelian yang belum divalidasi
    public function get_unvalidated_pembelian() {
        return $this->db->get('Pembelian')->result_array();
    }

    public function get_notifikasi_pembelian() {
        $this->db->where('notifikasi', 1);
        return $this->db->get('Pembelian')->result_array();
    }

    // Fungsi untuk menambahkan token ke akun pengguna setelah pembelian divalidasi
    public function add_token($id_user, $token) {
        $this->db->set('token', 'token+'.$token, FALSE);
        $this->db->where('id_user', $id_user);
        return $this->db->update('Userv');
    }
}