<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model'); // Memuat model Blog_model
    }

    public function index()
    {
        
        $data['blog'] = $this->Blog_model->getAllBlog();
        $this->load->view('blog/index', $data);
    }

    public function readmore($id) {
        $data['blog_post'] = $this->Blog_model->getBlogById($id); // Sesuaikan dengan metode atau fungsi pada model Anda
        $this->load->view('blog/readmore', $data);
    }
}
