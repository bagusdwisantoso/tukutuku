<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Brand</h1>
    <p class="mb-4">Menampilkan brand yang telah diinput oleh Admin</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class = "row align-items-center">
            <div class="col-10">
              <h6 class="m-0 font-weight-bold text-primary">Brand Website</h6>
            </div>
            <div class="col">
              <button class="pull-right btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_brand"><i class="fas fa-plus fas-sm"></i>
                Tambah Brand
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Brand</th>
                  <th width="100">Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php $no=1;
                  foreach($brand as $brd) : ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $brd['nama_brand'] ?></td>
                      <td> 
                        <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#view<?php echo $brd['id_brand'] ?>'>
                          <i class='fas fa-eye'></i>
                        </button>
                        <button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#delete<?php echo $brd['id_brand']?>'>
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>

                      <div class='modal fade' id='view<?php echo $brd['id_brand'] ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered' role='document'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='exampleModalLongTitle'>View <b>#<?php echo $brd['nama_brand'] ?> </b></h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            <div class='modal-body'>
                              <img src='<?php echo base_url('img/brand/').$brd['nama_brand'] ?>' class='img-thumbnail'>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                  </tr>
                  <!-- Modal Delete brand -->
                  <div class='modal fade' id='delete<?php echo $brd['id_brand'] ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id='exampleModalLongTitle'>Hapus brand <b>#<?php echo $brd['nama_brand'] ?> </b></h5>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <div class='modal-body'>
                          Apakah Anda yakin akan Menghapus brand <b>#<?php echo $brd['nama_brand'] ?> </b>?
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                          <a class='btn btn-danger' href='<?php echo base_url('admin/brand/hapus/').$brd['id_brand'] ?>'>Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
</div>



<!-- Modal - Tambah brand-->
<div class="modal fade" id="tambah_brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/brand/tambah_aksi';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Gambar Produk</label>
                <input type="file" name="nama_brand" class="form-control" required>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
	      </form>
      </div>
    </div>
  </div>
</div>