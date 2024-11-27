<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{

    public function getContact()
    {
        // Query untuk menampilkan semua data contact diurutkan berdasarkan id
        $query = $this->db->query("SELECT * FROM contact ORDER BY id ASC");
        return $query->result_array();
    }

    public function deleteContact($id)
    {
        // Query untuk menghapus contact berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('contact');
    }

    // Contact_model.php
    
    public function saveContact($data) {
        // Masukkan data ke dalam tabel 'contact' dengan kolom yang sesuai
        $this->db->insert('contact', $data);

        // Periksa apakah data berhasil disimpan
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


}
