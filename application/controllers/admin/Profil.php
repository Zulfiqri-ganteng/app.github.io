<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Auth'); // Kita gunakan model Auth yang sudah ada
        $this->load->library('form_validation');
    }

    public function index() {
        $data['judul'] = 'Profil Saya';
        // Ambil data admin yang sedang login dari database
        $data['admin'] = $this->M_Auth->get_user_by_id($this->session->userdata('id_user'));
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_profil', $data); // Buat view ini
        $this->load->view('templates/footer_admin');
    }

    public function update_password() {
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[5]|matches[konfirmasi_password]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|trim|matches[password_baru]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman profil
            $this->index();
        } else {
            $id_admin = $this->session->userdata('id_user');
            $admin = $this->M_Auth->get_user_by_id($id_admin);
            $password_lama = $this->input->post('password_lama');

            // Cek apakah password lama yang dimasukkan benar
            if (password_verify($password_lama, $admin['password'])) {
                // Jika benar, hash password baru dan update ke database
                $password_baru_hash = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);
                $this->M_Auth->update_user($id_admin, ['password' => $password_baru_hash]);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Password berhasil diubah!</div>');
                redirect('admin/profil');
            } else {
                // Jika password lama salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Password lama yang Anda masukkan salah!</div>');
                redirect('admin/profil');
            }
        }
    }
}