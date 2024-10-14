<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model, helper, dan library yang dibutuhkan
        $this->load->model('Admin_user_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        if  (empty($this->session->userdata('admin_id'))) {
            redirect('auth/login_admin');
        }
    }

    // Method untuk menampilkan halaman kelola pengguna admin
    public function index() {
        // Mendapatkan daftar pengguna admin dari model
        $data['admin_users'] = $this->Admin_user_model->get_all_admin_users();
        $this->load->view('admin/admin_user', $data);
    }

    // Method untuk menambahkan pengguna admin baru
    public function tambah() {
        // Validasi form
        $this->form_validation->set_rules('username_adm', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman tambah user admin
            $this->load->view('admin/tambah_admin_user');
        } else {
            // Jika validasi berhasil, lakukan proses penambahan user admin
            $data = array(
                'username_adm' => $this->input->post('username_adm'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            if ($this->Admin_user_model->register($data)) {
                // Jika penambahan user admin berhasil, arahkan kembali ke halaman kelola pengguna admin
                redirect('admin_user');
            } else {
                // Jika penambahan user admin gagal, tampilkan pesan error
                $data['error'] = 'Penambahan user admin gagal. Silakan coba lagi.';
                $this->load->view('admin/tambah_admin_user', $data);
            }
        }
    }

    // Method untuk menghapus pengguna admin
    public function hapus($id_admin) {
        if ($this->Admin_user_model->delete($id_admin)) {
            // Jika penghapusan user admin berhasil, arahkan kembali ke halaman kelola pengguna admin
            redirect('admin_user');
        } else {
            // Jika penghapusan user admin gagal, tampilkan pesan error
            $data['error'] = 'Penghapusan user admin gagal. Silakan coba lagi.';
            $this->load->view('admin/users', $data);
        }
    }
}