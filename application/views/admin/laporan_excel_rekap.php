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
            <th>Nama Toko</th>
            <th>Nama Owner</th>
            <th>Kontak</th>
            <th>Pendapatan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        $total_pendapatan = 0;
        foreach($laporan as $lp){
            // $total_pendapatan = $total_pendapatan + $lp['pendapatan'];
        ?>
        <tr>
            <td style="text-align:center;"><?php echo $no++; ?></td>
            <td style="text-align:left;"><?php echo $lp['nama_toko']; ?></td>
            <td style="text-align:left;"><?php echo $lp['nama_owner']; ?></td>
            <td style="text-align:justify;">
                <p><b>Email:</b> <?php echo $lp['email']; ?><br>
                <b>No Hp:</b> <?php echo $lp['no_telp_owner']; ?></p>
            </td>
            <td style="text-align:right;">Rp. <?php echo number_format($lp['pendapatan'], 0,',','.'); ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<h1>Total Pendapatan: Rp. <?php echo number_format($total_pendapatan, 0,',','.') ?></h1>
</body>
</html>