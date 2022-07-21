<div class="container-fluid">    
    <!-- Page Heading -->
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h1 class="h3 mb-2 text-gray-800">Daftar Toko</h1>
            <p class="mb-4">Menampilkan toko yang telah terdaftar di TukuTuku</p>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard_admin/')?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Toko</li>
            </ol>
        </div>
    </div>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class = "row align-items-center">
            <div class="col-auto">
              <h6 class="m-0 font-weight-bold text-primary">Toko</h6>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Toko</th>
                  <th>Pemilik</th>
                  <th>Nomor Telepon</th>
                  <th width="100">Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php $no=1;
                foreach($toko as $tk) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $tk['nama_toko'] ?></td>
                    <td><?php echo $tk['nama_owner'] ?></td>
                    <td><?php echo $tk['no_telp_owner'] ?></td>
                    <td>
                        <a class='btn btn-success btn-sm' href='<?php echo base_url('admin/toko/detail/') .$tk['id_toko']?>'><span class='fas fa-info-circle'></span></a>
                        <a class='btn btn-primary btn-sm' href='<?php echo base_url('admin/toko/edit/') .$tk['id_toko']?>'><span class='fas fa-edit'></span></a>
                        <button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#delete<?php echo $tk['id_toko']?>'>
                          <i class="fas fa-trash"></i>
                        </button>
                    </td>
                  </tr>

                  <!-- Modal Delete Toko -->
                  <div class='modal fade' id='delete<?php echo $tk['id_toko'] ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered' role='document'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id='exampleModalLongTitle'>Hapus Toko <b> #<?php echo $tk['nama_toko'] ?> </b></h5>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <div class='modal-body'>
                          Apakah Anda yakin akan Menghapus Toko <b> #<?php echo $tk['nama_toko'] ?></b> ?
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                          <a class='btn btn-danger' href='<?php echo base_url('admin/toko/hapus/').$tk['id_toko'] ?>'>Hapus</a>
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