<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model, helper, dan library yang dibutuhkan
        $this->load->model('PembelianModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
        if  (empty($this->session->userdata('user_id'))) {
            redirect('auth/login');
        }
    }

    // Method untuk menampilkan halaman pembelian token
    public function beli_token() {
        // Validasi form
        $this->form_validation->set_rules('nominal_uang', 'Nominal Uang', 'required');
        $this->form_validation->set_rules('jumlah_token', 'Jumlah Token', 'required');
        $this->form_validation->set_rules('no_inv', 'Nomor Invoice', 'required');

        if ($this->form_validation->run() == FALSE) {    
                 $this->load->view('pembelian/beli_token');

        } else {    

            $jumlah_token = $this->input->post('jumlah_token');
            $nominal_uang = $this->input->post('nominal_uang');
            $no_inv = $this->input->post('no_inv');

            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
                
            if (!$this->upload->do_upload('bukti_pembayaran')){
                    $data['error'] = 'Pembelian gagal. Silakan coba lagi.';
                    $this->load->view('pembelian/beli_token', $data);
            } else {

                $bukti_pembayaran = $this->upload->data('file_name');


                // Jika validasi berhasil, lakukan proses pembelian token
                $data = array(
                    'id_user' => $this->session->userdata('user_id'),
                    'no_inv' => $no_inv,
                    'bukti_pembayaran' => $bukti_pembayaran,
                    'jumlah_token' => $jumlah_token,
                    'nominal_uang' => $nominal_uang,
                    'status_validasi' => false // Pembelian masih belum divalidasi oleh admin
                );

                if ($this->PembelianModel->beli_token($data)) {
                    // Jika pembelian berhasil, tampilkan pesan sukses
                    $data['success'] = 'Pembelian berhasil. Lakukan Refresh Pada Halaman Utama. Jika token belum terisi, silakan tunggu validasi dari admin.';
                    $this->load->view('pembelian/beli_token', $data);
                } else {
                    // Jika pembelian gagal, tampilkan pesan error
                    $data['error'] = 'Pembelian gagal. Silakan coba lagi.';
                    $this->load->view('pembelian/beli_token', $data);
                }

            }
        }    
    }

    // Method untuk konfirmasi pembayaran
    public function konfirmasi_pembayaran() {
        // Validasi form
        $this->form_validation->set_rules('id_pembelian', 'ID Pembelian', 'required');
        $this->form_validation->set_rules('id_user', 'User ID', 'required');
        $this->form_validation->set_rules('status_validasi', 'Status Validasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman konfirmasi pembayaran
            $this->load->view('pembelian/konfirmasi_pembayaran');
        } else {
            // Jika validasi berhasil, lakukan proses konfirmasi pembayaran
            $id_pembelian = $this->input->post('id_pembelian');

            $data_pembelian = $this->PembelianModel->get_pembelian_by_id($id_pembelian);

            if ($data_pembelian) {

                $jumlah_token = $data_pembelian->jumlah_token;
                $status_validasi = $data_pembelian->status_validasi;

                if ($this->PembelianModel->update_status_validasi($id_pembelian, $status_validasi)) {

                    $user_id = $this->session->userdata('user_id');

                    $new_token = intval($token_session) - 1;

                    if($this->UserModel->update_token($user_id, $new_token)){
                        // Jika konfirmasi berhasil, tampilkan pesan sukses
                        $data['success'] = 'Konfirmasi pembayaran berhasil.';
                        $this->load->view('pembelian/konfirmasi_pembayaran', $data);
                    }else{
                        $data['error'] = 'Konfirmasi pembayaran gagal. Silakan coba lagi.';
                        $this->load->view('pembelian/konfirmasi_pembayaran', $data);
                    }
                } else {
                    // Jika konfirmasi gagal, tampilkan pesan error
                    $data['error'] = 'Konfirmasi pembayaran gagal. Silakan coba lagi.';
                    $this->load->view('pembelian/konfirmasi_pembayaran', $data);
                }
            } else {
                $data['error'] = 'Konfirmasi pembayaran gagal. Silakan coba lagi.';
                $this->load->view('pembelian/konfirmasi_pembayaran', $data);
            }
        }
    }
}