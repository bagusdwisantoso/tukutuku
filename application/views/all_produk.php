<div class="container-fluid" style="padding-left: 5rem;padding-right: 5rem;">
    <br>
    <img src="<?php echo base_url('img/banner/banner_1.png')?>" class="img-fluid rounded mx-auto d-block" >
    <div class="col-md-4">
        <div class="product-price-range">
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
            Harga (Rp. )
            </button>
                <div class="dropdown-menu">
                    <a href="<?= base_url('welcome/all')?>" class="dropdown-item" style="font-weight: bolder;">Semua Harga</a>
                    <a href="<?= base_url('welcome/filter_harga_dibawah?val=100000'); ?>" class="dropdown-item" style="font-weight: bolder;"><= Rp. 100.000</a>
                    <a href="<?= base_url('welcome/filter_harga?from=100000&until=500000'); ?>" class="dropdown-item" style="font-weight: bolder;">Rp. 100.000 - Rp. 500.000</a>
                    <a href="<?= base_url('welcome/filter_harga?from=500000&until=1000000'); ?>" class="dropdown-item" style="font-weight: bolder;">Rp. 500.000 - Rp. 1 Jt</a>
                    <a href="<?= base_url('welcome/filter_harga_diatas?val=1000000'); ?>" class="dropdown-item" style="font-weight: bolder;">>= Rp. 1 Jt</a>
                </div>
            </div>
        </div>
    </div>
    <div class='row mt-4'>
        <?php foreach ($produk as $prdk) :?>
            <div class='card shadow-sm ml-auto mr-auto mb-4 d-flex justify-content-center' style='width: 14rem;'>  
                <img src="<?php echo base_url('img/gambar_produk/').$prdk->gambar_produk?>" class='card-img-top' > 
                <a href="<?php echo (base_url('welcome/detail/').$prdk->id_produk)?>" class="stretched-link"></a>
                <div class='card-body'>
                    <h6 class='card-title mb-0'><?php echo $prdk->nama_produk; ?></h6>
                </div>
                <div class='card-footer bg-white'>
                    <p class='card-text text-start'>
                        <b>Rp <?php echo number_format($prdk->harga_produk, 0,',','.'); ?></b><br>
                        <i class="fas fa-store"></i>    <?php echo $prdk->nama_toko; ?><br>
                    </p>     
                </div>                              
            </div>
        <?php endforeach; ?>
    </div>
</div>