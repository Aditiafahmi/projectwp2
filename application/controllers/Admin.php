<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Dashboard_model');

        // Cek apakah pengguna sudah login sebagai admin
        if (!$this->session->userdata('ADMIN')) {
            redirect('login'); // Redirect ke halaman login jika belum login sebagai admin
        }
    }

    public function index() {
        // Ambil data yang diperlukan dari model
        $data['jumlah_features'] = $this->Dashboard_model->hitungFeatures();
        $data['jumlah_packages'] = $this->Dashboard_model->hitungPackages();
        $data['jumlah_gallery'] = $this->Dashboard_model->hitungGallery();
        $data['jumlah_blog'] = $this->Dashboard_model->hitungBlog();
        $data['jumlah_client'] = $this->Dashboard_model->hitungClient();

        // Load view dashboard dan kirimkan data
        $this->load->view('admin/index', $data);
    }

    
}
