<?php echo form_open('dashboard/update'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div style="text-align:left">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-sync-alt"></i> Update Keranjang</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table text-gray-900">
            <table class="table table-bordered text-gray-900" id="table1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th width="100px" style="text-align:left">QTY</th>
                        <th style="text-align:right">Harga</th>
                        <th style="text-align:right">Sub-Total</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <tr>    
                        <td> <?php echo $items['name']; ?></td>
                        <td><?php
                            foreach($this->model_app->qty($items['id']) as $kuant): ?>
                            <?php
                            echo form_input(array('name' => $i.'[qty]',
                                'value' => $items['qty'],
                                'maxlength' => '3',
                                'min'   => '0',
                                'max'   => $kuant['stok_produk'],
                                'size' => '5',
                                'type' => 'number',
                                'class' => 'form-control'
                                ));
                            ?>
                            <?php endforeach; ?>
                    
                        </td>
                        
                        <td style="text-align:right">Rp. <?php echo number_format($items['price'], 0,',','.') ?></td>
                        <td style="text-align:right">Rp. <?php echo number_format($items['subtotal'], 0,',','.') ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('dashboard/delete/'.$items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                    <tr>
                        <td colspan="2"> </td>
                        <td class="right"><h5><b>Total</b></h5></td>
                        <td class="right" colspan="2"><h5><b>Rp. <?php echo number_format($this->cart->total(), 0,',','.') ?></b></h5></td>
                    </tr>
            </table>
            <?php echo form_close(); ?>
            <br><br>
            <div style="text-align:right">
                <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>">
                <div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Kosongkan Keranjang</div></a>
                <a href="<?php echo base_url('welcome') ?>">
                <div class="btn btn-sm btn-primary"><i class="fa fa-cart-plus"></i> Lanjutkan Belanja</div></a>
                <a href="<?php echo base_url('dashboard/pembayaran') ?>">
                <a href="<?php echo base_url('dashboard/checkout') ?>">
                <div class="btn btn-sm btn-success "><i class="fa fa-credit-card"></i> Checkout</div></a>
            </div>
        </div>
    </div>
</div>