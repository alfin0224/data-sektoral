</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Badan Perencanaan Pembangunan Daerah Provinsi Papua Barat 2021</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Yakin Logout?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Pilih Tombol Logout Jika Yakin.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('/AuthController/logout')?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Hapus Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-center" id="judulModal">Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        data-feather="x"><span>&times;</span></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="#" method="post">
                    <p class="text-center">
                        Apakah Anda Yakin ?
                    </p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                <input type="submit" class="btn btn-danger" name="submit" value="Yes">
            </div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/startbootstrap2/')?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/startbootstrap2/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/startbootstrap2/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/startbootstrap2/')?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/startbootstrap2/')?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<!-- <script src="<?= base_url('assets/startbootstrap2/')?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/startbootstrap2/')?>js/demo/chart-pie-demo.js"></script> -->

<!-- Page level plugins -->
<script src="<?= base_url('assets/startbootstrap2/')?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/startbootstrap2/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/startbootstrap2/')?>js/demo/datatables-demo.js"></script>

<!-- Select2 -->
<script src="<?= base_url('assets/startbootstrap2/')?>plugins/select2/js/select2.full.min.js"></script>

<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/startbootstrap2/')?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- Custom Javascript -->
<!-- <script src="<?= base_url('assets/startbootstrap2/')?>js/script.js"></script> -->

 <!-- SweetAlert -->
<script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert/dialogs.js'); ?>"></script>

<script>

        <?php
        if (!is_null($this->session->flashdata('message'))) {
          $message = $this->session->flashdata('message');
          echo 'swal({
            title:"Berhasil",
            text: "'.$message['text'].'",
            timer: 10000,
            showConfirmButton: true,
            type: "'.$message['type'].'"
          });';
        }
        ?>

        <?php
        if (!is_null($this->session->flashdata('message1'))) {
          $message1 = $this->session->flashdata('message1');
          echo 'swal({
            title:"Gagal",
            text: "'.$message1['text'].'",
            timer: 10000,
            showConfirmButton: true,
            type: "'.$message1['type'].'"
          });';
        }
        ?>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        <?php if($page == 'dashboard'){ ?>
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Sudah", "Belum"],
            datasets: [{
            data: [<?php if(!empty($import)){ echo $import; }?>, <?php if(!empty($notimport)){ echo $notimport; }?>],
            backgroundColor: ['#1cc88a', '#ff6c5e'],
            hoverBackgroundColor: ['#17a673', '#e74a3b'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: false
            },
            cutoutPercentage: 80,
        },
        });
        <?php } ?>
</script>


<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })

  $(document).ready(function () {
	  bsCustomFileInput.init();

    $('#program').change(function(){ 
      var id=$(this).val();
      $.ajax({
        url : "<?php echo site_url('admin/import-perencanaan/data-rkpd-opd/kegiatan');?>",
        method : "POST",
        data : {id: id},
        async : true,
        dataType : 'json',
        success: function(data){
          console.log(data);
          var html = '<option value disabled hidden selected>Semua Kegiatan</option>';
          var i;
          for(i=0; i<data.length; i++){
            html += '<option value='+data[i].kode_urusan+'.'+data[i].kode_bidang+'.'+data[i].kode_program+'.'+data[i].kode_kegiatan+'-'+data[i].id_unit_organisasi+'>'+data[i].kode_kegiatan+' '+data[i].kegiatan+'</option>';
          }
          $('#kegiatan').html(html);
        }
      });
      return false;
    }); 


    $('#kegiatan').change(function(){ 
      var id=$(this).val();
      $.ajax({
        url : "<?php echo site_url('admin/import-perencanaan/data-rkpd-opd/sub-kegiatan');?>",
        method : "POST",
        data : {id: id},
        async : true,
        dataType : 'json',
        success: function(data){
          console.log(data);
          var html = '<option value disabled hidden selected>Semua Sub Kegiatan</option>';
          var i;
          for(i=0; i<data.length; i++){
            html += '<option value='+data[i].kode_urusan+'.'+data[i].kode_bidang+'.'+data[i].kode_program+'.'+data[i].kode_kegiatan+'.'+data[i].kode_sub_kegiatan+'-'+data[i].id_unit_organisasi+'>'+data[i].kode_sub_kegiatan+' '+data[i].sub_kegiatan+'</option>';
          }
          $('#sub_kegiatan').html(html);
        }
      });
      return false;
    });



  });
</script>



</body>

</html>
