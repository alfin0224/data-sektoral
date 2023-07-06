<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Tambah Misi</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="<?= base_url('admin/rpjmd/setting-rpjmd')?>">Visi Misi</a>
				</li>
				<li class="breadcrumb-item active">Tambah Misi</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="card-title">Tambah Misi</h3>
		</div>
		<!-- form start -->
		<form action="<?= base_url('admin/rpjmd/visi-misi/simpan-misi') ?>" role="form" method="POST">
			<div class="card-body">
				<div class="row">
                    <div class="col-md-6">
						<div class="form-group">
							<label for="misi">Misi</label>
							<textarea id="misi" name="misi" class="textarea" placeholder="Masukkan Visi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
							</textarea>
						</div>
						<div class="form-group">
							<label>Bidang Urusan</label>
                            <?php 
							$no=1;
							foreach($bidang_urusan as $bu): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo $bu->id; ?>" id="bidang" name="bidang[]">
                                <label class="form-check-label" for="defaultCheck1">
                                    <?php echo $bu->bidang; ?>
                                </label>
                            </div>
                            <?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>
