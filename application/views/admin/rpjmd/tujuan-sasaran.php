<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Tujuan Sasaran RPJMD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item active">Tujuan Sasaran RPJMD</li>
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
							<th>Misi</th>
							<th>Isu Strategis</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                        $i=1;
							foreach($tujuan_sasaran as $ts): ?>
						<tr>
							<td style="width:10%;"><?php echo $i++; ?></td>
							<td style="width:40%;"><a href="<?= base_url('admin/rpjmd/tujuan-sasaran/detail/'); echo $ts->id_misi;?>"><?php echo $ts->misi; ?></a></td>
							<th></th>

							<td class="text-center">
								<a href="<?= base_url('admin/rpjmd/tujuan-sasaran/ubah-tujuan-sasaran/'); echo $ts->id_misi; ?>" class="btn btn-warning btn-circle my-1">
									<i class="fas fa-edit"></i>
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
                            <th>Kode</th>
							<th>Misi</th>
							<th>Isu Strategis</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
