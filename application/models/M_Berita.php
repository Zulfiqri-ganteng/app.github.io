<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Berita extends CI_Model
{

    private $table = 'berita';

    public function get_berita($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul_berita', $keyword);
            $this->db->or_like('kategori', $keyword);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal_publish', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    public function count_all_berita($keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul_berita', $keyword);
        }
        return $this->db->count_all_results($this->table);
    }

    public function get_berita_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function insert_berita($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_berita($id, $data)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete_berita($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    // Fungsi untuk Top Berita di Dashboard
    public function get_top_berita($limit = 5)
    {
        $this->db->order_by('views', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result_array();
    }
}
