<div class="container-fluid">
    <h3><i class="fas fa-edit mb-4"></i> EDIT DATA customer</h3>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table">
                <?php foreach($customer as $cstmr) : ?>

                    <form method="post" action="<?php echo base_url().'admin/data_customer/update' ?>">
                    <div class="row mb-1">
                            <label class="col-sm-1 col-form-label">Nama customer</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_customer" class="form-control" value="<?php echo $cstmr->nama_customer?>" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email_customer" class="form-control" value="<?php echo $cstmr->email_customer?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" name="password_customer" class="form-control" value="<?php echo $cstmr->password_customer?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" name="tanggal_lahir_customer" class="form-control" value="<?php echo $cstmr->tanggal_lahir_customer?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label">Provinsi</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="provinsi" id="provinsi" style="height: 33px;">
                                    <option value=''>- Pilih -</option>
                                    <?php foreach($provinsi as $prov){ ?>
                                    <option value="<?php echo $prov['provinsi_id']; ?>"><?php echo $prov['nama_provinsi']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label">Kota</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kota" id="kota" style="height: 33px;">
                                    <option value='<?php echo $cstmr->id_kota ?>'>- Pilih -</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat_customer" class="form-control" value="<?php echo $cstmr->alamat_customer?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label">No Tlpn</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_tlpn_customer" class="form-control" value="<?php echo $cstmr->no_tlpn_customer?>">
                            </div>
                        </div>

                        <?php echo anchor(base_url('admin/customer'),'<div class="btn btn-sm btn-danger">Kembali</div>') ?>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>