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
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Kode</th>
							<th>Bidang Urusan</th>
							<th>Pokok Masalah</th>
                            <th>Rumusan Masalah</th>
                            <th>Akar Masalah</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($bidang as $b): ?>
						<tr>
							<td><?php echo $b->kode_urusan.'.'.$b->kode_bidang; ?></td>
							<td><a href="<?= base_url('admin/rpjmd/rumusan-masalah/detail/'); echo $b->id;?>"><?php echo $b->bidang; ?></a></td>
							<th>0</th>
                            <th>0</th>
                            <th>0</th>

							<td class="text-center">
								<a href="<?= base_url('admin/rpjmd/rumusan-masalah/ubah-rumusan-masalah/'); echo $b->id; ?>" class="btn btn-warning btn-circle my-1">
									<i class="fas fa-edit"></i>
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
                            <th>Kode</th>
							<th>Bidang Urusan</th>
							<th>Pokok Masalah</th>
                            <th>Rumusan Masalah</th>
                            <th>Akar Masalah</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
