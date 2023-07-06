<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Tambah OPD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="<?= base_url('admin/master/master-opd')?>">Master OPD</a></li>
				<li class="breadcrumb-item active">Tambah Data OPD</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="card-title">Tambah Data OPD</h3>
		</div>
		<!-- form start -->
		<form action="<?= base_url('admin/master/master-opd/simpan-opd') ?>" role="form" method="POST">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="unit_organisasi">Unit Organisasi</label>
							<input type="text" class="form-control" name="unit_organisasi" placeholder="Masukkan Unit Organisasi" required>
						</div>
						<div class="form-group">
							<label for="nama_opd">Nama OPD</label>
							<input type="text" class="form-control" name="nama_opd" placeholder="Masukkan Nama OPD" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="kepala_dinas">Kepala Dinas</label>
							<input type="text" class="form-control" name="kepala_dinas" placeholder="Masukkan Nama Kepala Dinas" required>
						</div>
						<div class="form-group">
							<label for="nip">NIP</label>
							<input type="text" class="form-control" name="nip" placeholder="Masukkan NIP" required>
						</div>
						<div class="form-group">
							<label for="nip">Pangkat</label>
							<input type="text" class="form-control" name="pangkat" placeholder="Masukkan Pangkat" required>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-left">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>
