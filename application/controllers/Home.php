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

        if (! $data = $this->cache->get('halaman_utama_v2')) {

            $data['judul'] = 'Selamat Datang';
            $data['pengumuman_terbaru'] = $this->M_Pengumuman->get_all_pengumuman(3);
            $data['guru_beranda'] = $this->M_Guru->get_all_guru(4);
            $data['siswa_berprestasi'] = $this->M_Siswa->get_siswa_berprestasi(3); // Panggil fungsi yang benar
            $data['berita_terbaru'] = $this->M_Berita->get_berita_terbaru(3);

            $this->cache->save('halaman_utama_v2', $data, 300); // Simpan cache 5 menit
        }

        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_home', $data);
        $this->load->view('templates/footer');
    }
}
