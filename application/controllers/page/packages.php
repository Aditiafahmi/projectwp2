<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Packages_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['packages'] = $this->Packages_model->getAllPackages();
        $this->load->view('page/packages', $data);
    }

    public function add() {
        $this->form_validation->set_rules('packages_heading', 'Package Heading', 'required');
        $this->form_validation->set_rules('packages_price', 'Package Price', 'required');
        $this->form_validation->set_rules('packages_list', 'Package List', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('page/add_packages');
        } else {
            $data = array(
                'packages_heading' => $this->input->post('packages_heading'),
                'packages_price' => $this->input->post('packages_price'),
                'packages_list' => $this->input->post('packages_list')
            );

            $this->Packages_model->addPackage($data);

            redirect('page/packages?pesan=tambah');
        }
    }

    public function edit($id) {
        $this->form_validation->set_rules('packages_heading', 'Package Heading', 'required');
        $this->form_validation->set_rules('packages_price', 'Package Price', 'required');
        $this->form_validation->set_rules('packages_list', 'Package List', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['package'] = $this->Packages_model->getPackageById($id);
            $this->load->view('page/edit_packages', $data);
        } else {
            $data = array(
                'packages_heading' => $this->input->post('packages_heading'),
                'packages_price' => $this->input->post('packages_price'),
                'packages_list' => $this->input->post('packages_list')
            );

            $this->Packages_model->editPackage($id, $data);

            redirect('page/packages?pesan=berhasil');
        }
    }

    public function delete($id) {
        $this->Packages_model->deletePackage($id);
        redirect('page/packages?pesan=hapus');
    }
}
