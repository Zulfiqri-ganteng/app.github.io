<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pengumuman');
        $this->load->model('M_Guru');
        $this->load->model('M_Siswa');
        $this->load->model('M_Berita');
    }

    public function index()
    {
        $this->load->driver('cache', array('adapter' => 'file'));

        // Coba ambil data dari cache
        if (! $data = $this->cache->get('halaman_utama')) {
            // Jika tidak ada cache, ambil data baru dari database
            $data['judul'] = 'Selamat Datang';
            $data['pengumuman_terbaru'] = $this->M_Pengumuman->get_all_pengumuman(3); // Ambil 3 pengumuman
            $data['guru_beranda'] = $this->M_Guru->get_all_guru(4); // Ambil 4 guru
            $data['berita_terbaru'] = $this->M_Berita->get_berita_terbaru(3); // Ambil 3 berita

            // Simpan data ke cache selama 5 menit (300 detik)
            $this->cache->save('halaman_utama', $data, 300);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_home', $data);
        $this->load->view('templates/footer');
    }
}
