<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Routing halaman admin */
$route['beranda-admin'] = 'admin/beranda/index';
$route['login-user'] = 'admin/login/index';
$route['logout-user'] = 'admin/login/logout';
$route['pengaturan-admin'] = 'admin/pengaturan/index';

    // routing group sidebar Web
$route['pengaturan-profil-admin'] = 'admin/profil/index';
$route['pengaturan-sejarah-admin'] = 'admin/sejarah/index';
$route['pengaturan-visi-misi-admin'] = 'admin/visimisi/index';
$route['pengaturan-struktur-admin'] = 'admin/struktur/index';
$route['pengaturan-kategori-artikel-admin'] = 'admin/kategori_artikel/index';
$route['pengaturan-artikel-admin'] = 'admin/artikel/index';
$route['pengaturan-foto-admin'] = 'admin/foto/index';
$route['pengaturan-vidio-admin'] = 'admin/vidio/index';
$route['pengaturan-slider-admin'] = 'admin/slider/index';
$route['pengaturan-tahun-pelajaran-admin'] = 'admin/tahun_pelajaran/index';
$route['pengaturan-semester-admin'] = 'admin/semester/index';
$route['pengaturan-tingkat-admin'] = 'admin/tingkat/index';
$route['pengaturan-gedung-admin'] = 'admin/gedung/index';
$route['pengaturan-ruangan-admin'] = 'admin/ruangan/index';
$route['pengaturan-kelas-admin'] = 'admin/kelas/index';
$route['data-administrator'] = 'admin/administrator/index';
$route['data-guru'] = 'admin/guru/index';
$route['data-siswa'] = 'admin/siswa/index';
$route['akademik-rentang-nilai'] = 'admin/rentang_nilai/index';
$route['akademik-mata-pelajaran'] = 'admin/mata_pelajaran/index';
$route['akademik-jadwal-pelajaran'] = 'admin/jadwal_pelajaran/index';
$route['akademik-kompetensi-dasar'] = 'admin/kompetensi_dasar/index';
$route['akademik-agenda-mengajar'] = 'admin/agenda_mengajar/index';
$route['akademik-absensi-siswa'] = 'admin/absensi_siswa/index';
$route['akademik-input-absensi'] = 'admin/absensi_siswa/inputabsensi';
$route['akademik-input-nilai-uts'] = 'admin/input_nilai_uts/index';
$route['akademik-input-nilai-rapor'] = 'admin/input_nilai_rapor/index';
$route['akademik-input-nilai-extrakurikuler'] = 'admin/input_nilai_extrakurikuler/index';
$route['akademik-pengumuman'] = 'admin/pengumuman/index';
$route['akademik-rekap-absensi'] = 'admin/rekap_absensi/index';
$route['cetak-rapor-uts'] = 'admin/cetak_rapor_uts/index';
$route['cetak-rapor'] = 'admin/cetak_rapor/index';
$route['print-rapor-uts'] = 'admin/cetak_rapor_uts/cetakRaporUts';
$route['print-rapor'] = 'admin/cetak_rapor/cetakRapor';

    //routing group sidebar Master

/* Akhir routing halaman admin */


// routing untuk halaman user umum
$route['beranda-umum'] = 'beranda/index';

