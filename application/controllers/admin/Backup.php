<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        // Muat DB utility
        $this->load->dbutil();
    }

    public function index()
    {
        // Konfigurasi backup
        $prefs = [
            'format'   => 'zip', // Format file: zip, gzip, txt
            'filename' => 'backup_db_smkgalajuara_' . date("Y-m-d-H-i-s") . '.sql',
        ];

        // Proses backup
        $backup = $this->dbutil->backup($prefs);

        // Muat helper download dan paksa unduh
        $this->load->helper('download');
        force_download($prefs['filename'] . '.zip', $backup);
    }
}
