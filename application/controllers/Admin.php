<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model, helper, dan library yang dibutuhkan
        $this->load->model('PembelianModel');
        $this->load->model('UserModel');
        $this->load->model('EventVoteModel');
        $this->load->model('KandidatEventVoteModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
        if  (empty($this->session->userdata('admin_id'))) {
            redirect('auth/login_admin');
        }
    }

    // Method untuk menampilkan halaman dashboard admin
    public function dashboard() {
        // Anda bisa tambahkan logika bisnis untuk halaman dashboard di sini
        $this->load->view('admin/dashboard');
    }

    // Method untuk menampilkan halaman kelola pembelian admin
    public function pembelian() {
        // Mendapatkan daftar pembelian yang belum divalidasi dari model
        $data['pembelian'] = $this->PembelianModel->get_unvalidated_pembelian();
        $this->load->view('admin/pembelian', $data);
    }

    // Method untuk menampilkan halaman kelola users admin
    public function admin_user() {
        // Mendapatkan daftar user dari model
        $data['admin_users'] = $this->Admin_user_model->get_all_admin_users();
        $this->load->view('admin/admin_user', $data);
    }

    // Method untuk menampilkan halaman kelola voters
    public function admin_voters() {
        // Mendapatkan daftar voters dari model
        $data['admin_voters'] = $this->UserModel->get_all_users();
        $this->load->view('admin/admin_voters', $data);
    }

    // Method untuk menambahkan user baru oleh admin
    public function tambah_user() {
        // Validasi form
        $this->form_validation->set_rules('username_adm', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman tambah user
            $this->load->view('admin/tambah_user');
        } else {
            // Jika validasi berhasil, lakukan proses penambahan user
            $data = array(
                'username_adm' => $this->input->post('username_adm'),
                'password' => $this->input->post('password')
            );

            if ($this->UserModel->register($data)) {
                // Jika penambahan user berhasil, arahkan kembali ke halaman kelola users
                redirect('admin/users');
            } else {
                // Jika penambahan user gagal, tampilkan pesan error
                $data['error'] = 'Penambahan user gagal. Silakan coba lagi.';
                $this->load->view('admin/tambah_user', $data);
            }
        }
    }
    
    // Method untuk menampilkan halaman hasil voting
    public function hasil_voting() {
        // Mendapatkan jumlah suara per kandidat dari model
        $data['votes'] = $this->VotingModel->count_votes_per_kandidat();
        $data['kandidat'] = $this->VotingModel->get_all_KandidatEventVote();
        $this->load->view('admin/hasil_voting', $data);
    }

    public function validasi_pembayaran($id_pembelian) {
        $data_pembelian = $this->PembelianModel->get_pembelian_by_id($id_pembelian);
        if ($data_pembelian && $data_pembelian['status_validasi'] == 0) {  // Tambahkan pemeriksaan status validasi
            if ($this->PembelianModel->update_status_validasi($id_pembelian, 1)) {  // Set status validasi ke 1
                // Update token user
                $user_id = $data_pembelian['id_user'];
                $data_user = $this->UserModel->get_user_by_id($user_id);
                if ($data_user) {
                    $new_token = intval($data_user['token']) + intval($data_pembelian['jumlah_token']);
                    if ($this->UserModel->update_token($user_id, $new_token)) {
                        $this->session->set_flashdata('success', 'Konfirmasi pembayaran berhasil.');
                    } else {
                        $this->session->set_flashdata('error', 'Gagal mengupdate token.');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Konfirmasi pembayaran gagal.');
            }
        } else {
            $this->session->set_flashdata('error', 'Data pembelian tidak ditemukan atau sudah divalidasi.');
        }
        redirect('admin/pembelian');
    }

    public function EventVote() {
        $data['EventVote'] = $this->EventVoteModel->get_all_kategori_event_vote();
        $data['kandidat'] = $this->KandidatEventVoteModel->get_all_KandidatEventVote();
        $this->load->view('EventVote/index', $data);
    }

    public function KandidatEventVote() {
        $data['EventVote'] = $this->EventVoteModel->get_all_kategori_event_vote();
        $data['kandidat'] = $this->KandidatEventVoteModel->get_all_KandidatEventVote();
        $this->load->view('EventVote/index', $data);
    }

    // Method untuk menampilkan halaman tambah EventVote
    public function tambahEventVote() {
        // Validasi form
        $this->form_validation->set_rules('nama_EventVote', 'Nama Event Vote', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman tambah EventVote
            $this->load->view('admin/EventVote/tambah');
        } else {
            // Jika validasi berhasil, lakukan proses penambahan EventVote
            $data = array(
                'nama_event' => $this->input->post('nama_EventVote'),
                'deskripsi' => $this->input->post('deskripsi'),
                // Anda bisa tambahkan proses upload foto EventVote di sini
            );

            if ($this->EventVoteModel->tambah_kategori_event_vote($data)) {
                // Jika penambahan berhasil, arahkan kembali ke halaman daftar EventVote
                redirect('admin/EventVote');
            } else {
                // Jika penambahan gagal, tampilkan pesan error
                $data['error'] = 'Penambahan Event Vote gagal. Silakan coba lagi.';
                $this->load->view('admin/EventVote/tambah', $data);
            }
        }
    }

    // Method untuk menampilkan halaman edit EventVote
    public function editEventVote($id) {
        // Validasi ID EventVote
        if (!is_numeric($id)) {
            show_404();
        }

        // Validasi form
        $this->form_validation->set_rules('nama_EventVote', 'Nama Event Vote', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman edit EventVote
            $data['EventVote'] = $this->EventVoteModel->get_kategori_event_vote_by_id($id);
            $this->load->view('admin/EventVote/edit', $data);
        } else {
            // Jika validasi berhasil, lakukan proses pengeditan EventVote
            $data = array(
                'nama_event' => $this->input->post('nama_EventVote'),
                'deskripsi' => $this->input->post('deskripsi'),
                // Anda bisa tambahkan proses upload foto EventVote di sini
            );

            if ($this->EventVoteModel->edit_kategori_event_vote($id, $data)) {
                // Jika pengeditan berhasil, arahkan kembali ke halaman daftar EventVote
                redirect('admin/EventVote');
            } else {
                // Jika pengeditan gagal, tampilkan pesan error
                $data['error'] = 'Pengeditan Event Vote gagal. Silakan coba lagi.';
                $this->load->view('admin/EventVote/edit', $data);
            }
        }
    }

    // Method untuk menghapus EventVote
    public function hapusEventVote($id) {
        // Validasi ID EventVote
        if (!is_numeric($id)) {
            show_404();
        }

        // Lakukan proses penghapusan EventVote
        if ($this->EventVoteModel->hapus_kategori_event_vote($id)) {
            // Jika penghapusan berhasil, arahkan kembali ke halaman daftar EventVote
            redirect('admin/EventVote');
        } else {
            // Jika penghapusan gagal, tampilkan pesan error
            $data['error'] = 'Penghapusan Event Vote gagal. Silakan coba lagi.';
            $this->load->view('admin/EventVote/index', $data);
        }
    }
    
    // Method untuk menampilkan halaman tambah kandidat
    public function tambahKandidatEventVote() {

        $data['EventVote'] = $this->EventVoteModel->get_all_kategori_event_vote();

        // Validasi form
        $this->form_validation->set_rules('nama_kandidat', 'Nama Kandidat', 'required');
        $this->form_validation->set_rules('id_event_vote', 'Event Vote', 'required');
        $this->form_validation->set_rules('visi_misi', 'Visi Misi', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman tambah kandidat
            $this->load->view('admin/KandidatEventVote/tambah', $data);
        } else {
            // Jika validasi berhasil, lakukan proses penambahan kandidat

            // Konfigurasi upload foto
            $config['upload_path']   = './foto_kandidat/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 2048; // maksimal 2MB
            $config['file_name']     = 'foto_' . time(); // nama file menggunakan timestamp

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $foto_kandidat = $upload_data['file_name']; // nama file setelah di-upload

                // Data untuk ditambahkan ke database
                $data = array(
                    'nama' => $this->input->post('nama_kandidat'),
                    'id_kategori_event_vote' => $this->input->post('id_event_vote'),
                    'visi_misi' => $this->input->post('visi_misi'),
                    'foto_kandidat' => $foto_kandidat // nama file foto
                );

                if ($this->KandidatEventVoteModel->tambah_KandidatEventVote($data)) {
                    // Jika penambahan berhasil, arahkan kembali ke halaman daftar kandidat
                    redirect('admin/EventVote');
                } else {
                    // Jika penambahan gagal, tampilkan pesan error
                    $data['error'] = 'Penambahan kandidat gagal. Silakan coba lagi.';
                    $this->load->view('admin/KandidatEventVote/tambah', $data);
                }
            } else {
                // Jika upload foto gagal, tampilkan pesan error
                $data['error'] = $this->upload->display_errors();
                $this->load->view('admin/KandidatEventVote/tambah', $data);
            }
        }
    }


    // Method untuk menampilkan halaman edit kandidat
    public function editKandidatEventVote($id) {
        // Validasi ID kandidat
        if (!is_numeric($id)) {
            show_404();
        }
        $data['EventVote'] = $this->EventVoteModel->get_all_kategori_event_vote();

        // Validasi form
        $this->form_validation->set_rules('nama_kandidat', 'Nama Kandidat', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman edit kandidat
            $data['KandidatEventVote'] = $this->KandidatEventVoteModel->get_KandidatEventVote_by_id($id);
            $this->load->view('admin/KandidatEventVote/edit', $data);
        } else {

            // Konfigurasi upload foto
            $config['upload_path']   = './foto_kandidat/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 2048; // maksimal 2MB
            $config['file_name']     = 'foto_' . time(); // nama file menggunakan timestamp

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $foto_kandidat = $upload_data['file_name']; // nama file setelah di-upload
                

                // Data untuk ditambahkan ke database
                $data = array(
                    'nama' => $this->input->post('nama_kandidat'),
                    'id_kategori_event_vote' => $this->input->post('id_event_vote'),
                    'visi_misi' => $this->input->post('visi_misi'),
                    'foto_kandidat' => $foto_kandidat // nama file foto
                );

                if ($this->KandidatEventVoteModel->edit_KandidatEventVote($id, $data)) {
                    // Jika penambahan berhasil, arahkan kembali ke halaman daftar kandidat
                    redirect('admin/EventVote');
                } else {
                    // Jika penambahan gagal, tampilkan pesan error
                    $data['error'] = 'Edit kandidat gagal. Silakan coba lagi.';
                    $this->load->view('admin/KandidatEventVote/edit', $data);
                }
            } else {
                // Jika upload foto gagal, tampilkan pesan error
                $data['error'] = $this->upload->display_errors();
                $this->load->view('admin/KandidatEventVote/edit', $data);
            }


        }
    }

    // Method untuk menghapus kandidat
    public function hapusKandidatEventVote($id) {
        // Validasi ID kandidat
        if (!is_numeric($id)) {
            show_404();
        }

        // Lakukan proses penghapusan kandidat
        if ($this->KandidatEventVoteModel->hapus_KandidatEventVote($id)) {
            // Jika penghapusan berhasil, arahkan kembali ke halaman daftar kandidat
            redirect('admin/EventVote');
        } else {
            // Jika penghapusan gagal, tampilkan pesan error
            $data['error'] = 'Penghapusan kandidat gagal. Silakan coba lagi.';
            $this->load->view('admin/EventVote/index', $data);
        }
    }

}