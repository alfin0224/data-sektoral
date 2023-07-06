<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Tambah Indikator RPJMD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="<?= base_url('admin/rpjmd/gambaran-umum/indikator')?>">Indikator RPJMD</a>
				</li>
				<li class="breadcrumb-item active">Tambah Indikator RPJMD</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="card-title">Tambah Indikator RPJMD</h3>
		</div>
		<!-- form start -->
		<form action="<?= base_url('admin/rpjmd/gambaran-umum/indikator/simpan-indikator/'); echo $this->uri->segment(6); ?>" role="form" method="POST">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
                    <div class="form-group">
							<label for="uraian">Uraian Indikator</label>
							<textarea id="uraian" name="uraian" class="textarea" placeholder="Masukkan Uraian Indikator"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
							</textarea>
						</div>
						<div class="form-group">
							<label>Satuan</label>
							<select class="form-control select2 select2-primary"
								data-dropdown-css-class="select2-primary" style="width: 100%;" name="satuan" id="satuan">
								<option selected="selected" value="1">meter</option>
								<option value="0">orang</option>
							</select>
						</div>
						<div class="form-group">
							<label for="tahun1">Tahun-1</label>
							<input type="text" class="form-control" name="tahun1" id="tahun1" placeholder="Masukkan Tahun Pertama" required>
						</div>
						<div class="form-group">
							<label for="tahun1">Tahun-2</label>
							<input type="text" class="form-control" name="tahun2" id="tahun2" placeholder="Masukkan Tahun Kedua" required>
						</div>
						<div class="form-group">
							<label for="tahun1">Tahun-3</label>
							<input type="text" class="form-control" name="tahun3" id="tahun3" placeholder="Masukkan Tahun Ketiga" required>
						</div>
						<div class="form-group">
							<label for="tahun1">Tahun-4</label>
							<input type="text" class="form-control" name="tahun4" id="tahun4" placeholder="Masukkan Tahun Keempat" required>
						</div>
						<div class="form-group">
							<label for="tahun1">Tahun-5</label>
							<input type="text" class="form-control" name="tahun5" id="tahun5" placeholder="Masukkan Tahun Kelima" required>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>
