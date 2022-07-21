<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow-sm mb-4 text-center">
        <div class="card-body">
            <img class="img-profile rounded-circle"
                src="<?php echo base_url('img/foto_toko/').$this->session->userdata('foto_toko') ?>" style="width: 70px;">
            <h1 class="h5 mb-0 text-gray-800 card-title text-center">Hi, Selamat Datang!</h1>
            <h3 class="text-gray-800 card-title text-center"><?php echo $this->session->userdata('nama_toko') ?></h3>
        </div>
    </div>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h3 class="h3 mb-0 text-gray-800">Produk Terlaris</h3>
            <div class='row text-center mt-4'>
                <?php foreach ($terlaris as $laris) :?>
                    <div class='card shadow-sm ml-auto mr-auto mb-4 d-flex justify-content-center' style='width: 10rem;'>
                        <img src="<?php echo base_url('img/gambar_produk/').$laris['gambar_produk']?>" class='card-img-top'>
                        <div class='card-body'>
                            <h6 class='card-title mb-1'><?php echo $laris['nama_produk']; ?></h6>
                        </div>
                        <div class='card-footer bg-white'>
                            <p class='card-text text-start'>
                                <b>Terjual <?php echo $laris['Terjual']; ?> pcs</b>
                            </p>     
                        </div>                              
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h3 class="h3 mb-0 text-gray-800">Ringkasan Statistik Pendapatan</h3><br>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pendapatan <b>HARI</b> Ini
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php foreach($pendapatan_harian as $hari) : ?>
                                            Rp<?php echo number_format($hari['SUM(grand_total)'], 0,',','.') ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pendapatan <b>BULAN</b> Ini
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php foreach($pendapatan_bulan as $bulan) : ?>
                                            Rp<?php echo number_format($bulan['SUM(grand_total)'], 0,',','.') ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Pendapatan <b>TAHUN</b> ini
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php foreach($pendapatan_tahun as $tahun) : ?>
                                            Rp<?php echo number_format($tahun['SUM(grand_total)'], 0,',','.') ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h3 class="h3 mb-0 text-gray-800">Grafik Pendapatan</h3><br>
            <div class="row">
                <!-- Area Chart -->
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-danger">Grafik Pendapatan</h6>
                        </div>
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <?php
                                    /* Mengambil query report*/
                                    foreach($grafik as $result){
                                        $bulan[] = $result->Bulan; //ambil bulan
                                        $value[] = (integer) $result->Pendapatan; //ambil nilai
                                    }
                                    /* end mengambil query*/ 
                                ?>
                                <div id="areachart"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div><!-- End Of row-->
        </div>
    </div>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h3 class="h3 mb-0 text-gray-800">Ringkasan Statistik Produk</h3><br>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Jumlah Produk
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php foreach($jumlah_produk as $jum) : ?>
                                            <?php echo $jum['Jumlah'] ?> produk
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Produk Terverifikasi
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php foreach($produk_verif as $jum) : ?>
                                            <?php echo $jum['Jumlah'] ?> produk
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Produk Menunggu Verifikasi
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php foreach($produk_unverif as $belum) : ?>
                                            <?php echo $belum['Jumlah'] ?> produk
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Produk Sedang diPublish
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php foreach($produk_publish as $publish) : ?>
                                            <?php echo $publish['Jumlah'] ?> produk
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2021 TukuTuku Dev Operation Team</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Highchart -->
<script src="<?php echo base_url() ?>new/assets/js/highcharts/highcharts.js"></script>
<script src="<?php echo base_url() ?>new/assets/js/highcharts/exporting.js"></script>
<script src="<?php echo base_url() ?>new/assets/js/highcharts/variable-pie.js"></script>
<script src="<?php echo base_url() ?>new/assets/js/highcharts/export-data.js"></script>
<script src="<?php echo base_url() ?>new/assets/js/highcharts/accessibility.js"></script>
    
<script type="text/javascript">
    Highcharts.chart('areachart', {
        title: {
            text: 'Grafik Pendapatan per Bulan',
            style: {
                fontFamily: 'Poppins, sans-serif'
            }
        },
        xAxis: {
            categories: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            plotBands: [{ // visualize the weekend
                color: 'rgba(68, 170, 213, .2)'
            }]
        },
        yAxis: {
            labels: {
                format: '{value}'
            },
            title: {
                text: 'Pendapatan (Rp)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
            pointFormat: '<tr><td style="padding:0"><b>Rp {point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true,
            style: {
                fontFamily: 'Poppins, sans-serif'
            }
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            data: <?php echo json_encode($value);?>,
        }]
        

    });
</script>
<script class="text/javascript">
    Highcharts.chart('barchart', {
        chart: {
            type: 'column'
        },

        title: {
            text: 'Total Pendapatan per Kategori',
            style: {
                fontFamily: 'Poppins, sans-serif'
            }
        },
        xAxis: {
            categories: <?php echo json_encode($ktgr);?>,
        },
        yAxis: {
            min: 0,
            labels: {
                format: '{value}'
            },
            title: {
                text: 'Total pendapatan (Rp)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            shared: true,
            headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
            pointFormat: ': <b>Rp {point.y}</b>',
            style: {
                fontFamily: 'Poppins, sans-serif'
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            colorByPoint: true,
            name:'Total Pendapatan',
            data: <?php echo json_encode($pendapatan);?>,
        }]
    });            
</script>

<script class="text/javascript">
    Highcharts.chart('piechart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Persentase Penjualan per Kategori',
            style: {
                fontFamily: 'Poppins, sans-serif'
            }
        },
        tooltip: {
            pointFormat: '<b>{point.percentage:.1f}%</b>',
            style: {
                fontFamily: 'Poppins, sans-serif'
            }
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: false
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: <?php echo json_encode($baru);?>,
        }]
    });
</script>
    

                   

                   