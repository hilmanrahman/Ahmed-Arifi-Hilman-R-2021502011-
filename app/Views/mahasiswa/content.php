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
        <div class="card-body">
            <?php
            if (session()->getFlashdata('success')) {
            ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Sukses</h5>
                    <?php echo session()->getFlashdata('success'); ?>
                </div>
            <?php
            }
            ?>
            <style>
                @media print {

                    .navbar.nav,
                    .btn,
                    th:nth-child(8),
                    td:nth-child(8),
                    footer {
                        display: none;
                    }
                }
            </style>
            <p>
                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>/mahasiswa/tambah"><i class="fa-solid fa-user-plus"></i> Tambah Alumni</a>
                <a onclick="window.print()" class="btn btn-sm btn-danger" href="#"><i class="fa fa-print"></i> Print</a>
            </p>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>NIA</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Tahun Lulus</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_alumni as $r) {

                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $r['id_alumni']; ?></td>
                            <td><?php echo $r['nama']; ?></td>
                            <td><?php echo $r['gender']; ?></td>
                            <td><?php echo $r['telp']; ?></td>
                            <td><?php echo $r['address']; ?></td>
                            <td><?php echo $r['lulus']; ?></td>
                            <td>
                                <a class="btn btn-xs btn-warning" href="<?php echo base_url(); ?>/mahasiswa/edit/<?php echo $r['id_alumni']; ?>"><i class="fa-solid fa-edit"></i> Edit</a>
                                <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['id_alumni']; ?>);"><i class="fa-solid fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function hapusConfig(id) {
        Swal.fire({
            title: 'Anda Yakin Akan Menghapus Data Ini?',
            text: "Data Akan Di Hapus Secara Permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?php echo base_url(); ?>/mahasiswa/hapus/' + id;
            }
        })
    }
</script>
<?php
echo $this->endSection();
?>