<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan semua data kategori
    public function get_all_kategori() {
        $query = $this->db->get('kategori');
        return $query->result_array();
    }

    // Fungsi untuk menambahkan kategori
    public function add_kategori($data) {
        $this->db->insert('kategori', $data);
    }

    // Fungsi untuk mengedit kategori
    public function update_kategori($id_kategori, $data) {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }

    // Fungsi untuk menghapus kategori
    public function delete_kategori($id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }
}