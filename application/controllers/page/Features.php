<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Features extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Features_model'); // Load model yang akan digunakan
        $this->load->library('form_validation');
    }

    public function index() {
        $data['features'] = $this->Features_model->getAllFeatures();
        $this->load->view('page/features', $data);
    }

    public function add() {
        // Validasi form input
        $this->form_validation->set_rules('features_name', 'Features Name', 'required');
        $this->form_validation->set_rules('features_icon', 'Features Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('page/add_features');
        } else {
            // Form input data features
            $data = array(
                'features_name' => $this->input->post('features_name'),
                'features_icon' => $this->input->post('features_icon')
            );

            // Panggil model untuk menambah data features
            $this->Features_model->addFeatures($data);

            redirect('page/features');
        }
    }

    public function edit($id) {
        // Validasi form input
        $this->form_validation->set_rules('features_name', 'Features Name', 'required');
        $this->form_validation->set_rules('features_icon', 'Features Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Ambil data features berdasarkan ID untuk ditampilkan di form
            $data['features'] = $this->Features_model->getFeaturesById($id);
            $this->load->view('page/edit_features', $data);
        } else {
            // Form input data features
            $data = array(
                'features_name' => $this->input->post('features_name'),
                'features_icon' => $this->input->post('features_icon')
            );

            // Panggil model untuk mengupdate data features
            $this->Features_model->updateFeatures($id, $data);

            redirect('page/features');
        }
    }

    public function delete($id) {
        // Panggil model untuk menghapus data features
        $this->Features_model->deleteFeatures($id);

        redirect('page/features');
    }
}
