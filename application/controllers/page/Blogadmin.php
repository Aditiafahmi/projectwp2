<?php
// application/controllers/BlogController.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blogadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['blog'] = $this->Blog_model->getAllBlog();
        $this->load->view('page/blog', $data);
    }

    public function add() {
        $this->form_validation->set_rules('blog_heading', 'Blog Heading', 'required');
        $this->form_validation->set_rules('blog_text', 'Blog Text', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('page/add_blog');
        } else {
            // Handle form submission and add data
            $config['upload_path'] = 'assets/img/blog/'; // Sesuaikan dengan direktori tempat menyimpan file
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2 MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('blog_image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('page/add_blog', $error);
            } else {
                $data = array(
                    'blog_heading' => $this->input->post('blog_heading'),
                    'blog_text' => $this->input->post('blog_text'),
                    'blog_image' => $this->upload->data('file_name')
                );

                // Add data to the model
                $this->Blog_model->addBlog($data);

                // Redirect to the blog page with a success message
                redirect('page/blogadmin?pesan=tambah');
            }
        }
    }

    public function edit($id) {
        $this->form_validation->set_rules('blog_heading', 'Blog Heading', 'required');
        $this->form_validation->set_rules('blog_text', 'Blog Text', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['blog'] = $this->Blog_model->getBlogById($id);
            $this->load->view('page/edit_blog', $data);
        } else {
            // Handle form submission and update data
            $data = array(
                'blog_heading' => $this->input->post('blog_heading'),
                'blog_text' => $this->input->post('blog_text')
            );

            // Update data in the model
            $this->Blog_model->editBlog($id, $data);

            // Redirect to the blog page with a success message
            redirect('page/blogadmin?pesan=berhasil');
        }
    }

    public function delete($id) {
        // Delete data in the model
        $this->Blog_model->deleteBlog($id);

        // Redirect to the blog page with a success message
        redirect('page/blogadmin?pesan=hapus');
    }

    // Add other controller methods if needed...
}
