<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{
    public function get_user($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }
    // Tambahkan DUA fungsi ini di dalam class M_Auth

    public function get_user_by_id($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function update_user($id, $data)
    {
        return $this->db->update('users', $data, ['id' => $id]);
    }
}
