<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RKPDPController extends CI_Controller {
	public $getForm3 = NULL;

	public function __construct(){
		parent::__construct();
		$this->getForm3 = & get_instance();
		$this->load->database();	
		$this->load->model('Model_import');
		date_default_timezone_set('Asia/Jayapura');
		if($this->session->userdata('status') != "login"){
			echo "<script>alert('Silakan login terlebih dahulu!')</script>";
			redirect(base_url('admin'));
		}
	}

	public function indexDataRkpdOpd()
	{
		$id_unit_organisasi	= $this->session->userdata('id_unit_organisasi');
		$data['page']   	= 'data-rkpd-opd';
		if($this->session->userdata('id_unit_organisasi') == 0){
			$data['opd']	= $this->Model_import->get('opd')->result_object();
		} else {
			$data['opd']	= $this->Model_import->get_where('opd', 'id='.$id_unit_organisasi)->result_object();
			
		}

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/import-perencanaan/index-data-rkpd-opd');
		$this->load->view('admin/layout/footer');
	}

	public function detailDataRkpdOpd()
	{
        $id_unit_organisasi    	= $this->input->post('id_unit_organisasi');
        $data['page']       	= 'data-rkpd-opd';
		$data['program']    	= $this->Model_import->get_where('program', 'id_unit_organisasi='.$id_unit_organisasi)->result_object();
		$array					= $this->Model_import->get_where('renja', 'id_unit_organisasi='.$id_unit_organisasi)->result_object();
		$lokasi					= [];
		foreach($array as $a){
			$lokasi[]	= $a->kode_lokasi;
		}

		if(!empty($lokasi)){
			$data['lokasi']			= $this->Model_import->get_where_in('*','lokasi','kode_lokasi', $lokasi);
		}
		$data['id_unit']		= $id_unit_organisasi;


		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/import-perencanaan/detail-data-rkpd-opd');
		$this->load->view('admin/layout/footer');
	}

	function getKegiatan(){
		$val 		= $this->input->post('id');
		$unit 		= explode("-", $val);
		$kode		= explode(".", $unit[0]);

		$data 		= $this->Model_import->get_where('kegiatan', 'kode_urusan='.$kode[0].' AND kode_bidang='.$kode[1].' AND kode_program='.$kode[2].' AND id_unit_organisasi='.$unit[1])->result_object();
        echo json_encode($data);
		
	}

	function getSubKegiatan(){
		$val 		= $this->input->post('id');
		$unit 		= explode("-", $val);
		$kode		= explode(".", $unit[0]);

		$data 		= $this->Model_import->get_where('sub_kegiatan', 'kode_urusan='.$kode[0].' AND kode_bidang='.$kode[1].' AND kode_program='.$kode[2].' AND kode_kegiatan='.$kode[3].' AND id_unit_organisasi='.$unit[1])->result_object();
        echo json_encode($data);
		
	}

	public function cetak(){
		$hidden			= $this->input->post('hidden');
		$program		= $this->input->post('program');
		$kegiatan		= $this->input->post('kegiatan');
		$sub_kegiatan	= $this->input->post('sub_kegiatan');
		$lokasi			= $this->input->post('lokasi');
		$jenis_form		= $this->input->post('jenis_form');

		$where 		= array();
		$where[]	= "renja.id_unit_organisasi=$hidden";
		$data['opd']	= $this->Model_import->get_where('opd','id='.$hidden)->result_object();
		if($sub_kegiatan != NULL){
			$val 		= explode("-", $sub_kegiatan);
			$kode		= explode(".", $val[0]);
			$where[] 	= "renja.kode_urusan=$kode[0] AND renja.kode_bidang=$kode[1] AND renja.kode_program=$kode[2] AND renja.kode_kegiatan=$kode[3] AND renja.kode_sub_kegiatan=$kode[4]";
		} else if($kegiatan !=NULL){
			$val 		= explode("-", $kegiatan);
			$kode		= explode(".", $val[0]);
			$where[] 	= "renja.kode_urusan=$kode[0] AND renja.kode_bidang=$kode[1] AND renja.kode_program=$kode[2] AND renja.kode_kegiatan=$kode[3]";
			
		} else if($program != NULL){
			$val 		= explode("-", $program);
			$kode		= explode(".", $val[0]);
			$where[] 	= "renja.kode_urusan=$kode[0] AND renja.kode_bidang=$kode[1] AND renja.kode_program=$kode[2]";
		} 

		if ($lokasi != NULL) {
			$where[] = "renja.kode_lokasi=$lokasi";
		}

		$where_str = implode(' AND ', $where);
		
		if($jenis_form == 1){

			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			$html = $this->load->view('admin/import-perencanaan/cetak/cetakForm1',[],true);
			$mpdf->WriteHTML($html);
			$mpdf->Output('Form 1 Konsistensi Target Program RKPD 2022 dan RPJMD.pdf', 'I');

		} else if($jenis_form == 2){
			$data['form2']	= $this->Model_import->getForm2($where_str);

			if(!empty($data['form2'])){
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
				$html = $this->load->view('admin/import-perencanaan/cetak/cetakForm2', $data, true);
				$mpdf->WriteHTML($html);
				$mpdf->Output('Form 2 Rekapitulasi Jumlah Program, Kegiatan, dan SubKegiatan.pdf', 'I');

			} else {
				$this->session->set_flashdata('message1', array('type'=>'error','text'=>'Tidak Ada Data!'));
				redirect('admin/import-perencanaan/data-rkpd-opd', 'refresh');


			}

		} else if($jenis_form == 3){
			$data['form']	= $this->Model_import->get_limatable('*', 'bidang', 'program', 'kegiatan', 'sub_kegiatan', 'renja', 'bidang.kode_urusan=program.kode_urusan AND bidang.kode_bidang=program.kode_bidang', 'program.kode_urusan=kegiatan.kode_urusan AND program.kode_bidang=kegiatan.kode_bidang AND program.kode_program=kegiatan.kode_program', 'kegiatan.kode_urusan=sub_kegiatan.kode_urusan AND kegiatan.kode_bidang=sub_kegiatan.kode_bidang AND kegiatan.kode_program=sub_kegiatan.kode_program AND kegiatan.kode_kegiatan=sub_kegiatan.kode_kegiatan', 'sub_kegiatan.kode_urusan=renja.kode_urusan AND sub_kegiatan.kode_bidang=renja.kode_bidang AND sub_kegiatan.kode_program=renja.kode_program AND sub_kegiatan.kode_kegiatan=renja.kode_kegiatan AND sub_kegiatan.kode_sub_kegiatan=renja.kode_sub_kegiatan', $where_str);

			if(!empty($data['form'])){
				if($program == NULL){
					$data['funct']	= true;
				}
				$data['where']	= $where_str;
				$bd				= [];
				foreach($data['form'] as $f):
					$bd[]	= $f->kode_urusan.".".$f->kode_bidang;
				endforeach;
				$concat = "CONCAT(kode_urusan, '.', kode_bidang)";
				$data['bidang']	= $this->Model_import->get_where_in('*','bidang', $concat, $bd);

				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
				$html = $this->load->view('admin/import-perencanaan/cetak/cetakForm3', $data, true);
				$mpdf->WriteHTML($html);
				$mpdf->Output('form 3 Daftar Program, Kegiatan, dan SubKegiatan RKPD 2022.pdf', 'I');
			} else {
				$this->session->set_flashdata('message1', array('type'=>'error','text'=>'Tidak Ada Data!'));
				redirect('admin/import-perencanaan/data-rkpd-opd', 'refresh');
			}
			
		} else if ($jenis_form == 4){
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			$html = $this->load->view('admin/import-perencanaan/cetak/cetakForm4',[],true);
			$mpdf->WriteHTML($html);
			$mpdf->Output('Form 4 Rekapitulasi Jumlah Program, Kegiatan, dan SubKegiatan Pendukung Prioritas Nasional.pdf', 'I');
		}
	}

	public function getForm3($param){
		
		
		$data	= $this->Model_import->get_limatable('*', 'bidang', 'program', 'kegiatan', 'sub_kegiatan', 'renja', 'bidang.kode_urusan=program.kode_urusan AND bidang.kode_bidang=program.kode_bidang', 'program.kode_urusan=kegiatan.kode_urusan AND program.kode_bidang=kegiatan.kode_bidang AND program.kode_program=kegiatan.kode_program', 'kegiatan.kode_urusan=sub_kegiatan.kode_urusan AND kegiatan.kode_bidang=sub_kegiatan.kode_bidang AND kegiatan.kode_program=sub_kegiatan.kode_program AND kegiatan.kode_kegiatan=sub_kegiatan.kode_kegiatan', 'sub_kegiatan.kode_urusan=renja.kode_urusan AND sub_kegiatan.kode_bidang=renja.kode_bidang AND sub_kegiatan.kode_program=renja.kode_program AND sub_kegiatan.kode_kegiatan=renja.kode_kegiatan AND sub_kegiatan.kode_sub_kegiatan=renja.kode_sub_kegiatan', $param);

		
		return $data;

	}

	public function cetakForm5(){
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
		$html = $this->load->view('admin/import-perencanaan/cetak/cetakForm5',[],true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('Form 5 Program dan Kegiatan Perangkat Daerah Provinsi Papua Barat 2022.pdf', 'I');
	}
}
