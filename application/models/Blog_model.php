<?php
// application/models/Blog_model.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function getAllBlog() {
        // Query to fetch all blog data
        $query = $this->db->get('blog');

        // Return the result as an array of objects
        return $query->result();
    }

    public function getBlogById($id) {
        $query = $this->db->get_where('blog', array('id' => $id)); // Sesuaikan dengan 'blog' dan 'id' yang sesuai
         // Periksa apakah data ditemukan
         if ($query->num_rows() > 0) {
            // Mengembalikan objek dengan properti yang diharapkan
            return $query->row(); // Mengembalikan satu baris sebagai objek
        } else {
            // Jika data tidak ditemukan, bisa mengembalikan nilai default atau NULL
            return null;
        }
    }

    public function editBlog($id, $data) {
        // Update blog data based on ID
        $this->db->where('id', $id);
        $this->db->update('blog', $data);
    }

    public function deleteBlog($id) {
        // Delete blog data based on ID
        $this->db->where('id', $id);
        $this->db->delete('blog');
    }

    public function addBlog($data) {
        // Insert blog data into the database
        $this->db->insert('blog', $data);
    }

    // Add other model methods if needed...
}
