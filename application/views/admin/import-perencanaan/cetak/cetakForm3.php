<!DOCTYPE html>
<html>

<head>
	<title>Form 3</title>
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
	<h3 style="text-align:center; margin-bottom:40px;">FORM 3 : DAFTAR PROGRAM, KEGIATAN, DAN SUBKEGIATAN RKPD 2022</h3>

	<table id="form">
		<thead>
			<tr>
				<th>NO.</th>
				<th>URUSAN</th>
				<th>KINERJA URUSAN</th>
				<th>INDIKATOR KINERJA URUSAN</th>
				<th>PROGRAM</th>
				<th>INDIKATOR KINERJA PROGRAM</th>
				<th>TARGET/SATUAN</th>
				<th>KEGIATAN</th>
				<th>INDIKATOR KINERJA KEGIATAN</th>
				<th>TARGET/SATUAN</th>
				<th>SUB KEGIATAN</th>
				<th>INDIKATOR KINERJA SUBKEGIATAN</th>
				<th>TARGET/SATUAN</th>
				<th>PAGU SUBKEGIATAN</th>
				<th>KET.</th>
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
				<td>(8)</td>
				<td>(9)</td>
				<td>(10)</td>
				<td>(11)</td>
				<td>(12)</td>
				<td>(13)</td>
				<td>(14)</td>
				<td>(15)</td>
			</tr>
			<?php 
			$no = 1;
			$total = 0;
			foreach($bidang as $b) : 
				if($funct == true){
					$param	= "bidang.kode_urusan=$b->kode_urusan AND bidang.kode_bidang=$b->kode_bidang AND $where";
					$lg = $this->getForm3->getForm3($param);
				} else {
					$lg = $form;
				}
			?>
			<tr>
				<td rowspan="<?php echo count($lg)+1 ?>"><?php echo $no++ ?></td>
				<td rowspan="<?php echo count($lg)+1 ?>" style="vertical_align:baseline"><?php echo $b->bidang ?></td>
			</tr>
			<?php foreach($lg as $l) :?>
			<tr>
				<td>Belum tau data kinerja mana</td>
				<td>Belum tau indikator mana</td>
				<td><?php echo $l->kode_program.".".$l->program ?></td>
				<td><?php echo $l->tolok_ukur_capaian ?></td>
				<td><?php echo $l->target_capaian ?></td>
				<td><?php echo $l->kode_kegiatan.".".$l->kegiatan ?></td>
				<td>Belum tau indikator kegiatan mana</td>
				<td>Belum tau target mana</td>
				<td><?php echo $l->kode_sub_kegiatan.".".$l->sub_kegiatan ?></td>
				<td><?php echo $l->tolok_ukur_sub_keg ?></td>
				<td><?php echo $l->target_sub_keg ?></td>
				<td><?php echo $l->pagu_indikatif ?></td>
				<td>Belum tau isinya apa</td>
				
				
			</tr>
			<?php 
			$pagu = $l->pagu_indikatif;
			$total = $total + $pagu;
			endforeach;
			endforeach ?>
			
		</tbody>
		<tfoot>
			<tr>
				<th colspan="13">Jumlah</th>
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


