<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Selalu Ada Selalu Bisa | TukuTuku</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('img/'); ?>favicon/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="<?= base_url('new/assets/'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href=" <?= base_url('new/assets/') ?>lib/slick/slick.css" rel="stylesheet">
    <link href=" <?= base_url('new/assets/') ?>lib/slick/slick-theme.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Template Stylesheet -->
    <link href=" <?= base_url('new/assets/') ?>css/style.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.css">
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css"/>-->

    <!-- Deskripsi -->
    <script src="<?= base_url('assets/'); ?>ckeditor/ckeditor.js"></script>

</head>
<body>
    <!-- <div class="" style="position: fixed; width: 100%; z-index:99"> -->
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">


                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        
                        <!-- <a href="checkout.html" class="nav-item nav-link">Checkout</a> -->
                        <!-- <a href="my-account.html" class="nav-item nav-link">My Account</a> -->
                        <div class="nav-item dropdown">
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                    </div>
                    <!-- <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Login</a>
                                <a href="#" class="dropdown-item">Register</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="<?= base_url('welcome') ?>">
                            <img src="<?php echo base_url('assets/img/logo.png')?>" alt="Logo" style="width:170px; height: 200px;">
                        </a>
                    </div>
                </div>
                <div class="col-1">
                    <a class="nav-link" href="<?php echo base_url('welcome') ?>">Home</a>
                </div>
                <div class="col-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach ($kategori as $kat) : ?>
                        <a class="dropdown-item" href="<?= base_url('dashboard/kategori?kat=').$kat['id_kategori']?>"><?= $kat['nama_kategori']?></a>
                    <?php endforeach; ?>
                    </div>
                    
                </div>
                <div class="col-1">
                    <a class="nav-link" href="about.html">About</a>
                </div>
                <div class="col-1">
                    <a class="nav-link" href="contact.html">Contact</a>
                </div>
                <div class="col-3">
                    <div class="user">
                        <!-- <a href="wishlist.html" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span>(0)</span>
                        </a> -->
                        <?php if ($this->session->userdata('email_customer')) : ?>
                            <a href="<?= base_url('dashboard/keranjang'); ?>" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?php echo $total_cart['total_cart']; ?></span>
                            </a>
                        <?php else : ?>
                            <a href="<?= base_url('dashboard/keranjang'); ?>" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>0</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-2">
                    <?php if($this->session->userdata('nama_customer')){ ?>
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-800 medium">Hi, <?php echo $this->session->userdata('nama_customer') ?></span>
                                <i class="fas fa-user"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('pesanan_saya') ?>">
                                    <i class="fas fa-file-invoice-dollar fa-sm fa-fw mr-2"></i>
                                    Pesanan Saya
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                    <?php } else { ?>
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-800 medium"></span>
                            <i class="fas fa-user"></i>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url('auth/login') ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Login
                            </a>
                            <a class="dropdown-item" href="<?= base_url('registrasi') ?>">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Register
                            </a>
                            <!-- <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a> -->
                        </div>
                    <?php } ?>
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>Logout</b></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Yakin ingin Logout?</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="<?php echo base_url('auth/logout') ?>">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>