<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Data Sektoral BAPPEDA</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/startbootstrap2/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
		type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/startbootstrap2/')?>css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom styles for this page -->
    <link href="<?= base_url('assets/startbootstrap2/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url('assets/startbootstrap2/')?>plugins/select2/css/select2.min.css">
  	<link rel="stylesheet" href="<?= base_url('assets/startbootstrap2/')?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/startbootstrap2/')?>plugins/select2/css/select2-select-only.css">

	<!-- SweetAlert -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css'); ?>">

	<style>
		.table-detail-rkpd {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		.table-detail-rkpd td,
		.table-detail-rkpd th {
			padding: 8px;
		}

		.table-detail-rkpd th {
			text-align: center;
			text-align: center;
			vertical-align : middle;
		}
	</style>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"
				href="<?= base_url('admin/dashboard')?>">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Admin</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php if($page == 'dashboard'){echo 'active';}?>">
				<a class="nav-link" href="<?= base_url('admin/dashboard')?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<?php if($this->session->userdata('id_unit_organisasi') == 0) { ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Master
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if($page == 'master-opd' || $page == 'master-pengguna'){echo 'active';}?>">
                <a class="<?php if($page == 'master-opd' || $page == 'master-pengguna'){echo 'nav-link';} else {echo 'nav-link collapsed';}?>" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="<?php if($page == 'master-opd' || $page == 'master-pengguna'){echo 'true';} else {echo 'false';}?>" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master</span>
                </a>
                <div id="collapseOne" class="collapse <?php if($page == 'master-opd' || $page == 'master-pengguna'){echo 'show';}?>" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master:</h6>
                        <a class="collapse-item <?php if($page == 'master-opd'){echo 'active';}?>" href="<?= base_url('admin/master/master-opd')?>">OPD</a>
                        <a class="collapse-item <?php if($page == 'master-pengguna'){echo 'active';}?>" href="<?= base_url('admin/master/master-pengguna')?>">Pengguna</a>
                    </div>
                </div>
            </li>

			<?php } ?>

			<!-- Heading -->
			<div class="sidebar-heading">
                RPJMD
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if($page == 'setting-rpjmd' || $page == 'visi-misi' || $page == 'gambaran-umum' || $page == 'rumusan-masalah' || $page == 'isu-strategis' || $page == 'tujuan-sasaran'){echo 'active';}?>">
                <a class="<?php if($page == 'setting-rpjmd' || $page == 'visi-misi' || $page == 'gambaran-umum' || $page == 'rumusan-masalah' || $page == 'isu-strategis' || $page == 'tujuan-sasaran'){echo 'nav-link';} else {echo 'nav-link collapsed';}?>" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="<?php if($page == 'setting-rpjmd' || $page == 'visi-misi' || $page == 'gambaran-umum' || $page == 'rumusan-masalah' || $page == 'isu-strategis' || $page == 'tujuan-sasaran'){echo 'true';} else {echo 'false';}?>" aria-controls="collapseTwo">
                    <i class="fas fa-file-import"></i>
                    <span>RPJMD</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if($page == 'setting-rpjmd' || $page == 'visi-misi' || $page == 'gambaran-umum' || $page == 'rumusan-masalah' || $page == 'isu-strategis' || $page == 'tujuan-sasaran'){echo 'show';}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">RPJMD</h6>
                        <!-- <a class="collapse-item <?php /* if($page == 'rpjmd'){echo 'active';} ?>" href="<?= base_url('admin/rpjmd-renstra-renja/rpjmd')?>">RPJMD</a>
                        <a class="collapse-item <?php /* if($page == 'renstra'){echo 'active';} ?>" href="<?= base_url('admin/rpjmd-renstra-renja/renstra') */?>">RENSTRA</a> -->
                        <a class="collapse-item <?php if($page == 'setting-rpjmd'){echo 'active';}?>" href="<?= base_url('admin/rpjmd/setting-rpjmd')?>">Setting RPJMD</a>
                        <a class="collapse-item <?php if($page == 'visi-misi'){echo 'active';}?>" href="<?= base_url('admin/rpjmd/visi-misi')?>">Visi Misi</a>
						<a class="collapse-item <?php if($page == 'gambaran-umum'){echo 'active';}?>" href="<?= base_url('admin/rpjmd/gambaran-umum')?>">Gambaran Umum</a>
						<a class="collapse-item <?php if($page == 'rumusan-masalah'){echo 'active';}?>" href="<?= base_url('admin/rpjmd/rumusan-masalah')?>">Rumusan Masalah</a>
						<a class="collapse-item <?php if($page == 'isu-strategis'){echo 'active';}?>" href="<?= base_url('admin/rpjmd/isu-strategis')?>">Isu Strategis</a>
						<a class="collapse-item <?php if($page == 'tujuan-sasaran'){echo 'active';}?>" href="<?= base_url('admin/rpjmd/tujuan-sasaran')?>">Tujuan Sasaran</a>
                    </div>
                </div>
            </li>
			<!-- Heading -->
            <div class="sidebar-heading">
                RENJA & RKPD
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if($page == 'renja' || $page == 'data-rkpd-opd'){echo 'active';}?>">
                <a class="<?php if($page == 'renja' || $page == 'data-rkpd-opd'){echo 'nav-link';} else {echo 'nav-link collapsed';}?>" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="<?php if($page == 'renja' || $page == 'data-rkpd-opd'){echo 'true';} else {echo 'false';}?>" aria-controls="collapseThree">
                    <i class="fas fa-file-import"></i>
                    <span>Import Renja</span>
                </a>
                <div id="collapseThree" class="collapse <?php if($page == 'renja' || $page == 'data-rkpd-opd'){echo 'show';}?>" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Perencanaan:</h6>
                        <!-- <a class="collapse-item <?php /* if($page == 'rpjmd'){echo 'active';} ?>" href="<?= base_url('admin/rpjmd-renstra-renja/rpjmd')?>">RPJMD</a>
                        <a class="collapse-item <?php /* if($page == 'renstra'){echo 'active';} ?>" href="<?= base_url('admin/rpjmd-renstra-renja/renstra') */?>">RENSTRA</a> -->
                        <a class="collapse-item <?php if($page == 'renja'){echo 'active';}?>" href="<?= base_url('admin/import-perencanaan/renja')?>">RENJA</a>
                        <a class="collapse-item <?php if($page == 'data-rkpd-opd'){echo 'active';}?>" href="<?= base_url('admin/import-perencanaan/data-rkpd-opd')?>">Data RKPD OPD</a>
                    </div>
                </div>
            </li>

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
					<form
						class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Cari..."
								aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
								aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small"
											placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama') ?></span>
								<img class="img-profile rounded-circle"
									src="<?= base_url('assets/startbootstrap2/')?>img/undraw_profile.svg">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">
								<a class="dropdown-item <?php if($page == 'profile') { echo 'active';} ?>" href="<?= base_url('admin/profile')?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
