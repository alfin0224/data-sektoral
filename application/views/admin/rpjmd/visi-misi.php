<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Visi Misi RPJMD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item active">Visi Misi RPJMD</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?php 
					foreach($visi as $v): ?>
			<h4 class="mb-2 font-weight-bold text-primary"><?php echo "VISI ".$v->visi; ?></h4>
			<?php endforeach; ?>
			<a href="<?= base_url('admin/rpjmd/visi-misi/tambah-misi')?>"
				class="btn btn-success btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah Misi</span>
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Misi</th>
							<th>Bidang Urusan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
							foreach($visi_misi as $m): ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $m->misi; ?></td>
							<td><?php echo $m->bidang; ?></td>

							<td class="text-center">
								<a href="<?= base_url('admin/rpjmd/visi-misi/ubah-misi/'); echo $m->id_misi; ?>"
									class="btn btn-warning btn-circle my-1">
									<i class="fas fa-edit"></i>
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
                            <th>No</th>
							<th>Misi</th>
							<th>Bidang Urusan</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
