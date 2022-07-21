<div class="container-fluid" style="padding-left: 5rem;padding-right: 5rem;">
    <?php foreach($produk as $prdk): ?>
    <div class="row">
        <div class="sticky-col col-md-4">
            <img src="<?php echo base_url().'img/gambar_produk/'.$prdk->gambar_produk ?>" class="card-img-top">
        </div>
        <div class="col-md-5">
            <h3 class="h3 text-dark"><b><?php echo $prdk->nama_produk ?></b></h3>
            <?php foreach($penjualan as $jual): ?>
            <p>Terjual <?php echo $jual->Terjual ?></p>
            <?php endforeach; ?>
            <h2 class="text-dark"><b>Rp<?php echo number_format($prdk->harga_produk,0,',','.') ?></b></h2>
            <hr class="sidebar-divider d-none d-md-block">
            <p>Berat Produk: <?php echo $prdk->berat_produk ?> Gram <br>
            Kategori: <strong><?php echo $prdk->nama_kategori ?></strong><br>
            Stok: <strong><?php echo $prdk->stok_produk ?></strong></p>
            <p><strong><?php echo $prdk->deskripsi_produk ?></strong></p>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="row">
                <div class="col-auto">
                    <img class="img-profile rounded-circle"
                    src="<?php echo base_url().'img/foto_toko/'.$prdk->foto_toko ?>" style="width: 50px;">
                </div>
                <div class="col">
                    <h3 class="h5 text-dark"><b><?php echo $prdk->nama_toko ?></b></h3>
                    <h3 class="h6 text-dark"><i class="fas fa-map-marker-alt"></i><?php echo $prdk->nama_kota ?></h3>
                </div>  
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h3 class="h5 text-dark"><b>Yuk, Masukkin produk ini ke Keranjang!</b></h3><br>
                    <?php echo anchor(base_url('dashboard/tambah_ke_keranjang/').$prdk->id_produk,'<div class="btn btn-danger"><i class="fas fa-plus"></i> Tambah ke Keranjang</div>') ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="row">
        <div class="col-mb-10"></div>
    </div>
</div>