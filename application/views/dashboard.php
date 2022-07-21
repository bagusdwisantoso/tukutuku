<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <div class="col">
            <div class="header-slider normal-slider">
                <?php foreach($banner as $bnr) : ?>
                <div class="header-slider-item">
                    <center><img src=" <?php echo base_url('img/banner/').$bnr['nama_banner'] ?>" alt="Slider Image" class="rounded" /></center>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="col">
                    <div class="brand">
                        <h3 class="h3 mb-0 text-gray-800"><b>Belanja dari brand pilihan</b></h3>
                        <div class="brand-slider">
                            <?php foreach($brand as $brd) : ?>
                            <div class="brand-item"><img src="<?= base_url('img/brand/').$brd['nama_brand'] ?>" alt=""></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'><hr class="sidebar-divider d-none d-md-block"></div>
                <?php if(!$this->session->userdata('nama_customer')){ ?>
                    <a href="<?= base_url('registrasi') ?>">
                        <img src="<?php echo base_url('img/banner/banner_welcome.png')?>" class="img-fluid rounded mx-auto d-block" >
                    </a><br>
                <?php } else { ?>
                    <h3 class="h3 mb-0 text-gray-800"><b>Spesial di TukuTuku hari ini</b></h3>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <img src="<?php echo base_url('img/banner/smallbanner_1.png')?>" class="img-fluid rounded ml-auto mr-auto" >
                        </div>
                        <div class="col-md-4">
                            <img src="<?php echo base_url('img/banner/smallbanner_2.png')?>" class="img-fluid rounded ml-auto mr-auto" >
                        </div>
                        <div class="col-md-4">
                            <img src="<?php echo base_url('img/banner/smallbanner_3.png')?>" class="img-fluid rounded ml-auto mr-auto" >
                        </div>
                    </div><br>
                <?php } ?>

                <h3 class="h3 mb-0 text-gray-800"><b>Terlaris di TukuTuku</b></h3>
                <div class='row text-center mt-4'>
                    <?php foreach ($terlaris as $laris) :?>
                        <div class='card shadow-sm ml-auto mr-auto mb-4 d-flex justify-content-center' style='width: 14rem;'>    
                            <img src="<?php echo base_url('img/gambar_produk/').$laris->gambar_produk?>" class='card-img-top' >
                            <div class='card-body'>
                                <h6 class='card-title mb-1'><?php echo $laris->nama_produk; ?></h6>
                                <a href="<?php echo (base_url('welcome/detail/').$laris->ID)?>" class="stretched-link"></a>
                            </div>
                            <div class='card-footer bg-white'>
                                <p class='card-text text-start'>
                                    <b>Rp. <?php echo number_format($laris->harga_produk, 0,',','.'); ?></b><br>
                                    <i class="fas fa-store"></i>    <?php echo $laris->nama_toko; ?><br>
                                    Terjual <?php echo $laris->Terjual; ?> pcs
                                </p>     
                            </div>                              
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class='col-md-12'><hr class="sidebar-divider d-none d-md-block"></div>
                <h3 class="h3 mb-0 text-gray-800"><b>Dipilih yuk Kategori-nya!</b></h3>
                <div class='row text-center mt-4'>
                    <?php foreach ($kategori as $kat) :?>
                        <div class='card border-white ml-auto mr-auto mb-4 d-flex justify-content-center' style='width: 14rem;'>
                            <a href="<?php echo (base_url('welcome/kategori/').$kat['id_kategori'])?>" class="stretched-link"></a>
                            <img src="<?php echo base_url('img/kategori/').$kat['ikon_kategori']?>" class="img-fluid rounded ml-auto mr-auto mb-2" >
                            <p class="text-center "><b><?php echo $kat['nama_kategori']; ?></b></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class='col-md-12'><hr class="sidebar-divider d-none d-md-block"></div>
                <div class="row justify-content-between">
                    <div class="col-10"><h3 class="h3 mb-0 text-gray-800 mr-3"><b>Etalase Produk</b></h3></div>
                    <div class="col align-self-end ml-5"><a href="<?= base_url('welcome/all') ?>" class="text-decoration-none"><h6 style="color: #c60512"><b>Lihat Selengkapnya</b></h6></a></div>
                </div>
                <div class='row text-center mt-4'>
                    <?php foreach ($produk as $prdk) :?>
                        <div class='card shadow-sm ml-auto mr-auto mb-4 d-flex justify-content-center' style='width: 14rem;'>
                            <img src="<?php echo base_url('img/gambar_produk/').$prdk->gambar_produk?>" class='card-img-top' >
                            <div class='card-body'>
                                <a href="<?php echo (base_url('welcome/detail/').$prdk->ID)?>" class="stretched-link"></a>
                                <h6 class='card-title mb-1'><?php echo $prdk->nama_produk; ?></h6>
                            </div>
                            <div class='card-footer bg-white'>
                                
                                <p class='card-text text-start'>
                                    <b>Rp. <?php echo number_format($prdk->harga_produk, 0,',','.'); ?></b><br>
                                    <i class="fas fa-store"></i>    <?php echo $prdk->nama_toko; ?><br>
                                    Terjual <?php echo $prdk->Terjual; ?> pcs
                                </p>     
                            </div>                              
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<div class="container fluid">
    <div class='col-md-12'><hr class="sidebar-divider d-none d-md-block"></div>
