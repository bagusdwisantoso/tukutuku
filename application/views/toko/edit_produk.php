<div class="container-fluid">    

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class = "row align-items-center">
            <div class="col-auto">
                <a href="<?php echo base_url('toko/data_produk/')?>"><i class="fas fa-arrow-left" style="color:black"></i></a>
            </div>
            <div class="col">
                <h6 class="m-0 font-weight-bold" style="color: #D21322">Daftar Produk</h6>
            </div>
          </div>
        </div>
        <div class="card-body">
            <h3 class="card-title text-center"><b><font style="color: #D21322">Edit</font></b> Produk</h3>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <?php foreach($produk as $prdk) : ?>
            <div class="row justify-content-around">
                <div class="col-3">
                    <form method="post" action="<?php echo base_url().'toko/data_produk/update_gambar/' ?>" enctype="multipart/form-data">
                        <label type="hidden" for="basic-url" class="form-label"><b>Foto Produk</b></label>
                        <div class="card bg-dark text-white">
                            <img src="<?php echo base_url().'img/gambar_produk/'.$prdk->gambar_produk ?>" alt="" class="card-img-top" />
                            <div type="button" class="card-footer bg-transparent border-success text-center" data-toggle="modal" data-target="#edit_foto">
                                Edit Foto Produk <i class="fas fa-pencil-alt"></i>
                            </div>
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
                                            <p class="fw-bold"><font color="black">Pilih file foto produk yang akan diganti</font></p>
                                            <input type="hidden" name="id_produk" class="form-control" value="<?php echo $prdk->id_produk?>">
                                            <input type="file" name="gambar_produk" class="form-control">
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
                <div class="col-7">
                    <form method="post" action="<?php echo base_url().'toko/data_produk/update' ?>">
                        <label for="basic-url" class="form-label"><b>Nama Produk:</b></label>
                        <div class="input-group">
                            <input type="hidden" name="id_produk" class="form-control" value="<?php echo $prdk->id_produk?>">
                            <input type="text" name="nama_produk" class="form-control" value="<?php echo $prdk->nama_produk?>">
                        </div><br>

                        <!-- <label for="basic-url" class="form-label"><b>Harga (Rp):</b></label>
                        <div class="input-group">
                            <input type="text" name="harga_produk" class="form-control" value="<?php echo $prdk->harga_produk?>">
                        </div><br> -->

                        <div class="form-group">
                        <label><b>Harga</b></label>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Rp.</span>
                            </div>
                            <input type="number" name="harga_produk" class="form-control" value="<?php echo $prdk->harga_produk?>" aria-label="stok" aria-describedby="addon-wrapping" required>
                            </div>
                        </div>

                        <!-- <label for="basic-url" class="form-label"><b>Berat (gr):</b></label>
                        <div class="input-group">
                            <input type="text" name="berat_produk" class="form-control" value="<?php echo $prdk->berat_produk?>">
                        </div><br> -->

                        <div class="form-group">
                            <label><b>Berat</b></label>
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Gr</span>
                                </div>
                                <input type="number" name="berat_produk" class="form-control" value="<?php echo $prdk->berat_produk?>" aria-label="stok" aria-describedby="addon-wrapping" required>
                            </div>
                        </div>
                        

                        <label for="basic-url" class="form-label"><b>Stok:</b></label>
                        <div class="input-group">
                            <input type="number" name="stok_produk" class="form-control" value="<?php echo $prdk->stok_produk?>">
                        </div><br>

                        <label for="basic-url" class="form-label"><b>Kategori:</b></label>
                        <div class="input-group">
                            <select class="form-control" name="kategori_produk" id="kategori_produk">
                                <option value='<?php echo $prdk->kategori_produk?>'>- Pilih -</option>
                                <?php foreach($kategori as $ktgr){ ?>
                                <option value="<?php echo $ktgr['id_kategori']; ?>"><?php echo $ktgr['nama_kategori']; ?> </option>
                                <?php } ?>
                            </select>
                        </div><br>

                        <label for="basic-url" class="form-label"><b>Deskripsi:</b></label>
                        <div class="input-group">
                            <textarea type="text" name="deskripsi_produk" class="form-control" id="deskripsi" style="height: 120px;"><?php echo $prdk->deskripsi_produk?></textarea>
                        </div><br>

                        <div class="col-3">
                            <label for="basic-url" class="form-label"><b>Publish Produk:</b></label>
                            <div class="form-check">
                                <?php if ($prdk->publish_produk == "Y"){ echo'
                                    <input class="form-check-input" type="radio" name="publish_produk" value="Y" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        YA
                                    </label></div><div class="form-check">
                                    <input class="form-check-input" type="radio" name="publish_produk" value="N">
                                    <label class="form-check-label" for="gridRadios2">
                                        TIDAK
                                    </label>
                                    </div>';}
                                    else{ echo'
                                        <input class="form-check-input" type="radio" name="publish_produk" value="Y"><label class="form-check-label" for="gridRadios1">
                                            YA
                                        </label></div><div class="form-check">
                                        <input class="form-check-input" type="radio" name="publish_produk" value="N" checked>
                                        <label class="form-check-label" for="gridRadios2">
                                            TIDAK
                                        </label>
                                        </div>';}?>
                            </div>
                        </div>
                        

                </div>
            </div>
            
                    <button type="submit" class="btn btn-info btn-block" >Update Data</button><br>
                    <button href="<?php echo base_url('admin/data_produk/')?>" class="btn btn-outline-danger btn-block" >Batalkan</button><br>
            
                    </form>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</div>