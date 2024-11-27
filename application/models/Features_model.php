<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Features_model extends CI_Model {

    public function getAllFeatures() {
        $query = $this->db->order_by('id', 'ASC')->get('features');
        return $query->result();
    }

    public function addFeatures($data) {
        $this->db->insert('features', $data);
    }

    public function getFeaturesById($id) {
        $query = $this->db->get_where('features', array('id' => $id));
        return $query->row();
    }

    public function updateFeatures($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('features', $data);
    }

    public function deleteFeatures($id) {
        $this->db->where('id', $id);
        $this->db->delete('features');
    }
}
