<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Ubah OPD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="<?= base_url('admin/master/master-opd')?>">Master OPD</a></li>
				<li class="breadcrumb-item active">Ubah Data OPD</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="card-title">Ubah Data OPD</h3>
		</div>
		<!-- form start -->
		<?php foreach($opd as $opd) :?>
		<form action="<?= base_url('admin/master/master-opd/simpan-ubah-opd/'); echo $opd->id ?>" role="form" method="POST">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="unit_organisasi">Unit Organisasi</label>
							<input type="hidden" name="hidden" value="<?php echo $opd->unit_organisasi ?>">
							<input type="text" class="form-control" name="unit_organisasi" id="unit_organisasi" placeholder="Masukkan Unit Organisasi" value="<?php echo $opd->unit_organisasi ?>" required>
						</div>
						<div class="form-group">
							<label for="nama_opd">Nama OPD</label>
							<input type="text" class="form-control" name="nama_opd" id="nama_opd" placeholder="Masukkan Nama OPD" value="<?php echo $opd->nama_opd ?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="kepala_dinas">Kepala Dinas</label>
							<input type="text" class="form-control" name="kepala_dinas" id="kepala_dinas" placeholder="Masukkan Nama Kepala Dinas" value="<?php echo $opd->kepala_dinas ?>"required>
						</div>
						<div class="form-group">
							<label for="nip">NIP</label>
							<input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP" value="<?php echo $opd->nip ?>" required>
						</div>
						<div class="form-group">
							<label for="nip">Pangkat</label>
							<input type="text" class="form-control" name="pangkat" id="pangkat" placeholder="Masukkan Pangkat" value="<?php echo $opd->pangkat ?>" required>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-left">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
		<?php endforeach ?>
	</div>
