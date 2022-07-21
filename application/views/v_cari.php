<div class="container-fluid" style="padding-left: 5rem;padding-right: 5rem;">
    <br>
    <?php
        if (isset($jumlah)){
            echo 'Menampilkan ' .$jumlah .' produk untuk <b>"'.$search.'"</b>';
        }
    ?>
    <div class='row text-center mt-4'>
        <?php foreach ($produk as $prdk) :?>
            <div class='card shadow-sm ml-2 mr-2 mb-4 d-flex justify-content-center' style='width: 14rem;'>
                <img src="<?php echo base_url('img/gambar_produk/').$prdk->gambar_produk?>" class='card-img-top' >
                <div class='card-body'>
                    <a href="<?php echo (base_url('welcome/detail/').$prdk->ID)?>" class="stretched-link"></a>
                    <h6 class='card-title mb-1'><?php echo $prdk->nama_produk; ?></h6>
                </div>
                <div class='card-footer bg-white'>
                    <p class='card-text text-start'>
                        <b>Rp. <?php echo number_format($prdk->harga_produk, 0,',','.'); ?></b><br>
                        <i class="fas fa-store"></i>    <?php echo $prdk->nama_toko; ?><br>
                    </p>     
                </div>                              
            </div>
        <?php endforeach; ?>
    </div>
</div>