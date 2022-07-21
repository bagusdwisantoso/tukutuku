<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Banner</h1>
    <p class="mb-4">Menampilkan banner yang telah diinput oleh Admin</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class = "row align-items-center">
            <div class="col-10">
              <h6 class="m-0 font-weight-bold text-primary">Banner Website</h6>
            </div>
            <div class="col">
              <button class="pull-right btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_banner"><i class="fas fa-plus fas-sm"></i>
                Tambah Banner
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
                  <th>Banner</th>
                  <th width="100">Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php $no=1;
                  foreach($banner as $bnr) : ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $bnr['nama_banner'] ?></td>
                      <td> 
                        <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#view<?php echo $bnr['id_banner'] ?>'>
                          <i class='fas fa-eye'></i>
                        </button>
                        <button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#delete<?php echo $bnr['id_banner']?>'>
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>

                      <div class='modal fade' id='view<?php echo $bnr['id_banner'] ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered' role='document'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='exampleModalLongTitle'>View <b>#<?php echo $bnr['nama_banner'] ?> </b></h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            <div class='modal-body'>
                              <img src='<?php echo base_url('img/banner/').$bnr['nama_banner'] ?>' class='img-thumbnail'>
                            </div>
                          </div>
                        </div>
                      </div>

                  </tr>
                  <!-- Modal Delete banner -->
                  <div class='modal fade' id='delete<?php echo $bnr['id_banner'] ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id='exampleModalLongTitle'>Hapus banner <b>#<?php echo $bnr['nama_banner'] ?> </b></h5>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <div class='modal-body'>
                          Apakah Anda yakin akan Menghapus banner <b>#<?php echo $bnr['nama_banner'] ?> </b>?
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                          <a class='btn btn-danger' href='<?php echo base_url('admin/banner/hapus/').$bnr['id_banner'] ?>'>Hapus</a>
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



<!-- Modal - Tambah banner-->
<div class="modal fade" id="tambah_banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/banner/tambah_aksi';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Gambar Produk</label>
                <input type="file" name="nama_banner" class="form-control" required>
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