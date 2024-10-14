<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KandidatEventVoteModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan semua data kandidat
    public function get_all_KandidatEventVote() {
        $this->db->select('kandidat_event.id, kandidat_event.id_kategori_event_vote, kandidat_event.nama, kandidat_event.foto_kandidat, kandidat_event.visi_misi, kategori_event_vote.nama_event');
        $this->db->from('kandidat_event');
        $this->db->join('kategori_event_vote', 'kandidat_event.id_kategori_event_vote = kategori_event_vote.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan data kandidat berdasarkan ID
    public function get_KandidatEventVote_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('kandidat_event');
        return $query->row_array();

    }

    // Fungsi untuk menambahkan kandidat baru
    public function tambah_KandidatEventVote($data) {
        return $this->db->insert('kandidat_event', $data);
    }

    // Fungsi untuk mengedit data kandidat
    public function edit_KandidatEventVote($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kandidat_event', $data);
    }

    // Fungsi untuk menghapus data kandidat
    public function hapus_KandidatEventVote($id) {
        $this->db->where('id', $id);
        return $this->db->delete('kandidat_event');
    }
}