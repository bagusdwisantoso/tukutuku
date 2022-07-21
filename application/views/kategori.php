<div class="container-fluid" style="padding-left: 5rem;padding-right: 5rem;">
    <br>
    <div class="row">
        <?php foreach ($ikon_kat as $ikon){}?>
        <div class="col-2">
            <img src="<?php echo base_url().'img/kategori/'.$ikon->ikon_kategori ?>" class="img-fluid rounded ml-auto mr-auto mb-2" >
        </div>
        <div class="col-auto align-self-center">
            <h1 style="color: #c60512;"><b><?php echo $ikon->nama_kategori?></b></h1>
        </div>
    </div>
    <hr>
    <?php
        if (isset($jumlah)){
            echo 'Menampilkan ' .$jumlah .' produk untuk kategori <b>"'.$ikon->nama_kategori.'"</b>';
        }
    ?>
    <div class='row text-center mt-4'>
        <?php foreach ($kategori2 as $kat) :?>
            <div class='card shadow-sm ml-auto mr-auto mb-4 d-flex justify-content-center' style='width: 14rem;'>
                <img src="<?php echo base_url('img/gambar_produk/').$kat->gambar_produk?>" class='card-img-top' >
                <div class='card-body'>
                    <h6 class='card-title mb-1'><?php echo $kat->nama_produk; ?></h6>
                    <a href="<?php echo (base_url('welcome/detail/').$kat->id_produk)?>" class="stretched-link"></a>
                </div>
                <div class='card-footer bg-white'>
                    <p class='card-text text-start'>
                        <b>Rp<?php echo number_format($kat->harga_produk, 0,',','.'); ?></b><br>
                        <i class="fas fa-store"></i>    <?php echo $kat->nama_toko; ?><br>
                    </p>     
                </div>                              
            </div>
        <?php endforeach; ?>
    </div> 
</div>
                            