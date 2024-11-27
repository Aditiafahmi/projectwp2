<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About_model extends CI_Model
{
    public function getAllAbout()
    {
        // Ambil semua data about dari database
        return $this->db->get('about')->result();
    }

    public function getAboutById($id)
    {
        // Ambil data about berdasarkan ID dari database
        return $this->db->get_where('about', array('id' => $id))->row();
    }

    public function addAbout($data)
    {
        // Tambahkan data about ke database
        $this->db->insert('about', $data);
    }

    public function updateAbout($id, $data)
    {
        // Update data about berdasarkan ID di database
        $this->db->where('id', $id);
        $this->db->update('about', $data);
    }

    public function deleteAbout($id)
    {
        // Hapus data about berdasarkan ID dari database
        $this->db->where('id', $id);
        $this->db->delete('about');
    }
}
