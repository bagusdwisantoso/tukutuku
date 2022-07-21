<div class="container-fluid">
<!-- Button trigger modal -->
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
    <p class="mb-4">Menampilkan Data Customer Tukutuku</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <button class="pull-right btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_customer"><i class="fas fa-plus fas-sm"></i>
        Tambah Customer
      </button>
    </div>
    <div class="card-body">
      <div class="table">
        <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>NAMA</th>
                  <th>EMAIL</th>
                  <th>ALAMAT</th>
                  <th>NO TLPN</th>
                  <th>AKSI</th>
              </tr>
          </thead>
          <tbody>
            <?php $no=1;
              foreach($customer as $cstmr) : ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $cstmr->nama_customer ?></td>
                  <td><?php echo $cstmr->email_customer ?></td>
                  <td><?php echo $cstmr->alamat_customer ?></td>
                  <td><?php echo $cstmr->no_tlpn_customer ?></td>
                  <td>
                  <a class='btn btn-success btn-sm' href='<?php echo base_url('admin/customer/detail/') .$cstmr->id_customer?>'><span class='fas fa-info-circle'></span></a>
                  <a class='btn btn-primary btn-sm' href='<?php echo base_url('admin/customer/edit/') .$cstmr->id_customer?>'><span class='fas fa-edit'></span></a>
                  <a class='btn btn-danger btn-sm' href='<?php echo base_url('admin/customer/hapus/') .$cstmr->id_customer?>'><span class='fas fa-trash'></span></a>
                  </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


<div class="modal fade" id="tambah_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT AKUN CUSTOMER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/customer/tambah_aksi';?>" method="post" enctype="multipart/form-data">
        
          <div class="form-group">
            <label>Nama customer</label>
            <input type="text" name="nama_customer" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email_customer" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password_customer" class="form-control" required>
          </div>
          
          <div class="form-group">
          <label>Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin_customer"value="laki-laki">
                <label class="form-check-label" for="flexRadioDefault1">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin_customer" value="perempuan">
                <label class="form-check-label" for="flexRadioDefault2">
                    Perempuan
                </label>
            </div>
          </div>

          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir_customer" class="form-control" placeholder="YYYY-MM-DD" required>
          </div>

          <div class="form-group">
            <label>No Telpon</label>
            <input type="text" name="no_tlpn_customer" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label>Provinsi</label>
                <select class="form-control" name="provinsi" id="provinsi" style="height: 33px;" required>
                    <option value=''>- Pilih -</option>
                    <?php foreach($provinsi as $prov){ ?>
                    <option value="<?php echo $prov['provinsi_id']; ?>"><?php echo $prov['nama_provinsi']; ?> </option>
                    <?php } ?>
                </select>
          </div>
          
          <div class="form-group">
            <label>Kota</label>
                <select class="form-control" name="id_kota" id="kota" style="height: 33px;" required>
                    <option value=''>- Pilih -</option>
                </select>
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat_customer" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Role</label>
            <input type="text" name="tanggal_lahir_customer" class="form-control" value="customer" disabled>
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