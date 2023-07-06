<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">RENJA</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item active">RENJA</li>
			</ol>
		</div>
	</div>

	<!-- Content Row -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<h2 class="text-center mb-4">Import RENJA</h2>
			<form action="<?php echo base_url('admin/import-perencanaan/proses-renja')?>" method="post" enctype="multipart/form-data" class="mb-5">
				<div class="form-row justify-content-center">
					<div class="form-group col-md-4 mb-2">
						<select class="form-control select2 select2-primary" name="id_unit_organisasi" id="id_unit_organisasi"
							data-dropdown-css-class="select2-primary" style="width: 100%;" required>
							<option value disabled hidden selected>Pilih OPD</option>
							<?php foreach($opd as $op) : ?>
							<option value="<?php echo $op->id ?>"><?php echo $op->unit_organisasi." ".$op->nama_opd ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="col-md-4 mb-2">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFile" name="customFile" required>
							<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>

					<div class="col-md-2 mb-2">
						<button type="submit" class="btn btn-success"><i class="fas fa-sync mr-1"></i>
							Proses
							File</button>
					</div>
				</div>
			</form>
			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="mb-2 font-weight-bold text-primary mb-2">Import Renja OPD</h6>
					<div class="progress">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php if(!empty($import)){ echo ($import/($import+$notimport))*100; } else { echo "0"; } ?>%;" aria-valuenow="50"
							aria-valuemin="0" aria-valuemax="100"><?php if(!empty($import)){ echo ($import/($import+$notimport))*100; } else { echo "0"; } ?>%
						</div>
					</div>
					<!-- <a href="#" class="btn btn-success btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah OPD</span>
			</a> -->
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Unit Organisasi</th>
									<th class="text-center">Nama OPD</th>
									<th class="text-center">Status Import</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1; 
								foreach($opd as $o) : ?>
								<tr>
									<td class="text-center"><?php echo $no++ ?></td>
									<td><?php echo $o->unit_organisasi ?></td>
									<td><?php echo $o->nama_opd ?></td>
									<td class="text-center">
									<?php if($this->checkRenja->checkRenja($o->id) == true) { ?>
										<a class="badge badge-success">Sudah</a>
										<a href="<?= base_url('admin/import-perencanaan/hapus-renja/'); echo $o->id ?>" class="badge badge-danger hapus">Hapus</a>
									<?php } else { ?>
										<a class="badge badge-warning">Belum</a>
									<?php } ?>
									</td>

									
								</tr>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr class="text-center">
									<th colspan="3">Total OPD: <?php echo count($totalopd) ?></th>
									<th>
										Total Sudah Import: <?php if(!empty($import)){ echo $import; } else { echo "0"; } ?> ||
										Total Belum Import: <?php echo $notimport ?>
									</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
