<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title"><?php echo $title_card; ?></h3>
        </div>
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
                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>/prodi/tambah"><i class="fa-solid fa-user-plus"></i> Tambah Siswa</a>
                <a onclick="window.print()" class="btn btn-sm btn-danger" href="#"><i class="fa fa-print"></i> Print</a>
            </p>

            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    $no = 1;
                    $ambildata = mysqli_query($con, "SELECT * FROM siswa, guru WHERE siswa.id_guru = guru.id_guru") or die(mysqli_error($con));
                    while ($r = mysqli_fetch_array($ambildata)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $r['id_siswa']; ?></td>
                            <td><?php echo $r['nama_siswa']; ?></td>
                            <td><?php echo $r['gender']; ?></td>
                            <td><?php echo $r['telp']; ?></td>
                            <td><?php echo $r['address']; ?></td>
                            <td><?php echo $r['kelas']; ?></td>
                            <td><?php echo $r['nama']; ?></td>
                            <td>
                                <a class="btn btn-xs btn-warning" href="<?php echo base_url(); ?>/prodi/edit/<?php echo $r['id_siswa']; ?>"><i class="fa-solid fa-edit"></i> Edit</a>
                                <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['id_siswa']; ?>);"><i class="fa-solid fa-trash"></i> Hapus</a>
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
                window.location.href = '<?php echo base_url(); ?>/prodi/hapus/' + id;
            }
        })
    }
</script>

<?php
echo $this->endSection();
