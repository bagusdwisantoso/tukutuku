<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Invoice</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#BelumDiproses" role="tab" aria-controls="#BelumDiproses" aria-selected="true">Belum Diproses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#BarangDikemas" role="tab" aria-controls="#BarangDikemas" aria-selected="false">Barang Dikemas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#BarangDikirim" role="tab" aria-controls="#BarangDikirim" aria-selected="false">Barang Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Selesai" role="tab" aria-controls="#Selesai" aria-selected="false">Selesai</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="MenungguPembayaran" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-body">
                        <div class="table">
                            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Invoice</th>
                                        <th>Nama Pemesan</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Batas Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($invoice as $inv): ?>
                                    <?php if ($inv['status'] == 'Menunggu Pembayaran'){echo"
                                    <tr>
                                        <td>".$inv['id']."</td>
                                        <td>".$inv['nama']." </td>
                                        <td>".$inv['alamat']." </td>
                                        <td>".$inv['tgl_pesan']." </td>
                                        <td>".$inv['batas_bayar']." </td>
                                        <td>
                                            <h5><span class='badge bg-secondary text-light'>".$inv['status']."</span></h5>
                                        </td>
                                        <td>
                                            <a class='btn btn-info btn-sm' href='".base_url('admin/invoice/detail/').$inv['id']."'><span class='fas fa-edit'></span></a>
                                        </td>
                                    </tr>
                                    ";} else{}?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="PembayaranTerkonfirmasi" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card-body">
                        <div class="table">
                            <table class="table table-bordered" id="table2" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Invoice</th>
                                        <th>Nama Pemesan</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Batas Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($invoice as $inv): ?>
                                    <?php if ($inv['status'] == 'Pembayaran Terkonfirmasi'){echo"
                                    <tr>
                                        <td>".$inv['id']."</td>
                                        <td>".$inv['nama']." </td>
                                        <td>".$inv['alamat']." </td>
                                        <td>".$inv['tgl_pesan']." </td>
                                        <td>".$inv['batas_bayar']." </td>
                                        <td>
                                            <h5><span class='badge bg-primary text-light'>".$inv['status']."</span></h5>
                                        </td>
                                        <td>
                                            <a class='btn btn-info btn-sm' href='".base_url('admin/invoice/detail/').$inv['id']."'><span class='fas fa-edit'></span></a>
                                        </td>
                                    </tr>
                                    ";} else{}?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="BarangDikemas" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card-body">
                        <div class="table">
                            <table class="table table-bordered" id="table3" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Invoice</th>
                                        <th>Nama Pemesan</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Batas Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($invoice as $inv): ?>
                                    <?php if ($inv['status'] == 'Barang Dikemas'){echo"
                                    <tr>
                                        <td>".$inv['id']."</td>
                                        <td>".$inv['nama']." </td>
                                        <td>".$inv['alamat']." </td>
                                        <td>".$inv['tgl_pesan']." </td>
                                        <td>".$inv['batas_bayar']." </td>
                                        <td>
                                            <h5><span class='badge bg-warning text-light'>".$inv['status']."</span></h5>
                                        </td>
                                        <td>
                                            <a class='btn btn-info btn-sm' href='".base_url('admin/invoice/detail/').$inv['id']."'><span class='fas fa-edit'></span></a>
                                        </td>
                                    </tr>
                                    ";} else{}?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="BarangDikirim" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card-body">
                        <div class="table">
                            <table class="table table-bordered" id="table4" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Invoice</th>
                                        <th>Nama Pemesan</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Batas Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($invoice as $inv): ?>
                                    <?php if ($inv['status'] == 'Barang Dikirim'){echo"
                                    <tr>
                                        <td>".$inv['id']."</td>
                                        <td>".$inv['nama']." </td>
                                        <td>".$inv['alamat']." </td>
                                        <td>".$inv['tgl_pesan']." </td>
                                        <td>".$inv['batas_bayar']." </td>
                                        <td>
                                            <h5><span class='badge bg-info text-light'>".$inv['status']."</span></h5>
                                        </td>
                                        <td>
                                            <a class='btn btn-info btn-sm' href='".base_url('admin/invoice/detail/').$inv['id']."'><span class='fas fa-edit'></span></a>
                                        </td>
                                    </tr>
                                    ";} else{}?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="Selesai" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card-body">
                        <div class="table">
                            <table class="table table-bordered" id="table5" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Invoice</th>
                                        <th>Nama Pemesan</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Batas Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($invoice as $inv): ?>
                                    <?php if ($inv['status'] == 'Selesai'){echo"
                                    <tr>
                                        <td>".$inv['id']."</td>
                                        <td>".$inv['nama']." </td>
                                        <td>".$inv['alamat']." </td>
                                        <td>".$inv['tgl_pesan']." </td>
                                        <td>".$inv['batas_bayar']." </td>
                                        <td>
                                            <h5><span class='badge bg-success text-light'>".$inv['status']."</span></h5>
                                        </td>
                                        <td>
                                            <a class='btn btn-info btn-sm' href='".base_url('admin/invoice/detail/').$inv['id']."'><span class='fas fa-edit'></span></a>
                                        </td>
                                    </tr>
                                    ";} else{}?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</div>

<div class="container-fluid">
    <h4>Invoice Pemesanan Produk</h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID Invoice</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Aksi</th>
        </tr>
    
        <?php foreach ($invoice as $inv): ?>
            <tr>
                <td><?php echo $inv->id ?></td>
                <td><?php echo $inv->nama ?></td>
                <td><?php echo $inv->alamat ?></td>
                <td><?php echo $inv->tgl_pesan ?></td>
                <td><?php echo $inv->batas_bayar ?></td>
                <td><?php echo anchor('toko/invoice/detail/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>