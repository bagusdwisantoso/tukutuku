<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h1 class="h3 mb-2 text-gray-800">Tambah Toko</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard_admin/')?>">Home</a></li>
              <li class="breadcrumb-item active">Tambah Toko</li>
            </ol>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body"><br>
            <h4 class="card-title text-center"><b><font color="red">Tambah</font></b> Toko Baru</h4>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <form action="<?php echo base_url(). 'admin/tambah_toko/tambah_toko';?>" method="post" enctype="multipart/form-data">
                <h5 class="text-center"><b>Informasi Toko</b></h5><br>
                <div class="row align-left">
                    <div class="col-6">
                        <label for="basic-url" class="form-label"><b>Nama Toko:</b></label>
                        <div class="input-group">
                            <input type="text" name="nama_toko" class="form-control" placeholder="Masukkan nama toko" aria-label="Masukkan nama toko" aria-describedby="basic-addon1" required>
                        </div><br>
                        <label for="basic-url" class="form-label"><b>Foto Toko:</b></label>
                        <div class="input-group">
                            <input type="file" name="foto_toko" class="form-control" required>
                        </div><br>
                        <!-- <label for="basic-url" class="form-label"><b>Deskripsi Toko:</b></label>
                        <div class="input-group">
                            <textarea type="text" name="deskripsi_toko" class="form-control" placeholder="Masukkan deskripsi toko" aria-label="Masukkan deskripsi toko" aria-describedby="basic-addon1" style="height: 100px;" required></textarea>
                        </div> -->
                        <div class="form-group">
                            <label for="basic-url" class="form-label"><b>Deskripsi Toko:</b></label>
                            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi_toko" required></textarea>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="basic-url" class="form-label"><b>Pilih Provinsi:</b></label>
                        <select class="form-control" name="provinsi_id" id="provinsi_id" required>
                            <option value=''>- Pilih -</option>
                            <?php foreach($provinsi as $prov){ ?>
                                <option value="<?php echo $prov['provinsi_id']; ?>"><?php echo $prov['nama_provinsi']; ?> </option>
                            <?php } ?>
                        </select><br>
                        <label for="basic-url" class="form-label"><b>Pilih Kota:</b></label>
                        <select class="form-control" name="kota_id" id="kota_id" required>
                            <option value=''>- Pilih -</option>
                            <!-- <?php foreach($kota as $kt){ ?>
                                <option value="<?php echo $kt['kota_id']; ?>"><?php echo $kt['nama_kota']; ?> </option>
                            <?php } ?> -->
                        </select><br>
                        <!-- <label for="basic-url" class="form-label"><b>Detail Alamat:</b></label>
                        <div class="input-group">
                            <textarea type="text" name="alamat_toko" class="form-control" placeholder="Masukkan detail alamat toko" aria-label="Masukkan detail alamat toko" aria-describedby="basic-addon1" style="height: 100px;"></textarea>
                        </div><br> -->
                        <div class="form-group">
                            <label for="basic-url" class="form-label"><b>Detail Alamat:</b></label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat_toko" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                
                <div class="row align-left">
                    <div class="col-6">
                        <h5 class="text-center"><b>Informasi Pemilik</b></h5><br>
                        <label for="basic-url" class="form-label"><b>Nama Pemilik:</b></label>
                        <div class="input-group">
                            <input type="text" name="nama_owner" class="form-control" placeholder="Masukkan nama pemilik" aria-label="Masukkan nama pemilik" aria-describedby="basic-addon1">
                        </div><br>
                        <label for="basic-url" class="form-label"><b>Nomor Telepon Pemilik:</b></label>
                        <div class="input-group">
                            <input type="text" name="no_telp_owner" class="form-control" placeholder="Masukkan nomor telepon" aria-label="Masukkan nomor telepon" aria-describedby="basic-addon1">
                        </div><br>
                        <label for="basic-url" class="form-label"><b>Jenis Kelamin:</b></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Laki-laki
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                                <label class="form-check-label" for="gridRadios2">
                                    Perempuan
                                </label>
                        </div><br>
                    </div>

                    <div class="col-6">
                        <h5 class="text-center"><b>Informasi Rekening</b></h5><br>
                        <label for="basic-url" class="form-label"><b>Atas Nama Rekening:</b></label>
                        <div class="input-group">
                            <input type="text" name="nama_rekening" class="form-control" placeholder="Masukkan nama rekening" aria-label="Masukkan nama rekening" aria-describedby="basic-addon1">
                        </div><br>
                        <label for="basic-url" class="form-label"><b>Nomor Rekening:</b></label>
                        <div class="input-group">
                            <input type="text" name="no_rekening" class="form-control" placeholder="Masukkan nomor rekening" aria-label="Masukkan nomor rekening" aria-describedby="basic-addon1">
                        </div><br>
                        <label for="basic-url" class="form-label"><b>Bank Rekening:</b></label>
                        <div class="input-group">
                            <input type="text" name="nama_bank" class="form-control" placeholder="Masukkan nama bank rekening" aria-label="Masukkan nama bank rekening" aria-describedby="basic-addon1">
                        </div><br>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                
                <div class="row justify-content-center">
                    <div class="col-6">
                        <h5 class="text-center"><b>Pembuatan Akun</b></h5><br>
                        <label for="basic-url" class="form-label"><b>Email:</b></label>
                        <div class="input-group">
                            <input type="text" name="email" class="form-control" placeholder="Masukkan email" aria-label="Masukkan email" aria-describedby="basic-addon1">
                        </div><br>
                        <label for="basic-url" class="form-label"><b>Password:</b></label>
                        <div class="input-group">
                            <input type="text" name="password" class="form-control" placeholder="Masukkan password" aria-label="Masukkan password" aria-describedby="basic-addon1">
                        </div><br><br>
                    </div>
                </div>

                <button type="submit" class="btn btn-danger btn-block" >Daftarkan</button><br>
            
            </form>
        </div>
    </div>    
    <script>
        CKEDITOR.replace('deskripsi');
        CKEDITOR.replace('alamat');
    </script>
    <script type="text/javascript">
		$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)

			
			$("#provinsi").change(function(){ // Ketika user mengganti atau memilih data provinsi

			
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: "<?php echo base_url("registrasi/listKota"); ?>", // Isi dengan url/path file php yang dituju
					data: {provinsi_id : $("#provinsi").val()}, // data yang akan dikirim ke file yang dituju
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
					$("#kota").html(response.list_kota).show();
					},
					error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
					}
				});
			});
		});
	</script>
</div> <!--end of container-->