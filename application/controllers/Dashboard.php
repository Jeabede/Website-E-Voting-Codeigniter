<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model yang dibutuhkan
        $this->load->model('PembelianModel');
        $this->load->model('VotingModel');
        $this->load->model('UserModel');
    }

    public function index() {
        // Mendapatkan data kandidat dari model
	    $data['pembelian'] = $this->PembelianModel->get_notifikasi_pembelian();

        // Mendapatkan jumlah token user dari model berdasarkan session user_id
        $user_id = $this->session->userdata('user_id');
        $data['jumlah_token'] = $this->UserModel->get_token_count($user_id);

        // Mendapatkan riwayat vote user dari model berdasarkan session user_id
        $data['riwayat_vote'] = $this->VotingModel->get_riwayat_vote_by_user($user_id);

        // Menampilkan view dashboard dengan data yang disiapkan
        $this->load->view('dashboard', $data);
    }
}