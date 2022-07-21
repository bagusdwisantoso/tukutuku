<div class="row">
    <div class="col-sm-6">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">No Rekening Tujuan</h3>
                    </div>
                    <div class="card-body">
                        <p>Silakan Transfer Uang Ke No Rekening Di Bawah Ini Sebesar:
                        <h1 class="text-primary">Rp. <?php echo number_format($pesanan->total_bayar , 0,',','.') ?> </h1>
                        </p><br>
                        <table class="table">
                            <tr>
                                <th>Bank</th>
                                <th>No Rekening</th>
                                <th>Atas Nama</th>
                            </tr>
                            <?php foreach($rekening as $rek){ ?>
                            <tr>
                                <td><?php echo $rek->nama_bank ?></td>
                                <td><?php echo $rek->nomor_rekening ?></td>
                                <td>Tukutuku</td>
                            </tr>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card shadow mb-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pembayaran</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    <?php echo form_open_multipart('pesanan_saya/bayar/'.$pesanan->id_order); ?>
                    <!-- <form method="post" action="<?php echo base_url('pesanan_saya/bayar/').$pesanan->id_order?>"> -->
                        <div class="card-body">
                            <div class="form-group">
                                <label>Atas Nama</label>
                                <input name="atas_nama" class="form-control" placeholder="Atas Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input name="nama_bank" class="form-control" placeholder="Nama Bank" required>
                            </div>
                            <div class="form-group">
                                <label>No Rekening</label>
                                <input name="no_rek" class="form-control" placeholder="No Rekening" required>
                            </div>

                            <div class="form-group">
                                <label>Upload Bukti Bayar</label>
                                <input type="file" name="bukti_bayar" class="form-control" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?php echo base_url('pesanan_saya') ?>" class="btn btn-warning">Kembali</a>
                        </div>
                    <!-- </form> -->
                    <?php echo form_close() ?>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>