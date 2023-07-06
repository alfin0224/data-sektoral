<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboardController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Model_dashboard');
		date_default_timezone_set('Asia/Jayapura');
		if($this->session->userdata('status') != "login"){
			echo "<script>alert('Maaf, anda belum login / sesi anda sudah habis. Silakan untuk login lagi!')</script>";
			redirect(base_url('admin'));
		}
		
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['page']		= 'dashboard';
		$data['opd']		= $this->Model_dashboard->get('opd')->result_object();
		$data['import']		= [];
		$data['notimport']	= count($this->Model_dashboard->get('opd')->result_object());

		$cekData			= $this->Model_dashboard->get('renja')->result_object();
		$renja				= [];
		foreach($cekData as $d){
			$renja[]		= $d->id_unit_organisasi;
		}

		if(!empty($renja)){
			$data['import']		= count($this->Model_dashboard->get_where_in('*', 'opd', 'id', $renja));
			$data['notimport']	= count($this->Model_dashboard->get_where_not_in('*', 'opd', 'id', $renja));
		}

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layout/footer');
	}
}
