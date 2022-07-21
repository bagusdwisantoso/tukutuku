<div class="container-fluid">
    <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
    <p class="mb-4">Menampilkan Data Produk dari semua Toko di Tukutuku</a>.</p>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class = "row align-items-center">
        <div class="col-10">
          <h6 class="m-0 font-weight-bold text-primary">Total Produk: <?php echo $total_produk ?></h6>
        </div>
        <div class="col">
          <button class="pull-right btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_produk"><i class="fas fa-plus fas-sm"></i>
            Tambah Produk
          </button>
        </div>
      </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#MenungguVerifikasi" role="tab" aria-controls="#MenungguVerifikasi" aria-selected="true">Menunggu Verifikasi ( <?php echo $jumlah ?> )</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#BelumPublish" role="tab" aria-controls="#BelumPublish" aria-selected="false">Belum Publish ( <?php echo $jumlah2 ?> )</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#SedangPublish" role="tab" aria-controls="#SedangPublish" aria-selected="false">Sedang Publish ( <?php echo $jumlah3 ?> )</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="MenungguVerifikasi" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Nama Produk</th>
                                          <th width="70">Harga</th>
                                          <th>Stok</th>
                                          <th>Kategori</th>
                                          <th>Verifikasi</th>
                                          <th>Publish</th>
                                          <th width="100">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1; 
                                      foreach ($produk as $prdk): ?>
                                      <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $prdk['nama_produk'] ?></td>
                                        <td>Rp. <?php echo number_format($prdk['harga_produk'], 0,',','.') ?></td>
                                        <td><?php echo $prdk['stok_produk'] ?></td>
                                        <td><?php echo $prdk['nama_kategori'] ?></td>
                                        <td><?php echo $prdk['verifikasi_produk'] ?></td>
                                        <td><?php echo $prdk['publish_produk'] ?></td>
                                        <td>
                                          <a class='btn btn-success btn-sm' href='<?php echo base_url('toko/data_produk/detail/') .$prdk['id_produk']?>'><span class='fas fa-info-circle'></span></a>
                                        </td>
                                      </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="BelumPublish" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card shadow mb-4"> 
                        <div class="card-body">
                            <div class="table2">
                                <table class="table table-bordered" id="table2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th width="100">Nama Produk</th>
                                          <th width="100">Harga</th>
                                          <th>Stok</th>
                                          <th>Kategori</th>
                                          <th>Verifikasi</th>
                                          <th>Publish</th>
                                          <th width="100">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      $no = 1; 
                                      foreach ($produk2 as $prdk2): ?>
                                      <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $prdk2['nama_produk'] ?></td>
                                        <td>Rp. <?php echo number_format($prdk2['harga_produk'], 0,',','.') ?></td>
                                        <td><?php echo $prdk2['stok_produk'] ?></td>
                                        <td><?php echo $prdk2['nama_kategori'] ?></td>
                                        <td><?php echo $prdk2['verifikasi_produk'] ?></td>
                                        <td><?php echo $prdk2['publish_produk'] ?></td>
                                        <td>
                                          <a class='btn btn-success btn-sm' href='<?php echo base_url('toko/data_produk/detail/') .$prdk2['id_produk']?>'><span class='fas fa-info-circle'></span></a>
                                          <a class='btn btn-primary btn-sm' href='<?php echo base_url('toko/data_produk/edit/') .$prdk2['id_produk']?>'><span class='fas fa-edit'></span></a>
                                        </td>
                                      </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="SedangPublish" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table3">
                                <table class="table table-bordered" id="table3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th width="100">Nama Produk</th>
                                          <th width="70">Harga</th>
                                          <th>Stok</th>
                                          <th>Kategori</th>
                                          <th>Verifikasi</th>
                                          <th>Publish</th>
                                          <th width="100">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1; 
                                      foreach ($produk3 as $prdk3): ?>
                                      <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $prdk3['nama_produk'] ?></td>
                                        <td>Rp. <?php echo number_format($prdk3['harga_produk'], 0,',','.') ?></td>
                                        <td><?php echo $prdk3['stok_produk'] ?></td>
                                        <td><?php echo $prdk3['nama_kategori'] ?></td>
                                        <td><?php echo $prdk3['verifikasi_produk'] ?></td>
                                        <td><?php echo $prdk3['publish_produk'] ?></td>
                                        <td>
                                          <a class='btn btn-success btn-sm' href='<?php echo base_url('toko/data_produk/detail/') .$prdk3['id_produk']?>'><span class='fas fa-info-circle'></span></a>
                                          <a class='btn btn-primary btn-sm' href='<?php echo base_url('toko/data_produk/edit/') .$prdk3['id_produk']?>'><span class='fas fa-edit'></span></a>
                                        </td>
                                      </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- DataTales Example -->
  
<div class="modal fade" id="tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'toko/data_produk/tambah_aksi';?>" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
          </div>
          
          <!-- <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga_produk" class="form-control" required>
          </div> -->

          <div class="form-group">
            <label>Harga</label>
            <div class="input-group flex-nowrap">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Rp.</span>
              </div>
              <input type="number" name="harga_produk" class="form-control" aria-label="stok" aria-describedby="addon-wrapping" required>
            </div>
          </div>

          <!-- <div class="form-group">
            <label>Berat</label>
            <input type="text" name="berat_produk" class="form-control" required>
          </div> -->

          <div class="form-group">
            <label>Berat</label>
            <div class="input-group flex-nowrap"> 
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Gr</span>
              </div>
              <input type="number" min="1" max="30000" name="berat_produk" class="form-control" aria-label="stok" aria-describedby="addon-wrapping" required>
            </div>
          </div>

          <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok_produk" class="form-control" required>
          </div>

          <div class="form-group">
		        <label for="c_message">Kategori<span class="required">*</span></label>
            <select class="form-control" name="kategori_produk" id="kategori_produk">
                <option value=''>- Pilih -</option>
                <?php foreach($kategori as $ktgr){ ?>
                <option value="<?php echo $ktgr['id_kategori']; ?>"><?php echo $ktgr['nama_kategori']; ?> </option>
                <?php } ?>
            </select>

          <!-- <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi_produk" class="form-control">
          </div> -->

          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi_produk"></textarea>
          </div>

          <div class="form-group">
            <label>Gambar Produk</label>
            <input type="file" name="gambar_produk" class="form-control" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
	    </form>
    </div>
  </div>
  <script>
    CKEDITOR.replace('deskripsi');
  </script>
</div>
