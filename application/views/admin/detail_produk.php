<div class="container-fluid">

    <div class="card">
        <div class="card-header py-3">
          <div class = "row align-items-center">
            <div class="col-auto">
                <a href="<?php echo base_url('admin/data_produk/')?>"><i class="fas fa-arrow-left" style="color:black"></i></a>
            </div>
            <div class="col">
                <h6 class="m-0 font-weight-bold" style="color: #D21322">Daftar Produk</h6>
            </div>
          </div>
        </div>
        <div class="card-body">
            <h3 class="card-title text-center"><b><font style="color: #D21322">Informasi</font></b> Produk</h3><br>
            <?php foreach($produk as $prdk): ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url().'img/gambar_produk/'.$prdk->gambar_produk ?>" class="card-img-top">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td width="140">Nama Toko</td>
                            <td><strong><?php echo $prdk->nama_toko ?></strong></td>
                        </tr>

                        <tr>
                            <td>Nama Produk</td>
                            <td><strong><?php echo $prdk->nama_produk ?></strong></td>
                        </tr>

                        <tr>
                            <td>Harga</td>
                            <td><strong><div class="btn btn-sm btn-outline-danger">Rp. <?php echo number_format($prdk->harga_produk,0,',','.') ?></strong></td>
                        </tr>

                        <tr>
                            <td>Berat</td>
                            <td><strong><?php echo $prdk->berat_produk ?></strong></td>
                        </tr>

                        <tr>
                            <td>Stok</td>
                            <td><strong><?php echo $prdk->stok_produk ?></strong></td>
                        </tr>

                        <tr>
                            <td>Kategori</td>
                            <td><strong><?php echo $prdk->nama_kategori ?></strong></td>
                        </tr>
                        
                        <tr>
                            <td>Deskripsi</td>
                            <td><strong><?php echo $prdk->deskripsi_produk ?></strong></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <?php echo anchor(base_url('admin/data_produk'),'<div class="btn btn-sm btn-danger">Kembali</div>') ?>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>