<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Rumusan Masalah RPJMD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item active">Rumusan Masalah RPJMD</li>
			</ol>
		</div>
	</div>

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
		<div class="card-header py-3">

			<a href="<?= base_url('admin/rpjmd/rumusan-masalah/tambah-masalah-pokok/'); echo $this->uri->segment(5); ?>"
				class="btn btn-success btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah Masalah Pokok</span>
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Masalah Pokok</th>
							<th>Indikator</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
							foreach($masalah_pokok as $mp): ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $mp->masalah_pokok; ?></td>
							<td>-</td>
							<td class="text-center">
								<a href="<?= base_url('admin/rpjmd/ubah-indikator/'); echo $mp->id_masalah; ?>"
									class="btn btn-warning btn-circle my-1">
									<i class="fas fa-edit"></i>
								</a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Masalah Pokok</th>
							<th>Indikator</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">

			<a href="<?= base_url('admin/rpjmd/rumusan-masalah/tambah-rumusan-masalah/'); echo $this->uri->segment(5); ?>"
				class="btn btn-success btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah</span>
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Masalah Pokok</th>
							<th>Uraian Rumusan Masalah</th>
							<th>Akar Masalah</th>
							<th>Lokasi</th>
							<th>Misi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
							foreach($rumusan_masalah as $rm): ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $rm->masalah_pokok; ?></td>
							<td><?php echo $rm->uraian_masalah; ?></td>
							<td><?php echo $rm->akar_masalah; ?></td>
							<td>Manokwari</td>
							<td><?php echo $rm->misi; ?></td>
							<td class="text-center">
								<a href="<?= base_url('admin/rpjmd/ubah-indikator/'); echo $rm->id_masalah; ?>"
									class="btn btn-warning btn-circle my-1">
									<i class="fas fa-edit"></i>
								</a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
                            <th>No</th>
							<th>Masalah Pokok</th>
							<th>Uraian Rumusan Masalah</th>
							<th>Akar Masalah</th>
							<th>Lokasi</th>
							<th>Misi</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
