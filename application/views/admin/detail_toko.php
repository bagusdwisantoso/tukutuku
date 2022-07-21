<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class = "row align-items-center">
            <div class="col-auto">
                <a href="<?php echo base_url('admin/toko/')?>"><i class="fas fa-arrow-left" style="color:black"></i></a>
            </div>
            <div class="col">
                <h6 class="m-0 font-weight-bold" style="color: #D21322">Daftar Toko</h6>
            </div>
          </div>
        </div>
    
        <div class="card-body">
            <?php foreach($toko as $tk): ?>
            <h4 class="card-title text-center">Informasi Toko <b><font color="red"><?php echo $tk->nama_toko?></font></b></h4>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url().'img/foto_toko/'.$tk->foto_toko ?>" class="card-img-top">
                </div>
                <div class="col-md-8">
                <p class="card-text">
                    <dl class="dl-horizontal">
                        <small>Nama Toko</small> 
                        <dt><?php echo $tk->nama_toko ?></dt><br>                   
                        <small>Deskripsi Toko</small>
                        <dt><?php echo $tk->deskripsi_toko ?></dt><br>                    
                        <small>Alamat Toko</small>
                        <dt><?php echo $tk->alamat_toko ?></dt><br>                    
                        <small>Terdaftar sejak</small>
                        <dt><?php echo date('d F Y', strtotime($tk->tanggal_daftar_toko));?> pukul <?php echo date('H:i', strtotime($tk->tanggal_daftar_toko));?> WIB</dt><br> 
                        </p>
                    </dl>
                </div>

                <div class='col-md-12'><hr class="sidebar-divider d-none d-md-block"></div>

                <div class="col-md-4">
                    <h5 class="card-title" style="color: #D21322"><b>Informasi Pemilik</b></h5>
                    <small>Nama Pemilik</small> 
                    <dt><?php echo $tk->nama_owner ?></dt><br>                   
                    <small>Jenis Kelamin</small>
                    <dt><?php echo $tk->jenis_kelamin ?></dt><br>                    
                    <small>Tanggal Lahir</small>
                    <dt><?php echo date('d F Y', strtotime($tk->tgl_lahir));?></dt><br>
                </div>                     

                <div class="col-md-4">
                    <h5 class="card-title" style="color: #D21322"><b>Informasi Kontak</b></h5>
                    <small>Nomor Handphone</small> 
                    <dt><?php echo $tk->no_telp_owner ?></dt><br>
                    <small>Email</small> 
                    <dt><?php echo $tk->email ?></dt><br>
                </div>

                <div class="col-md-4">
                    <h5 class="card-title" style="color: #D21322"><b>Informasi Rekening</b></h5>
                    <dt><?php echo $tk->nama_bank ?></dt>
                    <dt><?php echo $tk->no_rekening ?></dt>
                    <dd>a.n <?php echo $tk->nama_rekening ?></dd>
                </div>    
            </div>
            <?php endforeach; ?>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <?php echo anchor(base_url('admin/toko'),'<div class="btn btn-sm btn-danger">Kembali</div>') ?>
            </div>
        </div>
    </div>
</div>