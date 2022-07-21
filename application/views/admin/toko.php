<div class="container-fluid">
<!-- Button trigger modal -->
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Toko</h1>
    <p class="mb-4">Menampilkan Data Toko Tukutuku</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <button class="pull-right btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_toko"><i class="fas fa-plus fas-sm"></i>
        Tambah Toko
      </button>
    </div>
    <div class="card-body">
      <div class="table">
        <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>NAMA TOKO</th>
                  <th>KOTA</th>
                  <th>ALAMAT</th>
                  <th>NO TLPN</th>
                  <th width="100">AKSI</th>
              </tr>
          </thead>
          <tbody>
            <?php $no=1;
              foreach($toko as $tko) : ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $tko['nama_toko'] ?></td>
                  <td><?php echo $tko['nama_kota'] ?></td>
                  <td><?php echo $tko['alamat_toko'] ?></td>
                  <td><?php echo $tko['owner'] ?></td>
                  <td>
                  <a class='btn btn-success btn-sm' href='<?php echo base_url('admin/toko/detail/') .$tko['id_toko']?>'><span class='fas fa-info-circle'></span></a>
                  <a class='btn btn-primary btn-sm' href='<?php echo base_url('admin/toko/edit/') .$tko['id_toko']?>'><span class='fas fa-edit'></span></a>
                  <a class='btn btn-danger btn-sm' href='<?php echo base_url('admin/toko/hapus/') .$tko['id_toko']?>'><span class='fas fa-trash'></span></a>
                  </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


<div class="modal fade" id="tambah_toko" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/toko/tambah_aksi';?>" method="post" enctype="multipart/form-data">
        
          <div class="form-group">
            <label>Nama toko</label>
            <input type="text" name="nama_toko" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" required>
          </div>
          
          <div class="form-group">
          <label>Jenis Kelamin Pemilik Toko</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin_toko" value="laki-laki">
                <label class="form-check-label" for="jenis_kelamin_toko">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin_toko" value="perempuan">
                <label class="form-check-label" for="jenis_kelamin_toko">
                    Perempuan
                </label>
            </div>
          </div>

          <div class="form-group">
            <label>Tanggal Lahir Pemilik Toko</label>
            <input type="text" name="tgl_lahir" class="form-control" placeholder="YYYY-MM-DD" required>
          </div>

          <div class="form-group">
            <label>No Telpon</label>
            <input type="text" name="no_telp_owner" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Deskripsi Toko</label>
            <input type="text" name="deskripsi_toko" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label>Provinsi</label>
                <select class="form-control" name="provinsi_id" id="provinsi_id" style="height: 33px;" required>
                    <option value=''>- Pilih -</option>
                    <?php foreach($provinsi as $prov){ ?>
                    <option value="<?php echo $prov['provinsi_id']; ?>"><?php echo $prov['nama_provinsi']; ?> </option>
                    <?php } ?>
                </select>
          </div>
          
          <div class="form-group">
            <label>Kota</label>
                <select class="form-control" name="kota" id="kota" style="height: 33px;" required>
                    <option value=''>- Pilih -</option>
                </select>
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat_toko" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Role</label>
            <input type="text" name="tanggal_lahir_toko" class="form-control" value="toko" disabled>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
	    </form>
    </div>
  </div>
</div>