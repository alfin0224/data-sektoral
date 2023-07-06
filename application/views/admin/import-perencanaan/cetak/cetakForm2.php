<!DOCTYPE html>
<html>

<head>
	<title>Form 2</title>
	<style>
		#form {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 40px;
		}

		#form td,
		#form th {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: center;
		}

		#form th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			font-weight: normal;
		}

		#form tfoot th {
			font-weight: bold;
		}

		.kanan-1 {
			text-align: center;
			float: right;
			line-height: 1.6;
			width: 255px;
			padding-left: 0px;
			margin-left: 0px;
			margin-right: 108px;
			font-size: 12px;
		}

		.kanan-2 {
			text-align: center;
			float: right;
			line-height: 1.6;
			width: 250px;
			padding-left: 0px;
			margin-left: 0px;
			margin-right: 108px;
			font-size: 12px;
		}

	</style>
</head>

<body>
	<h3 style="text-align:center; margin-bottom:40px;">FORM 2 : REKAPITULASI JUMLAH PROGRAM, KEGIATAN, DAN SUBKEGIATAN
	</h3>

	<table id="form">
		<thead>
			<tr>
				<th>NO.</th>
				<th>URUSAN</th>
				<th>JUMLAH PROGRAM</th>
				<th>JUMLAH KEGIATAN</th>
				<th>JUMLAH SUBKEGIATAN</th>
				<th>JUMLAH PAGU</th>
				<th>PERANGKAT DAERAH PENANGGUNG JAWAB</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>(1)</td>
				<td>(2)</td>
				<td>(3)</td>
				<td>(4)</td>
				<td>(5)</td>
				<td>(6)</td>
				<td>(7)</td>
			</tr>
			<?php $no=1;
			$total = 0;
			foreach($form2 as $f2) :?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $f2->bidang ?></td>
				<td><?php echo $f2->jumlah_program ?></td>
				<td><?php echo $f2->jumlah_kegiatan ?></td>
				<td><?php echo $f2->jumlah_sub_kegiatan ?></td>
				<td><?php echo $f2->jumlah_pagu ?></td>
				<?php foreach($opd as $o) :?>
				<td><?php echo $o->nama_opd ?></td>
				<?php endforeach ?>
			</tr>
			<?php 
			$pagu = $f2->jumlah_pagu;
			$total = $total + $pagu;
			endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="5">Jumlah</th>
				<th><?php echo $total ?></th>
				<th></th>
			</tr>
		</tfoot>
	</table>

	<div class="kanan-1">Manokwari, 06 Juli 2021</div>
	<div style="clear:both;">
	<?php foreach($opd as $o) :?>
	<div class="kanan-1">Kepala <?php echo $o->nama_opd ?> Provinsi Papua Barat</div>

	<div style="clear:both;"></div><br><br><br>

	<div class="kanan-2"><b><?php echo $o->kepala_dinas ?></b></div>
	<div style="clear:both;">
	<div class="kanan-2"><b><?php echo $o->pangkat ?></b></div>
	<div style="clear:both;">
	<div class="kanan-2"><b>NIP. <?php echo $o->nip ?></b></div>
	<?php endforeach ?>
	<div style="clear:both;"></div>
</body>

</html>
