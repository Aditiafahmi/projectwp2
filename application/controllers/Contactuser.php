<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Contact_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        // Tampilkan halaman kontak untuk pengguna
        $this->load->view('home/index' );
    }

    public function saveContact() {
        // Validasi formulir
        $this->form_validation->set_rules('contact_name', 'contact_name', 'required');
        $this->form_validation->set_rules('contact_email', 'contact_email', 'required|valid_email');
        $this->form_validation->set_rules('contact_subject', 'contact_subject', 'required');
        $this->form_validation->set_rules('contact_message', 'contact_message', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan pesan kesalahan
            $this->session->set_flashdata('failed', validation_errors());
        } else {
            // Jika validasi berhasil, simpan data ke database
            $data = array(
                'contact_name' => $this->input->post('contact_name'),
                'contact_email' => $this->input->post('contact_email'),
                'contact_subject' => $this->input->post('contact_subject'),
                'contact_message' => $this->input->post('contact_message')
            );

            // Panggil model untuk menyimpan data
            if ($this->Contact_model->saveContact($data)) {
                // Tampilkan pesan sukses
                $this->session->set_flashdata('success', 'Pesan Anda telah berhasil dikirim.');

                // Atur hash URL untuk mengarahkan ke bagian kontak di halaman Home
                redirect(base_url('home') . '#contact'); 
                return; // Hentikan eksekusi agar pengalihan berjalan
            } else {
                // Tampilkan pesan gagal
                $this->session->set_flashdata('failed', 'Terjadi kesalahan saat mengirim pesan.');
            }
        }
        
        // Jika ada kesalahan atau validasi gagal, arahkan kembali ke halaman kontak
        redirect(base_url('home'));
    }
}
