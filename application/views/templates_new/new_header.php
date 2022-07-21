<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Selalu Ada Selalu Bisa | Tukutuku</title>
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
    <link href=" <?= base_url('new/assets/') ?>css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url('new/assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.css">
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css"/>-->

    <!-- Deskripsi -->
    <script src="<?= base_url('assets/'); ?>ckeditor/ckeditor.js"></script>

</head>

<main>
    <nav class="navbar sticky-top navbar-white bg-white p-3 mb-5 bg-white rounded">
        <div class="row align-items-center">
            <div class="col">
                <a class="navbar-brand" href="<?= base_url('welcome') ?>" style="padding-bottom: 1rem;padding-top: 1rem;">
                    <img src="<?php echo base_url('assets/img/logo.png')?>" alt="Logo" height="20px">
                </a>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand navbar-white bg-white topbar mb-4 fixed-top shadow-sm">
        <div class="row align-items-center">
            <div class="col">
                <a class="navbar-brand" href="<?= base_url('welcome') ?>" style="padding-bottom: 2rem;padding-top: 2rem;">
                    <img src="<?php echo base_url('assets/img/logo.png')?>" alt="Logo" height="50px">
                </a>
            </div>
            <div class="col">
                <a class="nav-link no-arrow" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #c60512">
                Kategori
                </a>
                <div class="dropdown-menu no-arrow" aria-labelledby="navbarDropdown">
                    <?php foreach ($kategori as $kat) : ?>
                        <a class="dropdown-item" href="<?= base_url('welcome/kategori/').$kat['id_kategori']?>"><?= $kat['nama_kategori']?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Topbar Search -->
        <form class="d-none d-inline-block form-inline mr-5 ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?= base_url('welcome/search') ?>" method="POST">
            <div class="input-group">
                <input type="text" name="search" id="key" class="form-control bg-light border-0 small" placeholder="Cari barang favorit kamu disini . . ."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-danger" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>


        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <?php if ($this->session->userdata('email_customer')) : ?>
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link" href="<?= base_url('dashboard/keranjang'); ?>" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart" style="color: #808080; "></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter"><?php echo $total_cart['total_cart']; ?></span>
                    </a>
                </li>
            <?php else : ?>
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link" href="<?= base_url('auth/login') ?>" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart" style="color: #808080; "></i>
                    </a>
                </li>
            <?php endif; ?>

            <div class="topbar-divider d-none d-sm-block"></div>

            <?php if($this->session->userdata('nama_customer')){ ?>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-800 medium">Hi, <?php echo $this->session->userdata('nama_customer') ?></span>
                    </a>
                <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
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
            </li>
            <?php } else { ?>
                <div class="row align-items-center">
                    <div class="col">
                        <a href="<?= base_url('auth/login') ?>" class="btn btn-outline-danger" role="button" data-bs-toggle="button"><b>Masuk</b></a>
                    </div>
                    <div class="col">
                        <a href="<?= base_url('registrasi') ?>" class="btn btn-danger" role="button" data-bs-toggle="button"><b>Daftar</b></a>
                    </div>
                </div>
                <?php } ?>
        </ul>
    </nav>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>LOGOUT</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin untuk Logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
</main>
