<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-sm-6 mb-1">
			<h1 class="h3 mb-0 text-gray-800">Ubah Setting RPJMD</h1>
		</div>
		<div class="col-sm-6 mb-1">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="<?= base_url('admin/rpjmd/setting-rpjmd')?>">Setting RPJMD</a>
				</li>
				<li class="breadcrumb-item active">Ubah Setting RPJMD</li>
			</ol>
		</div>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="card-title">Ubah Setting RPJMD</h3>
		</div>
		<!-- form start -->
        <?php 
			$no=1;
			foreach($setting_rpjmd as $sr): ?>
		<form action="<?= base_url('admin/rpjmd/simpan-ubah-setting/'); echo $sr->id_rpjmd; ?>" role="form" method="POST">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="kode">Kode</label>
							<input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan Kode" value="<?php echo $sr->kode; ?>" required>
						</div>
						<div class="form-group">
							<label for="tahun_mulai">Tahun Mulai</label>
							<input type="number" class="form-control" name="tahun_mulai" id="tahun_mulai" placeholder="Masukkan Tahun Mulai" value="<?php echo $sr->tahun_mulai; ?>">
						</div>
						<div class="form-group">
							<label for="tahun_selesai">Tahun Selesai</label>
							<input type="number" class="form-control" name="tahun_selesai" id="tahun_selesai" value="<?php echo $sr->tahun_selesai; ?>"
								placeholder="Masukkan Tahun Selesai">
						</div>
						<div class="form-group">
							<label for="visi">Visi</label>
							<textarea id="visi" name="visi" class="textarea" placeholder="Masukkan Visi"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $sr->visi; ?>
							</textarea>
						</div>
						<!-- <div class="form-group">
							<label>Status</label>
							<select class="form-control select2 select2-primary"
								data-dropdown-css-class="select2-primary" style="width: 100%;" name="status" id="status">
                                <option selected="selected" value="<?php echo $sr->id_status;?>"><?php echo $sr->status;?></option>
                                <option disabled>==================================================================</option>

								<option selected="selected" value="1">Aktif</option>
								<option value="0">Non Aktif</option>
							</select>
						</div> -->
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
        <?php endforeach; ?>
	</div>
