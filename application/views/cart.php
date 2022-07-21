<!-- <?php echo form_open('dashboard/update'); ?> -->
<form method="post" action="<?php echo base_url().'dashboard/update_keranjang/'?>">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div style="text-align:left">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-sync-alt"></i> Update Keranjang</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table text-gray-900">
            <?php foreach($pertoko as $tk) : ?>
                <h4 class="h4 mb-2 text-gray-800"><br>Nama Toko: <?php echo $tk['nama_toko'] ?></h4>
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th width="100px" style="text-align:left">QTY</th>
                        <th style="text-align:right" width="150px">Harga</th>
                        <th style="text-align:right" width="150px">Sub-Total</th>
                        <th class="text-center" width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $grand_total = 0;
                        ?>
                
                    <?php foreach ($tampil_keranjang as $items){ ?>
                        <?php if ($items['id_toko'] == $tk['id_toko']) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>
                            <p><a href="#"><img src="<?= base_url('img/gambar_produk/') . $items['gambar_produk']; ?>" alt="Image" style="width: 100px; height: 100px;"></a>
                            <?= $items['nama_produk']  ?></p>
                        </td>
                        <td>
                            
                            <input type="number" name="<?php echo $items['id_keranjang']?>qty" value="<?php echo $items['qty'] ?>" min="1" max="<?php echo $items['stok_produk']; ?>">
                        </td>
                        
                        <td style="text-align:right">Rp. <?php echo number_format($items['harga'], 0,',','.') ?></td>
                        <td style="text-align:right"><span id="total_harga_<?= $items['id_keranjang']; ?>">Rp. <?= number_format($items['total_harga'], 0, ',', '.') ?></span> </td>
                        <td class="text-center">
                            
                            <a href=" <?= base_url('dashboard/hapus_item_keranjang/') . $items['id_keranjang']; ?> "><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php 
                    $grand_total = $grand_total + $items['total_harga']; ?>
                <?php 
                }else{}
                    }
                     ?>
                </tbody>
                    <tr>
                        <td colspan="2"> </td>
                        <td class="right"><h5><b>Total</b></h5></td>
                        <td class="right" colspan="2"><h5><b>Rp. <?php echo number_format($grand_total, 0,',','.') ?></b></h5></td>
                    </tr>
            </table>
            <div style="text-align:right">
                        <a href="<?php echo base_url('dashboard/checkout/').$tk['id_toko'] ?>">
                        <div class="btn btn-sm btn-success "><i class="fa fa-credit-card"></i> Checkout</div></a>
                    </div>
            <?php endforeach; ?>
            <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-sync-alt"></i></button> -->
            </form>
            <!-- <?php echo form_close(); ?> -->
            <br><br>
            <div style="text-align:right">
                <!-- <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>">
                <div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Kosongkan Keranjang</div></a> -->
                <a href="<?php echo base_url('welcome') ?>">
                <div class="btn btn-sm btn-primary"><i class="fa fa-cart-plus"></i> Lanjutkan Belanja</div></a>
            </div>
        </div>
    </div>
</div>