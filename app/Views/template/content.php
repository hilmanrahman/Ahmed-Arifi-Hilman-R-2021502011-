<?php
echo $this->extend('template/index');
echo $this->section('content');
?>

<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                Selamat Datang Di MTs Miftahul Ulum Gayam
            </h3>
        </div>
        <p>
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>180</h3>
                                <p>Siswa</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <a href="/prodi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>56<sup style="font-size: 20px"></sup></h3>
                                <p>Guru</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-person-chalkboard"></i>
                            </div>
                            <a href="/semester" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>1.200</h3>
                                <p>Alumni</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <a href="/mahasiswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>4</h3>
                                <p>Extra Kulikuler</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <a href="/Kegiatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            </p>
            <div class="col-md-12">
                <!-- /.card-header -->
                <div class="col-md-13">
                    <div id="carouselExampleIndicators" class="carousel slide pointer-event" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://mtsmug1986.files.wordpress.com/2017/06/img-20170212-wa00261.jpg?w=809" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://mtsmug1986.files.wordpress.com/2017/06/img-20170524-wa0001.jpg?w=809" alt="Second slide">
                            </div>
                            <div class="carousel-item active"></div>
                            <img class="d-block w-100" src="https://mtsmug1986.files.wordpress.com/2017/06/img-20170212-wa0028.jpg?w=809" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-custom-icon" aria-hidden="true">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-custom-icon" aria-hidden="true">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
    </div>
</div>
<?php
echo $this->endSection();
