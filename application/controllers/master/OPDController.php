<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OPDController extends CI_Controller {
	
	public $checkHapusOPD = false;
	public function __construct(){
		parent::__construct();
		$this->checkHapusOPD = & get_instance();
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

	
	public function masterOPD()
	{
		$data['page']	= 'master-opd';
		$data['opd']	= $this->Model_master->get('opd')->result_object();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/master/master-opd');
		$this->load->view('admin/layout/footer');
	}

	public function tambahOPD()
	{
		$data['page'] = 'master-opd';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/master/tambah/tambah-opd');
		$this->load->view('admin/layout/footer');
	}

	public function simpanOPD(){
		$unit_organisasi	= $this->input->post('unit_organisasi');
		$nama_opd			= $this->input->post('nama_opd');
		$kepala_dinas		= $this->input->post('kepala_dinas');
		$nip				= $this->input->post('nip');
		$pangkat			= $this->input->post('pangkat');

		$cekUnit	= $this->Model_master->get_where('opd', 'unit_organisasi="'.$unit_organisasi.'"')->result_object();

		var_dump($cekUnit);

		if(empty($cekUnit)){
			$isi = [
				'unit_organisasi'	=> $unit_organisasi,
				'nama_opd'			=> $nama_opd,
				'kepala_dinas'		=> $kepala_dinas,
				'nip'				=> $nip,
				'pangkat'			=> $pangkat
			];

			$this->Model_master->insert('opd', $isi);
			$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Menambah Data OPD'));
		} else {
			$this->session->set_flashdata('message1', array('type'=>'error','text'=>'Nomor Unit tidak boleh sama!'));
		}

		redirect('admin/master/master-opd', 'refresh');
	}

	public function ubahOPD($id)
	{
		$data['page'] 	= 'master-opd';
		$data['opd']	= $this->Model_master->get_where('opd', 'id='.$id)->result_object();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/master/ubah/ubah-opd', $data);
		$this->load->view('admin/layout/footer');
	}

	public function simpanUbahOPD($id){
		$hidden				= $this->input->post('hidden');
		$unit_organisasi	= $this->input->post('unit_organisasi');
		$nama_opd			= $this->input->post('nama_opd');
		$kepala_dinas		= $this->input->post('kepala_dinas');
		$nip				= $this->input->post('nip');
		$pangkat			= $this->input->post('pangkat');

		$isi = [
			'unit_organisasi'	=> $unit_organisasi,
			'nama_opd'			=> $nama_opd,
			'kepala_dinas'		=> $kepala_dinas,
			'nip'				=> $nip,
			'pangkat'			=> $pangkat
		];

		if($hidden == $unit_organisasi){

			$this->Model_master->update('opd', 'id='.$id, $isi);
			$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Mengubah Data OPD'));

		} else {
			$cekUnit	= $this->Model_master->get_where('opd', 'unit_organisasi="'.$unit_organisasi.'"')->result_object();

			if(empty($cekUnit)){

				$this->Model_master->update('opd', 'id='.$id, $isi);
				$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Mengubah Data OPD'));
			} else {
				$this->session->set_flashdata('message1', array('type'=>'error','text'=>'Nomor Unit tidak boleh sama!'));
			}

		}

		redirect('admin/master/master-opd', 'refresh');
	}

	public function checkHapusOPD($id){
		$data = $this->Model_master->get_where('renja','id_unit_organisasi='.$id)->result_object();
		if(!empty($data)){
			return false;
		} else {
			return true;
		}
	}

	public function hapusOPD($id){
		
		$this->Model_master->delete('opd', 'id='.$id);
		$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Menghapus Data OPD'));
		redirect('admin/master/master-opd', 'refresh');

	}

}
