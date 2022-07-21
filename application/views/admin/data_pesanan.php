<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Pesanan</h1>
    <p class="mb-4">Menampilkan Data Pesanan</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table">
        <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th>NO</th>
                  <th width="110">NAMA TOKO</th>
                  <th>NAMA PRODUK</th>
                  <th width="70">HARGA</th>
                  <th>BERAT</th>
                  <th>STOK</th>
                  <th>KATEGORI</th>
                  <th>VERIFIKASI</th>
                  <th>PUBLISH</th>
                  <th width="100">AKSI</th>
              </tr>
          </thead>
          <tbody>
            <?php $no=1;
              foreach($produk as $prdk) : ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $prdk['nama_toko'] ?></td>
                  <td><?php echo $prdk['nama_produk'] ?></td>
                  <td>Rp. <?php echo number_format($prdk['harga_produk'], 0,',','.') ?></td>
                  <td><?php echo $prdk['berat_produk'] ?> gr</td>
                  <td><?php echo $prdk['stok_produk'] ?></td>
                  <td><?php echo $prdk['kategori_produk'] ?></td>
                  <td><?php echo $prdk['verifikasi_produk'] ?></td>
                  <td><?php echo $prdk['publish_produk'] ?></td>
                  <td>
                  <a class='btn btn-success btn-sm' href='<?php echo base_url('admin/pesanan/detail/') .$prdk['id_produk']?>'><span class='fas fa-info-circle'></span></a>
                  <a class='btn btn-success btn-sm' href='<?php echo base_url('admin/pesanan/detail/') .$prdk['id_produk']?>'><span class='fas fa-info-circle'></span></a>
                  <a class='btn btn-primary btn-sm' href='<?php echo base_url('admin/pesanan/edit/') .$prdk['id_produk']?>'><span class='fas fa-edit'></span></a>
                  <a class='btn btn-danger btn-sm' href='<?php echo base_url('admin/pesanan/hapus/') .$prdk['id_produk']?>'><span class='fas fa-trash'></span></a>
                  </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>