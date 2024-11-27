<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['messages'] = $this->session->flashdata('messages');
        // Tampilkan formulir pendaftaran di sini
        $this->load->view('register_form', $data);
    }

    public function process_registration()
    {
        $username = $this->input->post('new_user_username');
        $password = $this->input->post('new_user_password');
        $email = $this->input->post('new_user_email');

        // Hash password menggunakan algoritma yang lebih aman (contoh: bcrypt)
        $hashedPassword = md5($password);
        $verificationCode = md5(uniqid(rand(), true));

        $data = array(
            'user_username' => $username,
            'user_password' => $hashedPassword,
            'email' => $email,
            'verification_code' => $verificationCode,
            'status' => 0
        );

        if ($this->user_model->insert_user($data)) {
            // Kirim email verifikasi
            $this->_sendEmail($email, $username, $verificationCode);
    
            $this->session->set_flashdata('messages', array('success' => 'Registrasi berhasil! Silakan periksa email Anda untuk verifikasi.'));
            var_dump($data['messages']);
            // Redirect atau tampilkan pesan sukses
            redirect('register');
        } else {
            $this->session->set_flashdata('messages', array('error' => 'Registrasi gagal. Silakan coba lagi.'));
            // Redirect atau tampilkan pesan kesalahan
            var_dump($data['messages']);
            redirect('register');
        }
    }
    


    private function _sendEmail($to, $username, $verificationCode)
    {
        // Set konfigurasi email
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com', // Ganti dengan server SMTP Anda
            'smtp_user' => 'adityafahmi2005@gmail.com', // Ganti dengan username SMTP Anda
            'smtp_pass' => 'antl gdkg psnk qcjb', // Ganti dengan password SMTP Anda
            'smtp_port' => 587, // Sesuaikan dengan port SMTP Anda
            'smtp_crypto' => 'tls', // Sesuaikan dengan metode keamanan SMTP Anda (tls/ssl)
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        $this->email->initialize($config);

        // Set pengirim dan penerima
        $this->email->from('Maryyme@gmail.com', 'MarryMe'); // Ganti dengan alamat email dan nama Anda
        $this->email->to($to, $username);

        // Set subjek dan isi email
        $this->email->subject('Verifikasi Akun - MarryMe');
        $message = "Halo $username,<br><br>Terima kasih telah mendaftar di Marryme. Silakan <a href='" . site_url("register/verify/$verificationCode") . "'>aktivasi di sini</a> untuk verifikasi akun Anda.<br>";
        $this->email->message($message);
        

        // Kirim email
        if ($this->email->send()) {
            // Pemberitahuan bahwa email berhasil dikirim
            $this->session->set_flashdata('success_message', 'Email verifikasi telah berhasil dikirim ke ' . $to . '. Silakan periksa email Anda.');
    
            return true;
        } else {
            // Pemberitahuan bahwa ada kesalahan dalam pengiriman email
            $this->session->set_flashdata('error_message', 'Terjadi kesalahan dalam pengiriman email verifikasi. Silakan coba lagi.');
    
            return false;
        }
    }

    public function verify($code)
    {
        $query = $this->db->get_where('user', array('verification_code' => $code));

        if ($query->num_rows() > 0) {
            $user = $query->row_array();

            // Ubah status menjadi aktif
            $updateData = array(
                'status' => 1,
                'verification_code' => null
            );

            $this->db->where('id', $user['id']);
            $updateResult = $this->db->update('user', $updateData);

            if ($updateResult) {
                $this->session->set_flashdata('register_succes', true);

                redirect('login/index?register_success=true');
            } else {
                $this->session->set_flashdata('error_message', 'Terjadi kesalahan. Silakan coba lagi.');
                redirect('login/index');
            }
        } else {
            $this->session->set_flashdata('error_message', 'Tautan verifikasi tidak valid.');
            redirect('login');
        }
    }
    
}
