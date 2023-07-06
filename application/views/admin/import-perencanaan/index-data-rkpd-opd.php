<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Data RKPD OPD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item active">Data RKPD OPD</li>
			</ol>
		</div>
	</div>

	<!-- Content Row -->
	<form action="<?= base_url('admin/import-perencanaan/data-rkpd-opd/detail')?>" method="POST">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="form-group">
					<label for="nama_opd">Daftar OPD</label>
					<select class="form-control select2 select2-primary"
						data-dropdown-css-class="select2-primary" name="id_unit_organisasi" id="id_unit_organisasi" style="width: 100%;" required>
						<option value disabled hidden selected>Pilih OPD</option>
						<?php foreach($opd as $opd) : ?>
						<option value="<?php echo $opd->id ?>"><?php echo $opd->unit_organisasi." ".$opd->nama_opd ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<button type="submit" class="btn btn-success submit">Submit</button>
			</div>
		</div>
	</form>

</div>
<!-- /.container-fluid -->
