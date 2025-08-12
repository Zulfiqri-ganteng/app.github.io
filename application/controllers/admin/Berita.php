<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') redirect('auth');
        $this->load->model('M_Berita');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Berita';
        $keyword = $this->input->get('keyword');
        $config['base_url'] = base_url('admin/berita/index');
        $config['total_rows'] = $this->M_Berita->count_all_berita($keyword);
        $config['per_page'] = 5;
        // ... (Styling pagination) ...

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);
        $data['berita'] = $this->M_Berita->get_berita($config['per_page'], $data['start'], $keyword);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_berita_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah()
    {
        $data['judul'] = 'Tulis Berita Baru';
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_berita_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            // ... (Logika insert data dengan upload gambar) ...
        }
    }

    public function edit($id)
    {
        // ... (Logika untuk menampilkan form edit dan update data) ...
    }

    public function hapus($id)
    {
        // ... (Logika untuk menghapus data dan gambar) ...
    }
}
