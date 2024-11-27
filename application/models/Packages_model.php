<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages_model extends CI_Model {

    public function getAllPackages() {
        $query = $this->db->get('packages');
        return $query->result_array();
    }

    public function getPackageById($id) {
        $query = $this->db->get_where('packages', array('id' => $id));
        return $query->row_array();
    }

    public function addPackage($data) {
        $this->db->insert('packages', $data);
    }

    public function editPackage($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('packages', $data);
    }

    public function deletePackage($id) {
        $this->db->where('id', $id);
        $this->db->delete('packages');
    }
}
