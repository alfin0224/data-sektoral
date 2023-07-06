<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class importPerencanaanController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();	
		$this->load->model('Model_import');
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
	// public function rpjmd()
	// {
	// 	$data['page'] = 'rpjmd';

	// 	$this->load->view('admin/layout/header', $data);
	// 	$this->load->view('admin/import-perencanaan/rpjmd');
	// 	$this->load->view('admin/layout/footer');
	// }

	// public function renstra()
	// {
	// 	$data['page'] = 'renstra';

	// 	$this->load->view('admin/layout/header', $data);
	// 	$this->load->view('admin/import-perencanaan/renstra');
	// 	$this->load->view('admin/layout/footer');
	// }

	public function indexRenja()
	{
		$data['page'] = 'renja';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/import-perencanaan/renja');
		$this->load->view('admin/layout/footer');
	}

	public function indexDataRkpdOpd()
	{
		$data['page'] = 'data-rkpd-opd';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/import-perencanaan/index-data-rkpd-opd');
		$this->load->view('admin/layout/footer');
	}

	public function detailDataRkpdOpd()
	{
		$data['page'] = 'data-rkpd-opd';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/import-perencanaan/detail-data-rkpd-opd');
		$this->load->view('admin/layout/footer');
	}

	public function prosesRenja(){
		//$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
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
					$cek = $this->Model_import->get_where('bidang', 'kode_bidang='.$kodebidang)->result_object();
					if(empty($cek)){
						$object = array(
							'kode_bidang'	=> $kodebidang,
							'bidang'		=> $urusan
						);
						$this->Model_import->insert('bidang', $object);
					}
				}

				if(!empty($kodeprogram) && empty($kodekegiatan)){
					$cek = $this->Model_import->get_where('program', 'kode_bidang='.$kodebidang.' AND kode_program='.$kodeprogram)->result_object();
					if(empty($cek)){
						$object = array(
							'kode_bidang'	=> $kodebidang,
							'kode_program'	=> $kodeprogram,
							'program'		=> $urusan
						);
						$this->Model_import->insert('program', $object);
					} 
				}

				if(!empty($kodekegiatan) && empty($kodesubkegiatan)){
					$cek = $this->Model_import->get_where('kegiatan', 'kode_bidang='.$kodebidang.' AND kode_program='.$kodeprogram.' AND kode_kegiatan='.$kodekegiatan)->result_object();
					if(empty($cek)){
						$object = array(
							'kode_bidang'	=> $kodebidang,
							'kode_program'	=> $kodeprogram,
							'kode_kegiatan'	=> $kodekegiatan,
							'kegiatan'		=> $urusan
						);
						$this->Model_import->insert('kegiatan', $object);
					}
				}
				if(!empty($kodesubkegiatan)){
					$cek = $this->Model_import->get_where('sub_kegiatan', 'kode_urusan='.$kodeurusan.' AND kode_bidang='.$kodebidang.' AND kode_program='.$kodeprogram.' AND kode_kegiatan='.$kodekegiatan.' AND kode_sub_kegiatan='.$kodesubkegiatan)->result_object();
					if(empty($cek)){
						$object = array(
							'kode_urusan'		=> $kodeurusan,
							'kode_bidang'		=> $kodebidang,
							'kode_program'		=> $kodeprogram,
							'kode_kegiatan'		=> $kodekegiatan,
							'kode_sub_kegiatan'	=> $kodesubkegiatan,
							'sub_kegiatan'		=> $urusan
						);
						$this->Model_import->insert('sub_kegiatan', $object);
					}
					$cek_renja	= $this->Model_import->get_duatable('*', 'renja', 'lokasi', 'renja.kode_lokasi=lokasi.kode_lokasi', 'renja.kode_urusan='.$kodeurusan.' AND renja.kode_bidang='.$kodebidang.' AND renja.kode_program='.$kodeprogram.' AND renja.kode_kegiatan='.$kodekegiatan.' AND renja.kode_sub_kegiatan='.$kodesubkegiatan.' AND lokasi.lokasi="'.$lokasi.'"', 'renja.id');

					//$cek_renja = $this->Model_import->get_where('renja', 'kode_urusan='.$kodeurusan.' AND kode_bidang='.$kodebidang.' AND kode_program='.$kodeprogram.' AND kode_kegiatan='.$kodekegiatan.' AND kode_sub_kegiatan='.$kodesubkegiatan)->result_object();
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
							'keterangan'			=> $keterangan
						);
		
						$this->Model_import->insert('renja', $object);
					}
				}
			}

		}

		redirect('admin/import-perencanaan/renja', 'refresh');

	}

	public function cetakForm1(){
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
		$html = $this->load->view('admin/import-perencanaan/cetak/cetakForm1',[],true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('Form 1 Konsistensi Target Program RKPD 2022 dan RPJMD.pdf', 'I');
	}

	public function cetakForm2(){
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
		$html = $this->load->view('admin/import-perencanaan/cetak/cetakForm2',[],true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('Form 2 Rekapitulasi Jumlah Program, Kegiatan, dan SubKegiatan.pdf', 'I');
	}

	public function cetakForm3(){
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
		$html = $this->load->view('admin/import-perencanaan/cetak/cetakForm3',[],true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('form 3 Daftar Program, Kegiatan, dan SubKegiatan RKPD 2022.pdf', 'I');
	}

	public function cetakForm4(){
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
		$html = $this->load->view('admin/import-perencanaan/cetak/cetakForm4',[],true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('Form 4 Rekapitulasi Jumlah Program, Kegiatan, dan SubKegiatan Pendukung Prioritas Nasional.pdf', 'I');
	}

	public function cetakForm5(){
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
		$html = $this->load->view('admin/import-perencanaan/cetak/cetakForm5',[],true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('Form 5 Program dan Kegiatan Perangkat Daerah Provinsi Papua Barat 2022.pdf', 'I');
	}
}
