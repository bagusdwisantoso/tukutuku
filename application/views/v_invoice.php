<!-- Main content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-shopping-cart"></i> Checkout
                    <small class="float-right">Tanggal Pesan: <?php echo $invoice->tgl_pesan ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <br>
                    <b>Batas Bayar:</b> <?= $invoice->batas_bayar ?><br>
                    <b>ID Customer:</b> <?= $invoice->id_customer ?>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <br>
                    <b>ID Invoice <h5><strong>#<?= $invoice->id_order ?></strong></h5></b>
                    <br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Berat</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Total Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;
                        foreach($pesanan as $psn) { ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $psn->nama_produk ?></td>
                            <td class="text-center"><?php echo $psn->qty ?></td>
                            <td class="text-center"> <?= $psn->berat_produk ?> Gr </td>
                            <td style="text-align:right">Rp. <?php echo number_format($psn->harga_produk, 0,',','.') ?></td>
                            <td style="text-align:right">Rp. <?php echo number_format($psn->harga * $psn->qty, 0,',','.') ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            
            <?php 
                echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                ','</div>');
            ?>

            
            <div class="row">
                <!-- accepted payments column -->
                <div class="col-sm-8 invoice-col">
                    Tujuan Pengiriman :
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight:bold">Provinsi</label>
                                <input value="<?php echo $invoice->provinsi ?>" class="form-control" readonly>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight:bold">Kota</label>
                                <input value="<?php echo $invoice->kota ?>" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-weight:bold">Expedisi</label>
                                <input value="<?php echo $invoice->expedisi ?>" class="form-control" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-weight:bold">Paket</label>
                                <input value="<?php echo $invoice->paket,' ', $invoice->estimasi ?>" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label style="font-weight:bold">Alamat</label>
                                <input value="<?php echo $invoice->alamat ?>" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight:bold">Kode Pos</label>
                                <input value="<?php echo $invoice->kode_pos ?>" class="form-control" readonly>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight:bold">Nama Penerima</label>
                                <input value="<?php echo $invoice->nama_penerima ?>" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight:bold">No Telepon Penerima</label>
                                <input value="<?php echo $invoice->no_tlpn_penerima ?>" class="form-control" readonly>
                            </div>
                        </div>

                        <!-- <div class="col-md-8">
                            <div class="form-group">
                                <label style="font-weight:bold">Transfer Ke Bank</label>
                                <select name="bank" class="form-control" required>
                                    <option>- Pilih -</option>
                                    <option value="BRI">BRI - 461081010973531 An. Tukutuku</option>
                                    <option value="BCA">BCA - 7310252517 An. Tukutuku</option>
                                    <option value="Bank Syariah Indonesia">Bank Syariah Indonesia - 7015555008 An. Tukutuku</option>
                                    <option value="Mandiri">Mandiri - 1260007111155 An. Tukutuku</option>
                                </select>
                            </div>
                        </div> -->
                        
                        <!-- <?php $bank = $this->model_pesanan->tampil('tb_bank'); ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-weight:bold">Transfer Ke Bank</label>
                                <select name="bank" class="form-control" required>
                                    <option>- Pilih -</option>
                                    <?php foreach($bank as $bnk){ ?>
                                    <option value="<?php echo $bnk->nama_bank; ?>"><?php echo $bnk->nama_bank; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->
                      
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Grand total:</th>
                        <td>Rp. <?php echo number_format($invoice->grand_total, 0,',','.'); ?></td>
                      </tr>
                      <tr>
                        <th>Berat:</th>
                        <td><?= $invoice->berat ?> Gr</td>
                      </tr>
                      <tr>
                        <th>Ongkos Kirim:</th>
                        <td>Rp. <?php echo number_format($invoice->ongkir, 0,',','.') ?> </td>
                      </tr>
                      <tr>
                        <th>Total Bayar:</th>
                        <td>Rp. <?php echo number_format($invoice->total_bayar, 0,',','.') ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>

              <!-- end Simpan Transaksi -->
              <div class="row no-print">
                <div class="col-12">
                    <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-warning"><i class="fas fa-backward"></i> Kembali</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
    </div>
</div>
