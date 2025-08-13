<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->library('form_validation');
    }

    /**
     * Halaman login
     */
    public function index()
    {
        // Cek jika sudah login
        if ($this->session->userdata('logged_in')) {
            redirect('admin/dashboard');
        }

        $data['judul'] = 'Login Area';

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('frontend/v_login', $data);
            $this->load->view('templates/footer_auth');
        } else {
            $this->_login();
        }
    }

    /**
     * Proses login
     */
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->M_Auth->get_user_by_username($username);

        if ($user && password_verify($password, $user['password'])) {
            // Simpan data user di session
            $data = [
                'id_user' => $user['id'],
                'username' => $user['username'],
                'level' => $user['level'],
                'logged_in' => TRUE,
            ];
            $this->session->set_userdata($data);

            // Redirect berdasarkan level
            if ($user['level'] === 'admin') {
                redirect('admin/dashboard');
            } elseif ($user['level'] === 'siswa') {
                redirect('siswa/dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Akses ditolak.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Username atau password salah.</div>');
            redirect('auth');
        }
    }

    /**
     * Logout
     */
    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<div class="alert alert-success">Anda telah keluar dari akun.</div>');
        redirect('auth');
    }
}
