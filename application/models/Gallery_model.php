
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

    public function getAllGallery() {
        // Query to fetch all gallery data
        $query = $this->db->get('gallery');

        // Return the result as an array of objects
        return $query->result();
    }

    public function getGalleryById($id) {
        // Query to fetch gallery data based on ID
        $query = $this->db->get_where('gallery', array('id' => $id));

        // Return the result as an object
        return $query->row();
    }

    public function editGallery($id, $data) {
        // Update gallery data based on ID
        $this->db->where('id', $id);
        $this->db->update('gallery', $data);
    }

    public function deleteGallery($id) {
        // Delete gallery data based on ID
        $this->db->where('id', $id);
        $this->db->delete('gallery');
    }

    public function addGallery($data) {
        // Insert gallery data into the database
        $this->db->insert('gallery', $data);
    }

}
