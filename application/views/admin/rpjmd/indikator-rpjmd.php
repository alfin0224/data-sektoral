<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Indikator RPJMD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item active">Indikator RPJMD</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">

			<a href="<?= base_url('admin/rpjmd/gambaran-umum/indikator/tambah-indikator/'); echo $this->uri->segment(5); ?>"
				class="btn btn-success btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah Indikator</span>
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Indikator</th>
							<th>Satuan</th>
							<th>Tahun-1</th>
							<th>Tahun-2</th>
							<th>Tahun-3</th>
                            <th>Tahun-4</th>
                            <th>Tahun-5</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
							foreach($indikator as $i): ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $i->indikator; ?></td>
							<td><?php echo $i->id_satuan; ?></td>
							<td><?php echo $i->tahun_pertama; ?></td>
							<td><?php echo $i->tahun_kedua; ?></td>
                            <td><?php echo $i->tahun_ketiga; ?></td>
                            <td><?php echo $i->tahun_keempat; ?></td>
                            <td><?php echo $i->tahun_kelima; ?></td>
							<td class="text-center">
								<a href="<?= base_url('admin/rpjmd/ubah-indikator/'); echo $i->id_indikator ?>"
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
							<th>Indikator</th>
							<th>Satuan</th>
							<th>Tahun-1</th>
							<th>Tahun-2</th>
							<th>Tahun-3</th>
                            <th>Tahun-4</th>
                            <th>Tahun-5</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
