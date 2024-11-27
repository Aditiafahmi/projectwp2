<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupa_password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model'); // Sesuaikan dengan model Anda
        $this->load->library('form_validation');
        $this->load->library('email');
    }

    public function index()
    {
        $data['messages'] = $this->session->flashdata('messages');
        $this->load->view('lupa_password_form', $data);
    }

    public function process_forgot_password()
    {
        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form
            $this->load->view('lupa_password_form');
        } else {
            // Ambil email dari form
            $email = $this->input->post('email');

            // Cek apakah email ada di database
            $user = $this->user_model->get_user_by_email($email);

            if ($user) {
                // Generate token pemulihan
                $token = md5(uniqid(rand(), true));

                // Simpan token ke database
                $this->user_model->update_reset_token($user['id'], $token);

                // Kirim email dengan tautan pemulihan
                $this->_sendPasswordResetEmail($email, $token);

                // Tampilkan pesan sukses ke pengguna
                $this->session->set_flashdata('messages', array('success' => 'Instruksi pemulihan telah dikirimkan ke email Anda.'));
                redirect('lupa_password/index');
            } else {
                // Tampilkan pesan error jika email tidak ditemukan
                $this->session->set_flashdata('messages', array('error' => 'Email tidak terdaftar.'));
                redirect('lupa_password/index');
            }
        }
    }

    private function _sendPasswordResetEmail($email, $token)
    {
        // Konfigurasi email
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'Adityafahmi2005@gmail.com';
        $config['smtp_pass'] = 'antl gdkg psnk qcjb';
        $config['smtp_port'] = 587;
        $config['smtp_crypto'] = 'tls'; // Sesuaikan dengan metode keamanan SMTP Anda (tls/ssl)
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        // Set pengirim dan penerima
        $this->email->from('MarryMe@gmail.com', 'MarryMe');
        $this->email->to($email);

        // Set subjek dan isi email
        $this->email->subject('Reset Password');
        $message = "Halo,<br><br>Anda menerima email ini karena ada permintaan reset password untuk akun Anda. Silakan <a href='" . site_url("reset_password/index/$token") . "'>reset password di sini</a>.<br>";
        $this->email->message($message);


        // Kirim email
        $this->email->send();
    }


    public function proses_lupa_password()
    {
        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form
            $this->load->view('lupa_password_form');
        } else {
            // Ambil email dari form
            $email = $this->input->post('email');

            // Cek apakah email ada di database
            $user = $this->user_model->get_user_by_email($email);

            if ($user) {
                // Generate token pemulihan
                $token = md5(uniqid(rand(), true));

                // Simpan token ke database
                $this->user_model->update_verification_code($user['id'], $token);

                // Kirim email dengan tautan pemulihan
                $this->_sendPasswordResetEmail($email, $token);

                // Tampilkan pesan sukses ke pengguna
                $this->session->set_flashdata('messages', array('success' => 'Instruksi pemulihan telah dikirimkan ke email Anda.'));
                redirect('lupa_password/index');
            } else {
                // Tampilkan pesan error jika email tidak ditemukan
                $this->session->set_flashdata('messages', array('error' => 'Email tidak terdaftar.'));
                redirect('lupa_password/index');
            }
        }
    }

}
?>