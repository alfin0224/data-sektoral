<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Master OPD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item active">Master OPD</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="mb-2 font-weight-bold text-primary">Master OPD</h6>
			<a href="<?= base_url('admin/master/master-opd/tambah-opd')?>" class="btn btn-success btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah OPD</span>
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Unit Organisasi</th>
							<th class="text-center">Nama OPD</th>
							<th class="text-center">Kepala Dinas</th>
							<th class="text-center">NIP</th>
							<th class="text-center">Pangkat</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1; 
							foreach($opd as $opd) : ?>
						<tr>
							<td class="text-center"><?php echo $no++ ?></td>
							<td><?php echo $opd->unit_organisasi ?></td>
							<td><?php echo $opd->nama_opd ?></td>
							<td><?php echo $opd->kepala_dinas ?></td>
							<td><?php echo $opd->nip ?></td>
							<td><?php echo $opd->pangkat ?></td>
							<td class="text-center">
								<a href="<?= base_url('admin/master/master-opd/ubah-opd/'); echo $opd->id ?>" class="btn btn-warning btn-circle my-1">
									<i class="fas fa-edit"></i>
								</a>
								
								<?php if($this->checkHapusOPD->checkHapusOPD($opd->id) == true) { ?>
								<a href="<?= base_url('admin/master/master-opd/hapus-opd/'); echo $opd->id ?>" class="btn btn-danger btn-circle my-1 hapus">
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
							<th class="text-center">No</th>
							<th class="text-center">Unit Organisasi</th>
							<th class="text-center">Nama OPD</th>
							<th class="text-center">Kepala Dinas</th>
							<th class="text-center">NIP</th>
							<th class="text-center">Pangkat</th>
							<th class="text-center">Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
