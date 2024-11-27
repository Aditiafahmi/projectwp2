<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model'); // Load model Auth_model
    }

    public function index()
    {
        $data['error'] = $this->input->get('error');
        $data['message'] = $this->input->get('message');
        
        $register_success = $this->input->get('register_success');
        if ($register_success) {
            $data['register_success'] = true;
            $data['register_message'] = "Pendaftaran Anda berhasil!";
        }
        
        $reset_success = $this->input->get('reset_success');
        if ($reset_success) {
            $data['reset_success'] = true;
            $data['reset_message'] = "Password Anda berhasil direset. Silakan login dengan password baru Anda.";
        }
        
        $this->load->view('login', $data);
    }        

    public function proses_login()
    {

        $username = $this->input->post('user_username');
        $password = md5($this->input->post('user_password'));


        $user = $this->Auth_model->getUser($username);

        if ($user && $password == $user['user_password']) {
            if ($user['status'] == 1) {
                // Akun sudah diaktivasi, izinkan login
                $this->session->set_userdata('ADMIN', $user['id']);
                $this->session->set_userdata('user_username', $user['user_username']);
                //echo 'Redirecting to admin/index...';
                redirect(base_url('admin')); // Ganti dengan halaman tujuan setelah login berhasil
                // Cek status sesi
                // echo '<pre>';
                //print_r($this->session->userdata());
                //echo '</pre>';
            } else {
                // Akun belum diaktivasi
                redirect('login?error=1&message=Akun belum diaktivasi. Silakan cek email Anda untuk aktivasi.');
            }
        } else {
            // Debugging
            echo 'Login failed.';
            // Login gagal
            redirect('login?error=1&message=Login gagal. Periksa kembali username dan password Anda.');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login?signout=success'));
    }
}
