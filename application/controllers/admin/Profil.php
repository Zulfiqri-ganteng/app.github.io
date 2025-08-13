<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Cek login & level admin
        if (!$this->session->userdata('logged_in') || $this->session->userdata('level') != 'admin') {
            redirect('auth');
        }

        // Muat model dan library
        $this->load->model('M_Auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Profil Admin';
        $admin_id = $this->session->userdata('id_user');

        // Ambil data admin dari M_Auth
        $data['admin'] = $this->M_Auth->get_user_by_id($admin_id);

        if (!$data['admin']) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data admin tidak ditemukan.</div>');
            redirect('admin/dashboard');
        }

        // Aturan validasi form ganti password
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[8]|matches[konfirmasi_password]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // Tampilkan view jika validasi gagal
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_profil', $data);
            $this->load->view('templates/footer_admin');
        } else {
            // Proses update password
            $this->update_password();
        }
    }

    private function update_password()
    {
        $admin_id = $this->session->userdata('id_user');
        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');

        $user = $this->M_Auth->get_user_by_id($admin_id);

        if (!$user) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Akun tidak ditemukan.</div>');
            redirect('admin/profil');
        }

        // Verifikasi password lama
        if (!password_verify($password_lama, $user['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Password lama salah.</div>');
            redirect('admin/profil');
        }

        // Enkripsi password baru
        $hashed_password = password_hash($password_baru, PASSWORD_DEFAULT);

        // Update ke database via M_Auth
        $this->M_Auth->update_password($admin_id, $hashed_password);

        // Set notifikasi sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success">Password berhasil diperbarui.</div>');
        redirect('admin/profil');
    }
}
