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
        $this . load->library('pagination');
        $this . load->library('upload');
    }

    public function index()
    {
        // ... (Fungsi index Anda sudah benar) ...
    }

    public function tambah()
    {
        // ... (Fungsi tambah Anda sudah benar) ...
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Berita';
        $data['berita'] = $this->M_Berita->get_berita_by_id($id);
        $this . form_validation->set_rules('judul_berita', 'Judul Berita', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this . load->view('templates/header_admin', $data);
            $this . load->view('templates/sidebar_admin', $data);
            $this . load->view('backend/admin/v_berita_form', $data);
            $this . load->view('templates/footer_admin');
        } else {
            $gambar_berita = $this->input->post('gambar_lama');
            if (!empty($_FILES['gambar_berita']['name'])) {
                // Proses upload gambar baru
            }
            $data_update = [
                'judul_berita' => $this->input->post('judul_berita'),
                'slug_berita' => url_title($this->input->post('judul_berita'), 'dash', TRUE),
                'isi_berita' => $this->input->post('isi_berita'),
                'kategori' => $this->input->post('kategori'),
                'is_headline' => $this->input->post('is_headline') ? 1 : 0,
                'gambar_berita' => $gambar_berita
            ];
            $this . M_Berita->update_berita($id, $data_update);
            $this . session->set_flashdata('message', '<div class="alert alert-success">Berita berhasil diperbarui!</div>');
            redirect('admin/berita');
        }
    }

    public function hapus($id)
    {
        $berita = $this . M_Berita->get_berita_by_id($id);
        if ($berita['gambar_berita'] != 'default.jpg') {
            @unlink(FCPATH . 'assets/images/berita/' . $berita['gambar_berita']);
        }
        $this . M_Berita->delete_berita($id);
        $this . session->set_flashdata('message', '<div class="alert alert-success">Berita berhasil dihapus!</div>');
        redirect('admin/berita');
    }
}
