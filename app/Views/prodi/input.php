<?php
echo $this->extend('template/index');
echo $this->section('content');
?>


<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title"><?php echo $title_card; ?></h3>
        </div>
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
                    <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_siswa']; ?>">
                <?php
                }
                ?>
                <div class="from-group">
                    <label for="id_siswa">NIS</label>
                    <input type="text" name="id_siswa" id="id_siswa" value="<?php echo empty(set_value('id_siswa')) ? (empty($edit_data['id_siswa']) ? "" : $edit_data['id_siswa']) : set_value('id_siswa'); ?>" class=" form-control">
                </div>
                <div class="from-group">
                    <label for="nama_siswa">Nama</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" value="<?php echo empty(set_value('nama_siswa')) ? (empty($edit_data['nama_siswa']) ? "" : $edit_data['nama_siswa']) : set_value('nama_siswa'); ?>" class="form-control">
                </div>
                <div class="from-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select class="form-control" id="gender" name="gender" value="<?php echo empty(set_value('gender')) ? (empty($edit_data['gender']) ? "" : $edit_data['gender']) : set_value('gender'); ?>" class="form-control">
                        <option value="">-Pilih Jenis Kelamin-</option>
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
                    <input type="text" name="address" id="address" value="<?php echo ('address') ? (empty($edit_data['address']) ? "" : $edit_data['address']) : set_value('address'); ?>" class="form-control">
                </div>
                <div class="from-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" id="kelas" value="<?php echo ('kelas') ? (empty($edit_data['kelas']) ? "" : $edit_data['kelas']) : set_value('kelas'); ?>" class="form-control">
                </div>
                <div class="from-group">
                    <label for="id_guru">Untuk Wali kelas</label>
                    <div class="col-sm-14">
                        <select name="id_guru" id="id_guru" class="form-control" require>
                            <option value="">-Pilih Wali Kelas-</option>
                            <?php
                            include "koneksi.php";
                            $query_guru = mysqli_query($con, "SELECT * FROM guru") or die(mysqli_error($con));
                            while ($data_guru = mysqli_fetch_array($query_guru)) {
                                echo "<option value= $data_guru[id_guru]> $data_guru[nama]</option>";
                            } ?>
                        </select>
                    </div>
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
