<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Testimonial_model'); // Pastikan model sudah di-load di sini
        $this->load->library('form_validation');
    }

    public function index() {
        // Load model
        $this->load->model('Testimonial_model');

        // Get testimonial data
        $data['testimonials'] = $this->Testimonial_model->getAllTestimonial();

        // Load view
        $this->load->view('page/testimonial', $data);
    }

    // Method untuk menampilkan form tambah testimonial
    public function add() {
        // Load view untuk form tambah testimonial
        $this->load->view('page/add_testimonial');
    }

    // Method untuk memproses penambahan testimonial
 
    public function do_add() {
        // Validasi form
        $this->form_validation->set_rules('testi_client', 'Client', 'required');
        $this->form_validation->set_rules('testi_text', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation gagal, tampilkan kembali form add dengan pesan error
            $this->load->view('page/add_testimonial');
        } else {
            // Form validation sukses, proses penambahan testimonial
            $testi_client = $this->input->post('testi_client');
            $testi_text = $this->input->post('testi_text');

            // Proses upload gambar
            $config['upload_path'] = 'assets/img/testimonial/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = 'testimonial_' . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('testi_image')) {
                // Jika upload gagal, tampilkan pesan error
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('page/add_testimonial', $error);
            } else {
                // Jika upload sukses, ambil nama file yang diupload
                $upload_data = $this->upload->data();
                $testi_image = $upload_data['file_name'];

                // Simpan data testimonial ke database
                $testimonial_data = array(
                    'testi_client' => $testi_client,
                    'testi_text' => $testi_text,
                    'testi_image' => $testi_image
                    // Anda bisa menambahkan field lainnya sesuai kebutuhan
                );

                // Panggil model untuk menyimpan data testimonial
                $this->Testimonial_model->addTestimonial($testimonial_data);

                // Redirect kembali ke halaman testimonial setelah penambahan
                redirect('page/testimonial?pesan=tambah');
            }
        }
    }

    // Method untuk menghapus testimonial
    public function delete($id) {
        // Lakukan proses penghapusan testimonial di sini
        // Panggil model untuk menghapus testimonial berdasarkan ID
        $this->Testimonial_model->deleteTestimonial($id);

        // Redirect kembali ke halaman testimonial setelah penghapusan
        redirect('page/testimonial?pesan=hapus');
    }

    public function edit($id) {
        // Validasi form
        $this->form_validation->set_rules('testi_client', 'Client', 'required');
        $this->form_validation->set_rules('testi_text', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation gagal, tampilkan form edit dengan pesan error
            $data['testimonial'] = $this->Testimonial_model->getTestimonialById($id);
            $this->load->view('page/edit_testimonial', $data);
        } else {
            // Form validation sukses, proses update testimonial
            $testi_client = $this->input->post('testi_client');
            $testi_text = $this->input->post('testi_text');

            // Proses update testimonial
            $data = array(
                'testi_client' => $testi_client,
                'testi_text' => $testi_text
                // Anda bisa menambahkan field lainnya sesuai kebutuhan
            );

            // Cek apakah ada file gambar yang diupload
            if (!empty($_FILES['testi_image']['name'])) {
                // Proses upload gambar
                $config['upload_path'] = 'assets/img/testimonial/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048; // 2MB
                $config['file_name'] = 'testimonial_' . time();

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('testi_image')) {
                    // Jika upload gagal, tampilkan pesan error
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('page/edit_testimonial', $error);
                } else {
                    // Jika upload sukses, ambil nama file yang diupload
                    $upload_data = $this->upload->data();
                    $data['testi_image'] = $upload_data['file_name'];
                }
            }

            // Update testimonial
            $this->Testimonial_model->editTestimonial($id, $data);

            // Redirect ke halaman testimonial atau sesuaikan dengan kebutuhan
            redirect('page/testimonial?pesan=berhasil');
        }
    }
}
?>
