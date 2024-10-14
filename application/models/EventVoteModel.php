<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventVoteModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan semua data kandidat
    public function get_all_kategori_event_vote() {
        $query = $this->db->get('kategori_event_vote');
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan data kandidat berdasarkan ID
    public function get_kategori_event_vote_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('kategori_event_vote');
        return $query->row_array();
    }

    // Fungsi untuk menambahkan kandidat baru
    public function tambah_kategori_event_vote($data) {
        return $this->db->insert('kategori_event_vote', $data);
    }

    // Fungsi untuk mengedit data kandidat
    public function edit_kategori_event_vote($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kategori_event_vote', $data);
    }

    // Fungsi untuk menghapus data kandidat
    public function hapus_kategori_event_vote($id) {
        $this->db->where('id', $id);
        return $this->db->delete('kategori_event_vote');
    }
}