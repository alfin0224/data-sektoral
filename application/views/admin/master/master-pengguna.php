<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Master Pengguna</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item active">Master Pengguna</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="mb-2 font-weight-bold text-primary">Master Pengguna</h6>
			<a href="<?= base_url('admin/master/master-pengguna/tambah-pengguna')?>"
				class="btn btn-success btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah Pengguna</span>
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>NIP</th>
							<th>Alamat</th>
							<th>No Telp</th>
							<th>Unit Organisasi / OPD</th>
							<th>Username</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
							foreach($user as $u): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $u->nama ?></td>
							<td><?php echo $u->nip ?></td>
							<td><?php echo $u->alamat ?></td>
							<td><?php echo $u->no_telp ?></td>
							<td><?php echo $u->unit_organisasi." ".$u->nama_opd  ?></td>
							<td><?php echo $u->username ?></td>
							<td class="text-center">
								<a href="<?= base_url('admin/master/master-pengguna/ubah-status/'); echo $u->id_user ?>" 
									<?php if($u->status == 1){
										echo " class='badge badge-success'>Aktif";
									} else {
										echo " class='badge badge-danger'>Non-Aktif";
									} ?>
								</a>
							</td>
							<td class="text-center">
								<a href="<?= base_url('admin/master/master-pengguna/ubah-pengguna/'); echo $u->id_user ?>"
									class="btn btn-warning btn-circle my-1">
									<i class="fas fa-edit"></i>
								</a>
								<?php if($this->checkHapusPengguna->checkHapusPengguna($u->id_unit_organisasi) == true) { ?>
								<a href="<?= base_url('admin/master/master-pengguna/hapus-pengguna/'); echo $u->id_user ?>" class="btn btn-danger btn-circle my-1 hapus">
									<i class="fas fa-trash"></i>
								</a>
								<?php } else { ?>
								<button class="btn btn-danger btn-circle my-1" disabled>
									<i class="fas fa-trash"></i>
								</button>
								<?php } ?>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>NIP</th>
							<th>Alamat</th>
							<th>No Telp</th>
							<th>Unit Organisasi / OPD</th>
							<th>Username</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
