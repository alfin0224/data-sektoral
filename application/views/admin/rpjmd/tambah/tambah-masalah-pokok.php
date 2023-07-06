<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Tambah Masalah Pokok</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="<?= base_url('admin/rpjmd/setting-rpjmd')?>">Rumusan Masalah</a>
				</li>
				<li class="breadcrumb-item active">Tambah Masalah Pokok</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
		</div>
		<!-- form start -->
		<form action="<?= base_url('admin/rpjmd/rumusan-masalah/simpan-masalah-pokok/') ?>" role="form" method="POST">
			<div class="card-body">
				<div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <?php foreach($bidang as $bu): ?>
							<label for="misi">Bidang Urusan</label>
							<input type="text" id="bidang" name="bidang"  class="form-control" value="<?php echo $bu->kode_urusan.'.'.$bu->kode_bidang.' '.$bu->bidang; ?>" disabled>
						</div>
                        <?php endforeach; ?>
						<div class="form-group">
							<label for="misi">Masalah Pokok</label>
							<textarea id="masalah_pokok" name="masalah_pokok" class="textarea" placeholder="Masukkan Masalah Pokok" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
							</textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>
