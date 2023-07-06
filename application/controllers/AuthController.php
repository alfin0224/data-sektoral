<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
	function __construct(){
		parent::__construct();	
		$this->load->model('Model_auth');
		date_default_timezone_set('Asia/Jayapura');
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
		$this->load->view('admin/login');
	}

	public function auth(){
		$username = $this->input->post('username');
		$password =	$this->input->post('password');

		$where = array(
			'username'	=> $username,
			'password'	=> $password,
			'status'	=> 1
			);
		$cek = $this->Model_auth->get_where("user", $where)->num_rows();

		if($cek > 0){

			$user			= $this->Model_auth->get_where("user", $where)->row();
			$data_session  	= (array) $user;

			if (isset($data_session['__ci_last_regenerate'])) {
				unset($data_session['__ci_last_regenerate']);
			}

			$data_session['status'] = "login";
			$this->session->set_userdata($data_session);

		
			// $this->load->library('user_agent');
			// $browser = $this->agent->browser();
			// $browser_version = $this->agent->version();
			// $os = $this->agent->platform();
			// $ip_address = $this->input->ip_address();

			// $isi_data_log = array(
			// 	'tgl_aktivitas' => date("Y-m-d H:i:s"),
			// 	'keterangan' => 'login nama asli '.$this->session->userdata('nama'). ' dan kode role '.$this->session->userdata('id_role'),
			// 	'jenis_aktivitas' => 'login',
			// 	'username' => $this->session->userdata('username'),
			// 	'perangkat' =>  $browser.'-'.$browser_version.', '.$os.', '.$ip_address
			// 	);
			// $this->model_login ->insert_data('tbl_log_user', $isi_data_log);
			// $role = $this->session->userdata('id_role');
				

			redirect(base_url('admin/dashboard'), 'refresh');


		} else {
		// 	echo "<script> alert('data yang anda masukkan salah!!');
		// 	history.back();
		// </script>";
			//$_SESSION["message"] = 'Username/Password yang Anda Masukkan Salah';
			redirect(base_url('admin'),'refresh');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
}
