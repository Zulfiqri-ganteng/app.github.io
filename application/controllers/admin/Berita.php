<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') redirect('auth');
        $this->load->model('M_Berita');
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Berita';
        $data['berita'] = $this->M_Berita->get_all_berita();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_berita_list', $data);
        $this->load->view('templates/footer_admin');
    }
    // (Fungsi CRUD akan kita tambahkan di sini)
}
