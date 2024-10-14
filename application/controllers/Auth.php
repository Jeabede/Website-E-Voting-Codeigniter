<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model, helper, dan library yang dibutuhkan
        $this->load->model('Admin_login_model');
        $this->load->model('UserModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    // Method untuk menampilkan halaman registrasi
    public function register() {
        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[Userv.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[Userv.email]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'No Telp', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan Keamanan', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban Keamanan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman registrasi
            $this->load->view('auth/register');
        } else {
            // Jika validasi berhasil, lakukan proses pendaftaran
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'pertanyaan' => $this->input->post('pertanyaan'),
                'jawaban' => $this->input->post('jawaban')
            );

            if ($this->UserModel->register($data)) {
                // Jika pendaftaran berhasil, arahkan ke halaman login
                redirect('login');
            } else {
                // Jika pendaftaran gagal, tampilkan pesan error
                $data['error'] = 'Registrasi gagal. Silakan coba lagi.';
                $this->load->view('auth/register', $data);
            }
        }
    }

    // Method untuk menampilkan halaman login
    public function login() {
        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman login
            $this->load->view('auth/login');
        } else {
            // Jika validasi berhasil, lakukan proses autentikasi
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->UserModel->login($username, $password);

            if ($user) {
                // Jika autentikasi berhasil, simpan data user ke session
                $this->session->set_userdata('user_id', $user['id_user']);
                $this->session->set_userdata('username', $user['username']);
                $this->session->set_userdata('nama', $user['nama']);
                $this->session->set_userdata('pertanyaan', $user['pertanyaan']);
                $this->session->set_userdata('jawaban', $user['jawaban']);
                $this->session->set_userdata('token', $user['token']);

                // Redirect ke halaman setelah login berhasil
                redirect('dashboard');
            } else {
                // Jika autentikasi gagal, tampilkan pesan error
                $data['error'] = 'Username atau password salah.';
                $this->load->view('auth/login', $data);
            }
        }
    }

    public function login_admin() {
        
        // Validasi form
        $this->form_validation->set_rules('username_adm', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman login
            $this->load->view('admin/loginadm');
        } else {
            // Jika validasi berhasil, lakukan proses autentikasi
            $username_adm = $this->input->post('username_adm');
            $password = $this->input->post('password');

            $user = $this->Admin_login_model->login($username_adm, $password);

            if ($user) {
                // Jika autentikasi berhasil, simpan data user ke session
                $this->session->set_userdata('admin_id', $user['id_admin']);
                $this->session->set_userdata('username_adm', $user['username_adm']);
                // Redirect ke halaman setelah login berhasil
                redirect('admin/dashboard');
            } else {
                // Jika autentikasi gagal, tampilkan pesan error
                $data['error'] = 'Username atau password salah.';
                $this->load->view('admin/loginadm', $data);
            }
        }
    }

    // Method untuk logout
    public function logoutadm() {
        // Hapus semua data session
        $this->session->unset_userdata('admin_id');
        // Redirect ke halaman utama setelah logout
        redirect('auth/login_admin');
    }

    public function pertanyaan() {
        // Validasi form
        $this->form_validation->set_rules('jawaban', 'jawaban', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman registrasi
            $this->load->view('auth/pertanyaan');
        } else {
            // Jika validasi berhasil, lakukan proses pendaftaran

            $jawaban = $this->input->post('jawaban');
            $jawaban_session = $this->session->userdata('jawaban');

            if ($jawaban == $jawaban_session) {
                // Jika pendaftaran berhasil, arahkan ke halaman login
                redirect('dashboard');
            } else {
                // Jika pendaftaran gagal, tampilkan pesan error
                $data['error'] = 'Jawaban salah. Silakan coba lagi.';
                $this->load->view('auth/pertanyaan', $data);
            }
        }
    }

    public function confirmuser() {
        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman registrasi
            $this->load->view('auth/forgot');
        } else {
            // Jika validasi berhasil, lakukan proses pendaftaran

            $email = $this->input->post('email');
            $email_session = $this->session->userdata('email');

            $user = $this->UserModel->check_email($email);

            if ($user) {
                // Jika autentikasi berhasil, simpan data user ke session
                $this->session->set_userdata('user_id', $user['id_user']);
                $this->session->set_userdata('email', $user['email']);
                $this->session->set_userdata('pertanyaan', $user['pertanyaan']);
                
         // Redirect ke halaman setelah login berhasil
         redirect('auth/pertanyaan');

        } else {
            // Jika autentikasi gagal, tampilkan pesan error
            $data['error'] = 'Email Tidak Ada';
            $this->load->view('auth/forgot', $data);
        }
    }
    }

    public function security_question() {
        $email = $this->session->userdata('reset_email');

        if (!$email) {
        redirect('auth/confirmuser');
    }

        $question = $this->UserModel->get_security_question($email);

        if ($question) {
        $data['pertanyaan'] = $question;
    } else {
        $data['error'] = 'Tidak ada pertanyaan keamanan yang tersedia. Hubungi dukungan.';
    }

    $this->load->view('auth/pertanyaan', $data);
}


    public function verify_security_question() {
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi form gagal
            $this->load->view('auth/pertanyaan', ['error' => 'Mohon isi jawaban keamanan.']);
        } else {
            // Mendapatkan jawaban dari input pengguna
            $jawaban_user = $this->input->post('jawaban');
            // Mendapatkan jawaban yang benar dari session atau database
            $jawaban_sebenarnya = $this->session->userdata('jawaban');  // Misalnya jawaban telah disimpan di sesi saat pengguna login atau saat mereka memasukkan username
    
            $user = $this->UserModel->check_secure($jawaban_user);

            if ($user) {
                // Jika autentikasi berhasil, simpan data user ke session
                $this->session->set_userdata('jawaban', $user['jawaban']);

                // Jika jawaban benar, arahkan ke halaman reset password atau halaman berikutnya
                redirect('auth/reset_password');
            } else {
                // Jika jawaban salah, tampilkan lagi form dengan pesan error
                $this->load->view('auth/pertanyaan', ['error' => 'Jawaban salah. Silakan coba lagi.']);
            }
        }
    }
    
    public function reset_password() {
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/setpass');
        } else {
            $new_password = $this->input->post('new_password');
            $user_id = $this->session->userdata('user_id');
    
            if ($this->UserModel->update_password($user_id, $new_password)) {
                // Jika update password berhasil
                $this->session->set_flashdata('message', 'Password berhasil diperbarui');
                redirect('auth/login');
            } else {
                $data['error'] = 'Gagal memperbarui password.';
                $this->load->view('auth/setpass', $data);
            }
        }
    }    

    // Method untuk logout
    public function logout() {
        // Hapus semua data session
        $this->session->unset_userdata('user_id');
        // Redirect ke halaman utama setelah logout
        redirect('dashboard');
    }
}