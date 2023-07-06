<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rpjmdController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();	
		$this->load->model('Model_rpjmd');
	}

	public function settingRPJMD()
	{
		$data['page'] = 'setting-rpjmd';

		$data['setting_rpjmd'] = $this->Model_rpjmd->get('setting_rpjmd')->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/setting-rpjmd', $data);
		$this->load->view('admin/layout/footer');
	}

	public function tambahRPJMD()
	{
		$data['page'] = 'setting-rpjmd';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/tambah/tambah-rpjmd', $data);
		$this->load->view('admin/layout/footer');
	}
	public function simpanSetting()
	{
		$kode = $this->input->post('kode');
		$tahun_mulai = $this->input->post('tahun_mulai');
		$tahun_selesai = $this->input->post('tahun_selesai');
		$visi = $this->input->post('visi');
		$id_status = $this->input->post('status');
		
		$object = array(
			'kode'  => $kode,
			'tahun_mulai' => $tahun_mulai,
			'tahun_selesai' => $tahun_selesai,
			'visi' => $visi,
			'id_status' => $id_status
		);
		$this->Model_rpjmd->insert('setting_rpjmd', $object);

		// $this->load->library('user_agent');
		// $browser = $this->agent->browser();
		// $browser_version = $this->agent->version();
		// $os = $this->agent->platform();
		// $ip_address = $this->input->ip_address();

		// insert log activity
		// $isi_data_log = array(
		// 	'tgl_aktivitas'   => date("Y-m-d H:i:s"),
		// 	'keterangan' => 'tambah data kategori oleh user dengan nama asli '.$this->session->userdata('nama'). ' dan kode role '.$this->session->userdata('id_role'),
		// 	'jenis_aktivitas' => 'tambah data',
		// 	'username' => $this->session->userdata('username'),
		// 	'perangkat' =>  $browser.'-'.$browser_version.', '.$os.', '.$ip_address
		// );
		// $this->Model_kategori->insert('log_user', $isi_data_log);
		$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Menambah Data'));
		redirect('admin/rpjmd/setting-rpjmd','refresh');
	}

	public function ubahSetting($id)
	{
		$id_rpjmd	= $id;
		$data['page'] = 'setting-rpjmd';
		$data['setting_rpjmd'] = $this->Model_rpjmd->get_duatable('*','setting_rpjmd', 'status_rpjmd', 'setting_rpjmd.id_status=status_rpjmd.id_status', 'id_rpjmd='.$id_rpjmd, 'setting_rpjmd.id_status');

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/ubah/ubah-setting-rpjmd', $data);
		$this->load->view('admin/layout/footer');
	}

	public function UbahStatusRpjmd(){
		$id_rpjmd = $this->uri->segment(4);
		// var_dump($id_rpjmd);
		// exit(0);
		$id_status = $this->uri->segment(5);

		$object = array(
			'id_status' => $id_status
		);
		$this->Model_rpjmd->update('setting_rpjmd', 'id_rpjmd='.$id_rpjmd, $object);

		// $this->load->library('user_agent');
		// $browser = $this->agent->browser();
		// $browser_version = $this->agent->version();
		// $os = $this->agent->platform();
		// $ip_address = $this->input->ip_address();

		// // insert log activity
		// $isi_data_log = array(
		// 	'tgl_aktivitas'   => date("Y-m-d H:i:s"),
		// 	'keterangan' => 'ubah data kategori dg id '.$id_kategori.' oleh user dengan nama asli '.$this->session->userdata('nama'). ' dan kode role '.$this->session->userdata('id_role'),
		// 	'jenis_aktivitas' => 'ubah data',
		// 	'username' => $this->session->userdata('username'),
		// 	'perangkat' =>  $browser.'-'.$browser_version.', '.$os.', '.$ip_address
		// );
		// $this->Model_kategori->insert('log_user', $isi_data_log);
		redirect('admin/rpjmd/setting-rpjmd', 'refresh');
	}

	public function simpanUbahSetting($id){
		// var_dump($id);
		// exit(0);
		$id_rpjmd	= $id;
		$kode = $this->input->post('kode');
		$tahun_mulai = $this->input->post('tahun_mulai');
		$tahun_selesai = $this->input->post('tahun_selesai');
		$visi = $this->input->post('visi');

		$object = array(
			'kode'  => $kode,
			'tahun_mulai' => $tahun_mulai,
			'tahun_selesai' => $tahun_selesai,
			'visi' => $visi
		);
		$this->Model_rpjmd->update('setting_rpjmd', 'id_rpjmd='.$id_rpjmd, $object);

		// $this->load->library('user_agent');
		// $browser = $this->agent->browser();
		// $browser_version = $this->agent->version();
		// $os = $this->agent->platform();
		// $ip_address = $this->input->ip_address();

		// // insert log activity
		// $isi_data_log = array(
		// 	'tgl_aktivitas'   => date("Y-m-d H:i:s"),
		// 	'keterangan' => 'ubah data kategori dg id '.$id_kategori.' oleh user dengan nama asli '.$this->session->userdata('nama'). ' dan kode role '.$this->session->userdata('id_role'),
		// 	'jenis_aktivitas' => 'ubah data',
		// 	'username' => $this->session->userdata('username'),
		// 	'perangkat' =>  $browser.'-'.$browser_version.', '.$os.', '.$ip_address
		// );
		// $this->Model_kategori->insert('log_user', $isi_data_log);
		redirect('admin/rpjmd/setting-rpjmd', 'refresh');
	}

	public function visiMisi()
	{
		$data['page'] = 'visi-misi';
		$where = [];

		$data['visi'] = $this->Model_rpjmd->get_where('setting_rpjmd', 'id_status=1')->result();
		$data['visi_misi'] = $this->Model_rpjmd->get_tigatable_left('misi.misi, bidang.bidang, misi.id_misi','misi', 'misi_bidang', 'bidang', 'misi.id_misi=misi_bidang.id_misi', 'bidang.id=misi_bidang.id_bidang', $where, 'misi.id_misi');

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/visi-misi');
		$this->load->view('admin/layout/footer');
	}

	public function tambahMisi()
	{
		$data['page'] = 'visi-misi';

		$data['bidang_urusan'] = $this->Model_rpjmd->get('bidang')->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/tambah/tambah-misi');
		$this->load->view('admin/layout/footer');
	}

	public function simpanMisi()
	{
		$misi = $this->input->post('misi');
		$id_bidang = $this->input->post('bidang');

		$object = array(
			'misi' => $misi
		);

		$this->Model_rpjmd->insert('misi', $object);

		if (isset($id_bidang)) {
			$where = [];
			$data['last_record'] = $this->Model_rpjmd->get_order_by('id_misi','misi', $where, 'id_misi', 'Desc', 1);
			foreach ($data['last_record'] as $lr) {
				$last_id_misi = $lr->id_misi;
			}

			$where = [];
			$i=0;
			foreach ($id_bidang as $b => $bidang_urusan) :
				$object_misi_bidang = array(
					'id_misi' => $last_id_misi,
					'id_bidang' => $bidang_urusan
				);
				// var_dump($id_misi);
				// exit(0);
				$this->Model_rpjmd->insert('misi_bidang', $object_misi_bidang);
				$i++;
			endforeach;
		}
		

		// $this->load->library('user_agent');
		// $browser = $this->agent->browser();
		// $browser_version = $this->agent->version();
		// $os = $this->agent->platform();
		// $ip_address = $this->input->ip_address();

		// insert log activity
		// $isi_data_log = array(
		// 	'tgl_aktivitas'   => date("Y-m-d H:i:s"),
		// 	'keterangan' => 'tambah data kategori oleh user dengan nama asli '.$this->session->userdata('nama'). ' dan kode role '.$this->session->userdata('id_role'),
		// 	'jenis_aktivitas' => 'tambah data',
		// 	'username' => $this->session->userdata('username'),
		// 	'perangkat' =>  $browser.'-'.$browser_version.', '.$os.', '.$ip_address
		// );
		// $this->Model_kategori->insert('log_user', $isi_data_log);
		$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Menambah Data'));
		redirect('admin/rpjmd/visi-misi','refresh');
	}

	public function ubahMisi($id)
	{
		$id_misi	= $id;
		$data['page'] = 'visi-misi';
		$data['misi'] = $this->Model_rpjmd->get_where('misi', 'id_misi='.$id_misi)->result();
		$data['bidang_checked'] = $this->Model_rpjmd->get_where('misi_bidang', 'id_misi='.$id_misi)->result();
		$data['bidang_urusan'] = $this->Model_rpjmd->get('bidang')->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/ubah/ubah-misi', $data);
		$this->load->view('admin/layout/footer');
	}

	public function simpanUbahMisi($id){
		// var_dump($id);
		// exit(0);
		
		$misi = $this->input->post('misi');
		$id_bidang = $this->input->post('bidang');

		$object = array(
			'misi'  => $misi
		);
		$this->Model_rpjmd->update('misi', 'id_misi='.$id, $object);

			if (isset($id_bidang)) {

				$data['cek_bidang'] = $this->Model_rpjmd->get_where('misi_bidang', 'id_misi='.$id)->result();
				if(isset($data['cek_bidang'])){
					$this->Model_rpjmd->delete('misi_bidang', 'id_misi='.$id);

				$where = [];
				$i=0;
				foreach ($id_bidang as $b => $bidang_urusan) :
					$object_misi_bidang = array(
						'id_misi' => $id,
						'id_bidang' => $bidang_urusan
					);
					$this->Model_rpjmd->insert('misi_bidang', $object_misi_bidang);
					$i++;
				endforeach;

			}else {

				$where = [];
				$i=0;
				foreach ($id_bidang as $b => $bidang_urusan) :
					$object_misi_bidang = array(
						'id_misi' => $id,
						'id_bidang' => $bidang_urusan
					);
					$this->Model_rpjmd->insert('misi_bidang', $object_misi_bidang);
					$i++;
				endforeach;
			}
		} else {
			$this->Model_rpjmd->delete('misi_bidang', 'id_misi='.$id);
		}

		// $this->load->library('user_agent');
		// $browser = $this->agent->browser();
		// $browser_version = $this->agent->version();
		// $os = $this->agent->platform();
		// $ip_address = $this->input->ip_address();

		// // insert log activity
		// $isi_data_log = array(
		// 	'tgl_aktivitas'   => date("Y-m-d H:i:s"),
		// 	'keterangan' => 'ubah data kategori dg id '.$id_kategori.' oleh user dengan nama asli '.$this->session->userdata('nama'). ' dan kode role '.$this->session->userdata('id_role'),
		// 	'jenis_aktivitas' => 'ubah data',
		// 	'username' => $this->session->userdata('username'),
		// 	'perangkat' =>  $browser.'-'.$browser_version.', '.$os.', '.$ip_address
		// );
		// $this->Model_kategori->insert('log_user', $isi_data_log);
		redirect('admin/rpjmd/visi-misi', 'refresh');
	}

	public function gambaranUmum()
	{
		$data['page'] = 'gambaran-umum';

		$data['bidang'] = $this->Model_rpjmd->get('bidang')->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/gambaran-umum', $data);
		$this->load->view('admin/layout/footer');
	}

	public function indikator($id)
	{
		$data['page'] = 'gambaran-umum';

		$data['indikator'] = $this->Model_rpjmd->get_where('indikator', 'id_bidang='.$id)->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/indikator-rpjmd', $data);
		$this->load->view('admin/layout/footer');
	}

	public function tambahIndikator($id)
	{
		$data['page'] = 'gambaran-umum';

		$data['indikator'] = $this->Model_rpjmd->get_where('indikator', 'id_bidang='.$id)->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/tambah/tambah-indikator-rpjmd', $data);
		$this->load->view('admin/layout/footer');
	}

	public function simpanIndikator()
	{
		$id_bidang = $this->uri->segment(6);
		$uraian = $this->input->post('uraian');
		$id_satuan = $this->input->post('satuan');
		$tahun1 = $this->input->post('tahun1');
		$tahun2 = $this->input->post('tahun2');
		$tahun3 = $this->input->post('tahun3');
		$tahun4 = $this->input->post('tahun4');
		$tahun5 = $this->input->post('tahun5');

		$object = array(
			'indikator' => $uraian,
			'id_bidang' => $id_bidang,
			'id_satuan' => $id_satuan,
			'tahun_pertama'	=> $tahun1,
			'tahun_kedua'	=> $tahun2,
			'tahun_ketiga'	=> $tahun3,
			'tahun_keempat'	=> $tahun4,
			'tahun_kelima'	=> $tahun5
		);

		$this->Model_rpjmd->insert('indikator', $object);
		

		// $this->load->library('user_agent');
		// $browser = $this->agent->browser();
		// $browser_version = $this->agent->version();
		// $os = $this->agent->platform();
		// $ip_address = $this->input->ip_address();

		// insert log activity
		// $isi_data_log = array(
		// 	'tgl_aktivitas'   => date("Y-m-d H:i:s"),
		// 	'keterangan' => 'tambah data kategori oleh user dengan nama asli '.$this->session->userdata('nama'). ' dan kode role '.$this->session->userdata('id_role'),
		// 	'jenis_aktivitas' => 'tambah data',
		// 	'username' => $this->session->userdata('username'),
		// 	'perangkat' =>  $browser.'-'.$browser_version.', '.$os.', '.$ip_address
		// );
		// $this->Model_kategori->insert('log_user', $isi_data_log);
		$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Menambah Data'));
		redirect('admin/rpjmd/gambaran-umum','refresh');
	}

	public function rumusanMasalah()
	{
		$data['page'] = 'rumusan-masalah';

		$data['bidang'] = $this->Model_rpjmd->get('bidang')->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/rumusan-masalah', $data);
		$this->load->view('admin/layout/footer');
	}

	public function tambahMasalahPokok($id)
	{
		$data['page'] = 'rumusan-masalah';

		$data['bidang'] = $this->Model_rpjmd->get_where('bidang', 'id='.$id)->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/tambah/tambah-masalah-pokok', $data);
		$this->load->view('admin/layout/footer');
	}

	public function simpanMasalahPokok()
	{

		$masalah_pokok = $this->input->post('masalah_pokok');

		$object = array(
			'masalah_pokok'	=> $masalah_pokok
		);

		$this->Model_rpjmd->insert('masalah_pokok', $object);
		

		// $this->load->library('user_agent');
		// $browser = $this->agent->browser();
		// $browser_version = $this->agent->version();
		// $os = $this->agent->platform();
		// $ip_address = $this->input->ip_address();

		// insert log activity
		// $isi_data_log = array(
		// 	'tgl_aktivitas'   => date("Y-m-d H:i:s"),
		// 	'keterangan' => 'tambah data kategori oleh user dengan nama asli '.$this->session->userdata('nama'). ' dan kode role '.$this->session->userdata('id_role'),
		// 	'jenis_aktivitas' => 'tambah data',
		// 	'username' => $this->session->userdata('username'),
		// 	'perangkat' =>  $browser.'-'.$browser_version.', '.$os.', '.$ip_address
		// );
		// $this->Model_kategori->insert('log_user', $isi_data_log);
		$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Menambah Data'));
		redirect('admin/rpjmd/rumusan-masalah','refresh');
	}

	public function tambahRumusanMasalah($id)
	{
		$data['page'] = 'rumusan-masalah';
		$where = [];
		$data['masalah_pokok'] = $this->Model_rpjmd->get_where('masalah_pokok', $where)->result();
		$data['rumusan_masalah'] = $this->Model_rpjmd->get_where('rumusan_masalah', $where)->result();
		$data['bidang'] = $this->Model_rpjmd->get_where('bidang', 'id='.$id)->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/tambah/tambah-rumusan-masalah', $data);
		$this->load->view('admin/layout/footer');
	}
	
	public function detailRumusan($id)
	{
		$data['page'] = 'rumusan-masalah';
		$where = [];

		$data['masalah_pokok'] = $this->Model_rpjmd->get_where('masalah_pokok', 'id_bidang='.$id)->result();
		$data['rumusan_masalah'] = $this->Model_rpjmd->get_limatable('*', 'masalah_pokok', 'akar_masalah', 'rumusan_masalah', 'keterkaitan_misi', 'misi', 'masalah_pokok.id_masalah=akar_masalah.id_masalah_pokok', 'masalah_pokok.id_masalah=rumusan_masalah.id_masalah_pokok', 'masalah_pokok.id_masalah=keterkaitan_misi.id_masalah_pokok', 'keterkaitan_misi.id_misi=misi.id_misi', 'masalah_pokok.id_bidang='.$id, 'masalah_pokok.id_masalah');

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/detail-rumusan-masalah', $data);
		$this->load->view('admin/layout/footer');
	}

	public function isuStrategis()
	{
		$data['page'] = 'isu-strategis';

		$data['bidang'] = $this->Model_rpjmd->get('bidang')->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/isu-strategis', $data);
		$this->load->view('admin/layout/footer');
	}

	public function tujuanSasaran()
	{
		$data['page'] = 'tujuan-sasaran';

		$data['tujuan_sasaran'] = $this->Model_rpjmd->get('misi')->result();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/rpjmd/tujuan-sasaran', $data);
		$this->load->view('admin/layout/footer');
	}
}
