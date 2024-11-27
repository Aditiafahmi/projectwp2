
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model'); // Load model
    }

    public function index() {
        // Dapatkan data untuk bagian-bagian dashboard dari model
        $data['jumlah_features'] = $this->Dashboard_model->hitungFeatures();
        $data['jumlah_packages'] = $this->Dashboard_model->hitungPackages();
        $data['jumlah_gallery'] = $this->Dashboard_model->hitungGallery();
        $data['jumlah_blog'] = $this->Dashboard_model->hitungBlog();
        $data['jumlah_client'] = $this->Dashboard_model->hitungClient();

        // Load view
        $this->load->view('page/dashboard', $data);
    }
}
