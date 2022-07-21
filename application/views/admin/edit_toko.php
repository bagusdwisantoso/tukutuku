<div class="container-fluid">    

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class = "row align-items-center">
            <div class="col-auto">
                <a href="<?php echo base_url('admin/toko/')?>"><i class="fas fa-arrow-left" style="color:black"></i></a>
            </div>
            <div class="col">
                <h6 class="m-0 font-weight-bold" style="color: #D21322">Daftar Toko</h6>
            </div>
          </div>
        </div>
        <div class="card-body"><br>
            <?php foreach($toko as $tk): ?>
            <h4 class="card-title text-center">Edit Toko <b><font color="red"><?php echo $tk->nama_toko?></font></b></h4>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            
                <div class="row justify-content-around">
                    <div class="col-4">
                        <form method="post" action="<?php echo base_url().'admin/toko/update_gambar/' ?>" enctype="multipart/form-data">
                            <label type="hidden" for="basic-url" class="form-label"><b>Foto Toko</b></label>
                            <div class="card bg-dark text-white">
                                <img src="<?php echo base_url().'img/foto_toko/'.$tk->foto_toko ?>" alt="" class="card-img-top" />
                                <div type="button" class="card-footer bg-transparent border-success text-center" data-toggle="modal" data-target="#edit_foto">
                                    Edit Foto Toko <i class="fas fa-pencil-alt"></i>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="edit_foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><font color="red">File Picker</font></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fw-bold"><font color="black">Pilih file foto toko yang akan diganti</font></p>
                                                <input type="hidden" name="id_toko" class="form-control" value="<?php echo $tk->id_toko?>">
                                                <input type="file" name="foto_toko" class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            
                    <div class="col-6">
            <form method="post" action="<?php echo base_url().'admin/toko/update/' ?>">
                        <label for="basic-url" class="form-label"><b>Deskripsi Toko:</b></label>
                        <div class="input-group">
                            <input type="hidden" name="id_toko" class="form-control" value="<?php echo $tk->id_toko?>">
                            <textarea type="text" name="deskripsi_toko" id="deskripsi" class="form-control" style="height: 100px;"><?php echo $tk->deskripsi_toko?></textarea>
                        </div><br>
                        <!--
                        <label for="basic-url" class="form-label"><b>Pilih Provinsi:</b></label>
                        <select class="form-control" name="provinsi_id" id="provinsi_id">
                            <?php foreach($provinsi as $prov){ ?>
                            <option value=''>- Pilih -</option>
                                <option value="<?php echo $prov['provinsi_id']; ?>"><?php echo $prov['nama_provinsi']; ?></option>
                            <?php } ?>
                        </select><br>

                        <label for="basic-url" class="form-label"><b>Pilih Kota:</b></label>
                        <select class="form-control" name="kota_id" id="kota_id">
                            <option value='<?php echo $tk->kota_id?>'>- Pilih -</option>
                            <?php foreach($kota as $kt){ ?>
                                <option value="<?php echo $kt['kota_id']; ?>"><?php echo $kt['nama_kota']; ?> </option>
                            <?php } ?>
                        </select><br> -->

                        <label for="basic-url" class="form-label"><b>Detail Alamat:</b></label>
                        <div class="input-group">
                            <textarea type="text" name="alamat_toko" id="alamat" class="form-control" style="height: 100px;"><?php echo $tk->alamat_toko?></textarea>
                        </div><br>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                
                <div class="row justify-content-center">
                    <div class="col-6">
                        <h5 class="text-center"><b>Informasi Rekening</b></h5><br>
                        <label for="basic-url" class="form-label"><b>Atas Nama Rekening:</b></label>
                        <div class="input-group">
                            <input type="text" name="nama_rekening" class="form-control" value="<?php echo $tk->nama_rekening?>">
                        </div><br>
                        <label for="basic-url" class="form-label"><b>Nomor Rekening:</b></label>
                        <div class="input-group">
                            <input type="text" name="no_rekening" class="form-control" value="<?php echo $tk->no_rekening?>">
                        </div><br>
                        <label for="basic-url" class="form-label"><b>Bank Rekening:</b></label>
                        <div class="input-group">
                            <input type="text" name="nama_bank" class="form-control" value="<?php echo $tk->nama_bank?>">
                        </div><br>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                
                <div class="row justify-content-center">
                    <div class="col-6">
                        <h5 class="text-center"><b>Informasi Kontak dan Akun</b></h5><br>
                        <label for="basic-url" class="form-label"><b>Nama Pemilik:</b></label>
                        <div class="input-group">
                            <input type="text" name="nama_owner" class="form-control" value="<?php echo $tk->nama_owner?>">
                        </div><br>
                        <label for="basic-url" class="form-label"><b>Nomor Telepon Pemilik:</b></label>
                        <div class="input-group">
                            <input type="text" name="no_telp_owner" class="form-control" value="<?php echo $tk->no_telp_owner?>">
                        </div><br>

                        <label for="basic-url" class="form-label"><b>Email:</b></label>
                        <div>
                            <input type="text" name="email" class="form-control" value="<?php echo $tk->email?>">
                        </div><br>

                        <label for="basic-url" class="form-label"><b>Password:</b></label>
                        <div class="input-group">
                            <input type="text" name="password" class="form-control" value="<?php echo $tk->password?>">
                        </div><br><br>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-info btn-block" >Update Data</button><br>
                <button href="<?php echo base_url('admin/toko/')?>" class="btn btn-outline-danger btn-block" >Batalkan</button><br>
            
            </form>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        CKEDITOR.replace('deskripsi');
        CKEDITOR.replace('alamat');
    </script>
</div>