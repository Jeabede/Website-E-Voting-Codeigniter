<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model, helper, dan library yang dibutuhkan
        $this->load->model('VotingModel');
        $this->load->model('UserModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
        if  (empty($this->session->userdata('user_id'))) {
            redirect('auth/login');
        }
    }

    // Method untuk menampilkan halaman voting
    public function index() {
        // Mendapatkan daftar kandidat dari model
        $data['EventVote'] = $this->EventVoteModel->get_all_kategori_event_vote();
        $data['kandidat'] = $this->KandidatEventVoteModel->get_all_KandidatEventVote();
        $this->load->view('voting/index', $data);
    }

    // Method untuk melakukan proses voting
    public function proses_vote() {
        $data['EventVote'] = $this->EventVoteModel->get_all_kategori_event_vote();
        $data['kandidat'] = $this->KandidatEventVoteModel->get_all_KandidatEventVote();
        // Validasi form
        $this->form_validation->set_rules('id_kandidat[]', 'Kandidat', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman voting dengan pesan error
            $data['error'] = 'Pilih minimal satu kandidat.';
            $this->load->view('voting/index', $data);
        } else {

            $token_session = $this->session->userdata('token');

            if($token_session > 0){

                $user_id = $this->session->userdata('user_id');
                $id_kandidat = $this->input->post('id_kandidat');
                $id_event_vote = $this->input->post('id_event_vote');

                $new_token = intval($token_session) - 1; //potong token vote
                $update_success = $this->UserModel->update_token($user_id, $new_token);

                if ($update_success) {

                    $this->session->set_userdata('token', $new_token);

                    // Jika validasi berhasil, lakukan proses voting

                        $data = array(
                            'id_user' => $user_id,
                            'id_kandidat' => $id_kandidat,
                            'id_kategori_event_vote' => $id_event_vote

                        );
                        $this->VotingModel->vote($data);

                    // Redirect ke halaman hasil voting setelah voting selesai
                    $this->load->view('voting/selesai');
                }else{
                    $data['error'] = 'Token anda tidak cukup untuk melakukan votings.';
                    $this->load->view('voting/index', $data);
                }
            }else{
                $data['error'] = 'Token anda tidak cukup untuk melakukan voting. <br> <b>Harap cek kembali Token anda. Jika Token anda sudah terisi tetapi tidak bisa melakukan voting harap melakukan Logout lalu Login kembali</b>';
                $this->load->view('voting/index', $data);
            }
        }
    }
}