</div>
Main Slider End
<div class="product-view">
    <div class="featured-product product">
        <div class="container-fluid white">
            <div class="section-header">
            
            </div>
            <div class="brand">
                <div class="container-fluid">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="product-search">
                                            <form action="<?= base_url('dashboard/search') ?>" method="POST">
                                                <input type="text" name="search" id="key" placeholder="Cari Produk">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-price-range">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-toggle="dropdown">Harga (Rp. )
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="<?= base_url()?>" class="dropdown-item" style="font-weight: bolder;">Semua Harga</a>
                                                    <a href="<?= base_url('dashboard/filter_harga_dibawah?val=100000'); ?>" class="dropdown-item" style="font-weight: bolder;"><= Rp. 100.000</a>
                                                    <a href="<?= base_url('dashboard/filter_harga?from=100000&until=500000'); ?>" class="dropdown-item" style="font-weight: bolder;">Rp. 100.000 - Rp. 500.000</a>
                                                    <a href="<?= base_url('dashboard/filter_harga?from=500000&until=1000000'); ?>" class="dropdown-item" style="font-weight: bolder;">Rp. 500.000 - Rp. 1 Jt</a>
                                                    <a href="<?= base_url('dashboard/filter_harga_diatas?val=1000000'); ?>" class="dropdown-item" style="font-weight: bolder;">>= Rp. 1 Jt</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  product-4">
                End Featured Product
                <div class='row text-center mt-4'>
                    <?php foreach ($produk as $prdk) :?>
                        <div class='card shadow ml-5 mb-4 justify-content-between' style='width: 16rem;'>
                            <img src="<?php echo base_url('img/gambar_produk/').$prdk->gambar_produk?>" class='card-img-top' >
                            <div class='card-body'>
                                <h6 class='card-title mb-1'><?php echo $prdk->nama_produk; ?></h6>
                            </div>
                            <div class='card-footer bg-white'>
                                <span class='badge badge-pill badge-success mb-3'>Rp. <?php echo number_format($prdk->harga_produk, 0,',','.'); ?></span><br>
                                    <?php echo anchor (base_url('dashboard/tambah_ke_keranjang/').$prdk->id_produk,"<div class='btn btn-sm btn-primary'><i class='fa fa-shopping-cart'></i> Keranjang</div>")?>
                                    <?php echo anchor (base_url('welcome/detail/').$prdk->id_produk,"<div class='btn btn-sm btn-success'>Detail</div>")?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div> -->
        <!-- Pagination Start -->
        <!-- <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div> -->
    </div>
    <!-- Pagination Start -->
</div>
<!-- Featured Product End -->