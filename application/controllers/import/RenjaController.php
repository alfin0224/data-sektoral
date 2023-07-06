<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RenjaController extends CI_Controller {
	public $checkRenja = false;
	public function __construct(){
		parent::__construct();
		$this->checkRenja = & get_instance();
		$this->load->database();	
		$this->load->model('Model_import');
		date_default_timezone_set('Asia/Jayapura');
		if($this->session->userdata('status') != "login"){
			echo "<script>alert('Silakan login terlebih dahulu!')</script>";
			redirect(base_url('admin'));
		}
	}


	public function indexRenja()
	{
		$id_unit_organisasi = $this->session->userdata('id_unit_organisasi');
		$data['page'] 		= 'renja';
		$cekData			= $this->Model_import->get('renja')->result_object();
		$renja				= [];
		$data['totalopd']	= $this->Model_import->get('opd')->result_object();
		$data['import']		= [];
		$data['notimport']	= count($this->Model_import->get('opd')->result_object());
		foreach($cekData as $d){
			$renja[]		= $d->id_unit_organisasi;
		}

		if(!empty($renja)){
			$data['import']		= count($this->Model_import->get_where_in('*', 'opd', 'id', $renja));
			$data['notimport']	= count($this->Model_import->get_where_not_in('*', 'opd', 'id', $renja));
		}
		
		if($this->session->userdata('id_unit_organisasi') == 0){
			$data['opd']	= $this->Model_import->get('opd')->result_object();
		} else {
			$data['opd']	= $this->Model_import->get_where('opd', 'id='.$id_unit_organisasi)->result_object();
		}
	
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/import-perencanaan/renja');
		$this->load->view('admin/layout/footer');
	}


	public function prosesRenja(){
		//$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$id_unit_organisasi	= $this->input->post('id_unit_organisasi');

		$cekRenja = $this->Model_import->get_where('renja', 'id_unit_organisasi='.$id_unit_organisasi)->result_object();

		if(!empty($cekRenja)){
			$this->Model_import->delete('renja', 'id_unit_organisasi='.$id_unit_organisasi);
			$this->Model_import->delete('sub_kegiatan', 'id_unit_organisasi='.$id_unit_organisasi);
			$this->Model_import->delete('kegiatan', 'id_unit_organisasi='.$id_unit_organisasi);
			$this->Model_import->delete('program', 'id_unit_organisasi='.$id_unit_organisasi);
			$this->Model_import->delete('bidang', 'id_unit_organisasi='.$id_unit_organisasi);
		}


		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($_FILES['customFile']['tmp_name']);
		$spreadsheet = $reader->load($_FILES['customFile']['tmp_name']);
		$sheetData = $spreadsheet->getActiveSheet()->toArray();
		for($i=8; $i<count($sheetData); $i++){
			$kodeurusan 		= $sheetData[$i][1];
			$kodebidang			= $sheetData[$i][2];
			$kodeprogram		= $sheetData[$i][3];
			$kodekegiatan		= $sheetData[$i][4];
			$kodesubkegiatan	= $sheetData[$i][5];
			$urusan				= $sheetData[$i][6];
			$prioritas			= $sheetData[$i][7];
			$sasaran			= $sheetData[$i][8];
			$lokasi				= $sheetData[$i][9];
			$tolokukurcapaian	= $sheetData[$i][10];
			$targetcapaian		= $sheetData[$i][11];
			$tolokukursubkeg	= $sheetData[$i][12];
			$targetsubkeg		= $sheetData[$i][13];
			$tolokukurhasilkeg	= $sheetData[$i][14];
			$targethasilkeg		= $sheetData[$i][15];
			$paguindikatif		= $sheetData[$i][16];
			$prakiraanmaju		= $sheetData[$i][17];
			$keterangan			= $sheetData[$i][18];

			$kode = explode(".", $kodekegiatan);
			if(!empty($kode[1])){

				$kodekegiatan = $kode[1];
			}

			if(!empty($kodeurusan)){
				if(empty($kodebidang) && ($kodeurusan != "TOTAL")){
					$cek = $this->Model_import->get_where('urusan', 'kode_urusan='.$kodeurusan)->result_object();
					if(empty($cek)){
						$object = array(
							'kode_urusan'	=> $kodeurusan,
							'urusan'		=> $urusan
						);
						$this->Model_import->insert('urusan', $object);
					}
				}
				if(!empty($kodebidang) && empty($kodeprogram)){
					$cekUrusan = $this->Model_import->get_where('urusan', 'kode_urusan='.$kodeurusan)->result_object();
					if(!empty($cekUrusan)){
						$cek = $this->Model_import->get_where('bidang', 'kode_urusan='.$kodeurusan.' AND kode_bidang='.$kodebidang.' AND id_unit_organisasi="'.$id_unit_organisasi.'"')->result_object();
						if(empty($cek)){
							$object = array(
								'kode_urusan'		=> $kodeurusan,
								'kode_bidang'		=> $kodebidang,
								'bidang'			=> $urusan,
								'id_unit_organisasi'	=> $id_unit_organisasi
							);

							$this->Model_import->insert('bidang', $object);
						}
					}		
				}

				if(!empty($kodeprogram) && empty($kodekegiatan)){
					$cekBidang = $this->Model_import->get_where('bidang', 'kode_urusan='.$kodeurusan.' AND kode_bidang='.$kodebidang.' AND id_unit_organisasi="'.$id_unit_organisasi.'"')->result_object();
					if(!empty($cekBidang)){
						$cek = $this->Model_import->get_where('program', 'kode_urusan='.$kodeurusan.' AND kode_bidang='.$kodebidang.' AND kode_program='.$kodeprogram.' AND id_unit_organisasi="'.$id_unit_organisasi.'"')->result_object();
						if(empty($cek)){
							$object = array(
								'kode_urusan'		=> $kodeurusan,
								'kode_bidang'		=> $kodebidang,
								'kode_program'		=> $kodeprogram,
								'program'			=> $urusan,
								'id_unit_organisasi'	=> $id_unit_organisasi
							);
							$this->Model_import->insert('program', $object);
						} 
					}	
				}

				if(!empty($kodekegiatan) && empty($kodesubkegiatan)){
					$cekProgram = $this->Model_import->get_where('program', 'kode_urusan='.$kodeurusan.' AND kode_bidang='.$kodebidang.' AND kode_program='.$kodeprogram.' AND id_unit_organisasi="'.$id_unit_organisasi.'"')->result_object();
					if(!empty($cekProgram)){
						$cek = $this->Model_import->get_where('kegiatan', 'kode_urusan='.$kodeurusan.' AND kode_bidang='.$kodebidang.' AND kode_program='.$kodeprogram.' AND kode_kegiatan='.$kodekegiatan.' AND id_unit_organisasi="'.$id_unit_organisasi.'"')->result_object();
						if(empty($cek)){
							$object = array(
								'kode_urusan'		=> $kodeurusan,
								'kode_bidang'		=> $kodebidang,
								'kode_program'		=> $kodeprogram,
								'kode_kegiatan'		=> $kodekegiatan,
								'kegiatan'			=> $urusan,
								'id_unit_organisasi'	=> $id_unit_organisasi
							);
							$this->Model_import->insert('kegiatan', $object);
						}
					}
				}
				if(!empty($kodesubkegiatan)){
					$cekKegiatan = $this->Model_import->get_where('kegiatan', 'kode_urusan='.$kodeurusan.' AND kode_bidang='.$kodebidang.' AND kode_program='.$kodeprogram.' AND kode_kegiatan='.$kodekegiatan.' AND id_unit_organisasi="'.$id_unit_organisasi.'"')->result_object();
					if(!empty($cekKegiatan)){
						$cek = $this->Model_import->get_where('sub_kegiatan', 'kode_urusan='.$kodeurusan.' AND kode_bidang='.$kodebidang.' AND kode_program='.$kodeprogram.' AND kode_kegiatan='.$kodekegiatan.' AND kode_sub_kegiatan='.$kodesubkegiatan.' AND id_unit_organisasi="'.$id_unit_organisasi.'"')->result_object();
						if(empty($cek)){
							$object = array(
								'kode_urusan'		=> $kodeurusan,
								'kode_bidang'		=> $kodebidang,
								'kode_program'		=> $kodeprogram,
								'kode_kegiatan'		=> $kodekegiatan,
								'kode_sub_kegiatan'	=> $kodesubkegiatan,
								'sub_kegiatan'		=> $urusan,
								'id_unit_organisasi'	=> $id_unit_organisasi
							);
							$this->Model_import->insert('sub_kegiatan', $object);
						}
					}
					$cekSubKegiatan = $this->Model_import->get_where('sub_kegiatan', 'kode_urusan='.$kodeurusan.' AND kode_bidang='.$kodebidang.' AND kode_program='.$kodeprogram.' AND kode_kegiatan='.$kodekegiatan.' AND kode_sub_kegiatan='.$kodesubkegiatan.' AND id_unit_organisasi="'.$id_unit_organisasi.'"')->result_object();
					if(!empty($cekSubKegiatan)){
						$cek_renja	= $this->Model_import->get_duatable('*', 'renja', 'lokasi', 'renja.kode_lokasi=lokasi.kode_lokasi', 'renja.kode_urusan='.$kodeurusan.' AND renja.kode_bidang='.$kodebidang.' AND renja.kode_program='.$kodeprogram.' AND renja.kode_kegiatan='.$kodekegiatan.' AND renja.kode_sub_kegiatan='.$kodesubkegiatan.' AND renja.id_unit_organisasi="'.$id_unit_organisasi.'" AND lokasi.lokasi="'.$lokasi.'"', 'renja.id');
	
						if(empty($cek_renja)){
							$cek_lokasi	= $this->Model_import->get_where('lokasi', 'lokasi="'.$lokasi.'"')->row();
							$kodelokasi	= [];
							if(empty($cek_lokasi)){
								$last_lokasi	= $this->Model_import->get_last('lokasi', 'id')->row();
								$last_id		= $last_lokasi->id + 1;
								if($last_id <= 9){
									$kodelokasi = '00'.$last_id;
								} else if($last_id <= 99){
									$kodelokasi = '0'.$last_id;
								} else {
									$kodelokasi = $last_id;
								}
								$object = array(
									'kode_lokasi'	=> $kodelokasi,
									'lokasi'		=> $lokasi
								);
								$this->Model_import->insert('lokasi', $object);
							} else {
								$kodelokasi = $cek_lokasi->kode_lokasi;
							}
							$object = array(
								'kode_urusan'		=> $kodeurusan,
								'kode_bidang'		=> $kodebidang,
								'kode_program'		=> $kodeprogram,
								'kode_kegiatan'		=> $kodekegiatan,
								'kode_sub_kegiatan'	=> $kodesubkegiatan,
								'prioritas_daerah'	=> $prioritas,
								'sasaran_daerah'	=> $sasaran,
								'kode_lokasi'		=> $kodelokasi,
								'tolok_ukur_capaian'	=> $tolokukurcapaian,
								'target_capaian'		=> $targetcapaian,
								'tolok_ukur_sub_keg'	=> $tolokukursubkeg,
								'target_sub_keg'		=> $targetsubkeg,
								'tolok_ukur_hasil_keg'	=> $tolokukurhasilkeg,
								'target_hasil_keg'		=> $targethasilkeg,
								'pagu_indikatif'		=> filter_var($paguindikatif, FILTER_SANITIZE_NUMBER_INT),
								'prakiraan_maju'		=> filter_var($prakiraanmaju, FILTER_SANITIZE_NUMBER_INT),
								'keterangan'			=> $keterangan,
								'id_unit_organisasi'	=> $id_unit_organisasi
							);
			
							$this->Model_import->insert('renja', $object);
						}
					}
				}
			}
		}
		$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Import Data Renja'));

		redirect('admin/import-perencanaan/renja', 'refresh');

	}

	public function checkRenja($id){
		$data		= $this->Model_import->get_where('renja', 'id_unit_organisasi='.$id)->result_object();
		if(!empty($data)){
			return true;
		} else{
			return false;
		}
	}

	public function hapusRenja($id){
		
		$this->Model_import->delete('renja', 'id_unit_organisasi='.$id);
		$this->session->set_flashdata('message', array('type'=>'success','text'=>'Berhasil Menghapus Data Renja'));
		redirect('admin/import-perencanaan/renja', 'refresh');

	}

}
