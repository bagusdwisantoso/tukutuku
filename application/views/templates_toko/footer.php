<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script> -->

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.js"></script> -->

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

    <script>
    $(document).ready( function () {
    $('#table1').DataTable();
    } );
    </script>

	<script>
    $(document).ready( function () {
    $('#table2').DataTable();
    } );
    </script>

	<script>
    $(document).ready( function () {
    $('#table3').DataTable();
    } );
    </script>

	<script>
    $(document).ready( function () {
    $('#table4').DataTable();
    } );
    </script>

	<script>
    $(document).ready( function () {
    $('#table5').DataTable();
    } );
    </script>

<script type="text/javascript">
		$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)

			
			$("#provinsi_id").change(function(){ // Ketika user mengganti atau memilih data provinsi

			
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: "<?php echo base_url("admin/toko/listKota"); ?>", // Isi dengan url/path file php yang dituju
					data: {provinsi_id : $("#provinsi_id").val()}, // data yang akan dikirim ke file yang dituju
					dataType: "json",
					beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
					},
					success: function(response){ // Ketika proses pengiriman berhasil
					$("#loading").hide(); // Sembunyikan loadingnya
					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#kota_id").html(response.list_kota).show();
					},
					error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
					}
				});
			});
		});
	</script>
</body>

</html>