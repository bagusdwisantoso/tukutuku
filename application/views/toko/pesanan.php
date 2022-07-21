<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Pesanan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Dikemas" role="tab" aria-controls="#Dikemas" aria-selected="true">Dikemas ( <?php echo $jumlah3 ?> )</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Dikirim" role="tab" aria-controls="#Dikirim" aria-selected="false">Dikirim ( <?php echo $jumlah4 ?> )</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Selesai" role="tab" aria-controls="#Selesai" aria-selected="false">Selesai ( <?php echo $jumlah5 ?> )</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="Dikemas" role="tabpanel" aria-labelledby="home-tab">
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
                                                <td><?php echo $inv3['tgl_pesan'] ?></td>
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
                                                    <a class='btn btn-info btn-sm' href='<?php echo base_url('toko/pesanan/detail/').$inv3['id_order'] ?>'><span class='fas fa-info-circle'></span></a>
                                                    <!-- Button trigger modal -->
                                                    <button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#dikirim<?php echo $inv3['id_order'] ?>'>
                                                    Dikirim
                                                    </button>
                                                </td>

                                                <!-- Modal Dikirim -->
                                                <div class='modal fade' id='dikirim<?php echo $inv3['id_order'] ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='exampleModalLongTitle'>Status ID Order #<?php echo $inv3['id_order'] ?> </h5>
                                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                Ubah Status ID Order #<?php echo $inv3['id_order'] ?> Menjadi Dikirim?
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                                                                <a class='btn btn-primary' href='<?php echo base_url('toko/pesanan/dikirim/').$inv3['id_order'] ?>'>Dikirim</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </tr>
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
                                            <th width="100px">Expedisi</th>
                                            <th>Tagihan</th>
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
                                                <td>
                                                    <span class='badge badge-info text-light'>Dikirim</span>
                                                </td>
                                                <td>
                                                    <a class='btn btn-info btn-sm' href='<?php echo base_url('toko/pesanan/detail/').$inv4['id_order'] ?>'><span class='fas fa-info-circle'></span></a>
                                                </td>
                                            </tr>
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
                                            <th width="100px">Expedisi</th>
                                            <th>Tagihan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoice5 as $inv5): ?>
                                            <tr>
                                                <td><?php echo $inv5['id_order'] ?></td>
                                                <td><?php echo $inv5['tgl_pesan'] ?> </td>
                                                <td>
                                                    <b><?php echo $inv5['expedisi'] ?></b><br>
                                                    Paket : <?php echo $inv5['paket'] ?><br>
                                                    Estimasi : <?php echo $inv5['estimasi'] ?><br>
                                                    Ongkir : Rp. <?php echo number_format($inv5['ongkir'], 0,',','.') ?>
                                                </td>
                                                <td>Rp. <?php echo number_format($inv5['total_bayar'], 0,',','.') ?> </td>
                                                <td>
                                                    <span class='badge badge-success text-light'>Selesai</span>
                                                </td>
                                                <td>
                                                    <a class='btn btn-info btn-sm' href='<?php echo base_url('toko/pesanan/detail/').$inv5['id_order'] ?>'><span class='fas fa-info-circle'></span></a>
                                                </td>
                                            </tr>
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