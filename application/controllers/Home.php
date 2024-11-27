<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
       

        // Menyimpan data ke sesi
        $this->session->set_flashdata('key', 'value');

        // Mengambil data dari sesi
        $data['flash_data'] = $this->session->flashdata('key');


        $this->load->model('Features_model');
        $this->load->model('About_model');
        $this->load->model('Packages_model');
        $this->load->model('Gallery_model');
        $this->load->model('Blog_model');
        $this->load->model('Testimonial_model');
        $this->load->model('Contact_model');


        $data['features'] = $this->Features_model->getAllFeatures();
        $data['about'] = $this->About_model->getAllAbout();
        $data['packages'] = $this->Packages_model->getAllPackages();
        $data['gallery'] = $this->Gallery_model->getAllGallery();
        $data['blog'] = $this->Blog_model->getAllBlog();
        $data['testimonials'] = $this->Testimonial_model->getAllTestimonial();
        $data['contact'] = $this->Contact_model->getContact();

        $this->load->view('home/index', $data);
        
    }
}
