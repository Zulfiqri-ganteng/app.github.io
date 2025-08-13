<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in') || $this->session->userdata('level') !== 'admin') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Akses ditolak. Silakan login sebagai admin.</div>');
            redirect('auth/login');
        }

        $this->load->model('M_Auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Profil Admin';
        $user_id = $this->session->userdata('id_user');
        $data['admin'] = $this->M_Auth->get_user_by_id($user_id);

        if (!$data['admin']) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data pengguna tidak ditemukan.</div>');
            redirect('admin/dashboard');
        }

        // Aturan validasi untuk edit profil
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|max_length[30]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_profil', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->_update_profile();
        }
    }

    private function _update_profile()
    {
        $user_id = $this->session->userdata('id_user');
        $input = $this->input->post(null, true);

        // Cek apakah username sudah dipakai orang lain
        if ($this->M_Auth->is_username_exists($input['username'], $user_id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Username <strong>' . $input['username'] . '</strong> sudah digunakan.</div>');
            redirect('admin/profil');
        }

        $data = [
            'nama_lengkap' => $input['nama_lengkap'],
            'username'     => $input['username']
        ];

        if ($this->M_Auth->update_user($user_id, $data)) {
            // Update session
            $this->session->set_userdata('nama_lengkap', $input['nama_lengkap']);
            $this->session->set_userdata('username', $input['username']);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Profil berhasil diperbarui.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal memperbarui profil.</div>');
        }

        redirect('admin/profil');
    }

    public function update_password()
    {
        $user_id = $this->session->userdata('id_user');
        $input = $this->input->post(null, true);

        $user = $this->M_Auth->get_user_by_id($user_id);

        if (!password_verify($input['password_lama'], $user['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Password lama salah.</div>');
            redirect('admin/profil');
        }

        if ($input['password_lama'] === $input['password_baru']) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Password baru tidak boleh sama dengan password lama.</div>');
            redirect('admin/profil');
        }

        $new_password = password_hash($input['password_baru'], PASSWORD_DEFAULT);
        if ($this->M_Auth->update_password($user_id, $new_password)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Password berhasil diperbarui.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal memperbarui password.</div>');
        }

        redirect('admin/profil');
    }

    public function upload_foto()
    {
        $user_id = $this->session->userdata('id_user');
        $user = $this->M_Auth->get_user_by_id($user_id);

        $config['upload_path']   = './assets/images/profil/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = 2048; // 2MB
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_profil')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Upload gagal: ' . $error . '</div>');
        } else {
            $file = $this->upload->data();

            // Hapus foto lama jika bukan default
            if ($user['foto'] && $user['foto'] !== 'default.jpg') {
                @unlink(FCPATH . 'assets/images/profil/' . $user['foto']);
            }

            // Simpan nama file ke database
            $this->M_Auth->update_user($user_id, ['foto' => $file['file_name']]);

            // Update session
            $this->session->set_userdata('foto', $file['file_name']);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Foto profil berhasil diubah.</div>');
        }

        redirect('admin/profil');
    }
}
