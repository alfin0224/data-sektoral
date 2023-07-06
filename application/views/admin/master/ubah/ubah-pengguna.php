<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Ubah Pengguna</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="<?= base_url('admin/master/master-pengguna')?>">Master Pengguna</a>
				</li>
				<li class="breadcrumb-item active">Ubah Pengguna</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="card-title">Ubah Pengguna</h3>
		</div>
		<!-- form start -->
		<?php foreach ($user as $u) : ?>
		<form action="<?= base_url('admin/master/master-pengguna/simpan-ubah-pengguna/'); echo $u->id_user ?>" role="form" method="POST">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?php echo $u->nama ?>" required>
						</div>
						<div class="form-group">
							<label for="nip">NIP</label>
							<input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP" value="<?php echo $u->nip ?>">
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control" name="alamat" id="alamat"
								placeholder="Masukkan Alamat" value="<?php echo $u->alamat ?>">
						</div>
						<div class="form-group">
							<label for="no_telp">No Telp</label>
							<input type="number" class="form-control" name="no_telp" id="no_telp"
								placeholder="Masukkan Nomor Telepon" value="<?php echo $u->no_telp ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama_opd">Unit Organisasi</label>
							<select class="form-control select2 select2-primary"
								data-dropdown-css-class="select2-primary" name="unit_organisasi" id="unit_organisasi" style="width: 100%;">
								<option value="<?php echo $u->id_unit_organisasi ?>"><?php echo $u->unit_organisasi." ".$u->nama_opd ?> (Data Lama)</option>
                				<option disabled="">=====================================================</option>
               
								<?php foreach($opd as $opd) : ?>
									<option value="<?php echo $opd->id ?>"><?php echo $opd->unit_organisasi." ".$opd->nama_opd ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="hidden" name="hidden" value="<?php echo $u->username ?>">
							<input type="text" class="form-control" name="username" id="username"
								placeholder="Masukkan Username" value="<?php echo $u->username ?>" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" id="password"
								placeholder="Masukkan Password">
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
		<?php endforeach ?>
	</div>
