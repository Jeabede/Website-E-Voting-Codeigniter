<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VotingModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk memasukkan data voting baru
    public function vote($data) {
        return $this->db->insert('Voting', $data);
    }

    // Fungsi untuk mendapatkan data voting berdasarkan ID pengguna dan ID kandidat
    public function get_voting_by_user_and_kandidat($user_id, $id_kandidat) {
        $this->db->where('id_user', $user_id);
        $this->db->where('id_kandidat', $id_kandidat);
        $query = $this->db->get('Voting');
        return $query->num_rows();
    }

    // Fungsi untuk mendapatkan semua data kandidat
    public function get_all_KandidatEventVote() {
        $this->db->select('kandidat_event.id, kandidat_event.id_kategori_event_vote, kandidat_event.nama, kandidat_event.foto_kandidat, kandidat_event.visi_misi, kategori_event_vote.nama_event');
        $this->db->from('kandidat_event');
        $this->db->join('kategori_event_vote', 'kandidat_event.id_kategori_event_vote = kategori_event_vote.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan jumlah suara per kandidat
    public function count_votes_per_kandidat() {
        $this->db->select('id_kandidat, COUNT(*) as total_suara');
        $this->db->group_by('id_kandidat');
        $query = $this->db->get('Voting');
        return $query->result_array();
    }

    public function get_riwayat_vote_by_user($user_id) {
        $this->db->where('id_user', $user_id);
        return $this->db->get('Voting')->result_array();
    }    
}