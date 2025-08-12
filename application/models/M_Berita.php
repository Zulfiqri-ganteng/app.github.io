    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Berita extends CI_Model {
    public function get_all_berita() {
        return $this->db->order_by('id', 'DESC')->get('berita')->result_array();
    }
    // (Fungsi CRUD lain akan kita tambahkan di sini)
}