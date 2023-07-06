<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->database();	
		$this->load->model('Model_user');
		date_default_timezone_set('Asia/Jayapura');
		if($this->session->userdata('status') != "login"){
			echo "<script>alert('Silakan login terlebih dahulu!')</script>";
			redirect(base_url('admin'));
		}
    }
    
	public function index()
	{
        $id_user        = $this->session->userdata('id_user');
        $data['page']   = 'profile';

        if($this->session->userdata('id_unit_organisasi') == 0){
            $data['user']   = $this->Model_user->get_where('user', 'id_user='.$id_user)->result_object();
        } else {
            $data['user']   = $this->Model_user->get_duatable('*', 'user', 'opd', 'user.id_unit_organisasi=opd.id', 'user.id_user='.$id_user, 'user.id_user');
        }
        
        

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/profile');
		$this->load->view('admin/layout/footer');
	}

	public function ubahProfile()
	{
        $data['page']   = 'profile';
        $id_user        = $this->session->userdata('id_user');
        $data['page']   = 'profile';

        if($this->session->userdata('id_unit_organisasi') == 0){
            $data['user']   = $this->Model_user->get_where('user', 'id_user='.$id_user)->result_object();
        } else {
            $data['user']   = $this->Model_user->get_duatable('*', 'user', 'opd', 'user.id_unit_organisasi=opd.id', 'user.id_user='.$id_user, 'user.id_user');
        }

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/ubah-profile');
		$this->load->view('admin/layout/footer');
    }
    
    public function simpanUbahProfile($id){
		$hidden			= $this->input->post('hidden');
		$nama			= $this->input->post('nama');
		$nip			= $this->input->post('nip');
		$alamat			= $this->input->post('alamat');
		$no_telp		= $this->input->post('no_telp');
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');

		$isi = [
			'nama'					=> $nama,
			'nip'					=> $nip,
			'alamat'				=> $alamat,
			'no_telp'				=> $no_telp,
			'username'				=> $username
		];
		
		if(!empty($password)){
			$isi['password']	= $password;
		} 
		if($hidden == $username){
            $this->Model_user->update('user', 'id_user='.$id, $isi);
            $this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Mengubah Data Pengguna'));
		} else {
			$cekUser	= $this->Model_user->get_where('user', 'username="'.$username.'"')->result_object();

			if(empty($cekUser)){	
                $this->Model_user->update('user', 'id_user='.$id, $isi);
                $this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Mengubah Data Pengguna'));
			} else {
				$this->session->set_flashdata('message1', array('type'=>'error','text'=>'Username tidak boleh sama!'));
			}
		}
		redirect('admin/profile', 'refresh');
	}
}
