<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model {

    public function getAllTestimonial() {
        $query = $this->db->order_by('id', 'ASC')->get('testimonial');
        return $query->result_array();
    }

    public function addTestimonial($data) {
        $this->db->insert('testimonial', $data);
    }

    public function getTestimonialById($id) {
        $query = $this->db->get_where('testimonial', array('id' => $id));
        return $query->row_array();
    }

    public function editTestimonial($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('testimonial', $data);
    }

    public function deactivateTestimonial($id) {
        // Ubah status testimonial menjadi nonaktif (misalnya, status 0)
        $this->db->where('id', $id);
        $this->db->update('testimonial', array('status' => 0));
    }

    public function deleteTestimonial($id) {
        // Hapus testimonial dari database (opsional, sesuai dengan kebutuhan)
        $this->db->where('id', $id);
        $this->db->delete('testimonial');
    }
}
?>
