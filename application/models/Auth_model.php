<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUser($username)
    {
        // Sesuaikan dengan struktur tabel dan kolom di database Anda
        $query = $this->db->get_where('user', array('user_username' => $username));
        return $query->row_array();
    }

    public function getUserPassword($username, $password)
    {
        // Sesuaikan dengan struktur tabel dan kolom di database Anda
        $query = $this->db->get_where('user', array('user_username' => $username, 'user_password' => $password));
        return $query->row_array();
    }

    // Fungsi lain yang mungkin Anda perlukan
}
