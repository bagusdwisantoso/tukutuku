<html>
<head>
</head>
<body>
    
<h3 style="text-align:center; font-size:2.0em;"><?php echo $title ?></h3>
<h3 style="text-align:center; font-size:2.0em;"><?php echo $subtitle ?></h3>
<table width="100%" cellspacing="1" cellpadding="4" align="center" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Pesan</th>
            <th>Produk</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        $grand_total=0;
        foreach($laporan as $lp){
            $grand_total=$grand_total+($lp['harga_produk']*$lp['qty']);
        ?>
        <tr>
            <td style="text-align:center;"><?php echo $no++; ?></td>
            <td style="text-align:center;"><?php echo $lp['tgl_pesan']; ?></td>
            <td><?php echo $lp['nama_produk']; ?></td>
            <td style="text-align:center;"><?php echo $lp['qty']; ?></td>
            <td style="text-align:right;">Rp. <?php echo number_format($lp['harga_produk'], 0,',','.'); ?></td>
            <td style="text-align:right;">Rp. <?php echo number_format($lp['harga_produk']*$lp['qty'], 0,',','.'); ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<h1>Total Pendapatan: Rp. <?php echo number_format($grand_total, 0,',','.') ?></h1>
</body>
</html>