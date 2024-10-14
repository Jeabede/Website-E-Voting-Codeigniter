<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventVote extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model, helper, dan library yang dibutuhkan
        $this->load->model('EventVoteModel');
        $this->load->model('KandidatEventVoteModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    // Method untuk menampilkan halaman daftar EventVote
    public function index() {
        $data['EventVote'] = $this->EventVoteModel->get_all_kategori_event_vote();
        $data['kandidat'] = $this->KandidatEventVoteModel->get_all_KandidatEventVote();
        $this->load->view('EventVote/index', $data);
    }
}