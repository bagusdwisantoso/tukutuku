<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
    <p class="mb-4">Menampilkan Data Laporan Toko <b><?php echo $this->session->userdata('nama_toko') ?></b></a>.</p>


    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary shadow mb-4">
                <div class="card-header">
                    <h5 class="card-tittle">Laporan per Tanggal</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url(); ?>toko/laporan/print_laporan" method="POST" target='_blank'>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="nilai" value="1">
                                    <label><b>Dari Tanggal:</b></label>
                                    <input type="date" name="awal" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><b>Sampai Tanggal:</b></label>
                                    <input type="date" name="akhir" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <button type="submit" name="print" value="excel" class="btn btn-success"><i class="fas fa-download"></i> Excel</button>
                                    <button type="submit" name="print" value="pdf" class="btn btn-danger"><i class="fas fa-download"></i> PDF</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-primary shadow mb-4">
                <div class="card-header">
                    <h5 class="card-tittle">Laporan per Bulan</h5>
                </div>
                <div class="card-body">
                <form action="<?php echo base_url(); ?>toko/laporan/print_laporan" method="POST" target='_blank'>
                    <input type="hidden" name="nilai" value="2">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Pilih Tahun:</label>
                                <select name="tahun" class="form-control" required>
                                    <?php foreach($tahun as $row): ?>
                                        <option value="<?php echo $row->Tahun ?>"><?php echo $row->Tahun ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
 
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Dari Bulan:</label>
                                <select name="bulanawal" class="form-control" required>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Sampai Bulan:</label>
                                <select name="bulanakhir" class="form-control" required>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" name="print" value="excel" class="btn btn-success"><i class="fas fa-download"></i> Excel</button>
                            <button type="submit" name="print" value="pdf" class="btn btn-danger"><i class="fas fa-download"></i> PDF</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>
</div>