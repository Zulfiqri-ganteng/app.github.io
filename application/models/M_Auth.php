<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Model M_Auth
 * Mengelola autentikasi: login, register, dan update data pengguna
 * Kompatibel dengan modul lain (admin, siswa, guru, dll)
 */
class M_Auth extends CI_Model
{

    private $table = 'users'; // Ganti dengan nama tabel Anda jika berbeda

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // =======================================================
    // 🔐 FUNGSI OTENTIKASI
    // =======================================================

    /**
     * Cek login pengguna
     * @param string $username
     * @param string $password
     * @return array|bool
     */
    public function login_user($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->table);

        if ($query->num_rows() === 1) {
            $user = $query->row_array();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }

    /**
     * Simpan data pengguna baru (register)
     * @param array $data
     * @return bool
     */
    public function register_user($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // =======================================================
    // 👤 MANAJEMEN PENGGUNA
    // =======================================================

    /**
     * Ambil data pengguna berdasarkan ID
     * Digunakan di Profil Admin, Dashboard, dll
     * @param int $id
     * @return array
     */
    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }
    public function get_user_by_username($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }

    /**
     * Ambil semua pengguna (opsional, untuk manajemen user)
     * @return array
     */
    public function get_all_users()
    {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * Update data pengguna (kecuali password)
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Update password pengguna
     * Digunakan di Profil Admin
     * @param int $id
     * @param string $password_hash
     * @return bool
     */
    public function update_password($id, $password_hash)
    {
        $this->db->set('password', $password_hash);
        $this->db->where('id', $id);
        return $this->db->update($this->table);
    }

    /**
     * Hapus pengguna
     * @param int $id
     * @return bool
     */
    public function delete_user($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    /**
     * Cek apakah username sudah ada (untuk validasi)
     * @param string $username
     * @param int $exclude_id (opsional, saat edit)
     * @return bool
     */
    public function is_username_exists($username, $exclude_id = null)
    {
        $this->db->where('username', $username);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        return $this->db->get($this->table)->num_rows() > 0;
    }

    // =======================================================
    // 📊 FUNGSI TAMBAHAN (Untuk Dashboard)
    // =======================================================

    /**
     * Hitung total admin
     * @return int
     */
    public function count_admins()
    {
        $this->db->where('level', 'admin');
        return $this->db->count_all_results($this->table);
    }

    /**
     * Hitung total pengguna
     * @return int
     */
    public function count_all_users()
    {
        return $this->db->count_all($this->table);
    }

    /**
     * Ambil pengguna terbaru (untuk dashboard)
     * @param int $limit
     * @return array
     */
    public function get_latest_users($limit = 5)
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result_array();
    }

    // =======================================================
    // 🔍 PENCARIAN & PAGINASI (Opsional)
    // =======================================================

    /**
     * Cari pengguna berdasarkan kata kunci
     * @param string $keyword
     * @return array
     */
    public function search_users($keyword)
    {
        $this->db->group_start();
        $this->db->like('nama_lengkap', $keyword);
        $this->db->or_like('username', $keyword);
        $this->db->or_like('level', $keyword);
        $this->db->group_end();
        $this->db->order_by('nama_lengkap', 'ASC');
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Hitung total data untuk pagination
     * @param string $keyword
     * @return int
     */
    public function count_users_by_keyword($keyword = null)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('nama_lengkap', $keyword);
            $this->db->or_like('username', $keyword);
            $this->db->or_like('level', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results($this->table);
    }

    /**
     * Ambil data dengan pagination
     * @param int $limit
     * @param int $start
     * @param string $keyword
     * @return array
     */
    public function get_users_paginated($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('nama_lengkap', $keyword);
            $this->db->or_like('username', $keyword);
            $this->db->or_like('level', $keyword);
            $this->db->group_end();
        }
        $this->db->order_by('nama_lengkap', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result_array();
    }
}
