<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model'); // Pastikan model sudah di-load di sini
    }

    public function index()
    {
        // Load model
        $this->load->model('Contact_model');

        // Get contact data
        $data['contacts'] = $this->Contact_model->getContact();
        

        // Load view
        $this->load->view('page/contact', $data);
    }

    public function delete($id)
    {
        // Panggil model untuk menghapus contact berdasarkan ID
        $this->Contact_model->deleteContact($id);

        // Redirect kembali ke halaman contact setelah penghapusan
        redirect('page/contact?pesan=hapus');
    }


    // Contact.php
    // Di kontroler Anda
    public function saveContact()
    {
        $data = array(
            'name' => $this->input->post('contact_name'),
            'email' => $this->input->post('contact_email'),
            'subject' => $this->input->post('contact_subject'),
            'message' => $this->input->post('contact_message')
        );

        // Panggil model untuk menyimpan data
        $this->Contact_model->saveContact($data);

        // Redirect atau tampilkan pesan sukses
        $this->session->set_flashdata('success', 'Pesan Anda telah berhasil dikirim.');
        redirect(base_url());
    }


}
