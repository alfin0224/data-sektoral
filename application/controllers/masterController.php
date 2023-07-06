<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class masterController extends CI_Controller {

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
	public function masterOPD()
	{
		$data['page'] = 'master-opd';

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

	public function ubahOPD()
	{
		$data['page'] = 'master-opd';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/master/ubah/ubah-opd');
		$this->load->view('admin/layout/footer');
	}

	public function masterPengguna()
	{
		$data['page'] = 'master-pengguna';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/master/master-pengguna');
		$this->load->view('admin/layout/footer');
	}

	public function tambahPengguna()
	{
		$data['page'] = 'master-pengguna';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/master/tambah/tambah-pengguna');
		$this->load->view('admin/layout/footer');
	}

	public function ubahPengguna()
	{
		$data['page'] = 'master-pengguna';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/master/ubah/ubah-pengguna');
		$this->load->view('admin/layout/footer');
	}
}
