<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Default Controller
|--------------------------------------------------------------------------
| Controller yang dijalankan saat akses root domain
*/
$route['default_controller'] = 'home';

/*
|--------------------------------------------------------------------------
| 404 Override
|--------------------------------------------------------------------------
| Controller yang ditampilkan saat halaman tidak ditemukan
*/
$route['404_override'] = '';

/*
|--------------------------------------------------------------------------
| Translate URI Dashes
|--------------------------------------------------------------------------
| Izinkan penggunaan tanda hubung di URL (misal: data-siswa)
*/
$route['translate_uri_dashes'] = FALSE;


/*
|--------------------------------------------------------------------------
| Rute Otentikasi (Login, Register, Logout)
|--------------------------------------------------------------------------
*/
$route['auth'] = 'Auth';
$route['auth/login'] = 'Auth/index';
$route['auth/logout'] = 'Auth/logout';


/*
|--------------------------------------------------------------------------
| Rute Halaman Publik (Frontend)
|--------------------------------------------------------------------------
*/
$route['guru']                          = 'Guru';
$route['siswa']                         = 'Siswa_web';
$route['berita']                        = 'Berita';
$route['berita/detail/(:num)']          = 'Berita/detail/$1';
$route['pengumuman']                    = 'Pengumuman_web';
$route['pengumuman/detail/(:num)']      = 'Pengumuman_web/detail/$1';


/*
|--------------------------------------------------------------------------
| Rute Backend Admin
|--------------------------------------------------------------------------
| Semua rute admin diawali dengan /admin/...
*/

// Dashboard
$route['admin']                         = 'admin/Dashboard';
$route['admin/dashboard']               = 'admin/Dashboard';

// Profil Admin
$route['admin/profil']                  = 'admin/Profil';
$route['admin/profil/update_password']  = 'admin/Profil/update_password';

// Manajemen Berita
$route['admin/berita']                  = 'admin/Berita';
$route['admin/berita/tambah']           = 'admin/Berita/tambah';
$route['admin/berita/edit/(:num)']      = 'admin/Berita/edit/$1';
$route['admin/berita/hapus/(:num)']     = 'admin/Berita/hapus/$1';

// Manajemen Pengumuman
$route['admin/pengumuman']              = 'admin/Pengumuman';
$route['admin/pengumuman/tambah']       = 'admin/Pengumuman/tambah';
$route['admin/pengumuman/edit/(:num)']  = 'admin/Pengumuman/edit/$1';
$route['admin/pengumuman/hapus/(:num)'] = 'admin/Pengumuman/hapus/$1';

// Manajemen Guru
$route['admin/guru']                    = 'admin/Guru';
$route['admin/guru/tambah']             = 'admin/Guru/tambah';
$route['admin/guru/edit/(:num)']        = 'admin/Guru/edit/$1';
$route['admin/guru/hapus/(:num)']       = 'admin/Guru/hapus/$1';

// Manajemen Siswa
$route['admin/siswa']                   = 'admin/Siswa';
$route['admin/siswa/tambah']            = 'admin/Siswa/tambah';
$route['admin/siswa/edit/(:num)']       = 'admin/Siswa/edit/$1';
$route['admin/siswa/hapus/(:num)']      = 'admin/Siswa/hapus/$1';

// Manajemen Ujian (jika ada)
$route['admin/ujian']                   = 'admin/Ujian';
$route['admin/ujian/set_status/(:num)/(:any)'] = 'admin/Ujian/set_status/$1/$2';

// Manajemen Jurusan (opsional)
$route['admin/jurusan'] = 'admin/Jurusan';

// Manajemen Galeri (opsional)
$route['admin/galeri'] = 'admin/Galeri';


/*
|--------------------------------------------------------------------------
| Rute Backend Siswa (jika ada panel siswa)
|--------------------------------------------------------------------------
*/
$route['siswa/dashboard']               = 'siswa/Dashboard';
$route['siswa/ujian']                   = 'siswa/Ujian';
$route['siswa/ujian/kerjakan/(:num)']   = 'siswa/Ujian/kerjakan/$1';
$route['siswa/ujian/hasil/(:num)']      = 'siswa/Ujian/hasil/$1';


/*
|--------------------------------------------------------------------------
| Rute Tambahan (Opsional - Bisa Dikembangkan)
|--------------------------------------------------------------------------
*/
$route['tentang']       = 'home/tentang';
$route['kontak']        = 'home/kontak';
$route['layanan']       = 'home/layanan';

/*
|--------------------------------------------------------------------------
| Akhiri tanpa penutup PHP untuk hindari output tak terduga
|--------------------------------------------------------------------------
*/

$route['admin/profil/upload_foto'] = 'admin/Profil/upload_foto';
$route['admin/profil/update_password'] = 'admin/Profil/update_password';
