<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Pesanan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#BelumBayar" role="tab" aria-controls="#BelumBayar" aria-selected="true">Belum Bayar ( <?php echo $jumlah ?> )</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#VerifikasiPembayaran" role="tab" aria-controls="#VerifikasiPembayaran" aria-selected="false">Verifikasi Pembayaran ( <?php echo $jumlah2 ?> )</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Dikemas" role="tab" aria-controls="#Dikemas" aria-selected="false">Dikemas ( <?php echo $jumlah3 ?> )</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Dikirim" role="tab" aria-controls="#Dikirim" aria-selected="false">Dikirim ( <?php echo $jumlah4 ?> )</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Selesai" role="tab" aria-controls="#Selesai" aria-selected="false">Selesai ( <?php echo $jumlah5 ?> )</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="BelumBayar" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tgl Pemesanan</th>
                                            <th>Expedisi</th>
                                            <th>Tagihan</th>
                                            <th>Batas Pembayaran</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($invoice as $inv): ?>
                                        <tr>
                                            <td><?php echo $inv['id_order'] ?></td>
                                            <td><?php echo $inv['tgl_pesan'] ?> </td>
                                            <td>
                                                <b><?php echo $inv['expedisi'] ?></b><br>
                                                Paket : <?php echo $inv['paket'] ?><br>
                                                Estimasi : <?php echo $inv['estimasi'] ?><br>
                                                Ongkir : Rp. <?php echo number_format($inv['ongkir'], 0,',','.') ?>
                                            </td>
                                            <td>Rp. <?php echo number_format($inv['total_bayar'], 0,',','.') ?> </td>
                                            <td><?php echo $inv['batas_bayar'] ?> </td>
                                            <td>
                                                <span class='badge badge-secondary text-light'>Menunggu Pembayaran</span>
                                            </td>
                                            <td>
                                                <a class='btn btn-info btn-sm' href='<?php echo base_url('admin/invoice/detail/').$inv['id_order'] ?>'><span class='fas fa-info-circle'></span></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="VerifikasiPembayaran" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card shadow mb-4"> 
                        <div class="card-body">
                            <div class="table2">
                                <table class="table table-bordered" id="table2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tgl Pemesanan</th>
                                            <th>Expedisi</th>
                                            <th>Tagihan</th>
                                            <th>Batas Pembayaran</th>
                                            <th>Status</th>
                                            <th width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoice2 as $inv2): ?>
                                        <tr>
                                            <td><?php echo $inv2['id_order'] ?></td>
                                            <td><?php echo $inv2['tgl_pesan'] ?> </td>
                                            <td>
                                                <b><?php echo $inv2['expedisi'] ?></b><br>
                                                Paket : <?php echo $inv2['paket'] ?><br>
                                                Estimasi : <?php echo $inv2['estimasi'] ?><br>
                                                Ongkir : Rp. <?php echo number_format($inv2['ongkir'], 0,',','.') ?>
                                            </td>
                                            <td>Rp. <?php echo number_format($inv2['total_bayar'], 0,',','.') ?> </td>
                                            <td><?php echo $inv2['batas_bayar'] ?> </td>
                                            <td>
                                                <span class='badge badge-primary text-light'>Menunggu Verifikasi</span>
                                            </td>
                                            <td>
                                                <!-- Button trigger modal LIHAT BUKTI BAYAR -->
                                                <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#staticBackdrop<?php echo $inv2['id_order'] ?>'>
                                                <i class='fas fa-eye'></i>
                                                </button>
                                                <a class='btn btn-info btn-sm' href='<?php echo base_url('admin/invoice/detail/').$inv2['id_order'] ?>'><span class='fas fa-info-circle'></span></a>
                                                <!-- Button trigger modal VERIFIKASI -->
                                                <button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#verifikasi<?php echo $inv2['id_order'] ?>'>
                                                Verifikasi
                                                </button>
                                            </td>
                                            <!-- Modal Verifikasi -->
                                            <div class='modal fade' id='verifikasi<?php echo $inv2['id_order'] ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='exampleModalLongTitle'>Verifikasi pembayaran ID Order #<?php echo $inv2['id_order'] ?> </h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            Apakah Pembayaran ID Order #<?php echo $inv2['id_order'] ?> Sudah Benar?
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                                                            <a class='btn btn-primary' href='<?php echo base_url('admin/invoice/verifikasi_pembayaran/').$inv2['id_order'] ?>'>Verifikasi</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                        <!-- Modal -->
                                        <div class='modal fade' id='staticBackdrop<?php echo $inv2['id_order'] ?>' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered'>
                                                <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='staticBackdropLabel'>Bukti Bayar</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                    <div class='row'>
                                                        <div class='col-sm-6'>
                                                            <img src='<?php echo base_url('assets/bukti_bayar/').$inv2['bukti_bayar'] ?>' class='img-thumbnail'>
                                                        </div>

                                                        <div class='col-sm-6'>
                                                            <div class='form-group'>
                                                                <label style='font-weight:bold'>Nama Bank</label>
                                                                <input value='<?php echo $inv2['nama_bank'] ?>' class='form-control' readonly>
                                                            </div>

                                                            <div class='form-group'>
                                                                <label style='font-weight:bold'>No Rekening</label>
                                                                <input value='<?php echo $inv2['no_rek'] ?>' class='form-control' readonly>
                                                            </div>

                                                            <div class='form-group'>
                                                                <label style='font-weight:bold'>Atas Nama</label>
                                                                <input value='<?php echo $inv2['atas_nama'] ?>' class='form-control' readonly>
                                                            </div>
                                                            
                                                            <label style='font-weight:bold'>Total Bayar</label>
                                                            <div class='input-group flex-nowrap'>
                                                                
                                                                <div class='input-group-prepend'>
                                                                    <span class='input-group-text' id='addon-wrapping'>Rp.</span>
                                                                </div>
                                                                    <input type='text' name='harga' value='<?php echo number_format($inv2['total_bayar'], 0,',','.') ?>' class='form-control' aria-label='harga' aria-describedby='addon-wrapping' readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="Dikemas" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table3">
                                <table class="table table-bordered" id="table3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tgl Pemesanan</th>
                                            <th>Expedisi</th>
                                            <th>Tagihan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoice3 as $inv3): ?>
                                            <tr>
                                                <td><?php echo $inv3['id_order'] ?></td>
                                                <td><?php echo $inv3['tgl_pesan'] ?> </td>
                                                <td>
                                                    <b><?php echo $inv3['expedisi'] ?></b><br>
                                                    Paket : <?php echo $inv3['paket'] ?><br>
                                                    Estimasi : <?php echo $inv3['estimasi'] ?><br>
                                                    Ongkir : Rp. <?php echo number_format($inv3['ongkir'], 0,',','.') ?>
                                                </td>
                                                <td>Rp. <?php echo number_format($inv3['total_bayar'], 0,',','.') ?> </td>
                                                <td>
                                                    <span class='badge badge-danger text-light'>Dikemas</span>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#staticBackdrop<?php echo $inv3['id_order'] ?>'>
                                                    <i class='fas fa-eye'></i>
                                                    </button>
                                                    <a class='btn btn-info btn-sm' href='<?php echo base_url('admin/invoice/detail/').$inv3['id_order'] ?>'><span class='fas fa-info-circle'></span></a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class='modal fade' id='staticBackdrop<?php echo $inv3['id_order'] ?>' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered'>
                                                    <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='staticBackdropLabel'>Bukti Bayar</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='row'>
                                                            <div class='col-sm-6'>
                                                                <img src='<?php echo base_url('assets/bukti_bayar/').$inv3['bukti_bayar'] ?>' class='img-thumbnail'>
                                                            </div>

                                                            <div class='col-sm-6'>
                                                                <div class='form-group'>
                                                                    <label style='font-weight:bold'>Nama Bank</label>
                                                                    <input value='<?php echo $inv3['nama_bank'] ?>' class='form-control' readonly>
                                                                </div>

                                                                <div class='form-group'>
                                                                    <label style='font-weight:bold'>No Rekening</label>
                                                                    <input value='<?php echo $inv3['no_rek'] ?>' class='form-control' readonly>
                                                                </div>

                                                                <div class='form-group'>
                                                                    <label style='font-weight:bold'>Atas Nama</label>
                                                                    <input value='<?php echo $inv3['atas_nama'] ?>' class='form-control' readonly>
                                                                </div>
                                                                
                                                                <label style='font-weight:bold'>Total Bayar</label>
                                                                <div class='input-group flex-nowrap'>
                                                                    
                                                                    <div class='input-group-prepend'>
                                                                        <span class='input-group-text' id='addon-wrapping'>Rp.</span>
                                                                    </div>
                                                                        <input type='text' name='harga' value='<?php echo number_format($inv3['total_bayar'], 0,',','.') ?>' class='form-control' aria-label='harga' aria-describedby='addon-wrapping' readonly>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="Dikirim" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table4">
                                <table class="table table-bordered" id="table4" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tgl Pemesanan</th>
                                            <th>Expedisi</th>
                                            <th>Tagihan</th>
                                            <th>Tanggal Kirim</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoice4 as $inv4): ?>
                                            <tr>
                                                <td><?php echo $inv4['id_order'] ?></td>
                                                <td><?php echo $inv4['tgl_pesan'] ?> </td>
                                                <td>
                                                    <b><?php echo $inv4['expedisi'] ?></b><br>
                                                    Paket : <?php echo $inv4['paket'] ?><br>
                                                    Estimasi : <?php echo $inv4['estimasi'] ?><br>
                                                    Ongkir : Rp. <?php echo number_format($inv4['ongkir'], 0,',','.') ?>
                                                </td>
                                                <td>Rp. <?php echo number_format($inv4['total_bayar'], 0,',','.') ?> </td>
                                                <td><?php echo $inv4['tanggal_kirim'] ?> </td>
                                                <td>
                                                    <span class='badge badge-info text-light'>Dikirim</span>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#staticBackdrop<?php echo $inv4['id_order'] ?>'>
                                                        <i class='fas fa-eye'></i>
                                                    </button>
                                                    <a class='btn btn-info btn-sm' href='<?php echo base_url('admin/invoice/detail/').$inv4['id_order'] ?>'><span class='fas fa-info-circle'></span></a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class='modal fade' id='staticBackdrop<?php echo $inv4['id_order'] ?>' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered'>
                                                    <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='staticBackdropLabel'>Bukti Bayar</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='row'>
                                                            <div class='col-sm-6'>
                                                                <img src='<?php echo base_url('assets/bukti_bayar/').$inv4['bukti_bayar'] ?>' class='img-thumbnail'>
                                                            </div>

                                                            <div class='col-sm-6'>
                                                                <div class='form-group'>
                                                                    <label style='font-weight:bold'>Nama Bank</label>
                                                                    <input value='<?php echo $inv4['nama_bank'] ?>' class='form-control' readonly>
                                                                </div>

                                                                <div class='form-group'>
                                                                    <label style='font-weight:bold'>No Rekening</label>
                                                                    <input value='<?php echo $inv4['no_rek'] ?>' class='form-control' readonly>
                                                                </div>

                                                                <div class='form-group'>
                                                                    <label style='font-weight:bold'>Atas Nama</label>
                                                                    <input value='<?php echo $inv4['atas_nama'] ?>' class='form-control' readonly>
                                                                </div>
                                                                
                                                                <label style='font-weight:bold'>Total Bayar</label>
                                                                <div class='input-group flex-nowrap'>
                                                                    
                                                                    <div class='input-group-prepend'>
                                                                        <span class='input-group-text' id='addon-wrapping'>Rp.</span>
                                                                    </div>
                                                                        <input type='text' name='harga' value='<?php echo number_format($inv4['total_bayar'], 0,',','.') ?>' class='form-control' aria-label='harga' aria-describedby='addon-wrapping' readonly>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="Selesai" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table5">
                                <table class="table table-bordered" id="table5" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tgl Pemesanan</th>
                                            <th>Expedisi</th>
                                            <th>Tagihan</th>
                                            <th>Tanggal Kirim</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoice5 as $inv5): ?>
                                            <tr>
                                                <td><?php echo $inv5['id_order'] ?></td>
                                                <td><?php echo $inv5['tgl_pesan'] ?></td>
                                                <td>
                                                    <b><?php echo $inv5['expedisi'] ?></b><br>
                                                    Paket : <?php echo $inv5['paket'] ?><br>
                                                    Estimasi : <?php echo $inv5['estimasi'] ?><br>
                                                    Ongkir : Rp. <?php echo number_format($inv5['ongkir'], 0,',','.') ?>
                                                </td>
                                                <td>Rp. <?php echo number_format($inv5['total_bayar'], 0,',','.') ?> </td>
                                                <td><?php echo $inv5['tanggal_kirim'] ?> </td>
                                                <td>
                                                    <span class='badge badge-success text-light'>Selesai</span>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#staticBackdrop<?php echo $inv5['id_order'] ?>'>
                                                        <i class='fas fa-eye'></i>
                                                    </button>
                                                    <a class='btn btn-info btn-sm' href='<?php echo base_url('admin/invoice/detail/').$inv5['id_order'] ?>'><span class='fas fa-info-circle'></span></a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class='modal fade' id='staticBackdrop<?php echo $inv5['id_order'] ?>' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered'>
                                                    <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='staticBackdropLabel'>Bukti Bayar</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='row'>
                                                            <div class='col-sm-6'>
                                                                <img src='<?php echo base_url('assets/bukti_bayar/').$inv5['bukti_bayar'] ?>' class='img-thumbnail'>
                                                            </div>

                                                            <div class='col-sm-6'>
                                                                <div class='form-group'>
                                                                    <label style='font-weight:bold'>Nama Bank</label>
                                                                    <input value='<?php echo $inv5['nama_bank'] ?>' class='form-control' readonly>
                                                                </div>

                                                                <div class='form-group'>
                                                                    <label style='font-weight:bold'>No Rekening</label>
                                                                    <input value='<?php echo $inv5['no_rek'] ?>' class='form-control' readonly>
                                                                </div>

                                                                <div class='form-group'>
                                                                    <label style='font-weight:bold'>Atas Nama</label>
                                                                    <input value='<?php echo $inv5['atas_nama'] ?>' class='form-control' readonly>
                                                                </div>
                                                                
                                                                <label style='font-weight:bold'>Total Bayar</label>
                                                                <div class='input-group flex-nowrap'>
                                                                    
                                                                    <div class='input-group-prepend'>
                                                                        <span class='input-group-text' id='addon-wrapping'>Rp.</span>
                                                                    </div>
                                                                        <input type='text' name='harga' value='<?php echo number_format($inv5['total_bayar'], 0,',','.') ?>' class='form-control' aria-label='harga' aria-describedby='addon-wrapping' readonly>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>