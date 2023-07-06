<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Tambah Pengguna</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="<?= base_url('admin/master/master-pengguna')?>">Master Pengguna</a>
				</li>
				<li class="breadcrumb-item active">Tambah Pengguna</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="card-title">Tambah Pengguna</h3>
		</div>
		<!-- form start -->
		<form action="<?= base_url('admin/master/master-pengguna/simpan-pengguna') ?>" role="form" method="POST">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
						</div>
						<div class="form-group">
							<label for="nip">NIP</label>
							<input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP">
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control" name="alamat" id="alamat"
								placeholder="Masukkan Alamat">
						</div>
						<div class="form-group">
							<label for="no_telp">No Telp</label>
							<input type="number" class="form-control" name="no_telp" id="no_telp"
								placeholder="Masukkan Nomor Telepon">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="id_unit_organisasi">Unit Organisasi / OPD</label>
							<select class="form-control select2 select2-primary"
								data-dropdown-css-class="select2-primary" name="id_unit_organisasi" id="id_unit_organisasi" style="width: 100%;" required>
								<option value disabled hidden selected>Pilih</option>
								<?php foreach($opd as $opd) : ?>
								<option value="<?php echo $opd->id ?>"><?php echo $opd->unit_organisasi." ".$opd->nama_opd ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" name="username" id="username"
								placeholder="Masukkan Username" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" id="password"
								placeholder="Masukkan Password" required>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control select2 select2-primary"
								data-dropdown-css-class="select2-primary" style="width: 100%;" name="status" id="status">
								<option selected="selected" value="1">Aktif</option>
								<option value="0">Non Aktif</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>
