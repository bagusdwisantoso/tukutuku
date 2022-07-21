<!-- Main content -->
<div class="container-fluid">
    <?php
        foreach($tampil_keranjang2 as $t2){
        echo form_open(base_url('dashboard/checkout/').$t2['id_toko']);
        }
        $no_detail = date('Ymd') . strtoupper(random_string('alnum',8));
        ?>
    <div class="card shadow mb-4">
        <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-shopping-cart"></i> Checkout
                    <small class="float-right">Tanggal: <?= date('d/m/Y') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <br>
                    <b>Batas Bayar:</b> <?= date('d-m-Y H:i:s', mktime(date('H'), date('i'),date('s'),date('m'),date('d') + 1,date('y'))) ?><br>
                    <b>ID Customer:</b> <?= $this->session->userdata('id_customer') ?>
                </div>
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
                        $grand_total=0;
                        $tot_berat = 0;
                        foreach($tampil_keranjang as $items) { 
                            // var_dump($items);
                            $produk = $this->model_produk->detail_barang($items['id_produk']);
                            $berat = $items['qty'] * $produk->berat_produk;

                            $tot_berat = $tot_berat + $berat;
                            ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $items['nama_produk'] ?></td>
                            <td class="text-center"><?php echo $items['qty'] ?></td>
                            <td class="text-center"> <?= $berat ?> Gr </td>
                            <td style="text-align:right">Rp. <?php echo number_format($items['harga'], 0,',','.') ?></td>
                            <td style="text-align:right">Rp. <?php echo number_format($items['total_harga'], 0,',','.') ?></td>
                        </tr>
                        <?php $grand_total = $grand_total + $items['total_harga']; ?>
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
                                <label style="font-weight:bold">Provinsi Asal</label>
                                <select name="provinsi" class="form-control" required>
                                    <option>- Pilih Provinsi -</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight:bold">Kota Asal</label>
                                <select name="kota" class="form-control" required>
                                    <option>-Pilih Kota-</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-weight:bold">Expedisi</label>
                                <select name="expedisi" class="form-control" required>
                                    <option>- Pilih Expedisi -</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-weight:bold">Paket</label>
                                <select name="paket" class="form-control" required>
                                    <option>- Pilih Paket -</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label style="font-weight:bold">Alamat</label>
                                <input type="text" name="alamat" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight:bold">Kode Pos</label>
                                <input name="kode_pos" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight:bold">Nama Penerima</label>
                                <input name="nama_penerima" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight:bold">No Telepon Penerima</label>
                                <input name="no_tlpn_penerima" class="form-control" required>
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
                                    <option value="<?php echo $bnk['nama_bank']; ?>"><?php echo $bnk['nama_bank']; ?></option>
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
                        <td>Rp. <?php echo number_format($grand_total, 0,',','.'); ?></td>
                      </tr>
                      <tr>
                        <th>Berat:</th>
                        <td><?= $tot_berat ?> Gr</td>
                      </tr>
                      <tr>
                        <th>Ongkos Kirim:</th>
                        <td>Rp. <label id="ongkir"></label></td>
                      </tr>
                      <tr>
                        <th>Total Bayar:</th>
                        <td>Rp. <label id="total_bayar"></label></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Simpan Transaksi -->
            <!-- <input name="no_detail" value="<?= $no_detail ?>" hidden> -->
            <input name="id_order" hidden>
            <input name="id_customer" value="<?= $this->session->userdata('id_customer') ?>" hidden>
            <input name="estimasi" hidden>
            <input name="ongkir" hidden>
            <input name="berat" value="<?= $tot_berat ?>" hidden><br>
            <input name="grand_total" value="<?php echo $grand_total ?>" hidden><br>
            <input name="total_bayar" hidden>

            <?php
            foreach ($tampil_keranjang3 as $tk3){
                echo form_hidden('qty'.$tk3['id_produk'], $tk3['qty']);
            }
            ?>

              <!-- end Simpan Transaksi -->
              <div class="row no-print">
                <div class="col-12">
                    <a href="<?= base_url('dashboard/keranjang') ?>" class="btn btn-warning"><i class="fas fa-backward"></i> Kembali ke Keranjang</a>
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-shopping-cart"></i>
                     Proses Checkout
                    </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
    </div>
</div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src=" <?= base_url('new/assets/') ?>lib/easing/easing.min.js"></script>
    <script src=" <?= base_url('new/assets/') ?>lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src=" <?= base_url('new/assets/') ?>js/main.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script> -->

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/vendor/script.js"></script> -->

<!--
MorphSVGPlugin.min.js is a Club GreenSock perk which is not available on a CDN. Download it from your GreenSock account and include it locally like this:

<script src="/[YOUR_DIRECTORY]/MorphSVGPlugin.min.js"></script>

Sign up at GreenSock.com/club.
-->
    <script>
        $(document).ready(function(){
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/provinsi') ?>", 
                success: function(hasil_provinsi) {
                    //console.log(hasil_provinsi);
                    $("select[name=provinsi]").html(hasil_provinsi);
                }
            });
        

            //masukan data ke select kota
            $("select[name=provinsi]").on("change", function(){
                var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('rajaongkir/kota') ?>", 
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_kota) {
                    // console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                    }
                });
            });

            $("select[name=kota]").on("change", function(){
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('rajaongkir/expedisi') ?>", //harus diedit
                    success: function(hasil_expedisi){
                        // console.log(hasil_expedisi);
                        $('select[name=expedisi]').html(hasil_expedisi);
                    }
                });
            });

            $("select[name=expedisi]").on("change", function(){
                //mendapatkan expedisi terpilih
                var expedisi_terpilih = $("select[name=expedisi]").val()
                // mendapatkan id kota tujuan terpilih
                var id_kota_tujuan_terpilih = $("option:selected","select[name=kota]").attr('id_kota')
                // mendapatkan berat produk
                var total_berat = <?= $tot_berat ?>;
                
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('rajaongkir/paket') ?>", //harus diedit
                    data: 'expedisi=' + expedisi_terpilih + '&id_kota='+id_kota_tujuan_terpilih + '&berat=' + total_berat,
                    success: function(hasil_paket){
                        // console.log(hasil_paket);
                        $('select[name=paket]').html(hasil_paket);
                    }
                });
            });


            $("select[name=paket]").on("change", function(){
                // menampilkan ongkir
                var data_ongkir = $("option:selected",this).attr('ongkir')
                // alert(data_ongkir);
                var reverse2 = data_ongkir.toString().split('').reverse().join(''),
                    ribuan_data_ongkir = reverse2.match(/\d{1,3}/g);
                ribuan_data_ongkir = ribuan_data_ongkir.join('.').split('').reverse().join('');
                $("#ongkir").html(ribuan_data_ongkir)

                // menghitung total bayar
                var ongkir = $("option:selected",this).attr('ongkir');
                var total_bayar = parseInt(ongkir) + parseInt(<?php echo $grand_total ?>);
                var reverse = total_bayar.toString().split('').reverse().join(''),
                    ribuan_total_bayar = reverse.match(/\d{1,3}/g);
                ribuan_total_bayar = ribuan_total_bayar.join('.').split('').reverse().join('');
                $("#total_bayar").html(ribuan_total_bayar);

                // estimasi dan ongkir
                var estimasi = $("option:selected",this).attr('estimasi')
                $("input[name=estimasi]").val(estimasi);
                $("input[name=ongkir]").val(data_ongkir);
                $("input[name=total_bayar]").val(total_bayar);
            });

            
        });
    </script>

</body>
</html> 
