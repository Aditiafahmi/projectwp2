
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function hitungFeatures() {
        return $this->db->count_all('features');
    }

    public function hitungPackages() {
        return $this->db->count_all('packages');
    }

    public function hitungGallery() {
        return $this->db->count_all('gallery');
    }

    public function hitungBlog() {
        return $this->db->count_all('blog');
    }

    public function hitungClient() {
        return $this->db->count_all('testimonial');
    }
}
