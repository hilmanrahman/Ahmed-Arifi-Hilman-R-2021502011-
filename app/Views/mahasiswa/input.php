<?php
echo $this->extend('template/index');
echo $this->section('content');
?>

<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title"><?php echo $title_card; ?></h3>
        </div>
        <!-- /.card-header -->
        <form action="<?php echo $action; ?>" method="post">
            <div class="card-body">
                <?php if (validation_errors()) {
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        <?php echo validation_list_errors() ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if (session()->getFlashdata('error')) {
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-warning"></i> Error</h5>
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php
                }
                ?>
                <?php echo csrf_field() ?>
                <?php
                if (current_url(true)->getSegments(2) == 'edit') {
                ?>
                    <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_alumni']; ?>">
                <?php
                }
                ?>
                <div>

                </div>
                <div class="from-group">
                    <label for="id_alumni">NIA</label>
                    <input type="text" name="id_alumni" id="id_alumni" value="<?php echo empty(set_value('id_alumni')) ? (empty($edit_data['id_alumni']) ? "" : $edit_data['id_alumni']) : set_value('id_alumni'); ?>" class=" form-control">
                </div>
                <div class="from-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?php echo empty(set_value('nama')) ? (empty($edit_data['nama']) ? "" : $edit_data['nama']) : set_value('nama'); ?>" class="form-control">
                </div>
                <div class="from-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select class="form-control" id="gender" name="gender" value="<?php echo empty(set_value('gender')) ? (empty($edit_data['gender']) ? "" : $edit_data['gender']) : set_value('gender'); ?>" class="form-control">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="from-group">
                    <label for="telp">No HP</label>
                    <input type="text" name="telp" id="telp" value="<?php echo empty(set_value('telp')) ? (empty($edit_data['telp']) ? "" : $edit_data['telp']) : set_value('telp'); ?>" class="form-control">
                </div>
                <div class="from-group">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" id="address" value="<?php echo empty(set_value('address')) ? (empty($edit_data['address']) ? "" : $edit_data['address']) : set_value('address'); ?>" class="form-control">
                </div>
                <div class="from-group">
                    <label for="lulus">Lulus Tahun</label>
                    <input type="text" name="lulus" id="lulus" value="<?php echo empty(set_value('lulus')) ? (empty($edit_data['lulus']) ? "" : $edit_data['lulus']) : set_value('lulus'); ?>" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php
echo $this->endSection();
