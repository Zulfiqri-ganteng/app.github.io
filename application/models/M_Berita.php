<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Berita extends CI_Model
{

    private $table = 'berita';

    /**
     * Mengambil data berita untuk panel admin dengan fitur pagination dan pencarian.
     * @param int    $limit   Batasan jumlah data per halaman.
     * @param int    $start   Mulai dari data ke berapa.
     * @param string $keyword Kata kunci untuk pencarian.
     * @return array
     */
    public function get_berita_admin($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul_berita', $keyword);
            $this->db->or_like('kategori', $keyword);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('tanggal_publish', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Menghitung total semua berita untuk pagination di panel admin.
     * @param string $keyword Kata kunci untuk pencarian agar pagination akurat.
     * @return int
     */
    public function count_all_berita_admin($keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul_berita', $keyword);
            $this->db->or_like('kategori', $keyword);
        }
        return $this->db->count_all_results($this->table);
    }

    /**
     * Mengambil satu data berita berdasarkan ID.
     * @param int $id ID berita.
     * @return array
     */
    public function get_berita_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    /**
     * Menyimpan data berita baru ke database.
     * @param array $data Data berita yang akan disimpan.
     * @return bool
     */
    public function insert_berita($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Memperbarui data berita yang sudah ada.
     * @param int   $id   ID berita yang akan diupdate.
     * @param array $data Data baru untuk berita.
     * @return bool
     */
    public function update_berita($id, $data)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    /**
     * Menghapus data berita dari database.
     * @param int $id ID berita yang akan dihapus.
     * @return bool
     */
    public function delete_berita($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    // =======================================================
    // FUNGSI UNTUK TAMPILAN DEPAN (FRONTEND) & DASHBOARD
    // =======================================================

    /**
     * Mengambil berita terbaru untuk ditampilkan di halaman utama.
     * @param int $limit Jumlah berita yang ingin ditampilkan.
     * @return array
     */
    public function get_berita_terbaru($limit)
    {
        $this->db->order_by('tanggal_publish', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Mengambil berita yang paling banyak dilihat untuk ditampilkan di dasbor admin.
     * @param int $limit Jumlah berita yang ingin ditampilkan.
     * @return array
     */
    public function get_top_berita($limit = 5)
    {
        $this->db->order_by('views', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result_array();
    }
}
