<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
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
        $config['total_rows'] = $this->M_Berita->count_all_berita_admin($keyword);
        $config['per_page'] = 5;
        $config['reuse_query_string'] = TRUE;
        // ... (Styling pagination bisa ditambahkan di sini) ...

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);
        $data['berita'] = $this->M_Berita->get_berita_admin($config['per_page'], $data['start'], $keyword);
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
            $gambar_berita = $this->_upload_gambar(); // Panggil fungsi upload

            $data_insert = [
                'judul_berita'  => $this->input->post('judul_berita'),
                'slug_berita'   => url_title($this->input->post('judul_berita'), 'dash', TRUE),
                'isi_berita'    => $this->input->post('isi_berita'),
                'kategori'      => $this->input->post('kategori'),
                'is_headline'   => $this->input->post('is_headline') ? 1 : 0,
                'gambar_berita' => $gambar_berita,
                'penulis_id'    => $this->session->userdata('id_user')
            ];

            $this->M_Berita->insert_berita($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Berita baru berhasil dipublikasikan!</div>');
            redirect('admin/berita');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Berita';
        $data['berita'] = $this->M_Berita->get_berita_by_id($id);
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_berita_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $gambar_berita = $this->input->post('gambar_lama');
            if (!empty($_FILES['gambar_berita']['name'])) {
                $gambar_berita_baru = $this->_upload_gambar();
                if ($gambar_berita_baru) {
                    if ($gambar_berita != 'default.jpg') {
                        @unlink(FCPATH . 'assets/images/berita/' . $gambar_berita);
                    }
                    $gambar_berita = $gambar_berita_baru;
                }
            }

            $data_update = [
                'judul_berita'  => $this->input->post('judul_berita'),
                'slug_berita'   => url_title($this->input->post('judul_berita'), 'dash', TRUE),
                'isi_berita'    => $this->input->post('isi_berita'),
                'kategori'      => $this->input->post('kategori'),
                'is_headline'   => $this->input->post('is_headline') ? 1 : 0,
                'gambar_berita' => $gambar_berita
            ];
            $this->M_Berita->update_berita($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Berita berhasil diperbarui!</div>');
            redirect('admin/berita');
        }
    }

    public function hapus($id)
    {
        $berita = $this->M_Berita->get_berita_by_id($id);
        if ($berita['gambar_berita'] != 'default.jpg') {
            @unlink(FCPATH . 'assets/images/berita/' . $berita['gambar_berita']);
        }
        $this->M_Berita->delete_berita($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Berita berhasil dihapus!</div>');
        redirect('admin/berita');
    }

    private function _upload_gambar()
    {
        $config['upload_path']   = './assets/images/berita/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name']  = TRUE;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar_berita')) {
            return $this->upload->data('file_name');
        }
        return 'default.jpg';
    }
}
