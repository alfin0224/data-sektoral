<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Setting RPJMD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item active">Setting RPJMD</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="mb-2 font-weight-bold text-primary">Setting RPJMD</h6>
			<a href="<?= base_url('admin/rpjmd/tambah-rpjmd')?>"
				class="btn btn-success btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah RPJMD</span>
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode</th>
							<th>Tahun Mulai</th>
							<th>Tahun Selesai</th>
							<th>Visi</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
							foreach($setting_rpjmd as $sr): ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $sr->kode; ?></td>
							<td><?php echo $sr->tahun_mulai; ?></td>
							<td><?php echo $sr->tahun_selesai; ?></td>
							<td><?php echo $sr->visi; ?></td>
							<td class="text-center">
                            <?php if($sr->id_status == 1){ ?>
                                <a class="btn btn-sm btn-danger my-1" href="<?= base_url('admin/rpjmd/ubah-status-rpjmd/'); echo $sr->id_rpjmd .'/'. 0 ?>" role="button" title="Aktifkan">Non-aktif</a>
                            <?php } elseif($sr->id_status == 0) { ?>
                                <a class="btn btn-sm btn-success my-1" href="<?= base_url('admin/rpjmd/ubah-status-rpjmd/'); echo $sr->id_rpjmd .'/'. 1 ?>" role="button" title="Non-aktifkan">Aktif</a>
                            <?php } ?>
							</td>
							<td class="text-center">
								<a href="<?= base_url('admin/rpjmd/ubah-setting-rpjmd/'); echo $sr->id_rpjmd ?>"
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
							<th>Kode</th>
							<th>Tahun Mulai</th>
							<th>Tahun Selesai</th>
							<th>Visi</th>
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
