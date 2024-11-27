<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reset_password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model'); // Sesuaikan dengan model Anda
        $this->load->library('form_validation');
    }

    public function index($token)
    {
        // Cek apakah token valid
        $user = $this->user_model->get_user_by_verification_code($token);
        $data['messages'] = $this->session->flashdata('messages');

        if ($user) {
            // Token valid, tampilkan form reset password
            $data['token'] = $token;
            $this->load->view('reset_password_form', $data);
        } else {
            // Token tidak valid, tampilkan pesan error
            $this->session->set_flashdata('error_message', 'Tautan reset password tidak valid atau sudah kadaluarsa.');
            redirect('lupa_password/index');
        }
    }

    public function process_reset_password()
{
    // Validasi form
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

    $token = $this->input->post('token');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kembali ke form reset password
        $data['token'] = $token;
        $this->load->view('reset_password_form', $data);
    } else {
        // Update password dalam database
        $new_password = $this->input->post('password');
        $user = $this->user_model->get_user_by_verification_code($token);

        if ($user) {
            $user_id = $user['id'];

            $this->user_model->update_password($user_id, $new_password);

            // Hapus token verifikasi dari database setelah reset password berhasil
            $this->user_model->clear_verification_code($user_id);

            // Tampilkan pesan sukses
            $this->session->set_flashdata('reset_success', true);

            redirect('login/index?reset_success=true');
        } else {
            // Token tidak valid, tampilkan pesan error
            $this->session->set_flashdata('messages', array('error' =>  'Tautan reset password tidak valid atau sudah kadaluarsa.'));
            redirect('lupa_password/index');
        }
    }
}

}
?>
