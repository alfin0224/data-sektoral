<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Data RKPD OPD (Detail)</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="<?= base_url('admin/import-perencanaan/data-rkpd-opd')?>">Data RKPD
						OPD</a></li>
				<li class="breadcrumb-item active">Data RKPD OPD (Detail)</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="bg-dark rounded p-3">
				<h6 class="mb-3 font-weight-bold text-white text-center">Export RKPD</h6>
				<form action="<?= base_url('admin/import-perencanaan/data-rkpd-opd/cetak')?>" target="_blank"
					method="POST">
					<div class="form-row justify-content-center">
						<div class="form-group col-md-4 mb-2">
							<select class="form-control select2 select2-primary" name="program" id="program"
								data-dropdown-css-class="select2-primary" style="width: 100%;">
								<option value disabled hidden selected>Semua Program</option>
								<?php foreach ($program as $prog) :?>
								<option value="<?php echo $prog->kode_urusan.".".$prog->kode_bidang.".".$prog->kode_program."-".$prog->id_unit_organisasi ?>"><?php echo $prog->kode_urusan.".".$prog->kode_bidang.".".$prog->kode_program." ".$prog->program ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-md-4 mb-2">
							<select class="form-control select2 select2-primary" name="kegiatan" id="kegiatan"
								data-dropdown-css-class="select2-primary" style="width: 100%;">
								<option value disabled hidden selected>Semua Kegiatan</option>
							</select>
						</div>

						<div class="form-group col-md-4 mb-2">
							<select class="form-control select2 select2-primary" name="sub_kegiatan" id="sub_kegiatan"
								data-dropdown-css-class="select2-primary" style="width: 100%;">
								<option value disabled hidden selected>Semua Sub Kegiatan</option>
							</select>
						</div>

						<div class="form-group col-md-4 mb-2">
							<select class="form-control select2 select2-primary" name="lokasi" id="lokasi"
								data-dropdown-css-class="select2-primary" style="width: 100%;">
								<option value disabled hidden selected>Semua Lokasi</option>
								<?php foreach ($lokasi as $lok) :?>
								<option value="<?php echo $lok->kode_lokasi ?>"><?php echo $lok->lokasi ?></option>
								
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-md-4 mb-2">
							<select class="form-control select2 select2-primary" name="jenis_form" id="jenis_form"
								data-dropdown-css-class="select2-primary" style="width: 100%;" required>
								<option value disabled hidden selected>Pilih Jenis Form</option>
								<option value="1">Form 1</option>
								<option value="2">Form 2</option>
								<option value="3">Form 3</option>
								<option value="4">Form 4</option>
								<!-- <option value="5">Form Renja Kepmen 50</option> -->
							</select>
						</div>

						<div class="col-md-2 mb-2">
							<input type="hidden" name="hidden" value="<?php echo $id_unit?>">
							<button type="submit" class="btn btn-success">
								<i class="fas fa-cloud-download-alt mr-2"></i>Export
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<div class="row mb-3">
					<div class="col-md-1">
						<h6><a href="#" class="mb-3 badge badge-success">Form E.55</a></h6>
					</div>
					<div class="col-md-6">
						<h6 class="mb-3 font-weight-bold text-primary">Unit Organisasi / OPD: 2.09.0.1.00.11 Nama OPD
						</h6>
						<h6 class="mb-3 font-weight-bold text-primary">Sasaran: Sasaran A</h6>
					</div>
					<div class="col-md-5">
						<h6 class="mb-3 font-weight-bold text-primary">Indikator: Indikator A</h6>
						<h6 class="mb-3 font-weight-bold text-primary">Target: Target A</h6>
					</div>
				</div>
				<table class="table-bordered table-striped table-detail-rkpd" cellspacing="0">
					<thead>
						<tr>
							<th rowspan="2" colspan="5">Kode</th>
							<th rowspan="2">Program/Kegiatan/Sub Kegiatan</th>
							<th rowspan="2">Indikator Kinerja Program (Outcome) / Kegiatan (output)</th>
							<th rowspan="2">Lokasi Output Kegiatan</th>
							<th rowspan="2" colspan="2">Target Renstra OPD Provinsi pada tahun 2022 (akhir periode
								Renstra OPD Provinsi)</th>
							<th rowspan="2" colspan="2">Realisasi Capaian Kinerja Renstra OPD Provinsi s/d Renja OPD
								Tahun Lalu (2015)</th>
							<th rowspan="2" colspan="2">Target Kinerja dan Anggaran Renja OPD Provinsi Tahun Berjalan
								yang dievaluasi (2016)</th>
							<th colspan="8">Realisasi Kinerja Per Triwulan</th>
							<th rowspan="2" colspan="2">Realisasi Capaian Kinerja dan Anggaran RKPD Provinsi yang
								Dievaluasi</th>
							<th rowspan="2" colspan="2">Realisasi Kinerja dan Anggaran Renstra OPD Provinsi s/d Tahun
								2022</th>
							<th rowspan="2" colspan="2">Tingkat Capaian Kinerja dan Realisasi Anggaran Renstra Provinsi
								s/d Tahun 2017 (%)</th>
							<th rowspan="2">Unit OPD Penanggung Jawab</th>
						</tr>
						<tr>
							<th colspan="2">I</th>
							<th colspan="2">II</th>
							<th colspan="2">III</th>
							<th colspan="2">IV</th>
						</tr>
						<tr>
							<th rowspan="2" colspan="5">(1)</th>
							<th rowspan="2">(2)</th>
							<th rowspan="2">(3)</th>
							<th rowspan="2">(4)</th>
							<th colspan="2">(5)</th>
							<th colspan="2">(6)</th>
							<th colspan="2">(7)</th>
							<th colspan="2">(8)</th>
							<th colspan="2">(9)</th>
							<th colspan="2">(10)</th>
							<th colspan="2">(11)</th>
							<th colspan="2">(12)</th>
							<th colspan="2">(13)</th>
							<th colspan="2">(14)</th>
							<th rowspan="2">(15)</th>
						</tr>
						<tr>
							<th>K</th>
							<th>Rp</th>
							<th>K</th>
							<th>Rp</th>
							<th>K</th>
							<th>Rp</th>
							<th>K</th>
							<th>Rp</th>
							<th>K</th>
							<th>Rp</th>
							<th>K</th>
							<th>Rp</th>
							<th>K</th>
							<th>Rp</th>
							<th>K</th>
							<th>Rp</th>
							<th>K</th>
							<th>Rp</th>
							<th>K</th>
							<th>Rp</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
					<tfoot>

					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
