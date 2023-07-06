<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard')?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- alert -->

                <div class="card-header">
                    <a class="btn btn-warning" href="<?= base_url('admin/profile/ubah-profile')?>" role="button" title="Ubah Profil Saya">
                        <i class="fas fa-edit"> Ubah Profile</i>
                    </a>
                </div>

                <div class="card-body">
                    <?php foreach($user as $u) : ?>

                    <div class="row p-3">
                        <div class="col-md-2">
                            <label for="foto">Foto:</label><br>
                            <img src="<?= base_url('assets/startbootstrap2/')?>img/undraw_profile.svg"
                                class="img-circle elevation-2 mb-2" width="150px" height="150px" alt="User Image">
                        </div>

                        <div class="col-md-10">
							<label for="nama">Nama:</label>
                            <b><?php echo $u->nama ?></b>

							<br>

                            <label for="nip">NIP:</label>
                            <b><?php echo $u->nip ?></b>

							<br>

							<label for="alamat">Alamat:</label>
                            <b><?php echo $u->alamat ?></b>

							<br>

							<label for="no_telepon">No Telepon:</label>
                            <b><?php echo $u->no_telp ?></b>

							<br>
                            <?php if($this->session->userdata('id_unit_organisasi') != 0) { ?>
							<label for="admin_opd">Unit Organisasi / OPD:</label>
                            <b><?php echo $u->unit_organisasi." ".$u->nama_opd ?></b>

                            <br>
                            <?php } ?>

                            <label for="no_telepon">Username:</label>
                            <b><?php echo $u->username ?></b>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>
