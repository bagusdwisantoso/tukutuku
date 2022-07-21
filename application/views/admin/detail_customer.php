<div class="container-fluid">

    <div class="card">
        <h5 class="card-header">Detail Customer</h5>
        <div class="card-body">

            <?php foreach($customer as $cstmr): ?>
            <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td>Nama Customer</td>
                        <td><strong><?php echo $cstmr->nama_customer ?></strong></td>
                    </tr>

                    <tr>
                        <td>Jenis Kelamin Pemilik</td>
                        <td><strong><?php echo $cstmr->jenis_kelamin_customer ?></strong></td>
                    </tr>

                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><strong><?php echo $cstmr->tanggal_lahir_customer ?></strong></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td><strong><?php echo $cstmr->email_customer ?></strong></td>
                    </tr>

                    <tr>
                        <td>Alamat</td>
                        <td><strong><?php echo $cstmr->alamat_customer ?></strong></td>
                    </tr>

                    <tr>
                        <td>No Tlpn</td>
                        <td><strong><?php echo $cstmr->no_tlpn_customer ?></strong></td>
                    </tr>

                    <tr>
                        <td>Tanggal Daftar</td>
                        <td><strong><?php echo $cstmr->tanggal_daftar_customer ?></strong></td>
                    </tr>
                </table>
                
                <?php echo anchor(base_url('admin/customer'),'<div class="btn btn-sm btn-danger">Kembali</div>') ?>
            </div>

            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>