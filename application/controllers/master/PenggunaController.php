<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenggunaController extends CI_Controller {

	public $checkHapusPengguna = false;

	public function __construct(){
		parent::__construct();
		$this->checkHapusPengguna = & get_instance();
		$this->load->database();	
		$this->load->model('Model_master');
		date_default_timezone_set('Asia/Jayapura');
		if($this->session->userdata('status') != "login"){
			echo "<script>alert('Silakan login terlebih dahulu!')</script>";
			redirect(base_url('admin'));
		}
		if($this->session->userdata('id_unit_organisasi') != 0){
			
			echo "<script>alert('Maaf, anda tidak izinkan membuka halaman ini!')</script>";
			redirect(base_url('admin/dashboard'));
		}
	}


	public function masterPengguna()
	{
		$data['page']	= 'master-pengguna';
		$data['user']	= $this->Model_master->get_duatable('*', 'user', 'opd', 'user.id_unit_organisasi=opd.id', [], 'user.id_user');

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/master/master-pengguna');
		$this->load->view('admin/layout/footer');
	}

	public function tambahPengguna()
	{
		$data['page'] 	= 'master-pengguna';
		$data['opd']	= $this->Model_master->get('opd')->result_object();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/master/tambah/tambah-pengguna', $data);
		$this->load->view('admin/layout/footer');
	}

	public function simpanPengguna(){
		$nama				= $this->input->post('nama');
		$nip				= $this->input->post('nip');
		$alamat				= $this->input->post('alamat');
		$no_telp			= $this->input->post('no_telp');
		$id_unit_organisasi	= $this->input->post('id_unit_organisasi');
		$username			= $this->input->post('username');
		$password			= $this->input->post('password');
		$status				= $this->input->post('status');

		$cekUser	= $this->Model_master->get_where('user', 'username="'.$username.'"')->result_object();

		if(empty($cekUser)){
			$isi = [
				'nama'					=> $nama,
				'nip'					=> $nip,
				'alamat'				=> $alamat,
				'no_telp'				=> $no_telp,
				'id_unit_organisasi'	=> $id_unit_organisasi,
				'username'				=> $username,
				'password'				=> $password,
				'status'				=> $status
			];
			$this->Model_master->insert('user', $isi);
			$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Menambah Data Pengguna'));
		} else {
			$this->session->set_flashdata('message1', array('type'=>'error','text'=>'Username tidak boleh sama!'));
		}

		redirect('admin/master/master-pengguna', 'refresh');
	}

	public function ubahPengguna($id)
	{
		$data['page']	= 'master-pengguna';
		$data['user']	= $this->Model_master->get_duatable('*', 'user', 'opd', 'user.id_unit_organisasi=opd.id', 'user.id_user='.$id, 'user.id_user');
		$data['opd']	= $this->Model_master->get('opd')->result_object();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/master/ubah/ubah-pengguna');
		$this->load->view('admin/layout/footer');
	}

	public function simpanUbahPengguna($id){
		$hidden			= $this->input->post('hidden');
		$nama			= $this->input->post('nama');
		$nip			= $this->input->post('nip');
		$alamat			= $this->input->post('alamat');
		$no_telp		= $this->input->post('no_telp');
		$unit_organisasi= $this->input->post('unit_organisasi');
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');

		$isi = [
			'nama'					=> $nama,
			'nip'					=> $nip,
			'alamat'				=> $alamat,
			'no_telp'				=> $no_telp,
			'id_unit_organisasi'	=> $unit_organisasi,
			'username'				=> $username
		];
		
		if(!empty($password)){
			$isi['password']	= $password;
		} 
		if($hidden == $username){
			$this->Model_master->update('user', 'id_user='.$id, $isi);
			$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Mengubah Data Pengguna'));
		} else {
			$cekUser	= $this->Model_master->get_where('user', 'username="'.$username.'"')->result_object();

			if(empty($cekUser)){	
				$this->Model_master->update('user', 'id_user='.$id, $isi);
				$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Mengubah Data Pengguna'));
			} else {
				$this->session->set_flashdata('message1', array('type'=>'error','text'=>'Username tidak boleh sama!'));
			}
		}

		redirect('admin/master/master-pengguna', 'refresh');
	}

	public function ubahStatus($id){
		$cekStatus	= $this->Model_master->get_where('user', 'id_user='.$id)->row();
		if($cekStatus->status == 1){
			$isi	= [
				'status'	=> 0
			];
		} else {
			$isi	= [
				'status'	=> 1
			];
		}

		$this->Model_master->update('user', 'id_user='.$id, $isi);
		$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Mengubah Status Pengguna'));
		redirect('admin/master/master-pengguna', 'refresh');
	}

	public function checkHapusPengguna($id){
		$user = $this->Model_master->get_where('user', 'id_unit_organisasi='.$id)->num_rows();
		if($user > 1){
			return true;
		} else {
			$data = $this->Model_master->get_where('renja','id_unit_organisasi='.$id)->result_object();
			if(!empty($data)){
				return false;
			} else {
				return true;
			}
		}
		
	}

	public function hapusPengguna($id){
		
		$this->Model_master->delete('user', 'id_user='.$id);
		$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Menghapus Data Pengguna'));
		redirect('admin/master/master-pengguna', 'refresh');

	}
}
