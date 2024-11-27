
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Gallery_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['gallery_data'] = $this->Gallery_model->getAllGallery();
        $this->load->view('page/gallery', $data);
    }

    public function edit($id) {
        $this->form_validation->set_rules('gallery_heading', 'Gallery Heading', 'required');
        $this->form_validation->set_rules('gallery_desc', 'Gallery Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['gallery_data'] = $this->Gallery_model->getGalleryById($id);
            $this->load->view('page/edit_gallery', $data);
        } else {
            // Handle form submission and update data
            $data = array(
                'gallery_heading' => $this->input->post('gallery_heading'),
                'gallery_desc' => $this->input->post('gallery_desc')
            );

            // Update data in the model
            $this->Gallery_model->editGallery($id, $data);

            // Redirect to the gallery page with a success message
            redirect('page/gallery?pesan=berhasil');
        }
    }

    public function delete($id) {
        // Delete data in the model
        $this->Gallery_model->deleteGallery($id);

        // Redirect to the gallery page with a success message
        redirect('page/gallery?pesan=hapus');
    }

    public function add() {
        $this->form_validation->set_rules('gallery_heading', 'Gallery Heading', 'required');
        $this->form_validation->set_rules('gallery_desc', 'Gallery Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('page/add_gallery');
        } else {
            // Handle form submission and add data
            $config['upload_path'] = 'assets/img/gallery'; // Sesuaikan dengan direktori tempat menyimpan file
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2 MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gallery_image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('page/add_gallery', $error);
            } else {
                $data = array(
                    'gallery_heading' => $this->input->post('gallery_heading'),
                    'gallery_desc' => $this->input->post('gallery_desc'),
                    'gallery_image' => $this->upload->data('file_name')
                );

                // Add data to the model
                $this->Gallery_model->addGallery($data);

                // Redirect to the gallery page with a success message
                redirect('page/gallery?pesan=tambah');
            }
        }
    }


}
