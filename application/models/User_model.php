<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_user($data)
    {
        return $this->db->insert('user', $data);
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function update_verification_code($user_id, $code)
    {
        $this->db->where('id', $user_id);
        $this->db->update('user', ['verification_code' => $code]);
    }

    public function get_user_by_verification_code($code)
    {
        return $this->db->get_where('user', ['verification_code' => $code])->row_array();
    }

    public function clear_verification_code($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->update('user', ['verification_code' => null]);
    }

    public function update_password($user_id, $new_password)
    {
        $this->db->where('id', $user_id);
        $this->db->update('user', ['user_password' => md5($new_password)]);
    }
}
