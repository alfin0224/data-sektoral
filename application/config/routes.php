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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Login
$route['admin'] = 'AuthController';

//After Login
$route['admin/dashboard'] = 'DashboardController';

// Profile
$route['admin/profile'] = 'user/ProfileController';
$route['admin/profile/ubah-profile'] = 'user/ProfileController/ubahProfile';
$route['admin/profile/simpan-ubah-profile/(:any)'] = 'user/ProfileController/simpanUbahProfile/$1';

//Data master
$route['admin/master/master-opd'] = 'master/OPDController/masterOPD';
$route['admin/master/master-opd/tambah-opd'] = 'master/OPDController/tambahOPD';
$route['admin/master/master-opd/simpan-opd'] = 'master/OPDController/simpanOPD';
$route['admin/master/master-opd/ubah-opd/(:any)'] = 'master/OPDController/ubahOPD/$1';
$route['admin/master/master-opd/simpan-ubah-opd/(:any)'] = 'master/OPDController/simpanUbahOPD/$1';
$route['admin/master/master-opd/hapus-opd/(:any)'] = 'master/OPDController/hapusOPD/$1';
$route['admin/master/master-pengguna'] = 'master/PenggunaController/masterPengguna';
$route['admin/master/master-pengguna/tambah-pengguna'] = 'master/PenggunaController/tambahPengguna';
$route['admin/master/master-pengguna/simpan-pengguna'] = 'master/PenggunaController/simpanPengguna';
$route['admin/master/master-pengguna/ubah-pengguna/(:any)'] = 'master/PenggunaController/ubahPengguna/$1';
$route['admin/master/master-pengguna/simpan-ubah-pengguna/(:any)'] = 'master/PenggunaController/simpanUbahPengguna/$1';
$route['admin/master/master-pengguna/hapus-pengguna/(:any)'] = 'master/PenggunaController/hapusPengguna/$1';
$route['admin/master/master-pengguna/ubah-status/(:any)'] = 'master/PenggunaController/ubahStatus/$1';

//RPJMD
$route['admin/rpjmd/setting-rpjmd'] = 'rpjmdController/settingRPJMD';
$route['admin/rpjmd/tambah-rpjmd'] = 'rpjmdController/tambahRPJMD';
$route['admin/rpjmd/simpan-setting-rpjmd'] = 'rpjmdController/simpanSetting';
$route['admin/rpjmd/ubah-setting-rpjmd/(:any)'] = 'rpjmdController/ubahSetting/$1';
$route['admin/rpjmd/ubah-status-rpjmd/(:any)/(:any)'] = 'rpjmdController/ubahStatusRpjmd/$1/$1';
$route['admin/rpjmd/simpan-ubah-setting/(:any)'] = 'rpjmdController/simpanUbahSetting/$1';
$route['admin/rpjmd/input-rpjmd'] = 'rpjmdController/inputRPJMD';
$route['admin/rpjmd/visi-misi'] = 'rpjmdController/visiMisi';
$route['admin/rpjmd/visi-misi/tambah-misi'] = 'rpjmdController/tambahMisi';
$route['admin/rpjmd/visi-misi/simpan-misi'] = 'rpjmdController/simpanMisi';
$route['admin/rpjmd/visi-misi/ubah-misi/(:any)'] = 'rpjmdController/ubahMisi/$1';
$route['admin/rpjmd/visi-misi/simpan-ubah-misi/(:any)'] = 'rpjmdController/simpanUbahMisi/$1';
$route['admin/rpjmd/gambaran-umum'] = 'rpjmdController/gambaranUmum';
$route['admin/rpjmd/gambaran-umum/indikator/(:any)'] = 'rpjmdController/indikator/$1';
$route['admin/rpjmd/gambaran-umum/indikator/tambah-indikator/(:any)'] = 'rpjmdController/tambahIndikator/$1';
$route['admin/rpjmd/gambaran-umum/indikator/simpan-indikator/(:any)'] = 'rpjmdController/simpanIndikator/$1';
$route['admin/rpjmd/rumusan-masalah'] = 'rpjmdController/rumusanMasalah';
$route['admin/rpjmd/rumusan-masalah/detail/(:any)'] = 'rpjmdController/detailRumusan/$1';
$route['admin/rpjmd/rumusan-masalah/tambah-masalah-pokok/(:any)'] = 'rpjmdController/tambahMasalahPokok/$1';
$route['admin/rpjmd/rumusan-masalah/simpan-masalah-pokok'] = 'rpjmdController/simpanMasalahPokok';
$route['admin/rpjmd/rumusan-masalah/tambah-rumusan-masalah/(:any)'] = 'rpjmdController/tambahRumusanMasalah/$1';
$route['admin/rpjmd/isu-strategis'] = 'rpjmdController/isuStrategis';
$route['admin/rpjmd/tujuan-sasaran'] = 'rpjmdController/tujuanSasaran';

//Import Perencanaan
// $route['admin/import-perencanaan/rpjmd'] = 'rpjmdRenstraRenjaController/rpjmd';
// $route['admin/import-perencanaan/renstra'] = 'rpjmdRenstraRenjaController/renstra';
$route['admin/import-perencanaan/renja'] = 'import/RenjaController/indexRenja';
$route['admin/import-perencanaan/proses-renja'] = 'import/RenjaController/prosesRenja';
$route['admin/import-perencanaan/hapus-renja/(:any)'] = 'import/RenjaController/hapusRenja/$1';
$route['admin/import-perencanaan/data-rkpd-opd'] = 'import/RKPDPController/indexDataRkpdOpd';
$route['admin/import-perencanaan/data-rkpd-opd/detail'] = 'import/RKPDPController/detailDataRkpdOpd';
$route['admin/import-perencanaan/data-rkpd-opd/kegiatan'] = 'import/RKPDPController/getKegiatan';
$route['admin/import-perencanaan/data-rkpd-opd/sub-kegiatan'] = 'import/RKPDPController/getSubKegiatan';
$route['admin/import-perencanaan/data-rkpd-opd/cetak'] = 'import/RKPDPController/cetak';
