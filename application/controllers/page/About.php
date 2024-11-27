<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('About_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['about'] = $this->About_model->getAllAbout();
        $this->load->view('page/about', $data);
    }

    public function add()
    {
        // Validasi form input
        $this->form_validation->set_rules('about_heading', 'About Heading', 'required');
        $this->form_validation->set_rules('about_text', 'About Text', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('about/form');
        } else {
            // Form input data about
            $data = array(
                'about_heading' => $this->input->post('about_heading'),
                'about_text' => $this->input->post('about_text')
                // Tambahkan field lain sesuai kebutuhan
            );

            // Panggil model untuk menambah data about
            $this->About_model->addAbout($data);

            redirect('about');
        }
    }

    public function edit($id)
    {
        // Validasi form input
        $this->form_validation->set_rules('about_heading', 'About Heading', 'required');
        $this->form_validation->set_rules('about_text', 'About Text', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Ambil data about berdasarkan ID untuk ditampilkan di form
            $data['about'] = $this->About_model->getAboutById($id);
            $this->load->view('page/edit_about', $data);
        } else {
            // Form input data about
            $data = array(
                'about_heading' => $this->input->post('about_heading'),
                'about_text' => $this->input->post('about_text')
                // Tambahkan field lain sesuai kebutuhan
            );

            // Panggil model untuk mengupdate data about
            $this->About_model->updateAbout($id, $data);

            redirect('page/about?pesan=berhasil');
        }
    }

    public function delete($id)
    {
        // Panggil model untuk menghapus data about
        $this->About_model->deleteAbout($id);

        redirect('page/about?pesan=hapus');
    }

    public function update($id)
{
    // Validasi form input
    $this->form_validation->set_rules('about_heading', 'About Heading', 'required');
    $this->form_validation->set_rules('about_text', 'About Text', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Ambil data about berdasarkan ID untuk ditampilkan di form
        $data['about'] = $this->About_model->getAboutById($id);
        $this->load->view('page/edit_about', $data);
    } else {
        // Form input data about
        $data = array(
            'about_heading' => $this->input->post('about_heading'),
            'about_text' => $this->input->post('about_text')
            // Tambahkan field lain sesuai kebutuhan
        );

        // Panggil model untuk mengupdate data about
        $this->About_model->updateAbout($id, $data);

        redirect('page/about?pesan=berhasil');
    }
}

}
